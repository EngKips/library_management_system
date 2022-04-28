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
                        <p><a href="{{URL::route('itemlist')}}" class="btn btn-info btn-sm"><span class="feather icon-back"></span> Back To List</a> </p>

                    
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
                       <form method="POST" action="{{URL::route('additem')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                   <div class="form-group {{ $errors->has('isbn') ? 'has-error' : '' }}">
                                        <label class="form-label">ISBN No</label>
                                        <input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}" placeholder="Enter ISBN Number">
                                        <span class="text-danger">{{ $errors->first('isbn') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Book Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Book Title">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                              
                            </div>
                            <div class="col-md-6">
                               
                                   <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                        <label class="form-label">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Enter Book Subject">
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('publisher') ? 'has-error' : '' }}">
                                        <label class="form-label" for="exampleInputPassword1">Publisher</label>
                                        <select class="form-control" name="publisher" id="publisher">
                                            <option>Select Publisher</option>
                                            @foreach($publishers as $publisher)
                                            <option value="{{$publisher->name}}">{{$publisher->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('publisher') }}</span>
                                    </div>

                            </div>   
              
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('mediatype') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Media Type</label>
                            <select class="form-control" name="mediatype" id="mediatype">
                                <option>Select Media Type</option>
                                <option value="emedia">Electronic Media</option>
                                <option value="book">Text Book</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('mediatype') }}</span>
                        </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Author</label>
                            <select class="form-control" name="author" id="author">
                                <option>Select Media Type</option>
                                 @foreach($authors as $author)
                                  <option value="{{$author->name}}">{{$author->name}}</option>
                                 @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('author') }}</span>
                        </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Library floor</label>
                            <select class="form-control" name="floor" id="floor">
                                <option>Select Library Location</option>
                                @foreach($locations as $location)
                                <option value="{{$location->floor}}">{{$location->floor}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('floor') }}</span>
                        </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('section') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Library Section</label>
                            <input type="text" id="section" name="section" class="form-control" value="{{ old('section') }}" placeholder="Enter Library Section" >
                            <span class="text-danger">{{ $errors->first('section') }}</span>
                        </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('shelf') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Library Shelf Number</label>
                            <select class="form-control" name="shelf" id="shelf">
                                <option>Select Shelf Number</option>
                                
                                <option value="shelf 4">Shelf No 4</option>
                                
                            </select>
                            <span class="text-danger">{{ $errors->first('shelf') }}</span>
                        </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('rack') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Shelf Rack Number</label>
                               <select class="form-control" name="rack" id="shelf">
                                <option>Select Shelf Rack Numbers</option>
                                
                                <option value="rack 10">Rack 10</option>
                                
                            </select>
                            <span class="text-danger">{{ $errors->first('rack') }}</span>
                        </div>
                        </div>
                    </div>  
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('barcode') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Barcode</label>
                            <input type="text" id="barcode" name="barcode" class="form-control" value="{{ old('barcode') }}" placeholder="Barcode" onmouseover="this.focus();">
                            <span class="text-danger">{{ $errors->first('barcode') }}</span>
                        </div>
                        </div>  
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Number Of Items</label>
                            <input type="text" id="number" name="number" class="form-control" value="{{ old('number') }}" placeholder="number" >
                            <span class="text-danger">{{ $errors->first('number') }}</span>
                        </div>
                        </div>  
                    </div>   
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('usetype') ? 'has-error' : '' }}">
                            <label class="form-label" for="exampleInputPassword1">Use Porpose</label>
                               <select class="form-control" name="usetype" id="usetype">
                                <option>Select Use Purpose</option>
                                <option value="reference">Reference Only</option>
                                <option value="general">General Use</option>
                                
                            </select>
                            <span class="text-danger">{{ $errors->first('usetype') }}</span>
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
