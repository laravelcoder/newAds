<?php

namespace App\Observers;

use App\Notifications\QA_EmailNotification;
use App\User;
use Illuminate\Support\Facades\Notification;

class UserCrudActionObserver
{
    public function created(User $model)
    {
        $emails = ['wecodelaravel@gmail.com'];
        $data = [
            'action'    => 'Created',
            'crud_name' => 'Users',
        ];

        $users = \App\User::where('email', $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

    public function updated(User $model)
    {
        $emails = ['wecodelaravel@gmail.com'];
        $data = [
            'action'    => 'Updated',
            'crud_name' => 'Users',
        ];
        $users = \App\User::where('email', $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

    public function deleting(User $model)
    {
        $emails = ['wecodelaravel@gmail.com'];
        $data = [
            'action'    => 'Deleted',
            'crud_name' => 'Users',
        ];
        $users = \App\User::where('email', $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }
}
