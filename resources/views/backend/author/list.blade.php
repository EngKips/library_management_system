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
                        <p><a href="{{URL::route('newauthor')}}" class="btn btn-info btn-sm"><span class="feather icon-plus"></span> New Author</a>


                        </p>
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Author Picture</th>
                                        <th>Author Name</th>
                                        <th>Created On</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach($authors as $author)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="assets/images/profile/{{$author->photo}}" style="width: 30px; height: 30px;"></td>
                                        <td><a href="{{URL::route('authordetails' , $author->id)}}">{{$author->name}}</a></td>
                                        <td>{{$author->created_at}}</td>
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
                                        <th>Author Picture</th>
                                        <th>Author Name</th>
                                        <th>Created On</th>
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
