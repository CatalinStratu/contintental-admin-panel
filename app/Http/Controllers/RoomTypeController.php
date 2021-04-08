<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        try {
            $RoomTypes = RoomType::orderBy('created_at', 'desc')->get();
            return view('room.roomtype', compact('RoomTypes'));
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * New room type
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'size' => ['required', 'integer'],
            'guests' => ['required', 'integer'],
            'small_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
        ]);
        $name = $request->name;
        $roomtype = RoomType::create([
            'name' => $name,
            'price' => $request->price,
            'size' => $request->size,
            'slug' => $this->unique_slug($name),
            'guests' => $request->guests,
            'small_description' => $request->small_description,
            'description' => $request->description,
        ]);
        return back();
    }

    public function UpdateGet($id)
    {
        $roomtype = RoomType::findOrFail($id);
        return view('room.edit-type', compact('roomtype'));
    }

    public function UpdatePost(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'size' => ['required', 'integer'],
            'guests' => ['required', 'integer'],
            'small_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
        ]);
        $name = $request->name;
        $data = [
            'name' => $name,
            'price' => $request->price,
            'size' => $request->size,
            'slug' => $this->unique_slug($name),
            'guests' => $request->guests,
            'small_description' => $request->small_description,
            'description' => $request->description,
        ];
        $roomType->update($data);
        return redirect()->back();
    }

    private function unique_slug($title = '', $model = 'RoomType', $col = 'slug')
    {
        $slug = Str::slug($title);
        if ($slug === '') {
            $string = mb_strtolower($title, "UTF-8");;
            $string = preg_replace("/[\/\.]/", " ", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $slug = preg_replace("/[\s_]/", '-', $string);
        }

        //get unique slug...
        $nSlug = $slug;
        $i = 0;

        $model = str_replace(' ', '', "\App\Models\ " . $model);
        while (($model::where($col, '=', $nSlug)->count()) > 0) {
            $i++;
            $nSlug = $slug . '-' . $i;
        }
        if ($i > 0) {
            $newSlug = substr($nSlug, 0, strlen($slug)) . '-' . $i;
        } else {
            $newSlug = $slug;
        }
        return $newSlug;
    }
}
