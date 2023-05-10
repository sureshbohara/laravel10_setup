@extends('layouts.admin.main')
@section('title')
Setting || Introduction
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
    <form id="introductionSetting" method="post">@csrf
      <div class="row">

         <div class="col-xs-12 col-md-4">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title"> Introduction</div>
               </div>

                <div class="panel-body">
                 <div class="form-group col-md-12">
                  <textarea class="form-control" rows="20" name="introduction" placeholder="Type your introduction"></textarea>
                </div>
               </div>

            </div>
         </div>

         <div class="col-xs-12 col-md-4">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title">Our Vission</div>
            </div>
             <div class="panel-body">
                 <div class="form-group col-md-12">
                  <textarea class="form-control" rows="20" name="our_vision" placeholder="Type Your Vission"></textarea>
                </div>
               </div>
           </div>
         </div>

         <div class="col-xs-12 col-md-4">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title"> Our Mission</div>
            </div>
               <div class="panel-body">
                 <div class="form-group col-md-12">
                  <textarea class="form-control" rows="20" name="our_mission" placeholder="Type Your Mission"></textarea>
                </div>
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

    $('#introductionSetting').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('setting.introduction') }}",
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