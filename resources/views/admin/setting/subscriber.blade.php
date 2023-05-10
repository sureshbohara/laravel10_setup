@extends('layouts.admin.main')
@section('title')
Setting || Subscriber
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">

      <div class="row">

         <div class="col-xs-12 col-md-6">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title">Create New Subscriber </div>
               </div>
                <form id="addSubscribers" method="post">@csrf
                   @include('admin.setting.subscriber_form')
                </form>
            </div>
         </div>

         <div class="col-xs-12 col-md-6">
            @include('admin.setting.subscriber_table')
         </div>

         @include('admin.emails.all_user')
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
    $('#addSubscribers').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('subscribers.store') }}",
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


    $('#updateSubscriber').submit(function(e){
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


    $('#updataCustomer').submit(function(e){
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
    
    $('#sendAllUserEmail').submit(function(e){
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




@endsection