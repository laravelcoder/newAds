<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChannelServer
 *
 * @package App
 * @property string $name
*/
class ChannelServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
    public function csos() {
        return $this->hasMany(Cso::class, 'channel_server_id');
    }
}
