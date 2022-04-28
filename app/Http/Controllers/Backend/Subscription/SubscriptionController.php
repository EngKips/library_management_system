<?php

namespace App\Http\Controllers\Backend\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    //
    public function subscriptionlist()
    {
    	$names = User::all();
    	$subscriptions = Subscription::all();
    	return view('backend.subscriptions.list')->with(compact('subscriptions','names'));
    }

    public function subscriptionsave(Request $request)
    {
     $userid = $request->name;
     $amount = $request->amount;

     //subscription details
     $user = User::select('name','phone')->where('id' , $userid)->get()->first();

     $subscription = new Subscription;
     $subscription->name = $user->name;
     $subscription->phone = $user->phone;
     $subscription->amount = $amount;
     $subscription->duedate = Carbon::now()->addDays(5);
     $subscription->status = 'Active';
     $subscription->save();

     $names = User::all();
     $subscriptions = Subscription::all();
     return redirect()->back()->withErrors(['msg' =>'Subscription was successfully'])->with(compact('names','subscriptions'));
 }
}
