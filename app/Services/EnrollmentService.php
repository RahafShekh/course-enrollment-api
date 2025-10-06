<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;

class EnrollmentService
{
    public function enroll(User $user, int $courseId)
    {
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return [
                'status' => false,
                'message' => 'Already enrolled in this course.'
            ];
        }

        $user->courses()->attach($courseId);

        return [
            'status' => true,
            'message' => 'Enrolled successfully.'
        ];
    }

    public function getMyCourses(User $user)
    {
        return $user->courses()->get();
    }
}
