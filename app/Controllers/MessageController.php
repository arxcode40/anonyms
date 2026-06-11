<?php

namespace App\Controllers;

use App\Entities\MessageEntity;
use App\Enums\MessageStatus;
use App\Models\MessageModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Models\UserModel;
use Psr\Log\LoggerInterface;

class MessageController extends BaseController
{
    private const CLEANUP_CACHE_KEY = 'last_message_cleanup';
    private const UID_LENGTH        = 16;

    private UserModel $userModel;
    private MessageModel $messageModel;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);

        $this->userModel    = auth()->getProvider();
        $this->messageModel = model(MessageModel::class);
    }

    public function index(): string
    {
        if (! cache(self::CLEANUP_CACHE_KEY)) {
            $this->messageModel->deleteExpiredMessages();
            cache()->save(self::CLEANUP_CACHE_KEY, Time::now()->getTimestamp(), DAY);
        }

        return view('Message/list', [
            'title'           => 'Beranda',
            'messages'        => $this->messageModel->getUserMessages(user_id()),
            'messages_total'  => $this->messageModel->countUserMessages(user_id()),
            'messages_unseen' => $this->messageModel->countUserMessagesByStatus(MessageStatus::Unseen, user_id()),
            'pager'           => $this->messageModel->pager,
        ]);
    }

    public function new(?string $username = null): RedirectResponse|string
    {
        if (auth()->loggedIn() && $username === auth()->user()->username) {
            return redirect()->to('/');
        }

        if (! $this->userModel->findByCredentials(['username' => $username])) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Message/new', [
            'robots'   => 'index, follow',
            'title'    => "Kirim Pesan Rahasia ke @{$username}",
            'username' => $username,
        ]);
    }

    public function create(string $username): RedirectResponse
    {
        if (auth()->loggedIn() && $username === auth()->user()->username) {
            return redirect()->to('/');
        }

        $user = $this->userModel->findByCredentials(['username' => $username]);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data  = $this->request->getPost();
        $rules = setting('Validation.message');

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput();
        }

        $validatedData = $this->validator->getValidated();

        do {
            $uid = random_string('alnum', self::UID_LENGTH);
        } while ($this->messageModel->findByUid($uid));

        $message           = new MessageEntity();
        $message->users_id = $user->id;
        $message->uid      = $uid;
        $message->fill($validatedData);

        $this->messageModel->save($message);

        return redirect()->to('success')->with('username', $username);
    }

    public function show(?string $uid = null): string
    {
        if ($uid === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $message = $this->messageModel->findByUid($uid);

        if (! $message || $message->users_id !== user_id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($message->status === MessageStatus::Unseen) {
            $message->status = MessageStatus::Seen;
            $this->messageModel->save($message);
        }

        return view('Message/show', [
            'title'   => 'Pesan Rahasia',
            'message' => $message,
        ]);
    }

    public function delete(?string $uid = null): RedirectResponse
    {
        if ($uid === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $message = $this->messageModel->findByUid($uid);

        if (! $message || $message->users_id !== user_id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->messageModel->delete($message->id);

        return redirect()->to('/')->with('message', 'Pesan berhasil dihapus.');
    }

    public function success(): RedirectResponse|string
    {
        if (session('username') === null) {
            return redirect()->to('/');
        }

        return view('Message/success', ['title' => 'Pesan Rahasia Berhasil Dikirim']);
    }
}
