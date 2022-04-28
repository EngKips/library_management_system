<?php

namespace App\Http\Controllers\Backend\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    //
    public function publisherlist()
    {
    	$publishers = Publisher::all();
    	return view('backend.publishers.list')->with(compact('publishers'));
    }

    public function newpublisher(Request $request)
    {
     return view('backend.publishers.add');
    }

    public function publishersave(Request $request)
    {
    
	    $this->validate($request,[
			'name' => 'required|min:5|max:100',
			'email' => 'required|email|unique:publishers',
			'address' => 'required|min:2|max:100',
			'phone' => 'required|min:0|max:10',
			'description' => 'required|min:5|max:1000',


		],[
			'name.required' => ' The name field is required.',
			'name.min' => ' The first name must be at least 5 characters.',
			'name.max' => ' The first name may not be greater than 35 characters.',		
		]);

        	$publisher = new Publisher;
			$publisher->name = $request->name;
			$publisher->email = $request->email;
			$publisher->address = $request->address;
			$publisher->phone = $request->phone;
			$publisher->website = $request->website;
			$publisher->description = $request->description;
			$publisher->save();

            return redirect()->back()->withErrors(['msg' =>'Publisher was added successfully']);
    }
}
