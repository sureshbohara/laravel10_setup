@extends('layouts.admin.main')
@section('title')
User || Setting
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">

      <div class="row">

         <div class="col-xs-12 col-md-6">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Update User Setting</div>
               </div>
               <div class="panel-body">
                  <form id="updateProfiles" method="post" enctype="multipart/form-data">@csrf
                     <div class="form-group col-md-6">
                        <label>User Email</label>
                        <input type="email" class="form-control" name="email" value="{{$adminDetails['email']}}" readonly>
                     </div>

                     <div class="form-group col-md-6">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" value="{{$adminDetails['name']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>User Address</label>
                        <input type="text" class="form-control" name="address" value="{{$adminDetails['address']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>User Mobile</label>
                        <input type="text" class="form-control" name="mobile_number" value="{{$adminDetails['mobile_number']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>Gender</label>
                        <input type="text" class="form-control" name="gender" value="{{$adminDetails['gender']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>User Post</label>
                        <input type="text" class="form-control" name="user_post" value="{{$adminDetails['user_post']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{$adminDetails['facebook']}}">
                     </div>

                     <div class="form-group col-md-6">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{$adminDetails['instagram']}}">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Twiter</label>
                        <input type="text" class="form-control" name="twiter" value="{{$adminDetails['twiter']}}">
                     </div>
                     <div class="form-group col-md-6">
                        <label>Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" value="{{$adminDetails['linkedin']}}">
                     </div>

                     <div class="form-group col-md-12">
                        <label>BIO</label>
                        <textarea class="form-control comment-input" name="bio" placeholder="Type your bio here">{{$adminDetails['bio']}}</textarea>
                     </div>



                      <div class="form-group col-md-6">
                          <label>User Profile</label>
                          <input type="file" name="image">
                      </div>

                       <div class="form-group col-md-6">
                          <label>User Banner</label>
                          <input type="file" name="banner">
                      </div>


                      <div class="form-group col-md-6">
                        <img src="{{$adminDetails['image_url']}}" width="100%">
                      </div>

                      <div class="form-group col-md-6">
                        <img src="{{ $adminDetails['banner_url'] }}" alt="Banner" width="100%">
                      </div>

                      


                     <button type="reset" class="btn btn-o btn-default">Reset Form</button>
                     <button type="submit" class="btn btn-success">Upload Profiles</button>
                  </form>
               </div>
            </div>
         </div>

         <div class="col-xs-12 col-md-6">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Update User Password</div>
               </div>
               <div class="panel-body">
                  <form id="change-password-form" method="post">@csrf
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" value="{{$adminDetails['email']}}" readonly>
                     </div>

                     <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Password">
                        <span class="passwordShow">
                           <i class="fa fa-eye-slash" id="eye" onclick="toggle()"></i>
                        </span>
                     </div>

                     <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password"  placeholder="Password">
                        <span class="passwordShow">
                           <i class="fa fa-eye-slash" id="eye1" onclick="toggle1()"></i>
                        </span>
                     </div>

                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Password">
                        <span class="passwordShow">
                           <i class="fa fa-eye-slash" id="eye2" onclick="toggle2()"></i>
                        </span>
                     </div>

                     <button type="reset" class="btn btn-o btn-default">Reset Form</button>
                     <button type="submit" class="btn btn-success">Change Password</button>
                  </form>
               </div>
            </div>

         </div>


      </div>
   </div>
</main>

<script src="{{asset('backend/js/jquery-2.2.4.min.js')}}"></script>
<script>
   $(document).ready(function(){
    $('#updateProfiles').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('update.details') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if (response){
                    swal(response.msg);
                    window.location.href="/admin/dashboard";
                }
            },    
        });
    });
});

</script>

<script>
  $(document).ready(function() {
    $('#change-password-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("update.password") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response) {
                   swal(response.msg);
                   window.location.href="/admin/dashboard"
                }
            },
           error: function(response) {
              if(response.status === 422) {
                  var errors = response.responseJSON.errors;
                  var errorMessage = '';
                  for (var key in errors) {
                      errorMessage += errors[key][0] + '\n';
                  }
                  swal(errorMessage);
              } else {
                  swal("An error occurred. Please try again later.");
              }
            }

        });
    });
});

</script>

  <script>
         var state = false;
         function toggle(){
           if(state){
             document.getElementById("current_password").setAttribute("type","password");
             document.getElementById("eye").setAttribute("class","fa fa-eye-slash");
             state = false;
           } else{
             document.getElementById("current_password").setAttribute("type","text");
             document.getElementById("eye").setAttribute("class","fa fa-eye");
             state = true;
           } 
         }
         function toggle1(){
           if(state){
             document.getElementById("new_password").setAttribute("type","password");
             document.getElementById("eye1").setAttribute("class","fa fa-eye-slash");
             state = false;
           } else{
             document.getElementById("new_password").setAttribute("type","text");
             document.getElementById("eye1").setAttribute("class","fa fa-eye");
             state = true;
           } 
         }
         function toggle2(){
           if(state){
             document.getElementById("new_password_confirmation").setAttribute("type","password");
             document.getElementById("eye2").setAttribute("class","fa fa-eye-slash");
             state = false;
           } else{
             document.getElementById("new_password_confirmation").setAttribute("type","text");
             document.getElementById("eye2").setAttribute("class","fa fa-eye");
             state = true;
           } 
         }
      </script>
@endsection