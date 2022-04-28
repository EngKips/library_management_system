<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    //
    public function index()
    {
      $vendors = Vendor::all();
      return view('backend.vendor.list')->with(compact('vendors'));
    }

    public function newvendor()
    {
    	return view('backend.vendor.add');
    }

    public function savevendor(Request $request)
    {
    	    //$vendor = $request->all();
    	    $this->validate($request,[
    			'name' => 'required|min:5|max:35',
    			'pin' => 'required|min:4|max:35',
    			'paymentterms' => 'required|min:4|max:20',
    			'mobileno' => 'required|numeric',

    		],[
    			'name.required' => ' The name field is required.',
    			'name.min' => ' The first name must be at least 5 characters.',
    			'name.max' => ' The first name may not be greater than 100 characters.',		
    		]);

            	$vendor = new Vendor;
    			$vendor->name = $request->name;
    			$vendor->pin = $request->pin;
    			$vendor->paymentterms = $request->paymentterms;
    			$vendor->mobileno = $request->mobileno;
    			$vendor->save();

                return redirect()->back()->withErrors(['msg' =>'Vendor was added successfully']);
    }
}
