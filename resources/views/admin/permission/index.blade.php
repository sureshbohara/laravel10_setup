@extends('layouts.admin.main')
@section('title')
User || Permission
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">

      <div class="row">

         <div class="col-xs-12 col-md-12">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Create New User Permission</div>
               </div>
                @include('admin.permission.table')
            </div>
         </div>

         <div class="col-xs-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                    @include('admin.permission.tables')
                </div>
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
    $('#addPermission').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('permissions.store') }}",
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

@endsection