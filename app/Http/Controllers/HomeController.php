<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Room;
use App\User;
use App\Unit;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth()->user()->id == 1) {
            Auth::user()->role = 'admin';
            Auth::user()->save();
            // return Auth()->user();            

        }
        
        $rooms = Room::all();

        $lecturers = User::where('role', 'lecturer')->get();

        $units = Unit::all();

        $courses = Course::all();

        return view('home')
            ->with('rooms', $rooms)
            ->with('lecturers', $lecturers)
            ->with('units', $units)
            ->with('courses', $courses);
    }
}
