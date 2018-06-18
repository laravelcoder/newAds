<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 *
 * @package App
 * @property string $provider
*/
class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = ['provider'];
    protected $hidden = [];
    public static $searchable = [
        'provider',
    ];
    
    
}
