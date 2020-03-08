<?php

namespace App\Jobs;

use App\Enums\PostStatusEnum;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use InstaLite\Exception;
use InstaLite\InstaLite;

class PublishPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Post
     */
    private $post;

    /**
     * Create a new job instance.
     * @param  Post  $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     * @throws Exception
     */
    public function handle(): void
    {
        $instagram = new InstaLite(
            config('services.instagram.user'),
            config('services.instagram.password'),
            config('services.instagram.proxy')
        );
        $instagram->uploadPhoto($this->post->getFirstMedia()->getPath(), $this->post->body);

        $this->post->status = PostStatusEnum::PUBLISHED();
        $this->post->save();
    }
}
