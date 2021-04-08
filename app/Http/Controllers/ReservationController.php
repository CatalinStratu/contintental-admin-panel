<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class ReservationController extends Controller
{
    public function index()
    {
        try {
            return view('reservations');
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
