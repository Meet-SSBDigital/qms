<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Flight;
use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Notification as ControllersNotification;

use App\Notifications\Mailsend;
use Illuminate\Notifications\Notification as NotificationsNotification;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFlightRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFlightRequest  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlightRequest $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }





    public function sendnotifications()
    {
       $user=User::all();
       $detailes=[
        'greeting'=>'Hi Laravel Developer',
        'body'=>'This is Email System',
        'action'=>'Connect us',
        'actionurl'=>'/',
       ];
   
       Notification::send($user, new Mailsend($detailes));
       dd('done');
    }
}



