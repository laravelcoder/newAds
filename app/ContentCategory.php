<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContentCategory.
 *
 * @property string $title
 * @property string $slug
 */
class ContentCategory extends Model
{
    protected $fillable = ['title', 'slug'];
    protected $hidden = [];
    public static $searchable = [
    ];
}
