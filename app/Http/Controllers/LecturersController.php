<?php

namespace App\Http\Controllers;

use App\User;
use App\Unit;
use App\Models\Unit_lect;
use App\Assignunit;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturersController extends Controller
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
        
        $lecturers = User::where('role','lecturer')->get();
        return view('lecturers.index')
            // ->with('new_lectures', $new_lectures)
            ->with('lecturers',$lecturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lecturers = User::where('role','!=', 'lecturer')->where('id', '!=',Auth::user()->id)->get();
        // return $lecturers;
        return view('lecturers.create')
            ->with('lecturers', $lecturers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        // return $request->lecturer_id;
        $lecturer = User::where('id',$request->lecturer_id)->first();

        // return $lecturer;
        $lecturer ->role = 'lecturer';
        // return $lecturer;
        $lecturer->save();

        return redirect()->route('lecturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $lecturer)
    {
        //
        // return $lecturer;
        $units = Unit::all();

        $my_units = Unit_lect::where('lecturer_id', $lecturer->id)->get();
        // return $my_units;
        return view('lecturers.show')
            ->with('my_units',$my_units)
            ->with('units', $units)
            ->with('lecturer' , $lecturer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        //
        $id = $request->id;
        // return $id;
        $lecturer = User::where('id', $id)->first();
        // return $lecturer;

        $check_lecture = Lecture::where('lecturer_id', $lecturer->id)->get();

        // return $check_lecture;

        foreach ($check_lecture as $lecture) {
            $lecture->status = 'new';
            $lecture->lecturer_name = null;
            $lecture->lecturer_id = null;
            // return $lecture;
            $lecture->save();
        }

        $lecturer->delete();

        return redirect()->route('lecturers.index');
    }
    public function add_unit(Request $request)
    {
        //
        // return $request;
        $check_unit = Unit_lect::where('lecturer_id', $request->lecturer_id)
            ->where('unit_id', $request->unit_id)->first();

        if (empty($check_unit)) {

            $lecturer = User::where('id', $request->lecturer_id)->first();
            // return $lecturer;
            $unit = Unit::where('id', $request->unit_id)->first();
            // return $unit;
            $add_unit = new Unit_lect;
            $add_unit->lecturer_id = $request->lecturer_id;
            $add_unit->unit_name = $unit->name;
            $add_unit->unit_code =$unit->unit_code;
            $add_unit->lecturer_name =$lecturer->name;
            $add_unit->unit_code =$unit->unit_code;

            $add_unit->unit_id = $request->unit_id;
            // return $add_unit;

            $add_unit->save();

            return redirect()->back()
                ->with('success', 'Unit added to Lecturer Successfully');
            return 'No unit Found';
        }else{
            // return $check_unit;
            return redirect()->back()
            
            
                ->with('success', "<strong class='text-warning'>Cannot add unit to this unit bacause the lecturer already teaches this unit</strong>");
        }
        
    }

    
}
