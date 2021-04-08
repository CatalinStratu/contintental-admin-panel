<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Exception;

class EmployeeController extends Controller
{

    public function index()
    {
        try {
            $employees = User::orderBy('created_at', 'desc')->get();
            return view('employee.emloyees', compact('employees'));
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function UpdateGet($id){
        $user = User::findOrFail($id);
        return view('employee.edit', compact('user'));
    }

    public function UpdatePost(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($user->id),],
            'type' => ['required', 'string', 'in:0,1'],
            'telephone' => ['required', 'string', 'max:25'],
        ]);
        $email = $request->email;
        $data = [
            'name' => $request->name,
            'email' => $email,
            'type' => $request->type,
            'telephone' => $request->telephone,
        ];
        $user->update($data);
        if($request->new_password == 1){
            $generated_password = Str::random(10);
            $details = ['body' => $generated_password];
            try {
                \Mail::to($email)->send(new \App\Mail\NewPasswordMail($details));
            } catch (Exception $exception) {
                dd($exception->getMessage());
            }
            $user->update(['password' => Hash::make($generated_password)]);
        }
        return redirect()->back();
    }
}
