<?php

class ScheduleView
{
    public function render($data)
    {
        // data dikirim ke template
        $data_schedules = $data;

        include "templates/schedule.html";
    }
}