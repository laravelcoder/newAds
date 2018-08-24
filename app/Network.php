<?php

namespace App;

use App\Traits\FilterByUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Network.
 *
 * @property string $network
 * @property string $created_by
 * @property string $created_by_team
 * @property string $network_id
 */
class Network extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['network', 'network_id', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
        'network',
    ];

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     *
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

    public function affiliates()
    {
        return $this->belongsToMany(Affiliate::class, 'affiliate_network')->withTrashed();
    }

    public function stations()
    {
        return $this->hasMany(Station::class, 'network_id');
    }
}
