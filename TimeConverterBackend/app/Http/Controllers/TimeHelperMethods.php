<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeHelperMethods extends Controller
{
    // Convert hours minutes and seconds into a total amount of seconds
    public function getSeconds(int $hours, int $minutes, int $seconds)
    {
        $totalMinutes = ($this->hoursToMinutes($hours) + $minutes);
        $totalSeconds = ($this->minutesToSeconds($totalMinutes) + $seconds);
        return $totalSeconds;
    }

    // Convert hours into minutes
    public function hoursToMinutes(int $hours)
    {
        $minutes = ($hours * 60);
        return $minutes;
    }

    // Convert minutes into seconds
    public function minutesToSeconds(int $minutes)
    {
        $seconds = ($minutes * 60);
        return $seconds;
    }

    // Convert seconds to hours, minutes and seconds
    public function hoursMinutesSeconds(int $seconds): array
    {
        // Use intdiv
        $hours = intdiv($seconds, 3600);

        $remainingSeconds = $seconds % 3600;

        $minutes = intdiv($remainingSeconds, 60);

        $seconds = $remainingSeconds % 60;

        return [
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        ];
    }
}
