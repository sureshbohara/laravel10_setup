@extends('layouts.admin.main')
@section('title')
Setting || General
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
    <form id="googleSetting" method="post" enctype="multipart/form-data">@csrf
      <div class="row">

         <div class="col-xs-12 col-md-3">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title"> Google Analytic</div>
               </div>
                <div class="panel-body">
                
                <div class="form-group col-md-12">
                <label for="name">Is Google Analytic : </label>
                 <select name="is_analytic" class="form-control">
                     <option value="">---select option---</option>
                     <option value="yes" {{$setting->is_analytic == 'yes' ? 'selected' : ''}}>Yes</option>
                     <option value="no" {{$setting->is_analytic == 'no' ? 'selected' : ''}}>No</option>
                 </select>
                </div>

                <div class="form-group col-md-12">
                <label for="name">Google Analytic : </label>
                <input type="text" class="form-control" name="google_analytic_id" value="{{ $setting['google_analytic_id'] }}" placeholder="google analytic">
                </div>

               </div>
            </div>
         </div>

         <div class="col-xs-12 col-md-3">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title">  Google Recaptcha</div>
            </div>
             <div class="panel-body">
                
                <div class="form-group col-md-12">
                <label for="name">Is Google Recaptcha : </label>
                 <select name="is_recaptcha" class="form-control">
                     <option value="">---select option---</option>
                     <option value="yes" {{$setting->is_recaptcha == 'yes' ? 'selected' : ''}}>Yes</option>
                     <option value="no" {{$setting->is_recaptcha == 'no' ? 'selected' : ''}}>No</option>
                 </select>
                </div>

                <div class="form-group col-md-12">
                <label for="name">Recaptcha Site Key : </label>
                <input type="text" class="form-control" name="google_recaptcha_site_key" value="{{ $setting['google_recaptcha_site_key'] }}" placeholder="google Recaptcha Site Key">
                </div>

                <div class="form-group col-md-12">
                <label for="name">Recaptcha Secret Key : </label>
                <input type="text" class="form-control" name="google_recaptcha_secret_key" value="{{ $setting['google_recaptcha_secret_key'] }}" placeholder="google Recaptcha Secret Key">
                </div>


               </div>

           </div>
         </div>

         <div class="col-xs-12 col-md-3">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title">  Cookie Setting</div>
            </div>
             <div class="panel-body">
                
                <div class="form-group col-md-12">
                <label for="name">Is Cookie : </label>
                 <select name="is_cookie" class="form-control">
                     <option value="">---select option---</option>
                     <option value="yes" {{$setting->is_cookie == 'yes' ? 'selected' : ''}}>Yes</option>
                     <option value="no" {{$setting->is_cookie == 'no' ? 'selected' : ''}}>No</option>
                 </select>
                </div>

                <div class="form-group col-md-12">
                <label for="name">Cookie Message : </label>
                <textarea name="cookie_consent_message" class="form-control">{!! $setting['cookie_consent_message'] !!}</textarea>
                </div>

                <div class="form-group col-md-12">
                <label for="name">Cookie Btn Text : </label>
                <input type="text" class="form-control" name="cookie_consent_btn_text" value="{{ $setting['cookie_consent_btn_text'] }}" placeholder="Cookie Consent Btn Text">
                </div>


               </div>
         </div>
        </div>

        <div class="col-xs-12 col-md-3">
            <div class="panel">
             <div class="panel-heading">
              <div class="panel-title"> Maintainance Setting</div>
            </div>
             <div class="panel-body">
                
                <div class="form-group col-md-12">
                <label for="name">Is Maintainance : </label>
                 <select name="is_maintainance" class="form-control">
                     <option value="">---select option---</option>
                     <option value="yes" {{$setting->is_maintainance == 'yes' ? 'selected' : ''}}>Yes</option>
                     <option value="no" {{$setting->is_maintainance == 'no' ? 'selected' : ''}}>No</option>
                 </select>
                </div>

                <div class="form-group col-md-12">
                <label for="name">Maintainance Message : </label>
                <textarea name="maintainance_text" class="form-control">{!! $setting['maintainance_text'] !!}</textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="name">Maintainance Image : </label>
                  <input type="file" class="form-control" name="maintainance">
                  <hr>
                  @if($setting['maintainance_url'])
                  <img src="{{$setting['maintainance_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif

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

    $('#googleSetting').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('setting.google') }}",
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