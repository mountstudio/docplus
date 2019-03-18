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
        if ($request->filter != null && $request->filter == 'feeds') {
            $model = $this->sortByFeeds();
        }
        if ($request->filter != null && $request->filter == 'popularity') {
            $model = $this->sortByPopular();
        }
        if ($request->filter != null && $request->filter == 'rating') {
            $model = $this->sortByRating();
        }

        if ($request->fullDay) {
            $model = $this->filterByFullDay();
        }
        if ($request->child) {
            $model = $this->filterByChild();
        }

        return $model;
    }

    public function sortByPopular()
    {
        return $this->sortByDesc(function ($clinic) {
            /**
             * @var Clinic $clinic
             */
            return $clinic->getScheduleActivated($clinic)->count();
        });
    }

    public function sortByRating()
    {
        return $this->sortByDesc('rating');
    }

    public function sortByFeeds()
    {
        return $this->sortByDesc(function ($clinic) {
            return $clinic->feedbacks->count();
        });
    }

    public function filterByFullDay()
    {
        return $this->where('fullDay', true);
    }

    public function filterByChild()
    {
        return $this->where('child', true);
    }

    public function getByUserId($id)
    {
        return $this->where('user_id', $id);
    }
}