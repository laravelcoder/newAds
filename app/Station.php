<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Station
 *
 * @package App
 * @property string $station_label
 * @property string $channel_number
 * @property string $created_by
 * @property string $created_by_team
*/
class Station extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['station_label', 'channel_number', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
        'station_label',
        'channel_number',
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
