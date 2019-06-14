<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

use App\Room;
use PDF;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LessonsController extends Controller
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
        $new_lectures = Lecture::where('status', 'new')->get();
        // return $new_lectures;
        $lectures = Lecture::all();
        // return $lectures;
        return view('lessons.index')
            ->with('new_lectures', $new_lectures)
            ->with('lectures', $lectures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    public function timetable()
    {
        //delete all lectures
        Lesson::truncate();

        //select all lectures
        $lessons = Lecture::all();

        // return $lessons;
        foreach ($lessons as $lesson) {
            // return 
            if ($lesson->lecturer_id  == null) {
                return redirect()->route('courses.show', [$lesson->course_id])
                    ->with('success', 'There is no lecturer assigned to '. $lesson->unit_name);
            }
        }

        if (count($lessons) ==0) {
            return redirect()->route('courses.index')
                ->with('success', 'Could not generate timetable, Assign lecturers to courses to be able to generate timetable');
        }
        
        //register lectures as lessons in database
        foreach ($lessons as $n_lesson) {
            $lesson = new Lesson;
            $lesson ->course_id = $n_lesson->course_id;
            $lesson ->course_name = $n_lesson->course_name;
            $lesson ->unit_id = $n_lesson->unit_id;
            $lesson ->lecturer_id = $n_lesson->lecturer_id;
            $lesson ->unit_name = $n_lesson->unit_name;
            $lesson ->unit_code = $n_lesson->unit_code;
            $lesson ->lecturer_name = $n_lesson->lecturer_name;
            $lesson ->course_academic_year = $n_lesson->course_academic_year;
            
            //save lessons
            $lesson->save();
        }
        
        //retireve llessons
        $lessons = Lesson::all();

        // return $lessons;

        foreach ($lessons as $lesson) {
            // return $lesson;

            $no_of_lessons_per_week = count($lessons)*3*5;

            //loop starts here
            // return $no_of_lessons_per_week;
            for ($loop=1; $loop < $no_of_lessons_per_week; $loop++) { 

            $day = mt_rand(1,5);

            $session = mt_rand(1,3);

            $course = Course::where('id', $lesson->course_id)->first();

            $rooms = Room::all();

            if (count($rooms) == 0) {
                return redirect()->route('rooms.create')
                    ->with('success', 'Could not generate Timetable because there are no rooms. Try creating a room!');
            }

            $r_room = mt_rand(0, count($rooms)-1);

            $selected_room = $rooms[$r_room];

            // return $selected_room;

            /**
             * this loop checks whether the selected room, session and course is occupied in the classes availble
             * 
             * It is a check room
             * 
             */
            
            //  return $lessons;

            foreach ($lessons as $c_less) {
                // return $c_less;
                
                // if ($c_less->room_id !=$selected_room->id && $c_less->session != $session && $c_less->course_id != $course->id) {
                    // return $lesson;
                    $lesson->day = $day;
                    $lesson->session = $session;
                    $lesson->room_id = $selected_room->id;
                    $lesson->room_number = $selected_room->name;
                    $lesson->block_name = $selected_room->block_name;
                    // return $lesson;
                    /**
                     * i dont know what am doing at this point
                     */

                    /**
                     * Oops! I got it!
                     */

                    $check_lect = Lesson::where(function($query) use($lesson){
                        $query->where('lecturer_id',$lesson->lecturer_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_course = Lesson::where(function($query) use($lesson){
                        $query->where('course_id',$lesson->course_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_room = Lesson::where(function($query) use($lesson){
                        $query->where('room_id',$lesson->room_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_capacity = Room::where('id', $lesson->room_id)->first();
                    // return $lesson;
                    

                    if (empty($check_lect)) {
                        
                        if (empty($check_course)) {

                            if (empty($check_room)) {

                                if ($check_capacity->capacity >= $course->capacity) {

                                    if (!$lesson->save()) {

                                        $flag = $lesson->id;

                                        return $lesson;

                                        
                                        
                                        $lessons=$lessons->filter(function($value,$key) use($flag){
        
                                            return $value->id != $flag;
        
                                        });
        
                                        continue;
                                    }
                        
                                }

                            }

                        }
                        
                    }
 
           
            }

            /**
             * The check loop ends here
             * 
             */
                $set_create = Lecture::where('course_id', $lesson->course_id)->where('unit_id', $lesson->unit_id)->first();

                // return $set_create;
                $set_create->status = 'old';

                $set_create->save();

                if ($lesson->room_id != null) {
                continue; 
                }

            }
            //loops ends here   
        }

    return redirect()->route('lessons.view_timetable');

    }



    public function view()
    {
        //
        $lessons = Lesson::all();

        // return $lessons;
        return view('lessons.view_timetable')
            ->with('lessons', $lessons);
    }


    public function apply_changes()
    {
        //delete all lectures
        // Lesson::truncate();

        //select all lectures
        $lessons = Lecture::where('status', 'new')->get();

        foreach ($lessons as $lesson) {
            // return 
            if ($lesson->lecturer_id  == null) {
                return redirect()->route('courses.show', [$lesson->course_id])
                    ->with('success', 'There is no lecturer assigned to '. $lesson->unit_name);
            }
        }
        // return $lessons;

        if (count($lessons) ==0) {
            return redirect()->route('courses.index')
                ->with('success', 'Could not generate timetable, Assign lecturers to courses to be able to generate timetable');
        }
        
        //register lectures as lessons in database
        foreach ($lessons as $n_lesson) {
            $lesson = new Lesson;
            $lesson ->course_id = $n_lesson->course_id;
            $lesson ->course_name = $n_lesson->course_name;
            $lesson ->unit_id = $n_lesson->unit_id;
            $lesson ->lecturer_id = $n_lesson->lecturer_id;
            $lesson ->unit_name = $n_lesson->unit_name;
            $lesson ->unit_code = $n_lesson->unit_code;
            $lesson ->lecturer_name = $n_lesson->lecturer_name;
            $lesson ->course_academic_year = $n_lesson->course_academic_year;
            // $table->day = null;
            // return $lesson;
            
            //save lessons
            $lesson->save();
        }
        
        //retireve llessons
        // $lessons = Lesson::all();

        // return $lessons;
        $lessons = Lesson::where('day' , null)->get();
        // return $lessons;

        foreach ($lessons as $lesson) {
            // return $lesson;

            $no_of_lessons_per_week = count($lessons)*3*5;

            //loop starts here
            // return $no_of_lessons_per_week;
            for ($loop=1; $loop < $no_of_lessons_per_week; $loop++) { 

            $day = mt_rand(1,5);

            $session = mt_rand(1,3);

            $course = Course::where('id', $lesson->course_id)->first();

            $rooms = Room::all();

            if (count($rooms) == 0) {
                return redirect()->route('rooms.create')
                    ->with('success', 'Could not generate Timetable because there are no rooms. Try creating a room!');
            }

            $r_room = mt_rand(0, count($rooms)-1);

            $selected_room = $rooms[$r_room];

            // return $selected_room;

            /**
             * this loop checks whether the selected room, session and course is occupied in the classes availble
             * 
             * It is a check room
             * 
             */
            
            //  return $lesson;

            foreach ($lessons as $c_less) {
                // return $c_less;
                
                // if ($c_less->room_id !=$selected_room->id && $c_less->session != $session && $c_less->course_id != $course->id) {
                    // return $lesson;
                    $lesson->day = $day;
                    $lesson->session = $session;
                    $lesson->room_id = $selected_room->id;
                    $lesson->room_number = $selected_room->name;
                    $lesson->block_name = $selected_room->block_name;
                    // return $lesson;
                    /**
                     * i dont know what am doing at this point
                     */

                    /**
                     * Oops! I got it!
                     */

                    $check_lect = Lesson::where(function($query) use($lesson){
                        $query->where('lecturer_id',$lesson->lecturer_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_course = Lesson::where(function($query) use($lesson){
                        $query->where('course_id',$lesson->course_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_room = Lesson::where(function($query) use($lesson){
                        $query->where('room_id',$lesson->room_id)
                            ->where('day', $lesson->day)
                            ->where('session', $lesson->session);
                    })->first();

                    $check_capacity = Room::where('id', $lesson->room_id)->first();
                    // return $lesson;
                    

                    if (empty($check_lect)) {
                        
                        if (empty($check_course)) {

                            if (empty($check_room)) {

                                if ($check_capacity->capacity >= $course->capacity) {

                                    if (!$lesson->save()) {

                                        $flag = $lesson->id;

                                        return $lesson;

                                        
                                        
                                        $lessons=$lessons->filter(function($value,$key) use($flag){
        
                                            return $value->id != $flag;
        
                                        });
        
                                        continue;
                                    }
                        
                                }

                            }

                        }
                        
                    }
 
           
            }

            /**
             * The check loop ends here
             * 
             */
                $set_create = Lecture::where('course_id', $lesson->course_id)->where('unit_id', $lesson->unit_id)->first();

                // return $set_create;
                $set_create->status = 'old';

                $set_create->save();

                if ($lesson->room_id != null) {
                continue; 
                }

            }
            //loops ends here   
        }

    return redirect()->route('lessons.view_timetable');

    }

    public function print()
    {
        //
        return 34;
        $pdf = new PDF;
        $pdf->loadView('view_timetable');
        $pdf->render();
        $pdf->stream();
        return 23;
    }

}
