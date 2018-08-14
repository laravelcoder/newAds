<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RealtimeNotification
 *
 * @package App
 * @property enum $server_type
 * @property string $r_urltn
 * @property string $sync_server
*/
class RealtimeNotification extends Model
{
    use SoftDeletes;

    protected $fillable = ['server_type', 'r_urltn', 'sync_server_id'];
    protected $hidden = [];
    
    

    public static $enum_server_type = ["NONE" => "NONE", "CAIPY" => "CAIPY", "IMAGINE" => "IMAGINE", "HARMONIC" => "HARMONIC", "ENVIVIO" => "ENVIVIO", "OCTOSHAPE" => "OCTOSHAPE", "MOVE" => "MOVE"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSyncServerIdAttribute($input)
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }
    
    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
    
}
