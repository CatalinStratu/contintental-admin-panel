<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Room;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function index()
    {
        try {
            $rooms = Room::orderBy('created_at', 'desc')->get();
            return view('rooms',compact('rooms'));
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * New room
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer', 'max:255'],
            'status' => ['required', 'in:Empty,Occupied,Cleaning,Reparation'],
        ]);
        $room = Room::create([
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return back();
    }

    public function UpdateGet($id){
        $room = Room::findOrFail($id);
        return view('room.edit', compact('room'));
    }

    public function UpdatePost(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer', 'max:255'],
            'status' => ['required', 'in:Empty,Occupied,Cleaning,Reparation'],
        ]);
        $data =[
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
        ];
        $room->update($data);
        return redirect()->back();
    }

}
