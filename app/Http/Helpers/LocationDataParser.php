<?php

namespace App\Http\Helpers;

use App\DTO\People as PeopleDTO;
use App\DTO\Collection\Peoples as PeoplesDTO;

class LocationDataParser
{
    public static function parseTxtFile($filePath): PeoplesDTO
    {
        $affiliates = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $peoples = [];

        foreach ($affiliates as $affiliate) {
            $peoples[] = json_decode($affiliate);
        }

        return new PeoplesDTO(
            ...array_map(static function($people) {
                return new PeopleDTO(
                    affiliateId: $people->affiliate_id,
                    name: $people->name,
                    latitude: $people->latitude,
                    longitude: $people->longitude
                );
            }, $peoples)
        );
    }
}
