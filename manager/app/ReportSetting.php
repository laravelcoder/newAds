<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReportSetting
 *
 * @package App
 * @property tinyInteger $millisecond_precision
 * @property tinyInteger $show_channel_button
 * @property tinyInteger $show_clip_button
 * @property tinyInteger $show_group_button
 * @property tinyInteger $show_live_button
 * @property tinyInteger $enable_evt
 * @property tinyInteger $enable_excel
 * @property tinyInteger $enable_evt_timing
 * @property string $timezone
 * @property string $country
 * @property string $synce_server
 * @property string $filters
*/
class ReportSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['millisecond_precision', 'show_channel_button', 'show_clip_button', 'show_group_button', 'show_live_button', 'enable_evt', 'enable_excel', 'enable_evt_timing', 'timezone', 'country_id', 'synce_server_id', 'filters_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCountryIdAttribute($input)
    {
        $this->attributes['country_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSynceServerIdAttribute($input)
    {
        $this->attributes['synce_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFiltersIdAttribute($input)
    {
        $this->attributes['filters_id'] = $input ? $input : null;
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }
    
    public function synce_server()
    {
        return $this->belongsTo(SyncServer::class, 'synce_server_id')->withTrashed();
    }
    
    public function filters()
    {
        return $this->belongsTo(Filter::class, 'filters_id')->withTrashed();
    }
    
}
