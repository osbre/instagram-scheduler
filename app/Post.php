<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * @property string $body
 * @property Carbon $published_at
 */
class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['body', 'published_at'];

    protected $dates = ['published_at'];
}
