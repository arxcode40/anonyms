<?php

namespace App\Models;

use App\Entities\MessageEntity;
use App\Enums\MessageStatus;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table                  = 'messages';
    protected $primaryKey             = 'id';
    protected $useAutoIncrement       = true;
    protected $returnType             = MessageEntity::class;
    protected $useSoftDeletes         = false;
    protected $protectFields          = true;
    protected $allowedFields          = ['users_id', 'uid', 'secret', 'status'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected array $casts            = [];
    protected array $castHandlers     = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = false;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function deleteExpiredMessages(): bool
    {
        return $this
            ->where('created_at <', Time::now()->subDays(7)->toDateTimeString())
            ->delete();
    }

    public function getUserMessages(int|string $userId): array
    {
        return $this
            ->select('uid, status')
            ->where('users_id', $userId)
            ->orderBy('id', 'DESC')
            ->paginate((int) env('pager.perPage', 15));
    }

    public function countUserMessages(int|string $userId): int
    {
        return (int) $this->where('users_id', $userId)->countAllResults();
    }

    public function countUserMessagesByStatus(MessageStatus $status, int|string $userId): int
    {
        return (int) $this
            ->where('status', $status->value)
            ->where('users_id', $userId)
            ->countAllResults();
    }

    public function findByUid(string $uid): ?MessageEntity
    {
        return $this->where('uid', $uid)->first();
    }
}
