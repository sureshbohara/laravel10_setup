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
               <form id="updatePermission" method="post" action="{{route('permissions.update',$permission['id'])}}">
                  @csrf
                  @method('PUT')
                  <div class="panel-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>User Role  <span style="color:red;"> * </span></label>
                           <select class="form-control" name="role_id">
                              <option value="">---select role option---</option>
                              @foreach(\App\Models\Role::where('status',1)->get() as $role)
                              <option value="{{$role->id}}" @if($role->id == $permission->role_id) selected @endif>{{$role->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <button type="submit" class="btn btn-success" style="margin-top: 25px;">Update User Permission</button>
                        </div>
                     </div>
                     <table class="table table-bordered border-primary">
                        <thead>
                           <tr>
                              <th scope="col"><i class="fa fa-unlock" aria-hidden="true"></i> Access</th>
                              <th scope="col"><i class="fa fa-plus-circle"></i> Add</th>
                              <th scope="col"><i class="fa fa-edit"></i> Edit</th>
                              <th scope="col"><i class="fa fa-eye"></i> View</th>
                              <th scope="col"><i class="fa fa-trash"></i> Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th scope="col">Users</th>
                              <td><input type="checkbox" name="permission[user][add]" value="1" @isset($permission['permission']['user']['add']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[user][edit]" value="1" @isset($permission['permission']['user']['edit']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[user][view]" value="1" @isset($permission['permission']['user']['view']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[user][delete]" value="1" @isset($permission['permission']['user']['delete']) checked @endisset></td>
                           </tr>
                           <tr>
                              <th scope="col">Role</th>
                              <td><input type="checkbox" name="permission[role][add]" value="1" @isset($permission['permission']['role']['add']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[role][edit]" value="1" @isset($permission['permission']['role']['edit']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[role][view]" value="1" @isset($permission['permission']['role']['view']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[role][delete]" value="1" @isset($permission['permission']['role']['delete']) checked @endisset></td>
                           </tr>
                           <tr>
                              <th scope="col">Permission</th>
                              <td><input type="checkbox" name="permission[permission][add]" value="1" @isset($permission['permission']['permission']['add']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[permission][edit]" value="1" @isset($permission['permission']['permission']['edit']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[permission][view]" value="1" @isset($permission['permission']['permission']['view']) checked @endisset></td>
                              <td><input type="checkbox" name="permission[permission][delete]" value="1" @isset($permission['permission']['permission']['delete']) checked @endisset></td>
                           </tr>

                        </tbody>
                     </table>
                  </div>
               </form>
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
   $('#updatePermission').submit(function(e){
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
                    window.location.href="/admin/permissions"
                }
            },
            
       });
    });
   
</script>
@endsection