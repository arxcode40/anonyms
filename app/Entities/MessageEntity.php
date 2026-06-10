<?php

namespace App\Entities;

use App\Enums\MessageStatus;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;
use Throwable;

/**
 * @property Time          $created_at
 * @property string        $secret
 * @property MessageStatus $status
 * @property string        $uid
 * @property int           $users_id
 */
class MessageEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'users_id' => 'integer',
        'uid'      => 'string',
        'secret'   => 'string',
        'status'   => '?enum[App\Enums\MessageStatus]',
    ];

    public function getSecret(): string
    {
        $secret          = $this->attributes['secret'] ?? '';
        $encryptedSecret = base64_decode($secret, true);

        if ($encryptedSecret === false) {
            return 'Pesan tidak dapat didekripsi.';
        }

        try {
            return service('encrypter')->decrypt($encryptedSecret);
        } catch (Throwable) {
            return 'Pesan tidak dapat didekripsi.';
        }
    }

    public function setSecret(string $secret): self
    {
        $this->attributes['secret'] = base64_encode(service('encrypter')->encrypt($secret));

        return $this;
    }
}
