@extends('layouts.admin.main')
@section('title')
Setting || SMTP
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
    <form id="smtpSetting" method="post">@csrf
      <div class="row">

         <div class="col-xs-12 col-md-6">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title"> SMTP  Setting</div>
               </div>
                @include('admin.setting.smtp_form')
            </div>
         </div>

         <div class="col-xs-12 col-md-6">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title">  SMTP Instruction</div>
            </div>
              <div class="panel-body">
                <p class="text-danger">{{ ('Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.') }}</p>
                <h6 class="text-muted">{{ ('For Non-SSL') }}</h6>
                <ul class="list-group">
                    <li class="list-group-item text-dark">{{ ('Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail Host according to your server Mail Client Manual Settings') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail port as 587') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail Encryption as ssl if you face issue with tls') }}</li>
                </ul>
                <br>
                <h6 class="text-muted">{{ ('For SSL') }}</h6>
                <ul class="list-group mar-no">
                    <li class="list-group-item text-dark">{{ ('Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail Host according to your server Mail Client Manual Settings') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail port as 465') }}</li>
                    <li class="list-group-item text-dark">{{ ('Set Mail Encryption as ssl') }}</li>
                </ul>
            </div>
           </div>
         </div>


        <div class="col-xs-12 col-md-12">
         <div class="panel">
              <div class="panel-footer">
             <button type="reset" class="btn btn-o btn-default">Reset Data</button>
             <button type="submit" class="btn btn-success">Update Data</button>
           </div>
         </div>
        </div>

      </div>
      </form>
   </div>
</main>

<script src="{{asset('backend/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#smtpSetting').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('setting.smtp') }}",
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