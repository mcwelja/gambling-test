<?php

namespace Tests\Unit;

use App\Http\Helpers\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testCalculateDistance()
    {
        $location1 = new Location(53.3340285, -6.2535495);
        $location2 = new Location(53.1234567, -6.7890123);

        $expectedDistance = 42.64509991045872;

        $calculatedDistance = $location1->calculateDistance($location2);

        $this->assertEquals($expectedDistance, $calculatedDistance, 'Distance calculation is incorrect.');
    }
}
