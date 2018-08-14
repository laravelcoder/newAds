<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Channel
 *
 * @package App
 * @property string $channelid
 * @property enum $type
*/
class Channel extends Model
{
    use SoftDeletes;

    protected $fillable = ['channelid', 'type'];
    protected $hidden = [];
    
    

    public static $enum_type = ["prod" => "Prod", "dev" => "Dev"];
    
}
