<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin || Login</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="images/favicon.png">
      <link rel="stylesheet" href="{{asset('backend/css/theme.css')}}">
      <link rel="stylesheet" href="{{asset('backend/css/demo.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
      <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
   </head>
   <body class="">

      <main class="main-container no-margin no-padding">
         <div class="fullscreen">
            <div class="vertical-middle">
               <div class="content container">
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                        <div class="panel">
                           @include('admin.message')
                           <div class="panel-body">
                              <div class="image mb text-center">
                                 <img src="{{asset('image/icon.png')}}" alt="logo" width="50%">
                              </div>
                              <form method="get" id="loginUser">
                                 @csrf
                                 <div class="form-group">
                                    <label for="login">Email or Mobile Number <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-sm" placeholder="Email/Mobile" name="email" id="email" @if(isset($_COOKIE["email"])) value="{{$_COOKIE["email"]}}" @endif>
                                 </div>
                                 <div class="form-group">
                                    <label for="password">Password <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-sm" placeholder="Password" name="password" id="password" @if(isset($_COOKIE["password"])) value="{{$_COOKIE["password"]}}" @endif>
                                    <span class="passwordShow">
                                      <i class="fa fa-eye-slash" id="eye" onclick="toggle()"></i>
                                    </span>
                                 </div>
                                 <div class="form-group pull-left">
                                    <div class="icheck-primary">
                                       <input type="checkbox" id="remember" name="remember" @if(isset($_COOKIE["email"])) checked="" @endif>
                                       <label for="remember">Remember Me</label>
                                    </div>
                                 </div>
                                 <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-sign-in"></i>
                                    Sign In
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <p class="text-muted text-center">
                           &copy; Copyright {{ date('Y') }} <strong>Admin Login Panel</strong> | All Rights Reserved
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="{{asset('backend/js/jquery-2.2.4.min.js')}}"></script>
      <script src="{{asset('backend/components/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
      <script type="text/javascript">
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $('#loginUser').submit(function(e) {
             e.preventDefault();
             let formData = new FormData(this);
               $(document).find("span.text-danger").remove();
             $.ajax({
                 type:'POST',
                 url: "{{ route('admin.login') }}",
                 data: formData,
                 contentType: false,
                 processData: false,
                 success: (response) => {
                     if (response) {
                         this.reset();
                          swal(response.msg);
                          window.location.href="/admin/dashboard"
                     }
                 },
                 error:function (response){
                    $.each(response.responseJSON.errors,function(field_name,error){
                    $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger">' +error+ '</span>')
                    })
                 }
         
                 
            });
         });
           
      </script>
      <script>
         var state = false;
         function toggle(){
           if(state){
             document.getElementById("password").setAttribute("type","password");
             document.getElementById("eye").setAttribute("class","fa fa-eye-slash");
             state = false;
           } else{
             document.getElementById("password").setAttribute("type","text");
             document.getElementById("eye").setAttribute("class","fa fa-eye");
             state = true;
           } 
         }
      </script>

    


   </body>
</html>