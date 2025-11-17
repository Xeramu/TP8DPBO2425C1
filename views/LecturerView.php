<?php

class LecturerView
{
    public function render($data)
    {
        // data dikirim ke template
        $data_lecturers = $data;

        include "templates/lecturer.html";
    }
}