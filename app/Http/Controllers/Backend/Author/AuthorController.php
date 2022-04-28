<?php

namespace App\Http\Controllers\Backend\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Learningitem;

class AuthorController extends Controller
{
    //
    public function index()
    {
    	$authors = Author::all();
    	return view('backend.author.list')->with(compact('authors'));
    }

    public function newauthor()
    {
    	
    	return view('backend.author.add');
    }

    public function addauthor(Request $request)
    {
    	     $this->validate($request,[
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    			'name' => 'required|min:5|max:35',
    			'description' => 'required|min:4|max:200',

    		],[
    			'name.required' => ' The name field is required.',
    			'name.min' => ' The first name must be at least 5 characters.',
    			'name.max' => ' The first name may not be greater than 100 characters.',		
    		]);

          $imageName = time().'.'.$request->photo->extension();  
          $photo = $request->photo->move(public_path('assets/images/profile'), $imageName);

     

          $author = new Author;
          $author->photo = $imageName;
    			$author->name = $request->name;
    			$author->description = $request->description;
    			$author->save();

                return redirect()->back()->withErrors(['msg' =>'Author was added successfully']);
    }

    public function authordetails(Request $request)
    {
       $authorid = $request->route('id');

       //author details
       $author = Learningitem::where('id' , $authorid)->get()->first();
       $name = $author->author;

       //author descriprion
       $description = Author::where('name' , $name)->get()->first();
       $authordescription = $description->description;
       $photo = $description->photo;

       //author work
       $works = Learningitem::where('author' , $name)->get();

       return view('backend.author.details')->with(compact('name' , 'authordescription' , 'photo' , 'works'));
    }
}
