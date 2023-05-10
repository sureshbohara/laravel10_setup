@extends('layouts.admin.main')
@section('title')
Setting || Media
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
    <form id="mediaSetting" method="post" enctype="multipart/form-data">@csrf
      <div class="row">

         <div class="col-xs-12 col-md-12">
            <div class="panel">
               <div class="panel-heading">
                  <div class="panel-title"> Media  Setting</div>
               </div>
                <div class="panel-body">

                  <div class="form-group col-md-3">
                  <label for="name">Logo : </label>
                  @if($setting['logo_url'])
                  <img src="{{$setting['logo_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                  <input type="file" name="logo">
                 </div>

                  <div class="form-group col-md-3">
                  <label for="name">Fav : </label>
                  @if($setting['fav_url'])
                  <img src="{{$setting['fav_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <input type="file" name="fav">
                 </div>

                 <div class="form-group col-md-3">
                  <label for="name">Banner : </label>
                  @if($setting['banner_url'])
                  <img src="{{$setting['banner_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <input type="file" name="banner">
                 </div>

                 <div class="form-group col-md-3">
                  <label for="name">Image 1 : </label>
                  @if($setting['img1_url'])
                  <img src="{{$setting['img1_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <div style="display: flex;">
                       <input type="file" name="img1" style="margin-top: 10px;">
                       <input type="text" class="form-control" name="link_1" placeholder="Image Link">
                   </div>
                 </div>

                 <div class="form-group col-md-3">
                  <label for="name">Image 2 : </label>
                  @if($setting['img2_url'])
                  <img src="{{$setting['img2_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <div style="display: flex;">
                       <input type="file" name="img2" style="margin-top: 10px;">
                       <input type="text" class="form-control" name="link_2" placeholder="Image Link">
                   </div>
                 </div>

                 <div class="form-group col-md-3">
                  <label for="name">Image 3 : </label>
                  @if($setting['img3_url'])
                  <img src="{{$setting['img3_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <div style="display: flex;">
                       <input type="file" name="img3" style="margin-top: 10px;">
                       <input type="text" class="form-control" name="link_3" placeholder="Image Link">
                   </div>
                 </div>

                 <div class="form-group col-md-3">
                  <label for="name">Image 4 : </label>
                  @if($setting['img4_url'])
                  <img src="{{$setting['img4_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <div style="display: flex;">
                       <input type="file" name="img4" style="margin-top: 10px;">
                       <input type="text" class="form-control" name="link_4" placeholder="Image Link">
                   </div>
                 </div>


                 <div class="form-group col-md-3">
                  <label for="name">Image 5 : </label>
                  @if($setting['img5_url'])
                  <img src="{{$setting['img5_url']}}"  width="100%" height="145px">
                  @else
                  <img src="{{asset('image/icon.png')}}"  width="100%" height="145px">
                  @endif
                   <div style="display: flex;">
                       <input type="file" name="img5" style="margin-top: 10px;">
                       <input type="text" class="form-control" name="link_5" placeholder="Image Link">
                   </div>
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

    $('#mediaSetting').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $(document).find("span.text-danger").remove();
        $.ajax({
            type:'POST',
            url: "{{ route('setting.image') }}",
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