<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InviteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('invite-people', [InviteController::class, 'listPeopleToInvite']);

//Route::get('/invite-people', function () {
//    $invitedPeople = app('invitePeople');
//
//    // sorted by Affiliate ID (ascending)
//    usort($invitedPeople, function ($a, $b) {
//        return $a->affiliateId - $b->affiliateId;
//    });
//
//    return view('invite-people')->with('invitedPeople', $invitedPeople);
//});

