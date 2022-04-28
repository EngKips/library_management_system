<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

        <!-- Button trigger modal -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">




<!--Modal class-->
<div class="modal" id="b">
  <div class="header">
    <a href="#" class="cancel">X</a>
  </div>
  <div class="content">
    <form method="POST" action="{{URL::route('subscriptionsave')}}">
    @csrf
      <label id="first_label">User name</label>
       <select class="form-control" name="name" style="font-size: 18px;">
        <option value="">Select User By Name</option>
         @foreach($names as $name)
           <option value="{{$name->id}}">{{$name->name}}</option>
         @endforeach
       </select>
      <label id="second_label">Paid Amount</label>
      <input type="number" class="form-control" name="amount" placeholder="Subscription Fee" required style="font-size: 18px;">
      <div class="footer">
    <input type="submit" class="btn btn-success btn-lg" name="submit" value="Subscribe" id="login">
    </form>
  </div>
  </div>

</div>
<!--End of modal-->

<style type="text/css">
    .main{
  width: 100%;
  height: 100vh;
  text-align: center;
}

.main div{
  width: 400px;
  height: 400px;
  margin:0 auto;
  text-align: center;

}
.main div button{
  top: 500px;
  height: 30px;
  margin: 0 auto;
}


.container{
  display: none;
  width: 100%;
  height: 100vh;
  position: fixed;
  opacity: 0.9;
  background: #222;
  z-index: 40000;
  top:0;
  left: 0;
  overflow: hidden;

  animation-name: fadeIn_Container;
  animation-duration: 1s;
  
}

.modal{
  display:none;
  top: 0;
  min-width: 250px;
  width: 80%;
  height: 400px;
  margin: 0 auto;
  position: fixed;
  z-index: 40001;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #000;
  margin-top: 30px;
  margin-left: 10%;

  animation-name: fadeIn_Modal;
  animation-duration: 0.8s;
 
}

.header{
  width: 100%;
  height: 70px;
  border-radius: 10px 10px 0px 0px;
  border-bottom: 2px solid #ccc;
}

.header a{
  text-decoration: none;
  float: right;
  line-height: 70px;
  margin-right: 20px;
  color: #aaa;
}

.content{
  width: 100%;
  height: 250px;
}

form{
    margin-top: 20px;
}

form label{
  display: block;
  margin-left: 1%;
  margin-top: 10px;
  font-family: sans-serif;
 
}

form input{
  display: block;
  width: 75%;
  margin-left: 12%;
  margin-top: 10px;
  border-radius: 3px;
  font-family: sans-serif;
  font-size: 18px;
}

#first_label{
  padding-top: 30px;
  font-size: 20px;
}

#second_label{
  padding-top: 25px;
  font-size: 20px;
}


.footer{
  width: 100%;
  height: 80px;
  border-radius: 0px 0px 10px 10px;
  border-top: 2px solid #ccc;
}

.fotter button{
  float: right;
  margin-right: 10px;
  margin-top: 18px;
  text-decoration: none; 
}

/****MEDIA QUERIES****/

@media screen and (min-width: 600px){

  .modal{
    width: 500px;
    height: 300px;
    margin-left: calc(50vw - 250px);
    margin-top: calc(50vh - 150px);
  }


  .header{
    width: 100%;
    height: 40px;
  }

  .header a{
    line-height: 40px;
    margin-right: 10px;
  }

  .content{
    width: 100%;
    height: 190px;
  }

  form label{
    margin-left: 10%;
    margin-top: 10px;
  }

  form input{
    width: 75%;
    margin-left: 10%;
    margin-top: 10px;
  font-size: 18px;
  }

  #first_label{
  padding-top: 0px;
  }

  #second_label{
    padding-top: 0px;
  }

  .footer{
    width: 100%;
    height: 70px;   
  }

  .footer button{
    float: right;
    margin-right: 10px;
    margin-top: 10px;
  }

}

/*LARGE SCREEN*/
@media screen and (min-width: 1300px){

}

/****ANIMATIONS****/

@keyframes fadeIn_Modal {
  from{
    opacity: 0;
  }
  to{
    opacity: 1;
  }
}

@keyframes fadeIn_Container {
  from{
    opacity: 0;
  }
  to{
    opacity: 0.9;
  }
}

</style>

     <button class="btn btn-info" id="open" onclick="openModal">Add New Subsription</button> || <button class="btn btn-success">View Active Subsription</button> || <button class="btn btn-warning">View In-Active Subsription</button>
                 </br></br>  
                   <p><input class="form-control" id="myInput" type="text" placeholder="Search for any key word here" style="font-size: 18px;"></p>      
                    </br>

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
        
                <!--content body-->


                            <table id="example" class="table nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Subscription Date</th>
                                        <th>Expires On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                  @foreach($subscriptions as $subscription)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$subscription->name}}</td>
                                        <td>{{$subscription->phone}}</td>
                                        <td>{{number_format($subscription->amount),2}}</td>
                                        <td>{{$subscription->created_at}}</td>  
                                        <td>{{$subscription->duedate}}</td>   
                                        <td>{{$subscription->status}}</td>
                                        <td>
                                            <span class="badge badge-light-success">Active</span>
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
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Subscription Date</th>
                                        <th>Expires On</th>
                                        <th>Status</th>
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
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script type="text/javascript">
    $("#open").click(function(){
     $("#a").css("display","block");
     $("#b").css("display","block");
                 });


$(".cancel").click(function(){
     $("#a").fadeOut();
     $("#b").fadeOut();
});
</script>

</body>

</html>
