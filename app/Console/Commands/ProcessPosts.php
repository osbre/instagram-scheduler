<?php

namespace App\Console\Commands;

use App\Jobs\PublishPost;
use App\Post;
use Illuminate\Console\Command;

class ProcessPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::where('published_at', date("Y-m-d H:i:00"))->get();

        $posts->each(function ($post) {
            PublishPost::dispatchNow($post);
        });
    }
}
