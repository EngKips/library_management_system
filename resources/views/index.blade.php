<!DOCTYPE html>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<div class="container d-flex justify-content-center">
    <div class="d-flex flex-column justify-content-between">
        <div class="card mt-3 p-5">
            <div>
                <p class="mb-1">When In Doubt</p>
                <h4 class="mb-5 text-white">Go To The Library!</h4>
            </div> <button class="btn btn-primary btn-lg"><small>Dont have an account?</small><span>&nbsp;Sing up</span> </button>
        </div>
        <div class="card two bg-white px-5 py-4 mb-3">

        @if($errors->any())
		<div class="alert alert-danger d-flex align-items-center" role="alert">
		     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		  <div>
		    {{$errors->first()}}
		  </div>
		</div>
		@endif 

         <form class="form-group" method="POST" action="{{URL::route('dashboards')}}">
         	@csrf
            <div class="form-group">
            	<input type="email" class="form-control" name="email" id="mail" required>
            	<label class="form-control-placeholder" for="mail">Email</label>
            </div>
 
            <div class="form-group">
            	<input type="password" class="form-control" name="password" id="password" required><label class="form-control-placeholder" for="password">Password</label>
            </div> 
            <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg mt-1 mb-2" value="Login">
        </form>    
        </div>
    </div>
</div>


<style type="text/css">
	body {
    background-color: #EBEAEF
}

.container {
    flex-wrap: wrap
}

.card {
    border: none;
    border-radius: 10px;
    background-color: #4270C8;
    width: 350px;
    margin-top: -60px
}

p.mb-1 {
    font-size: 25px;
    color: #9FB7FD
}

.btn-primary {
    border: none;
    background: #5777DE;
    margin-bottom: 60px
}

.btn-primary small {
    color: #9FB7FD
}

.btn-primary span {
    font-size: 13px
}

.card.two {
    border-top-right-radius: 60px;
    border-top-left-radius: 0
}

.form-group {
    position: relative;
    margin-bottom: 2rem
}

.form-control {
    border: none;
    border-radius: 0;
    outline: 0;
    border-bottom: 1.5px solid #E6EBEE
}

.form-control:focus {
    box-shadow: none;
    border-radius: 0;
    border-bottom: 2px solid #8A97A8
}

.form-control-placeholder {
    position: absolute;
    top: 15px;
    left: 10px;
    transition: all 200ms;
    opacity: 0.5;
    font-size: 80%
}

.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
    font-size: 80%;
    transform: translate3d(0, -90%, 0);
    opacity: 1;
    top: 10px;
    color: #8B92AC
}

.btn-block {
    border: none;
    border-radius: 8px;
    background-color: #506CCF;
    padding: 10px 0 12px
}

.btn-block:focus {
    box-shadow: none
}

.btn-block span {
    font-size: 15px;
    color: #D0E6FF
}
</style>
</html>