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
  
  <style>
/*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    
}
/*Profile Pic End*/
</style>  
    
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
                 
                    <label style="color: maroon; font-weight: bolder; font-size: 20px;">New User Details</label>
                    </br></br></br>
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
                        <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
                        <form class="form form-vertical" action="{{URL::route('saveuser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                             <div class="col-md-4">
                                    <div class="picture">
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                                        <input type="file" name="photo" id="wizard-picture" class="">

                                    </div>
                                    <p>Click To Upload Profile</p>
                            </div>
                            <div class="col-md-4">
                                                          
                                   <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Full Name">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                            </div>
                            <div class="col-md-4">        
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">User Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter user email">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-md-4">        
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">User Phone</label>
                                        <input type="mobile" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="0721 _ _ _ _ _ _" data-mask="9999-999-999" maxlength="10">
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                            </div>
                            <div class="col-md-4">        
                                    <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Library Branch</label>
                                        <select class="form-control" name="branch" id="branch">
                                            <option value="">Select Library Branch</option>
                                            @foreach($libraries as $library)
                                             <option value="{{$library->name}}">{{$library->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('branch') }}</span>
                                    </div>
                            </div>
                             <div class="col-md-4">    
                             <label class="form-label" for="exampleInputPassword1">User Group</label>    
                                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                        <select class="form-control" name="role" id="role">
                                            <option value="">Select User Group</option>
                                             <option value="Admin">Admin</option>
                                             <option value="Patron">Patron</option>
                                             <option value="Student">Student</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                    </div>
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-md-4">        
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password" >
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                            </div>
                            <div class="col-md-4">        
                                    <div class="form-group {{ $errors->has('barcode') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">User Barcode</label>
                                        <input type="text" id="barcode" name="barcode" class="form-control" value="{{ old('barcode') }}" placeholder="Card Number" >
                                        <span class="text-danger">{{ $errors->first('barcode') }}</span>
                                    </div>
                            </div>
                             <div class="col-md-4">    
                             <label class="form-label" for="exampleInputPassword1"></label>   
                                    <div class="form-group ">
                                      <input type="submit" name="submit" class="btn btn-success btn-sm" value="Save Details">
                                    </div>
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


<script>
$(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</body>

</html>
