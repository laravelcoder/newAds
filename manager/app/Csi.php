<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Csi
 *
 * @package App
 * @property string $channel_server
 * @property string $channel
 * @property string $protocol
 * @property string $ssm
 * @property string $imc
 * @property string $ip
 * @property string $pid
*/
class Csi extends Model
{
    use SoftDeletes;

    protected $fillable = ['ssm', 'imc', 'ip', 'pid', 'channel_server_id', 'channel_id', 'protocol_id'];
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
    public function setChannelIdAttribute($input)
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProtocolIdAttribute($input)
    {
        $this->attributes['protocol_id'] = $input ? $input : null;
    }
    
    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }
    
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id')->withTrashed();
    }
    
    public function protocol()
    {
        return $this->belongsTo(Protocol::class, 'protocol_id')->withTrashed();
    }
    
}
