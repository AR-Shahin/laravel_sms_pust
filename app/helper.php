<?php

use App\Models\EnrollCourse;
use App\Models\Setting;
use App\Models\StudentMark;

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



function checkAssignMarksOfCourse($stId, $cId, $sId, $ssId): bool
{
    $c = StudentMark::whereTeacherId(auth('teacher')->id())
        ->whereStudentId($stId)
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


function checkCourseEnrollOpenOrNot(): bool
{
    $s = Setting::first();
    if ($s->is_enroll) {
        return true;
    } else {
        return false;
    }
}
