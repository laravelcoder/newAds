<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Network
 *
 * @package App
 * @property string $network
 * @property string $network_affiliate
 * @property string $created_by
 * @property string $created_by_team
*/
class Network extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['network', 'network_affiliate', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
        'network',
    ];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByTeamIdAttribute($input)
    {
        $this->attributes['created_by_team_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
    public function created_by_team()
    {
        return $this->belongsTo(Team::class, 'created_by_team_id');
    }
    
}
