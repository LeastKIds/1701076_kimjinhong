<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SubjectController extends Controller
{
    //
    public function index() {
        return Inertia::render('subject/index');
//        return 'dd';
    }

    public function store(Request $request) {

        $sub = $request['sub'];
        $point = (int)$request['point'];
        $explain = $request['explain'];

        $validator = Validator::make(
            array(
                'sub' => $sub,
                'point' => $point,
                'explain' => $explain
            ),
            array(
                'sub' => 'required|string',
                'point' => 'required',
                'explain' => 'required|string',
            )
        );

        if($validator->fails()) {
            $message = $validator->messages();
            return response($message,422);
        }

        $subject = new Subject();
        $subject -> sub = $sub;
        $subject -> explain = $explain;
        $subject -> point = $point;

        $subject -> save();

        return ['success' => 1, 'subject' => $subject];
    }

    public function show() {
        $subject = Subject::paginate(5);

        return Inertia::render('subject/show',['subject' => $subject]);
    }

    public function showSub($id) {
        $subject = Subject::find($id);

        return Inertia::render('subject/showSub',['subject' => $subject]);
    }

    public function delete($id) {
        $subject = Subject::find($id);
        $subject -> delete();

        return ['success' => 1];
    }

    public function check($id) {

//        return Course::where('user_id', auth() -> user() -> id) -> where('subject_id', $id) -> exists();
        if(Course::where([
            ['user_id', auth() -> user() -> id],
            ['subject_id', $id]
        ]) -> exists()) {
            return ['check' => 1];
        } else {
            return ['check' => 0];
        }
    }

    public function apply($id) {

        $course = new Course();
        $course -> user_id = auth() -> user() -> id;
        $course -> subject_id = $id;

        $course -> save();

        return ['success' => 1, 'course' => $course];
    }

    public function disApply($id) {

        $course = Course::where('subject_id', $id);
        $course -> delete();
        return ['success' => 1];
    }

    public function edit($id) {
        $sub = Subject::find($id);
        return Inertia::render('subject/EditSub',['subject' => $sub]);
    }

    public function update(Request $request, $id) {
        $sub = $request['sub'];
        $point = (int)$request['point'];
        $explain = $request['explain'];

        $validator = Validator::make(
            array(
                'sub' => $sub,
                'point' => $point,
                'explain' => $explain
            ),
            array(
                'sub' => 'required|string',
                'point' => 'required',
                'explain' => 'required|string',
            )
        );


        if($validator->fails()) {
            $message = $validator->messages();
            return response($message,422);
        }

        $subject = Subject::find($id);
        $subject -> sub = $sub;
        $subject -> point = $point;
        $subject -> explain = $explain;

        $subject -> save();

        return ['success' => 1, 'subject' => $subject];
    }

    public function myIndex() {
        $id = auth() -> user() -> id;

        $course = DB::table('courses') -> where('user_id', $id) -> join('subjects', 'courses.subject_id', '==', 'subjects.id') -> get();

        return Inertia::render('subject/MySubject',['course' => $course]);
    }
}
