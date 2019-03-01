<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.02.2019
 * Time: 18:28
 */

namespace App\Collections;


use App\Clinic;
use Illuminate\Database\Eloquent\Collection;

class ClinicCollection extends Collection
{
    public function sortingAndFilter($request)
    {
        $model = $this;
        if ($request->feeds != null) {
            $model = $this->sortByFeeds($request->feeds);
        }
//        if ($request->popular != null) {
//            $model = $this->sortByPopular($request->popular);
//        }
        if ($request->rating != null) {
            $model = $this->sortByRating($request->rating);
        }

        if ($request->home) {
            $model = $this->filterByFullDay($request->fullDay);
        }
        if ($request->child) {
            $model = $this->filterByChild($request->child);
        }

        return $model;
    }

//    public function sortByPopular($popular)
//    {
//        if ($popular) {
//            return $this->sortBy(function ($clinic) {
//                /**
//                 * @var Clinic $clinic
//                 */
//                return $clinic->getScheduleActivated($clinic)->count();
//            });
//        } else {
//            return $this->sortByDesc(function ($clinic) {
//                /**
//                 * @var Clinic $clinic
//                 */
//                return $clinic->getScheduleActivated($clinic)->count();
//            });
//        }
//    }

    public function sortByRating($rating)
    {
        if ($rating) {
            return $this->sortBy('rating');
        } else {
            return $this->sortByDesc('rating');
        }
    }

    public function sortByFeeds($feeds)
    {
        if ($feeds) {
            return $this->sortBy(function ($clinic) {
                return $clinic->feedbacks->count();
            });
        } else {
            return $this->sortByDesc(function ($clinic) {
                return $clinic->feedbacks->count();
            });
        }
    }

    public function filterByFullDay($fullDay)
    {
        return $this->where('fullDay', $fullDay);
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