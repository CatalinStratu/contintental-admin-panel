<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Client;

class EmailController extends Controller
{
    public function index()
    {
        try {
            return view('emails');
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function subscribeMailSendAll(Request $request)
    {
        $this->validate($request,[
            'subject'=>'required',
            'message'=>'required',
        ]);

        $clients = Client::select('email')->get();
        $details = [
            'subject' => $request->subject,
            'body' => $request->message];
        foreach ($clients as $data) {
                \Mail::to($data->email)->send(new \App\Mail\ToAllMail($details));
        }
        return redirect()->back()->with('success','Successfully Send');
    }
}
