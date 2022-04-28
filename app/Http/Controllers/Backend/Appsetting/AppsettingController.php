<?php

namespace App\Http\Controllers\Backend\Appsetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appdetail;
use App\Models\Libraryrate;
use App\Models\Borrowperiod;
use App\Models\Bookloan;
use App\Models\Overdue;

class AppsettingController extends Controller
{
    //
   public function appsettings()
   {
   	return view('backend.appdetails.app');
   }
   public function appsettingsave(Request $request)
   {
              $this->validate($request,[
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'appname' => 'required|min:5|max:35',


            ],[
                'name.required' => ' The name field is required.',
                'name.min' => ' The first name must be at least 5 characters.',
                'name.max' => ' The first name may not be greater than 100 characters.',        
            ]);

          $imageName = time().'.'.$request->logo->extension();  
          $photo = $request->logo->move(public_path('assets/images/logo'), $imageName);

     

                $appdetails = new Appdetail;
                $appdetails->name = $request->appname;
                $appdetails->logo = $imageName;
                $appdetails->save();

                return redirect()->back()->withErrors(['msg' =>'Details Added Successfully']);
   }

   public function subscriptionshow()
   {

   }

   public function subscriptions(Request $request)
   {
                 $this->validate($request,[
                'category' => 'required|min:1|max:35',
                'amount' => 'required|min:1|max:5',


            ],[
                'name.required' => ' The name field is required.',       
            ]);

                $librate = new Libraryrate;
                $librate->category = $request->category;
                $librate->amount = $request->amount;
                $librate->save();

                return redirect()->back()->withErrors(['msg' =>'Subscription Details Added Successfully']);
   }

   public function borrowingperiodothers()
   {

   }

   public function borrowingperiod(Request $request)
   {
                  $this->validate($request,[
                'borrowingperiod' => 'required|min:1|max:35',


            ],[
                'name.required' => ' The name field is required.',       
            ]);

                $librate = new Borrowperiod;
                $librate->borrowingperiod = $request->borrowingperiod;
                $librate->save();

                return redirect()->back()->withErrors(['msg' =>'Subscription Details Added Successfully']);   
   }

   public function bookloanothers()
   {

   }

   public function bookloan(Request $request)
   {
                  $this->validate($request,[
                'category' => 'required|min:1|max:35',
                'amount' => 'required|min:1|max:35',


            ],[
                'name.required' => ' The name field is required.',       
            ]);

                $bookloan = new Bookloan;
                $bookloan->category = $request->category;
                $bookloan->amount = $request->amount;
                $bookloan->save();

                return redirect()->back()->withErrors(['msg' =>'Book Loan Rate Added Successfully']);  
   }

   public function overduechargesothers()
   {

   }

   public function overduecharges(Request $request)
   {
                  $this->validate($request,[
                'category' => 'required|min:1|max:35',
                'amount' => 'required|min:1|max:35',


            ],[
                'name.required' => ' The name field is required.',       
            ]);

                $overdue = new Overdue;
                $overdue->category = $request->category;
                $overdue->amount = $request->amount;
                $overdue->save();

                return redirect()->back()->withErrors(['msg' =>'Book Loan Rate Added Successfully']);  
   }
}
