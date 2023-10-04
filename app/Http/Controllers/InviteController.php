<?php

namespace App\Http\Controllers;

use App\Providers\InviteServiceProvider;
use Exception;
use Illuminate\Http\Response;

class InviteController extends Controller
{
    private InviteServiceProvider $inviteServiceProvider;

    public function __construct(InviteServiceProvider $inviteServiceProvider)
    {
        $this->inviteServiceProvider = $inviteServiceProvider;
    }

    public function listPeopleToInvite(): Response
    {
        try {
            $invitedPeople = $this->inviteServiceProvider->invitePeople();

            return response()->view('invite.list', ['invitedPeople' => $invitedPeople], 200);
        } catch (Exception $exception) {
            return response()->view('errors.custom', ['message' => $exception->getMessage()], 500);
        }
    }
}
