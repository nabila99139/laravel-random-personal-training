<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User; // Jangan lupa import model User

class SendExpiredNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    public $user; // Siapkan property

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Sekarang $this->user->email sudah bisa diakses
        \Log::info("JOB: Mengirim email notifikasi expired ke: " . $this->user->email);

        sleep(2);

        \Log::info("JOB: Selesai diproses!");
    }
}
