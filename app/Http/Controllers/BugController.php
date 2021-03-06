<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BugController extends Controller
{
    public function index(){
        return view('bugreport');
    }
    public function penetration(Request $request){
        $this->validate($request,[
            'message'=>'required',
        ]);
        \Slack::to("#Issues")->send($request->message);
        return redirect()->back()->with('success','Successfully Send');
    }
}
