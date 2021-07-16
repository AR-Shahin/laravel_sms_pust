<?php

use App\Models\EnrollCourse;

function checkExistsEnrolledCourse($tId, $cId, $sId, $ssId): bool
{
    $c = EnrollCourse::whereStudentId(auth('student')->id())
        ->whereTeacherId($tId)
        ->whereCourseId($cId)
        ->whereSemesterId($sId)
        ->whereSessionId($ssId)
        ->first();

    if ($c) {
        return true;
    } else {
        return false;
    }
}
