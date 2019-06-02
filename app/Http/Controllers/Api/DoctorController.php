<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Level;
use App\Notifications\NewEditNotification;
use App\Pic;
use App\Schedule;
use App\Service;
use App\Spec;
use App\Doctor;
use App\User;
use App\Clinic;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function getEducation(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        return response()->json($doctor->educations);
    }

    public function getExperience(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        return response()->json($doctor->experiences);
    }

    public function getQualifications(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        return response()->json($doctor->qualifications);
    }
}
