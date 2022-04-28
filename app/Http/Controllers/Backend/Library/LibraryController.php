<?php

namespace App\Http\Controllers\Backend\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    //
     public function librarylist()
    {
    	$libraries = Library::all();
    	return view('backend.libraries.list')->with(compact('libraries'));
    }

    public function newlibrary()
    {
    	return view('backend.libraries.add');
    }

    public function createlibrary(Request $request)
    {

            $library = $request->all();
    	    $this->validate($request,[
    			'name' => 'required|min:5|max:35',
    			'location' => 'required|min:4|max:35',
    			'email' => 'required|email|unique:libraries',
    			'mobileno' => 'required|numeric',

    		],[
    			'name.required' => ' The name field is required.',
    			'name.min' => ' The first name must be at least 5 characters.',
    			'name.max' => ' The first name may not be greater than 35 characters.',		
    		]);

            	$library = new Library;
    			$library->name = $request->name;
    			$library->location = $request->location;
    			$library->email = $request->email;
    			$library->mobileno = $request->mobileno;
    			$library->save();

                return redirect()->back()->withErrors(['msg' =>'Library was added successfully']);

    }
}
