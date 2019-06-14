<?php

namespace App\Http\Controllers;

use App\Room;
use App\Models\Lesson;
use App\Models\Lecture;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 34;
        $rooms = Room::all();


        return view('rooms.index')
            ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $room = new Room;

        $room->name = $request->name;
        $room->block_name = $request->block_name;
        $room->capacity = $request->capacity;

        // return $room;
        $room->save();

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        $lessons = Lesson::where('room_id', $room->id)->get();

        // return $room;
        return view('rooms.show')
            ->with('room', $room)
            ->with('lessons', $lessons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        // return $room;
        // return $room;

        $check_lesson = Lesson::where('room_id', $room->id)->get();


        foreach ($check_lesson as $lesson) {
            $check_course = Lecture::where('course_id', $lesson->course_id)->first();

            $check_course->status = 'new';
            
            $check_course->save();
        }

        // return $check_lesson;
        



        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room '.$room->name.'deleted Successfully');
    }
}
