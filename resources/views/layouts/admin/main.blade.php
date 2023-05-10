<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="{{asset('backend/css/theme.css')}}">
      <link rel="stylesheet" href="{{asset('backend/css/demo.css')}}">
      <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <script>
        // global variable
         var sender_id = @json(Auth::guard('admin')->user()->id);
         var receover_id;
      </script>
   </head>
   <body> 
     @include('admin.message')
     @include('layouts.admin.header')
     @yield('content')
      
      <script src="{{asset('backend/js/jquery-2.2.4.min.js')}}"></script>
      <script src="{{asset('custom.js')}}"></script>
      <script src="{{asset('backend/components/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('backend/js/moment-with-locales.js')}}"></script>
      <script src="{{asset('backend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('backend/js/jquery.stellar.min.js')}}"></script>
      <script src="{{asset('backend/js/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{asset('backend/js/pnotify.custom.min.js')}}"></script>
      <script src="{{asset('backend/components/jstree/jstree.min.js')}}"></script>
      <script src="{{asset('backend/js/general.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
      <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    

 <script>
document.addEventListener('DOMContentLoaded', function (){
$('.show_confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
      title: `Are you sure you want to delete this record?`,
      text: "All contents related with this item will be lost. Do you want to delete it?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      form.submit();
    }
  });
});

});
 </script>
   </body>
</html>