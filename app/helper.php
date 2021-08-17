<?php

use App\Models\EnrollCourse;
use App\Models\Setting;
use App\Models\StudentMark;

function checkExistsEnrolledCourse($tId = 1, $cId = 1, $sId = 1, $ssId = 1): bool
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


function getMyGpa(): array
{
    $marks = StudentMark::whereStudentId(auth('student')->id())->avg('marks');

    if ($marks >= 80) {
        return [
            'cgpa' => 4,
            'grade' => 'A+'
        ];
    } else if ($marks >= 70 && $marks < 80) {
        return [
            'cgpa' => 3.75,
            'grade' => 'A'
        ];
    } else if ($marks >= 60 && $marks < 70) {
        return [
            'cgpa' => 3.50,
            'grade' => 'A-'
        ];
    } else if ($marks >= 50 && $marks < 60) {
        return [
            'cgpa' => 2.75,
            'grade' => 'C'
        ];
    } else if ($marks >= 50 && $marks < 60) {
        return [
            'cgpa' => 2.0,
            'grade' => 'D'
        ];
    } else {
        return [
            'cgpa' => 0.0,
            'grade' => 'F'
        ];
    }
}
