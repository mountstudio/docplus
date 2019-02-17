<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.02.2019
 * Time: 0:29
 */

namespace App\Collections;


use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;

class DoctorCollection extends Collection
{
    public function sortByPrice($price)
    {
        if ($price) {
            return $this->sortBy('price');
        } else {
            return $this->sortByDesc('price');
        }
    }

    public function sortByFeeds($feeds)
    {
        if ($feeds) {
            return $this->sortBy(function ($doc) {
                return $doc->feedbacks->count();
            });
        } else {
            return $this->sortByDesc(function ($doc) {
                return $doc->feedbacks->count();
            });
        }
    }

    public function getByUserId($id)
    {
        return $this->where('user_id', $id);
    }
}