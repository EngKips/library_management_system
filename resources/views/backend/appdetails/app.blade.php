<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 07:45:41 GMT -->
@include('backend.header')

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
@include('backend.navbar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
@include('backend.topnav')
    <!-- [ Header ] end -->
    
    
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">MTRD Library</h5>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        <div class="row">

            @if($errors->any())
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
              <div>
                {{$errors->first()}}
              </div>
            </div>
            @endif 
            <!-- subscribe start -->
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="feather icon-book text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> Borrowing Periods</h4>
                        <p class="m-b-20">
                          <form class="form-group" method="POST" action="{{URL::route('borrowingperiod')}}">
                            @csrf
                        <div class="form-group {{ $errors->has('borrowingperiod') ? 'has-error' : '' }}">
                            <label><b>Number Of Days</b></label>
                            <input type="number" name="borrowingperiod" class="form-control" value="{{ old('borrowingperiod') }}" placeholder="Type Number Of Days"></br>
                            <span class="text-danger">{{ $errors->first('borrowingperiod') }}</span>
                        </div>
                            <input type="submit" name="submit" class="btn btn-info" value="Update">
                          </form>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="feather icon-credit-card text-c-green d-block f-40"></i>
                        <h4 class="m-t-20">Library Subscriptions</h4>
                        <p class="m-b-20">
                            <form class="form-group" method="POST" action="{{URL::route('subscriptions')}}">
                             @csrf
                              <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                <label><b>User Category:</b></label>
                                <select class="form-control" name="category" id="category" value="{{ old('category') }}">
                                    <option value="">Select Category</option>
                                    <option value="daily">Daily</option>
                                    <option value="annual">Annual Subscription</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                               </div>
                               <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                                <label><b>Amount To Charge:</b></label>
                                <input type="number" name="amount" class="form-control" value="{{ old('amount') }} placeholder="Type Subscription Charges"></br>
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                               </div>
                                <input type="submit" name="submit" value="Add Charge" class="btn btn-success">
                            </form>
                        </p>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="feather icon-briefcase text-c-red d-block f-40"></i>
                        <h4 class="m-t-20">App Settings</h4>
                        <p class="m-b-20">
                            <form class="form-group" method="POST" action="{{URL::route('appsettingsave')}}" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                <label><b>App Logo:</b></label>
                                <input type="file" name="logo" class="form-control" value="{{ old('logo') }}"></br>
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                             </div>
                                
                              <div class="form-group {{ $errors->has('appname') ? 'has-error' : '' }}">
                                <label><b>App Name:</b></label>
                                <input type="text" name="appname" id="appname" class="form-control" value="{{ old('appname') }}" placeholder="Type App Name"></br>
                                <span class="text-danger">{{ $errors->first('appname') }}</span>
                              </div>

                                <input type="submit" name="submit" class="btn btn-primary" value="Update Details">
                             
                            </form>
                        </p>
                   
                    </div>
                </div>
            </div>
            <!-- subscribe end -->
            <!-- income start -->
               <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="feather icon-credit-card text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20">Book Loan</h4>
                        <p class="m-b-20">
                        <form class="form-group" method="POST" action="{{URL::route('bookloan')}}">
                        @csrf
                         <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label><b>User Category</b></label>
                            <select name="category" id="category" class="form-control" value="{{ old('category') }}">
                                <option value="">Select Category</option>
                                <option value="Patron">Patron</option>
                                <option value="Student">Student</option>
                            </select>
                         <span class="text-danger">{{ $errors->first('category') }}</span> 
                         </div>
                         <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label><b>Amount To Charge</b></label>
                            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Type Amount To Charge"></br>
                             <span class="text-danger">{{ $errors->first('amount') }}</span> 
                         </div>
                            <input type="submit" name="submit" class="btn btn-info" value="Save Details">
                           
                          </form>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="feather icon-credit-card text-c-green d-block f-40"></i>
                        <h4 class="m-t-20">Overdue Charges</h4>
                        <p class="m-b-20">
                            <form class="form-group" method="POST" action="{{URL::route('overduecharges')}}">                       
                        @csrf
                         <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                <label><b>User Category</b></label>
                                <select class="form-control" name="category" value="{{ old('category') }}">
                                    <option value="">Select Category</option>
                                    <option value="Patron">Patron</option>
                                    <option value="Student">Student</option>
                                </select>
                             <span class="text-danger">{{ $errors->first('amount') }}</span> 
                         </div>
                         <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                                <label><b>Amount To Charge</b></label>
                                <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Amount To Charge"></br>
                             <span class="text-danger">{{ $errors->first('amount') }}</span>
                         </div>
                                <input type="submit" name="submit" value="Add " class="btn btn-success">
                            </form>
                        </p>
                       
                    </div>
                </div>
            </div>


  
            <!-- income end -->
            <!-- Latest Activity, Feeds, Upcoming Deadlines start -->
          
   
            <!-- Latest Activity, Feeds, Upcoming Deadlines end -->
            <!-- Client Map Start -->



            <!-- Client Map end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</div>







        <!-- [ Main Content ] end -->
    </div>
</div>


        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- Button trigger modal -->






    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>
<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>
<script>
    $(document).ready(function() {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++ ;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>

</body>

</html>
