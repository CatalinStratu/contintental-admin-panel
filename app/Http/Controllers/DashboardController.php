<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data['employees']= (new User)->EmployeesCount();
            $data['clients'] = (new Client)->ClientsCount();
            return view('dashboard',['data'=>$data]);
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
