<?php

namespace App\Http\Controllers\Backend\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learningitem;

class SubjectController extends Controller
{
    //
    public function relatedsubjects(Request $request)
    {
    	$subjectid = $request->route('id');

       //Subject title
    	$subject = Learningitem::where('id' , $subjectid)->get()->first();
    	$subjectphrase = $subject->subject;
    	$title = $subject->title;

       //related subjests
    $searches = explode(' ', $subjectphrase);
    foreach($searches as $search)
    {
    $relatedsubjects = Learningitem::where('subject','LIKE','%'.$search.'%')
    ->get();
    }
    return view('backend.subjects.related')->with(compact('relatedsubjects' , 'subjectphrase'));
    }
}
