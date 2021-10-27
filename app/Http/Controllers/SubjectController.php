<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
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
        $subject = Subject::paginate(1);

        return Inertia::render('subject/show',['subject' => $subject]);
    }
}
