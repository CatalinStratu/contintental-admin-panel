<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserProfileController extends Controller
{

    public function update(Request $request, UpdateUserProfileInformation $updater)
    {
        $updater->update($request->user(), $request->all());

        return redirect()->back();
    }

     /**
     * New staff
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'type' => ['required', 'integer', 'max:255'],
        ]);
        $generated_password = Str::random(10);

        $details = ['body' => $generated_password];
        $email = $request->email;
        $name = $request->name;
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($generated_password),
        ]);
        try {
            \Mail::to($email)->send(new \App\Mail\EmploeeMail($details));
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
        try {
             \Slack::send('Bun venit in echipa noastra '.$name.'!!!');
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
        return back();
    }
}
