<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

use App\Events\UserSubExpired;

class CheckExpiredSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:check-expired-subscription';
    protected $signature = 'subscription:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cek user yang expired dan matikan status aktifnya';

    /**
     * Execute the console command.
     */

    // Everything start from here | when command is being called, this is what will happen
    public function handle()
    {
        $expiredUsers = User::where('expired_at', '<', now())
                        ->where('is_active', true)
                        ->get();
        
        foreach($expiredUsers as $user) {
            $user->update(['is_active' => false]);

            // panggil event
            event(new UserSubExpired($user));
        }

        $this->info('Pengecekan selesai');
    }
}
