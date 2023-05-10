@extends('layouts.admin.main')
@section('title')
Cms || Page
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">

      <div class="row">

         <div class="col-xs-12 col-md-6">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Create New Cms Page</div>
               </div>
                @include('admin.cms_pages.form')
            </div>
         </div>

         <div class="col-xs-12 col-md-6">
            @include('admin.cms_pages.table')
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
    $('#addCmsPage').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('cmspage.store') }}",
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
    $('#updateCmsPage').submit(function(e){
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
                }
            },
            
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