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

    protected $dates = ['published_at'];

    public function getStatusColorAttribute()
    {
        switch ($this->status) {
            case PostStatusEnum::PUBLISHED():
                return 'success';
                break;
            default:
                return 'primary';
        }
    }
}
