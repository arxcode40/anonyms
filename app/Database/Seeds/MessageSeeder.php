<?php

namespace App\Database\Seeds;

use App\Entities\MessageEntity;
use App\Enums\MessageStatus;
use App\Models\MessageModel;
use CodeIgniter\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $messageModel = new MessageModel();
        $secrets      = [
            'Aku pernah pura-pura sibuk supaya tidak diajak rapat.',
            'Hari ini aku makan camilan sebelum sarapan.',
            'Aku masih menyimpan draft pesan yang tidak pernah kukirim.',
            'Aku sering membaca ulang chat lama saat malam.',
            'Aku punya playlist rahasia untuk hari buruk.',
            'Aku pernah lupa password karena terlalu sering menggantinya.',
            'Aku menyukai hujan, tapi tidak suka jalanan basah.',
            'Aku pernah menunda tugas hanya karena terlalu banyak tab terbuka.',
            'Aku kadang menamai file final berkali-kali.',
            'Aku punya catatan kecil berisi ide yang belum pernah kubuka lagi.',
            'Aku pernah salah kirim pesan lalu langsung panik.',
            'Aku suka menyimpan screenshot yang tidak penting.',
            'Aku sering membuat rencana rapi lalu mengubahnya mendadak.',
            'Aku pernah menghapus tulisan panjang karena merasa kurang pas.',
            'Aku kadang membuka aplikasi tanpa tahu mau melakukan apa.',
            'Aku punya kebiasaan mengecek ulang hal yang sebenarnya sudah benar.',
            'Aku sering lupa membawa minum saat sedang fokus kerja.',
            'Aku pernah menyimpan nama kontak dengan panggilan aneh.',
            'Aku suka membaca pesan notifikasi tanpa membukanya.',
            'Aku pernah tertawa sendiri karena teringat hal kecil.',
        ];

        foreach ($secrets as $index => $secret) {
            $message = new MessageEntity();
            $message->fill([
                'users_id' => 1,
                'uid'      => random_string('alnum', 16),
                'secret'   => $secret,
                'status'   => ($index % 3 === 0 ? MessageStatus::Seen : MessageStatus::Unseen)->value,
            ]);

            $messageModel->save($message);
        }
    }
}
