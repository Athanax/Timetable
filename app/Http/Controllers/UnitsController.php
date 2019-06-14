<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Models\Unit_lect;
use App\Models\Lecture;
use Illuminate\Http\Request;

class UnitsController extends Controller
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
        $units = Unit::all();
        return view('units.index')
            ->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('units.create');
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
        $unit = new Unit;
        $unit->name = $request->name;
        $unit->unit_code = $request->unit_code;
        $unit->save();

        return  redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
        $lecturers = Unit_lect::where('unit_id', $unit->id)->get();

        $courses = Lecture::where('unit_id', $unit->id)->get();

        return view('units.show')
            ->with('unit', $unit)
            ->with('courses', $courses)
            ->with('lecturers', $lecturers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
        // return $unit;
        $unit->delete();
        
        return redirect()->route('units.index')
            ->with('success', $unit->name. ' Unit code '.$unit->unit_code.' Deleted Successfully!');
    }
}
