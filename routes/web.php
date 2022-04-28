<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

     Route::get('/dashboard', 'Backend\UserController@showauth')->name('dashboard');
     Route::post('/dashboard', 'Backend\UserController@authenticate')->name('dashboards');

//Libraries
     Route::get('/library-manage', 'Backend\Library\LibraryController@librarylist')->name('libraries');
     Route::post('/library-manage', 'Backend\Library\LibraryController@newlibrary')->name('addlibrary');

     Route::get('/library-add', 'Backend\Library\LibraryController@newlibrary')->name('newlibrary');
     Route::post('/library-add', 'Backend\Library\LibraryController@createlibrary')->name('createlibrary');
   

   //Vendors  
     Route::get('/vendor-manage', 'Backend\Vendor\VendorController@index')->name('vendorlist');
     Route::post('/vendor-manage', 'Backend\Vendor\VendorController@vendorothers')->name('vendorothers');

     Route::get('/vendor-add', 'Backend\Vendor\VendorController@newvendor')->name('createvendor');
     Route::post('/vendor-add', 'Backend\Vendor\VendorController@savevendor')->name('addvendor');

     //Adding new learning materials to the library
     Route::get('/item-manage', 'Backend\Learningitem\LearningController@index')->name('itemlist');
     Route::post('/item-manage', 'Backend\Learningitem\LearningController@learningothers')->name('learningothers');
     
     Route::get('/item-add', 'Backend\Learningitem\LearningController@newitem')->name('newitem');
     Route::post('/item-add', 'Backend\Learningitem\LearningController@additem')->name('additem'); 

     // Authors 
     Route::get('/authors-manage', 'Backend\Author\AuthorController@index')->name('authors');
     Route::post('/authors-manage', 'Backend\Author\AuthorController@authorsothers')->name('authorsothers');


     Route::get('/authors-details/{id}', 'Backend\Author\AuthorController@authordetails')->name('authordetails');
     Route::post('/authors-details', 'Backend\Author\AuthorController@authordetailsothers')->name('authordetailsothers');
     
     Route::get('/authors-add', 'Backend\Author\AuthorController@newauthor')->name('newauthor');
     Route::post('/authors-add', 'Backend\Author\AuthorController@addauthor')->name('addauthor'); 

     //Catalog 
     Route::get('/catalog-manage', 'Backend\Catalog\CatalogController@newcatalog')->name('racklocation');
     Route::post('/catalog-manage', 'Backend\Catalog\CatalogController@Catalogothers')->name('Catalogothers'); 
     
     //Rack and location
     Route::get('/rack-manage', 'Backend\Rack\RackController@rack')->name('racklist');
     Route::post('/rack-manage', 'Backend\Rack\RackController@rackother')->name('rackothers'); 

     Route::get('/rack-add', 'Backend\Rack\RackController@location')->name('location');
     Route::post('/rack-add', 'Backend\Rack\RackController@savelocation')->name('savelocation'); 

     //publishers
     Route::get('/publisher-manage', 'Backend\Publisher\PublisherController@publisherlist')->name('publisherlist');
     Route::post('/publisher-manage', 'Backend\Publisher\PublisherController@publisherothers')->name('publisherothers'); 
   
     Route::get('/publisher-add', 'Backend\Publisher\PublisherController@newpublisher')->name('newpublisher');
     Route::post('/publisher-add', 'Backend\Publisher\PublisherController@publishersave')->name('publishersave');   
     

    //related subjects
     Route::get('/Subject-manage/{id}', 'Backend\Subject\SubjectController@relatedsubjects')->name('relatedsubjects');
     Route::post('/Subject-manage', 'Backend\Subject\SubjectController@relatedsubjectsothers')->name('relatedsubjectsothers');  

    //users
     Route::get('/user-manage', 'Backend\UserController@newuser')->name('newuser');
     Route::post('/user-manage', 'Backend\UserController@saveuser')->name('saveuser'); 

     Route::get('/user-list', 'Backend\UserController@userlist')->name('userlist');
     Route::post('/user-list', 'Backend\UserController@userlistothers')->name('userlistothers'); 

     //subscriptions
     Route::get('/subscription-list', 'Backend\Subscription\SubscriptionController@subscriptionlist')->name('subscriptionlist');
     Route::post('/subscription-list', 'Backend\Subscription\SubscriptionController@subscriptionsave')->name('subscriptionsave');   

     //checkouts/checkins
     Route::get('/circulation-manage', 'Backend\Circulation\CirculationController@circulations')->name('circulations');
     Route::post('/circulation-manage', 'Backend\Circulation\CirculationController@circulationsothers')->name('circulationsothers');

     Route::get('/circulation-details', 'Backend\Circulation\CirculationController@userdetails')->name('userdetails');
     Route::post('/circulation-details', 'Backend\Circulation\CirculationController@usersearch')->name('usersearch');
               
     //Item checkin/checkout
     Route::get('/item-search', 'Backend\Circulation\CirculationController@searchitem')->name('searchitem');
     Route::post('/item-search', 'Backend\Circulation\CirculationController@searchitemothers')->name('searchitemothers');

     Route::get('/item-checkout', 'Backend\Circulation\CirculationController@checksout')->name('checksout');
     Route::post('/item-checkout', 'Backend\Circulation\CirculationController@checkout')->name('checkout');      

     //App settings
     Route::get('/app-setting', 'Backend\Appsetting\AppsettingController@appsettings')->name('appsettings');
     Route::post('/app-setting', 'Backend\Appsetting\AppsettingController@appsettingsave')->name('appsettingsave');  

     //library subscriptions
     Route::get('/library-subscriptions', 'Backend\Appsetting\AppsettingController@subscriptionshow')->name('subscriptionshow');
     Route::post('/library-subscriptions', 'Backend\Appsetting\AppsettingController@subscriptions')->name('subscriptions');  

     //borrowing perion
     Route::get('/borrowing-period', 'Backend\Appsetting\AppsettingController@borrowingperiodothers')->name('borrowingperiodothers');
     Route::post('/borrowing-period', 'Backend\Appsetting\AppsettingController@borrowingperiod')->name('borrowingperiod');  

     //Book loan
     Route::get('/book-loan', 'Backend\Appsetting\AppsettingController@bookloanothers')->name('bookloanothers');
     Route::post('/book-loan', 'Backend\Appsetting\AppsettingController@bookloan')->name('bookloan'); 

     //Over due charges
     Route::get('/overdue-charges', 'Backend\Appsetting\AppsettingController@overduechargesothers')->name('overduechargesothers');
     Route::post('/overdue-charges', 'Backend\Appsetting\AppsettingController@overduecharges')->name('overduecharges'); 

     //Check In
     Route::get('/check-in', 'Backend\Circulation\CirculationController@checkin')->name('checkin');
     Route::post('/check-in', 'Backend\Circulation\CirculationController@checkinsearch')->name('checkinsearch'); 
    
     //Book checkin
     Route::get('/book-check-in', 'Backend\Circulation\CirculationController@bookcheckin')->name('bookcheckin');
     Route::post('/book-check-in', 'Backend\Circulation\CirculationController@bookcheckinothers')->name('bookcheckinothers');      
