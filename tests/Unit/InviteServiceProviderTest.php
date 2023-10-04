<?php

namespace Tests\Unit;

use App\DTO\Collection\Peoples;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use App\Providers\InviteServiceProvider;
use App\Http\Helpers\Location;
use App\Http\Helpers\LocationDataParser;

class InviteServiceProviderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testInvitePeopleWithValidData()
    {
        $dublinLocationMock = $this->createMock(Location::class);
        $locationDataParserMock = $this->createMock(LocationDataParser::class);
        $peoplesDTOMock = $this->createMock(Peoples::class);

        $dublinLocationMock->method('calculateDistance')->willReturn(50.123);
        $locationDataParserMock->method('parseTxtFile')->willReturn($peoplesDTOMock);

        $inviteServiceProvider = app(InviteServiceProvider::class);
        $result = $inviteServiceProvider->invitePeople();

        $this->assertCount(1, $result);
        $this->assertEquals(1, $result[0]->affiliateId);
    }
}
