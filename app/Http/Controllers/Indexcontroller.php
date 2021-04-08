<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    public function index()
    {
        //https://github.com/gpressutto5/laravel-slack
        //\Slack::send('Buna !!!');

        return view('welcome');
    }
}
