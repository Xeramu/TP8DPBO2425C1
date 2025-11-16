<?php

class Schedule extends DB
{
    // Ambil semua schedule + nama course + nama dosen
    function getSchedules()
    {
        $query = "SELECT schedules.*, 
                         courses.course_name, 
                         lecturers.name AS lecturer_name
                  FROM schedules
                  JOIN courses ON schedules.course_id = courses.id
                  JOIN lecturers ON courses.lecturer_id = lecturers.id";

        return $this->execute($query);
    }

    // Ambil 1 schedule berdasarkan ID
    function getScheduleById($id)
    {
        $query = "SELECT * FROM schedules WHERE id = $id";
        return $this->execute($query);
    }

    // Tambah jadwal
    function add($data)
    {
        $course_id = $data['course_id'];
        $day       = $data['day'];
        $time      = $data['time'];
        $room      = $data['room'];

        $query = "INSERT INTO schedules (course_id, day, time, room)
                  VALUES ($course_id, '$day', '$time', '$room')";

        return $this->execute($query);
    }

    // Update jadwal
    function update($id, $data)
    {
        $course_id = $data['course_id'];
        $day       = $data['day'];
        $time      = $data['time'];
        $room      = $data['room'];

        $query = "UPDATE schedules SET
                    course_id = $course_id,
                    day = '$day',
                    time = '$time',
                    room = '$room'
                  WHERE id = $id";

        return $this->execute($query);
    }

    // Hapus jadwal
    function delete($id)
    {
        $query = "DELETE FROM schedules WHERE id = $id";
        return $this->execute($query);
    }
}