<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phone.
 *
 * @property string $phone_number
 * @property string $advertiser
 * @property string $agent
 * @property string $advertisers
 */
class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = ['phone_number', 'advertiser_id', 'agent_id', 'advertisers_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setAdvertiserIdAttribute($input)
    {
        $this->attributes['advertiser_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setAgentIdAttribute($input)
    {
        $this->attributes['agent_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     *
     * @param $input
     */
    public function setAdvertisersIdAttribute($input)
    {
        $this->attributes['advertisers_id'] = $input ? $input : null;
    }

    public function advertiser()
    {
        return $this->belongsTo(Contact::class, 'advertiser_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id')->withTrashed();
    }

    public function advertisers()
    {
        return $this->belongsTo(ContactCompany::class, 'advertisers_id');
    }
}
