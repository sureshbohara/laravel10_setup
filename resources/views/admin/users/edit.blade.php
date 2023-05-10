@extends('layouts.admin.main')
@section('title')
User || Update
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
      <div class="row">
         <div class="col-xs-12 col-md-12">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Update Users</div>
               </div>
               <form id="updateAdminUser" method="post" action="{{route('adminuser.update',$editData['id'])}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="panel-body">
                     <div class="form-group col-md-3">
                        <label>User Type  <span style="color:red;"> * </span></label>
                        <select name="type" class="form-control">
                           <option value="">--- select type ---</option>
                           <option value="admin" {{$editData->type == 'admin' ? 'selected' : ''}}> Admin </option>
                           <option value="employeer" {{$editData->type == 'employeer' ? 'selected' : ''}}> Employeer </option>
                        </select>
                     </div>
                     <div class="form-group col-md-3">
                        <label>User Name  <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" name="name" value="{{$editData['name']}}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>User Address  <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" name="address" value="{{$editData['address']}}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>User Mobile Number  <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" name="mobile_number" value="{{$editData['mobile_number']}}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>Gender  <span style="color:red;"> * </span></label>
                        <select name="gender" class="form-control">
                           <option value="">--- select Gender ---</option>
                           <option value="Male" {{$editData->gender == 'Male' ? 'selected' : ''}}> Male </option>
                           <option value="Female" {{$editData->gender == 'Female' ? 'selected' : ''}}> Female </option>
                           <option value="Other" {{$editData->gender == 'Other' ? 'selected' : ''}}> Other </option>
                        </select>
                     </div>
                     <div class="form-group col-md-3">
                        <label>User Post  <span style="color:red;"> * </span></label>
                        <input type="text" class="form-control" name="user_post" value="{{$editData['user_post']}}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>Facebook </label>
                        <input type="text" class="form-control" name="facebook" value="{{$editData['facebook']}}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>Instagram </label>
                        <input type="text" class="form-control" name="instagram" value="{{$editData['instagram']}}">
                     </div>
                     <div class="form-group col-md-4">
                        <label>Twiter </label>
                        <input type="text" class="form-control" name="twiter" value="{{$editData['twiter']}}">
                     </div>
                     <div class="form-group col-md-4">
                        <label>Linkedin </label>
                        <input type="text" class="form-control" name="linkedin" value="{{$editData['linkedin']}}">
                     </div>
                     <div class="form-group col-md-4">
                        <label>Email <span style="color:red;"> * </span></label>
                        <input type="email" class="form-control" name="email" value="{{$editData['email']}}">
                     </div>


                     <div class="form-group col-md-12">
                        <label>User BIO </label>
                        <textarea name="bio" id="bio" class="form-control" rows="5">{!! $editData['bio'] !!}
                        </textarea>
                        <span class="passwordShow" id="count">0</span>
                     </div>
                  </div>
                  <div class="panel-footer">
                     <button type="reset" class="btn btn-o btn-default">Reset Data</button>
                     <button type="submit" class="btn btn-success">Update Data</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>
<script src="{{asset('backend/js/jquery-2.2.4.min.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#updateAdminUser').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        var url = $(this).attr('action');
        $.ajax({
            type:'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    swal(response.msg);
                    window.location.reload();
                    window.location.href="/admin/adminuser"
                }
            },
            
       });
    }); 
</script>

<script>
   $(document).ready(function() {
     var max_chars = 500;
     var char_count = 0;
     $('#bio').keyup(function() {
         char_count = $(this).val().length;
         $('#count').text(char_count);
         if (char_count > max_chars) {
             $('#count').css('color', 'red');
         } else {
             $('#count').css('color', 'black');
         }
     });
   });
   
</script>
@endsection