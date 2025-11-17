<?php

class Schedule extends DB
{
    // Mengambil semua schedule beserta info course
    public function getSchedule()
    {
        $query = "SELECT s.*, c.course_name, l.name AS lecturer_name
                  FROM schedules s
                  JOIN courses c ON s.course_id = c.id
                  JOIN lecturers l ON c.lecturer_id = l.id";
        return $this->execute($query);
    }

    // Menambahkan schedule baru
    public function add($data)
    {
        // $data = ['course_id' => 1, 'day' => 'Monday', 'time' => '08:00:00', 'room' => 'A101']
        $course_id = $data['course_id'];
        $day = $data['day'];
        $time = $data['time'];
        $room = $data['room'] ?? null;

        $query = "INSERT INTO schedules (course_id, day, time, room)
                  VALUES ($course_id, '$day', '$time', '$room')";

        return $this->execute($query);
    }

    // Menghapus schedule berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM schedules WHERE id = $id";
        return $this->execute($query);
    }

    // Update schedule
    public function update($id, $data)
    {
        $course_id = $data['course_id'];
        $day = $data['day'];
        $time = $data['time'];
        $room = $data['room'] ?? null;

        $query = "UPDATE schedules SET 
                    course_id = $course_id,
                    day = '$day',
                    time = '$time',
                    room = '$room'
                  WHERE id = $id";

        return $this->execute($query);
    }
}