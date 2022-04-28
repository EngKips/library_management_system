<?php

namespace App\Http\Controllers\Backend\Rack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rack;

class RackController extends Controller
{
    //
    public function rack()
    {
    	$racks = Rack::all();
    	return view('backend.rack.list')->with(compact('racks'));
    }

    public function location()
    {
    	$locations = Rack::all();
    	return view('backend.rack.add')->(compact('locations'));
    }

    public function savelocation(Request $request)
    {
    	 $this->validate($request,[
		'floor' => 'required|min:1|max:35',
		'section' => 'required|min:1|max:35',
		'shelf' => 'required|min:1|max:20',
		'rack' => 'required|numeric',

	],[
		'floor.required' => ' The floor field is required.',
		'floor.min' => ' The floor must be at least 5 characters.',
		'floor.max' => ' The floor may not be greater than 100 characters.',		
	]);

    	$rack = new Rack;
		$rack->floor = $request->floor;
		$rack->section = $request->section;
		$rack->shelf = $request->shelf;
		$rack->rack = $request->rack;
		$rack->save();

        return redirect()->back()->withErrors(['msg' =>'Location was added successfully']);
    }
}
