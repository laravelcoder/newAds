<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cso
 *
 * @package App
 * @property string $channel_server
 * @property string $cid
 * @property string $ocloud_a
 * @property integer $ocp_a
 * @property string $ocloud_b
 * @property string $ocp_b
*/
class Cso extends Model
{
    use SoftDeletes;

    protected $fillable = ['ocloud_a', 'ocp_a', 'ocloud_b', 'ocp_b', 'channel_server_id', 'cid_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setChannelServerIdAttribute($input)
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCidIdAttribute($input)
    {
        $this->attributes['cid_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOcpAAttribute($input)
    {
        $this->attributes['ocp_a'] = $input ? $input : null;
    }
    
    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }
    
    public function cid()
    {
        return $this->belongsTo(Channel::class, 'cid_id')->withTrashed();
    }
    
}
