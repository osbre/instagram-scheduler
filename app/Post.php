<?php

namespace App;

use App\Enums\PostStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * @property string $body
 * @property PostStatusEnum $status
 * @property Carbon $published_at
 */
class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['body', 'status', 'published_at'];
//
//    protected $casts = [
//        'status' => PostStatusEnum::class,
//    ];

    protected $dates = ['published_at'];
}
