<?php

namespace App\Providers;

use App\Http\Helpers\Location;
use App\Http\Helpers\LocationDataParser;
use Illuminate\Support\ServiceProvider;

class InviteServiceProvider extends ServiceProvider
{
    const DUBLIN_OFFICE_LATITUDE = 53.3340285;
    const DUBLIN_OFFICE_LONGITUDE = -6.2535495;
    const AFFILIATES_PATH = 'app/affiliates.txt';

    public function __construct()
    {
        parent::__construct(app());
    }

    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->bind('Location', function () {
//            return new Location(self::DUBLIN_OFFICE_LATITUDE, self::DUBLIN_OFFICE_LONGITUDE);
//        });
    }

    public function invitePeople(): array
    {
//        $dublinLocation = app('Location');
        $dublinLocation = new Location(self::DUBLIN_OFFICE_LATITUDE, self::DUBLIN_OFFICE_LONGITUDE);

        $filePath = storage_path(self::AFFILIATES_PATH);
        if (!file_exists($filePath)) {
            return [];
        }

        $peopleCollection = LocationDataParser::parseTxtFile($filePath);

        $invitedPeople = [];
        foreach ($peopleCollection->peoples as $personData) {
            $personLocation = new Location(
                latitude: $personData->latitude,
                longitude: $personData->longitude
            );

            $distance = $dublinLocation->calculateDistance($personLocation);

            if ($distance <= 100) {
                $invitedPeople[] = $personData;
            }
        }

        if (empty($invitedPeople)) {
            return [];
        }

        usort($invitedPeople, function ($a, $b) {
            return $a->affiliateId - $b->affiliateId;
        });

        return $invitedPeople;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        $this->app->bind('invitePeople', function () {
//            $dublinLocation = app('Location');
//
//            $filePath = storage_path(self::AFFILIATES_PATH);
//
//            if (!file_exists($filePath)) {
//                return [];
//            }
//
//            $peopleCollection = LocationDataParser::parseTxtFile($filePath);
//
//            $invitedPeople = [];
//
//            foreach ($peopleCollection->peoples as $personData) {
//                $personLocation = new Location($personData->latitude, $personData->longitude);
//                $distance = $dublinLocation->calculateDistance($personLocation);
//
//                if ($distance <= 100) {
//                    $invitedPeople[] = $personData;
//                }
//            }
//
//            if (empty($invitedPeople)) {
//                return [];
//            }
//
//            return $invitedPeople;
//        });
    }
}
