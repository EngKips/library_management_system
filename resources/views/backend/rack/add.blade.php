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
                        <p><a href="{{URL::route('racklist')}}" class="btn btn-info btn-sm"><span class="feather icon-back"></span> Back To List</a> </p>

                    
                      @if($errors->any())
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                          <div>
                            {{$errors->first()}}
                          </div>
                        </div>
                        @endif 

                        
                        <div class="dt-responsive table-responsive">
                       <form method="POST" action="{{URL::route('savelocation')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                   <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                                        <label class="form-label">Library Floor</label>
                                        <input type="text" id="floor" name="floor" class="form-control" value="{{ old('floor') }}" placeholder="Enter Library Floor">
                                        <span class="text-danger">{{ $errors->first('floor') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('section') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Library Section</label>
                                        <input type="text" id="section" name="section" class="form-control" value="{{ old('section') }}" placeholder="Kra Pin">
                                        <span class="text-danger">{{ $errors->first('section') }}</span>
                                    </div>
                              
                            </div>
                            <div class="col-md-6">
                               
                                   <div class="form-group {{ $errors->has('shelf') ? 'has-error' : '' }}">
                                        <label class="form-label">Library Shelf Number</label>
                                        <input type="text" id="shelf" name="shelf" class="form-control" value="{{ old('shelf') }}" placeholder="Enter Shelf Number">
                                        <span class="text-danger">{{ $errors->first('shelf') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('rack') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Rack Number</label>
                                        <input type="mobile" id="rack" name="rack" class="form-control mob_no" value="{{ old('rack') }}" placeholder="Enter Rack Number"  >
                                        <span class="text-danger">{{ $errors->first('rack') }}</span>
                                    </div>

                            </div>   
              
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                        <input type="submit" class="btn btn-success" name="submit" value="Save Details">
                     </div>
                    </div>
                  </form>
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
