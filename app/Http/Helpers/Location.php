<?php

namespace App\Http\Helpers;

class Location
{
    const EARTH_RADIUS = 6371; // Radius of the Earth in kilometers
    public float $latitude;
    public float $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    // Calculate the distance between two locations using the Haversine formula
    public function calculateDistance(Location $location): float
    {
        $lat1 = deg2rad($this->latitude);
        $lon1 = deg2rad($this->longitude);
        $lat2 = deg2rad($location->latitude);
        $lon2 = deg2rad($location->longitude);

        $differenceLat = $lat2 - $lat1;
        $differenceLon = $lon2 - $lon1;

        $angle = sin($differenceLat / 2) *
            sin($differenceLat / 2) + cos($lat1) * cos($lat2) *
            sin($differenceLon / 2) * sin($differenceLon / 2);

        $c = 2 * atan2(sqrt($angle), sqrt(1 - $angle));

        return self::EARTH_RADIUS * $c; // Distance in kilometers
    }
}
