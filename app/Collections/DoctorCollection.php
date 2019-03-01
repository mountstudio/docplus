<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.02.2019
 * Time: 0:29
 */

namespace App\Collections;


use App\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;

class DoctorCollection extends Collection
{
    public function sortingAndFilter($request)
    {
        $model = $this;
        if ($request->feeds != null) {
            $model = $this->sortByFeeds($request->feeds);
        }
        if ($request->popular != null) {
            $model = $this->sortByPopular($request->popular);
        }
        if ($request->rating != null) {
            $model = $this->sortByRating($request->rating);
        }
        if ($request->price != null) {
            $model = $this->sortByPrice($request->price);
        }

        if ($request->home) {
            $model = $this->filterByHome($request->home);
        }
        if ($request->child) {
            $model = $this->filterByChild($request->child);
        }

        return $model;
    }

    public function sortByPopular($popular)
    {
        if ($popular) {
            return $this->sortBy(function ($doc) {
                /**
                 * @var Doctor $doc
                 */
                return $doc->getScheduleActivated($doc)->count();
            });
        } else {
            return $this->sortByDesc(function ($doc) {
                /**
                 * @var Doctor $doc
                 */
                return $doc->getScheduleActivated($doc)->count();
            });
        }
    }

    public function sortByRating($rating)
    {
        if ($rating) {
            return $this->sortBy('rating');
        } else {
            return $this->sortByDesc('rating');
        }
    }

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

    public function filterByHome($home)
    {
        return $this->where('home', $home);
    }

    public function filterByChild($child)
    {
        return $this->where('child', $child);
    }

    public function getByUserId($id)
    {
        return $this->where('user_id', $id);
    }
}