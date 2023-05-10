@if(Session::has('success'))
 <script>
     swal('Success', '{{ Session::get('success') }}', 'success');
 </script>
@endif

@if(Session::has('error'))
 <script>
     swal('Error', '{{ Session::get('error') }}', 'error');
 </script>
@endif
