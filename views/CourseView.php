<?php

class CourseView
{
    public function render($data)
    {
        // data dikirim ke template
        $data_courses = $data;

        include "templates/course.html";
    }
}