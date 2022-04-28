<?php

namespace App\Http\Controllers\Backend\Circulation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Learningitem;
use App\Models\Checkout;
use App\Models\Overdue;
use Carbon\Carbon;

class CirculationController extends Controller
{
    //
    public function circulations()
    {

    	return view('backend.circulations.list');
    }

    public function userdetails()
    {

    }

    public function usersearch(Request $request)
    {
        $useridentification = $request->search;

        $cardnumber = User::where('barcode' , $useridentification)->get()->first();


        if($cardnumber)
        {
         $checkouts = Checkout::where('cardnumber' , $cardnumber->barcode)->get();
         $itemscheckedout = Checkout::where('cardnumber' , $cardnumber->barcode)->count();
    	return view('backend.circulations.detail')->with(compact('cardnumber','checkouts' ,'itemscheckedout'));
        }
        else 
        {
        return redirect()->back()->withErrors(['msg' =>'No such user was found']);	
        }
    }
    public function searchitem()
    {

    }
  
    public function searchitemothers(Request $request)
    {
     
      $isbn = $request->isbn;

      $item = Learningitem::where('isbn' , $isbn)->get()->first();

      //return $item->usetype;

      if($item->number > 0 && $item->usetype == 'general')
      {
        $useridentification = $request->id;

        $userdetails = User::where('id' , $request->id)->get()->first();
        $cardnumber = User::where('id' , $useridentification)->get()->first(); 
        $checkouts = Checkout::where('cardnumber' , $userdetails->barcode)->get();
        $itemscheckedout = Checkout::where('cardnumber' , $userdetails->barcode)->count();
        return view('backend.circulations.detail')->with(compact('cardnumber','item','checkouts','itemscheckedout')); 
      }
      else
      {
        $useridentification = $request->id;
        $inshelf = $item->number;
        $usetype = $item->usetype;
        $userdetails = User::where('id' , $request->id)->get()->first();
        $cardnumber = User::where('id' , $useridentification)->get()->first(); 
        $checkouts = Checkout::where('cardnumber' , $userdetails->barcode)->get();
        $itemscheckedout = Checkout::where('cardnumber' , $userdetails->barcode)->count();

      return view('backend.circulations.detail')->withErrors(['msg' =>'Oops! Item in shelf is ' .$inshelf. ', and is ' .$usetype. ' only'])->with(compact('cardnumber','checkouts','itemscheckedout'));  
      }
     
    }

    public function checksout()
    {

    }

    public function checkout(Request $request)
    {
                $checkout = new Checkout;
                $checkout->userid = $request->id;
                $checkout->isbn = $request->isbn;
                $checkout->title = $request->title;
                $checkout->subject = $request->subject;
                $checkout->author = $request->author;
                $checkout->publisher = $request->publisher;
                $checkout->cardnumber = $request->cardnumber;
                $checkout->category = $request->category;
                $checkout->checkoutdate = Carbon::now();
                $checkout->checkindate = Carbon::now()->addDays(14);
                $checkout->phone = $request->phone;
                $checkout->save();

                $isbn = $request->isbn;
                $item = Learningitem::where('isbn' , $isbn)->get()->first();
                $useridentification = $request->id;
                $userdetails = User::where('id' , $request->id)->get()->first();

                $checkouts = Checkout::where('userid' , $request->id)->get();
                $itemscheckedout = Checkout::where('cardnumber' , $userdetails->barcode)->count();
                $cardnumber = User::where('id' , $useridentification)->get()->first(); 
                return view('backend.circulations.detail')->withErrors(['msg' =>'Checkout was added successfully'])->with(compact('useridentification','cardnumber','item','checkouts','itemscheckedout'));
    }

    public function checkin()
    {  
        return view('backend.checkin.list');
    }

    public function checkinsearch(Request $request)
    {
     $isbn = Checkout::where('isbn' , $request->isbnsearch)->get()->first();

     if($isbn)
     {
      $book = Checkout::where('isbn' , $request->isbnsearch)->get()->first();
      $user = User::where('id' , $book->userid)->get()->first();
      //$name = $user->name;
       $checkin = Carbon::now();
       $checkout = $book->checkindate;
       if ($checkin <= $checkout){
        $overduedays = 0;
        $amount = 0;
       }
       else
       {

       $days = $checkin->diff($checkout);
       $overduedays = $days->format('%a');

       if($user->role == 'Patron')
       {
        $rate = Overdue::where('category' , 'Patron')->get()->first();
        $amount = (($overduedays) * ($rate->amount));
       }
       else
       {
        $rate = Overdue::where('category' , 'Student')->get()->first();
        $amount = (($overduedays) * ($rate->amount));
       }
       }
       
      return view('backend.checkin.detail')->with(compact('book','user','overduedays','amount'));
     }
     else
     {
      return redirect()->back()->withErrors(['msg' =>'Oops! no such item found check and try again']);      
     }
    }

    public function bookcheckin()
    {

    }

    public function bookcheckinothers(Request $request)
    {
      $isbn = $request->bookisbn;
      $username = $request->username;
      
     $cardnumber = User::where('name' , $username)->get()->first();

      $barcode = $cardnumber->barcode;

     if($request->penalty > 0)
     {
      
     }
     else
     {
     $book = Checkout::where(['isbn' => $isbn,'cardnumber' => $barcode])->get();
     }
    }
}
