<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 07:45:41 GMT -->


@include('backend.editinclude.header')


<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
@include('backend.editinclude.navbar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
@include('backend.editinclude.topnav')
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
                        </br></br></br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><img src="/assets/images/profile/{{$photo}}" style="height: 200px; border-radius: 20px;"></p>
                                        <p style="font-weight: bolder; color: maroon; font-size: 20px;">{{$name}}</p>
                                    </div>
                                    <div class="col-md-6">
                                     <label><h3 style="color: maroon;"><b>About Author</b></h3></label>
                                        <p>{{$authordescription}}</p>
                                    </div>
                                </div>
                        </br></br></br>
                        <p><a href="{{URL::route('itemlist')}}" class="btn btn-info btn-sm"><span class="feather icon-plus"></span> Back To List</a>
                        </p>
                        <p style="font-weight: bolder; color: maroon; font-size: 20px;">Other Materials By {{$name}}</p>
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Book Title</th>
                                        <th>Subject</th>
                                        <th>Media </th>
                                        <th>Located In</th>
                                        <th>Section</th>
                                        <th>Shelf</th>
                                        <th>Rack</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach($works as $work)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$work->title}}</td>
                                        <td>{{$work->subject}}</td>
                                        <td>{{$work->mediatype}}</td>
                                        <td>{{$work->floor}}</td>
                                        <td>{{$work->section}}</td>
                                        <td>{{$work->shelf}}</td>
                                        <td>{{$work->rack}}</td>
                                        <td>
                                            <span class="badge badge-light-success">Request</span>
                                            <div class="overlay-edit">
                                                <a href="#" type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Book Title</th>
                                        <th>Subject</th>
                                        <th>Media </th>
                                        <th>Located In</th>
                                        <th>Section</th>
                                        <th>Shelf</th>
                                        <th>Rack</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
    <script src="/assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/ripple.js"></script>
    <script src="/assets/js/pcoded.min.js"></script>
    <script src="/assets/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="/assets/js/plugins/apexcharts.min.js"></script>
<!-- custom-chart js -->
<script src="/assets/js/pages/dashboard-main.js"></script>
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
