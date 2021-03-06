<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternalNotification.
 *
 * @property string $text
 * @property string $link
 */
class InternalNotification extends Model
{
    protected $fillable = ['text', 'link'];
    protected $hidden = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'internal_notification_user');
    }
}
