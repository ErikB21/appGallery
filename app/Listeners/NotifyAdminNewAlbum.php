<?php

namespace App\Listeners;

use App\Events\NewAlbumCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotifyAdminNewAlbum;

class NotifyAdminNewAlbum
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewAlbumCreated  $event
     * @return void
     */
    public function handle(NewAlbumCreated $event)
    {
        // dd($event->album);
        $admins = User::select(['email', 'name'])->where('user_role', 'admin')->get();
        foreach($admins as $admin){
            Mail::to($admin->email)->send(new MailNotifyAdminNewAlbum($admin, $event->album));
        }
    }
}
