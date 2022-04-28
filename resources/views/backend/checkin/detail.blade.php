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
            
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                
                        <div class="container">
                         <div class="card">
                             <div class="container">
                                 <div class="col-md-12">
                                     </br>
                                     <p><h4><label style="color: maroon; font-family: sans-serif;">Checking In For {{$user->name}}</label></h4></p>
                                     </br>
                                 </div>
                                <div class="row">
                                 <div class="col-md-4">
                                     <p>
                                         <img src="assets/images/books/book.png" style="height: 300px; width: 300px;">
                                     </p>
                                 </div>
                                 <div class="col-md-4">
                                    <p><h5><label><b>Isbn:&nbsp;- &nbsp;</b></label>{{$book->isbn}}</h5></p>
                                    <p><h5><label><b>Subject:&nbsp;- &nbsp;</b></label>{{$book->subject}}</h5></p>
                                     <p><h5><label><b>Title:&nbsp;- &nbsp;</b></label>{{$book->title}}</h5></p>
                                     <p><h5><label><b>Author:&nbsp;- &nbsp;&nbsp;&nbsp;</b></label>{{$book->author}}</h5></p>
                                     <p><h5><label><b>Publisher:&nbsp;-&nbsp; </b></label>{{$book->publisher}}</h5></p>
                                     <p><h5><label><b>Checked out on:&nbsp;-&nbsp;</b></label>{{$book->checkoutdate}}</h5></p>
                                     <p><h5><label><b>Expected Check in:&nbsp;-&nbsp; </b></label>{{$book->checkindate}}</h5></p>
                                 </div>
                                 <div class="col-md-4">
                                     <p><h4><label><b>Overdue & Penalties</b></label></h4></p>
                                     <p><h5><label><b>Late By:&nbsp;&nbsp;</b></label>{{$overduedays}} Days</h5></p>
                                     <p><h5><label><b>Penalty:&nbsp;&nbsp;</b></label>{{$amount}} Kshs</h5></p>
                                     <p><h5><label><b>Reservation Requests:&nbsp;&nbsp;</b></label>0 </h5></p>
                                     <form method="POST" action="{{URL::route('bookcheckinothers')}}">
                                        @csrf
                                         <input type="hidden" name="bookisbn" value="{{$book->isbn}}">
                                         <input type="hidden" name="username" value="{{$user->name}}">
                                         <input type="hidden" name="penalty" value="{{$amount}}">
                                     <p><input type="submit" class="btn btn-success" name="submit" value="Check In"> || <a href="" class="btn btn-warning">Renew</a></p>
                                     </form>

                               
                                 </div>
                                </div>
                            <hr style="color: maroon;">
                                <div class="row">
                                   <div class="col-md-12">
                                       <p><label><h4 style="color: maroon; font-family: sans-serif;">User Details</h4></label></p>
                                   </div> 
                                   <div class="card">
                                       <p style="font-size: 19px;">
                                           <label><b>Name:</b>{{$user->name}}</label>&nbsp;&nbsp;
                                           <label><b>Library Branch:</b>{{$user->branch}}</label>&nbsp;&nbsp;
                                           <label><b>Subscription:</b>Active</label>&nbsp;&nbsp;
                                           <label><b>Category:</b>{{$user->role}}</label>&nbsp;&nbsp;
                                           <label><b>Issued Items:</b>3</label>&nbsp;&nbsp;
                                       </p>
                                   </div>
                                </div>
                             </div>

                         </div>
                        </div>
                    </div>
                </div>
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
