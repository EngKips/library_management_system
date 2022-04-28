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
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                
                        <div class="dt-responsive table-responsive">
        
                 

                    <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="padding-left: 3%; ">
                                <p><img src="assets/images/profile/{{$cardnumber->photo}}" style="width: 150px; height: 150px; border-radius: 100px;"></p>
                                <p><label style="color: maroon; font-size: 22px; font-family: sans-serif;">{{$cardnumber->name}}</label></p>
                            </div>
                        </div>
                    </div>
                       <div class="row">
                         <div class="col-md-6">
                             <p><label style="color: maroon; font-size: 20px;">Contact Information</label></p> 
                             <p><label><b>Primary Phone :</b></label>{{$cardnumber->phone}}</p> 
                             <p><label><b>Primary Email :</b></label>{{$cardnumber->email}}</p>  
                             <p><label><b>Initials :</b></label>N/A</p>  
                             <p><label><b>Postal Address :</b></label>N/A</p>  
                             <p><label><b>Contact Method :</b></label>Phone</p>   
                       
                           
                         </div>
                         <div class="col-md-6">
                             <p><label style="color: maroon; font-size: 20px;">Library Use</label></p>
                             <p><label><b>Card Number :</b></label>{{$cardnumber->barcode}}</p> 
                             <p><label><b>Category :</b></label>{{$cardnumber->role}}</p>  
                             <p><label><b>Registration Date :</b></label>{{$cardnumber->created_at}}</p>  
                             <p><label><b>Expiration Date :</b></label></p>  
                             <p><label><b>Library :</b></label>{{$cardnumber->branch}}</p>  
                             <p><label><b>Username :</b></label>{{$cardnumber->name}}</p>  
                             <p><label><b>Password :</b></label>**************</p>   
                             
                            
                         </div>
                       </div>
                    </div>
                </br>
                   <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$itemscheckedout}} Checkouts</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">0 Holds</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">0 Restrictions</button>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p></p>
                        <p>
                            <div class="card">
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

                              <div class="col-md-6">
                                <p><label style="font-weight: bolder; font-size: 22px; color: maroon;">Checking Out To {{$cardnumber->name}}</label></p>
                                <form class="form-inline" method="POST" action="{{URL::route('searchitemothers')}}">
                                    @csrf
                                    <label for="book" class="form-group"><b>Enter Item Barcode:</b></label>
                                    <input type="hidden" name="id" value="{{$cardnumber->id}}">
                                    <input type="text" name="isbn"  placeholder="Enter Book Barcode Here" required/>
                                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Get Item Details">
                                </form>
                              </div>
                              <div class="col-md-6">

    
                          
                          @isset($item)
                               <form class="form-group" method="POST" action="{{URL::route('checkout')}}">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id" value="{{$cardnumber->id}}">
                                    <input type="hidden" class="form-control" name="cardnumber" value="{{$cardnumber->barcode}}">
                                    <input type="hidden" class="form-control" name="category" value="{{$cardnumber->role}}">
                                    <input type="hidden" class="form-control" name="phone" value="{{$cardnumber->phone}}">
                                    <label><b>ISBN NO:</b></label>
                                    <input type="text" class="form-control" name="isbn" value="{{$item->isbn}}" readonly>
                                    <label><b>TITLE:</b></label>
                                    <input type="text" class="form-control" name="title" value="{{$item->title}}" readonly>
                                    <label><b>SUBJECT:</b></label>
                                    <input type="text" class="form-control" name="subject" value="{{$item->subject}}" readonly>
                                    <label><b>AUTHOR:</b></label>
                                    <input type="text" class="form-control" name="author" value="{{$item->author}}" readonly>
                                    <label><b>PUBLISHER:</b></label>
                                    <input type="text" class="form-control" name="publisher" value="{{$item->publisher}}" readonly></br>
                                    <input type="submit" name="submit" class="btn btn-success btn-sm" value="Continue With Checkout">
                                </form>
                           @endisset
  
  
                           @empty ($item)
                           <p><label><b>No Item Details To Display</b></label></p>
                             @endempty  
                              </div>
                            </div>
                         </div>   
                        </p>
                        <table id="user-list-table" class="table nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Isbn Number</th>
                                        <th>Book Title</th>
                                        <th>Borrowed On</th>
                                        <th>Return On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($checkouts as $checkout)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$checkout->isbn}}</td>
                                        <td>{{$checkout->title}}</td>
                                        <td>{{$checkout->checkoutdate}}</td>
                                        <td>{{$checkout->checkindate}}</td>
                                        <td>
                                            <span class="badge badge-light-success">Active</span>
                                            <div class="overlay-edit">
                                                <a href="#" type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></a>
                                                <a href="#" type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Isbn Number</th>
                                        <th>Book Title</th>
                                        <th>Borrowed On</th>
                                        <th>Return On</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>  

                      </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Then here</div>
                      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">and finanlly here</div>
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
