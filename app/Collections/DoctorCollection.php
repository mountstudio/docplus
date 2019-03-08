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
        if ($request->filter != null && $request->filter == 'feeds') {
            $model = $this->sortByFeeds();
        }
        if ($request->filter != null && $request->filter == 'popularity') {
            $model = $this->sortByPopular();
        }
        if ($request->filter != null && $request->filter == 'rating') {
            $model = $this->sortByRating();
        }
        if ($request->filter != null && $request->filter == 'price') {
            $model = $this->sortByPrice();
        }

        if ($request->home) {
            $model = $this->filterByHome();
        }
        if ($request->child) {
            $model = $this->filterByChild();
        }

        return $model;
    }

    public function sortByPopular()
    {
        return $this->sortByDesc(function ($doc) {
            /**
             * @var Doctor $doc
             */
            return $doc->getScheduleActivated($doc)->count();
        });
    }

    public function sortByRating()
    {
        return $this->sortByDesc('rating');
    }

    public function sortByPrice()
    {
        return $this->sortByDesc('price');
    }

    public function sortByFeeds()
    {
        return $this->sortByDesc(function ($doc) {
            return $doc->feedbacks->count();
        });
    }

    public function filterByHome()
    {
        return $this->where('home', 1);
    }

    public function filterByChild()
    {
        return $this->where('child', 1);
    }

    public function getByUserId($id)
    {
        return $this->where('user_id', $id);
    }
}