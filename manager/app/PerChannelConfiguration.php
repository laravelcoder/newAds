<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PerChannelConfiguration
 *
 * @package App
 * @property string $cid
 * @property tinyInteger $active
 * @property string $notify_channel_id
 * @property string $offset
 * @property integer $ad_lengths
 * @property string $ad_spacing
 * @property string $rtn
 * @property string $sync_server
*/
class PerChannelConfiguration extends Model
{
    use SoftDeletes;

    protected $fillable = ['cid', 'active', 'notify_channel_id', 'offset', 'ad_lengths', 'ad_spacing', 'rtn_id', 'sync_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAdLengthsAttribute($input)
    {
        $this->attributes['ad_lengths'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRtnIdAttribute($input)
    {
        $this->attributes['rtn_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSyncServerIdAttribute($input)
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }
    
    public function rtn()
    {
        return $this->belongsTo(RealtimeNotification::class, 'rtn_id')->withTrashed();
    }
    
    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
    
}
