<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollCourseRequest;
use App\Services\EnrollmentService;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    protected $enrollmentService;

    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }

    public function enroll(EnrollCourseRequest $request)
    {
      $user = auth('api')->user();

        $courseId = $request->course_id;

        $result = $this->enrollmentService->enroll($user, $courseId);

        if (!$result['status']) {
            return response()->json(['message' => $result['message']], 400);
        }

        return response()->json(['message' => $result['message']], 201);
    }

    public function myCourses()
    {
       $user = auth('api')->user();

        $courses = $this->enrollmentService->getMyCourses($user);

        return response()->json($courses);
    }
}
