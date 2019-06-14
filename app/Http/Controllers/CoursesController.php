<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Unit;
use App\User;
use App\Models\Unit_lect;
use App\Models\Lecture;
use Illuminate\Http\Request;


class CoursesController extends Controller
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
        $courses = Course::all();
        // return $courses;
        return view('courses.index')
            ->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('courses.create');
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
        $course = new Course;
        $course->name = $request->name;
        $course->initials = $request->initials;
        $course->academic_year = $request->academic_year;
        $course->capacity=$request->capacity;
        // return $course;
        $course->save();

        return redirect()->route('courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        $units = Unit::all();

        $lessons = Lesson::where('course_id', $course->id)->get();

        $my_units = Lecture::where('course_id', $course->id)->get();
        // return $units;
        // return $my_units;
        return view('courses.show')
            ->with('lessons', $lessons)
            ->with('my_units', $my_units)
            ->with('units', $units)
            ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        // return $course;
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', $course->name.' ' . ' '.$course->academic_year.' Deleted Successfully.');
    }

    public function add_unit(Request $request)
    {
        //
        // return $request;
        $course = Course::where('id', $request->course_id)->first();

        $unit = Unit::where('id', $request->unit_id)->first();

        $check_unit = Lecture::where('unit_id', $unit->id)->where('course_id', $course->id)->first();

        if (!empty($check_unit)) {
            return redirect()->back()->with('success', 'Unit not added, it already exists');
            
        }else{
            
            $lecture = new Lecture;

            $lecture->unit_id = $unit->id;
            $lecture->unit_name = $unit->name;
            $lecture->unit_code = $unit->unit_code;
            $lecture->course_academic_year = $course->academic_year;
            $lecture->course_name = $course->name;
            $lecture->course_id = $course->id;

            $lecture->save();

            return redirect()->route('courses.show',['course'=>$course->id])
                ->with('success', 'Unit '.$lecture->unit_name.' added Successfully');
        }
        
    }

    public function remove(Request $request, Course $course)
    {

        $course = Course::where('id', $request->course_id)->first();

        $unit = Unit::where('id', $request->unit_id)->first();

        $check_unit = Lecture::where('unit_id', $unit->id)->where('course_id', $course->id)->first();

        // return $check_unit;

        $check_unit->delete();

        return redirect()->back()
            ->with('success', 'Lecture Removed Successfully');
    }

    public function assign(Request $request)
    {
        //
        // return $request;
        // $request = $lecture;

        $lecturers = Unit_lect::where('unit_id', $request->unit_id)->get();
        // return $lecturers;

        

        // $lecture = Unit_lect::where('lecturer_id', $request->lecturer_id)->where('unit_id', $request->unit_id)->first();
        // return $lecture;
        return view('courses.assign_lect')
            ->with('lecturers', $lecturers)
            ->with('lecture', $request);
        // $lecture = Lecture::where('lecturer_id', $request->lecturer_id)->where('unit_id', $request->unit_id)->first();

        // return $lecture;

        // $lecture 
    }

    public function assign_save(Request $request)
    {
        //
        // return $request;
        $lecturer = User::where('id', $request->lecturer_id)->first();

        $course = Course::where('id', $request->course_id)->first();

        $unit = Unit::where('id', $request->unit_id)->first();
        // return $unit;
        // return $lecturer;
        $lecture = Lecture::where('unit_id', $unit->id)->where('course_id', $course->id)->first();
       
        // return $lecture;

        $lecture->lecturer_id = $lecturer->id;
        $lecture->lecturer_name =$lecturer->name;
        $lecture->status = 'new';

        // return $lecture;

        $lecture->save();

        return redirect()->route('courses.show',[$lecture->course_id]);

    }
}
