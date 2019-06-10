<?php

namespace App\Observers;

use App\Blog;
use App\Helpers\ImageSaver;

class BlogObserver
{
    public function creating(Blog $blog)
    {
        if ($file = request('image')) {
            $fileName = ImageSaver::save($file, 'uploads', 'blog');

            $blog->image = $fileName;
        }
    }

    /**
     * Handle the blog "created" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function created(Blog $blog)
    {
        //
    }

    public function updating(Blog $blog)
    {
        if ($file = request('image')) {
            $fileName = ImageSaver::save($file, 'uploads', 'blog');

            $blog->image = $fileName;
        }
    }

    /**
     * Handle the blog "updated" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "restored" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
