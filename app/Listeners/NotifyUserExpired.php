<?php

namespace App\Listeners;

use App\Events\UserSubExpired;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendExpiredNotification;
use App\Models\User; // Jangan lupa import model User


class NotifyUserExpired
{
    /**
     * Create the event listener.
     */

    public $user; // Siapkan property

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubExpired $event): void
    {
        // Ambil data user dari event
        $user = $event->user;

        // Masukkan ke queue/job
        SendExpiredNotification::dispatch($user);

        \Log::info("LISTENER: Menangkap event expired untuk " . $user->name);
    }
}
