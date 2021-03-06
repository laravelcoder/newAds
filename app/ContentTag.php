<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContentTag.
 *
 * @property string $title
 * @property string $slug
 */
class ContentTag extends Model
{
    protected $fillable = ['title', 'slug'];
    protected $hidden = [];
    public static $searchable = [
    ];
}
