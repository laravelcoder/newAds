<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Agent
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $skype
 * @property string $address
 * @property string $photo
 * @property text $about
 * @property string $created_by
 * @property string $created_by_team
*/
class Agent extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['first_name', 'last_name', 'phone1', 'phone2', 'email', 'skype', 'address', 'photo', 'about', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
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
    
    public function advertisers_id()
    {
        return $this->belongsToMany(ContactCompany::class, 'agent_contact_company');
    }
    
    public function phones() {
        return $this->hasMany(Phone::class, 'agent_id');
    }
}
