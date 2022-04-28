<?php

namespace App\Http\Controllers\Backend\Learningitem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learningitem;
use App\Models\Author;
use App\Models\Rack;
use App\Models\Publisher;

class LearningController extends Controller
{
    //
    public function index()
    {
    	$items = Learningitem::all();
    	return view('backend.learningitem.list')->with(compact('items'));
    }

    public function newitem()
    {
        $authors = Author::all();
        $locations = Rack::all();
        $publishers = Publisher::all();
    	return view('backend.learningitem.add')->with(compact('authors','locations','publishers'));
    }

    public function additem(Request $request)
    {
          	   
    	    $this->validate($request,[
    			'isbn' => 'required|min:5|max:35',
    			'title' => 'required|min:4|max:35',
    			'subject' => 'required|min:4|max:200',
    			'publisher' => 'required|min:1|max:100',
    			'mediatype' => 'required|min:1|max:100',
                'floor' => 'required|min:1|max:100',
                'section' => 'required|min:1|max:100',
                'shelf' => 'required|min:1|max:100',
                'rack' => 'required|min:1|max:100',
                'author' => 'required|min:1|max:100',
                'number' => 'required',
                'usetype'=> 'required',

    		],[
    			'isbn.required' => ' The isbn field is required.',
    			'isbn.min' => ' The first isbn must be at least 5 characters.',
    			'isbn.max' => ' The first isbn may not be greater than 100 characters.',		
    		]);

            	$item = new Learningitem;
    			$item->isbn = $request->isbn;
    			$item->title = $request->title;
    			$item->subject = $request->subject;
    			$item->publisher = $request->publisher;
    			$item->mediatype = $request->mediatype;
                $item->floor = $request->floor;
                $item->section = $request->section;
                $item->shelf = $request->shelf;
                $item->rack = $request->rack;
                $item->author = $request->author;
                $item->barcode = $request->barcode;
                $item->number = $request->number;
                $item->usetype = $request->usetype;
    			$item->save();

                return redirect()->back()->withErrors(['msg' =>'Item was added successfully']);
    }
}
