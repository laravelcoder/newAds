<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alert
 *
 * @package App
 * @property string $title
 * @property text $content
 * @property enum $alert_type
 * @property string $contact
 * @property string $user
*/
class Alert extends Model
{
    protected $fillable = ['title', 'content', 'alert_type', 'contact_id', 'user_id'];
    protected $hidden = [];
    public static $searchable = [
    ];
    

    public static $enum_alert_type = ["alert-danger" => "Alert-danger", "alert-info" => "Alert-info", "alert-warning" => "Alert-warning", "alert-success" => "Alert-success", "alert-default" => "Alert-default", "alert-plain" => "Alert-plain"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setContactIdAttribute($input)
    {
        $this->attributes['contact_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
