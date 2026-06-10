<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Models\UserModel;
use Psr\Log\LoggerInterface;

class ProfileController extends BaseController
{
    private UserModel $userModel;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);

        $this->userModel = auth()->getProvider();
    }

    public function edit(): string
    {
        return view('Profile/edit', ['title' => 'Profilku']);
    }

    public function update(): RedirectResponse
    {
        $user = auth()->user();

        $data  = $this->request->getPost();
        $rules = setting('Validation.profile');

        if (($data['username'] ?? null) !== $user->username) {
            $rules['username']['rules'] .= '|is_unique[users.username]';
        }

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput();
        }

        $validatedData     = $this->validator->getValidated();
        $credentials       = ['username' => $user->username];
        $hasPasswordChange = service('validation')->check($validatedData['current_password'], 'required');

        if ($hasPasswordChange) {
            $credentials['password'] = $validatedData['current_password'];

            $validUser = auth()->check($credentials);

            if (! $validUser->isOK()) {
                return redirect()->back()->with('error', $validUser->reason());
            }

            $credentials['password'] = $validatedData['new_password'];
        }

        $credentials['username'] = $validatedData['username'];

        $user->fill($credentials);

        $this->userModel->save($user);

        auth()->logout();
        auth()->login($user);

        return redirect()->to('p')->with('message', 'Profilmu berhasil diubah.');
    }
}
