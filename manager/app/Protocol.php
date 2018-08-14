<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Protocol
 *
 * @package App
 * @property string $protocol
 * @property string $real_name
*/
class Protocol extends Model
{
    use SoftDeletes;

    protected $fillable = ['protocol', 'real_name'];
    protected $hidden = [];
    
    
    
    public function csis() {
        return $this->hasMany(Csi::class, 'protocol_id');
    }
}
