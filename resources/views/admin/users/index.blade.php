@extends('layouts.admin.main')
@section('title')
User || Create
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">

      <div class="row">

         <div class="col-xs-12 col-md-12">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Create New Users</div>
               </div>
                @include('admin.users.form')
            </div>
         </div>

         <div class="col-xs-12 col-md-12">
            <div class="panel">
                 <div class="panel-heading">
                   <div class="panel-title"> Users List</div>
                </div>
                @include('admin.users.table')
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
    $('#addAdminUser').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('adminuser.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    swal(response.msg);
                    window.location.reload();
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

<script>
    $(document).ready(function() {
     var datas = {!! json_encode($getData) !!};
     datas.forEach(test => {
        $("#checkbox" + test["id"]).click(function() {
         document.getElementById("status" + test["id"]).submit();
        });
        });
    });
 </script>

@endsection