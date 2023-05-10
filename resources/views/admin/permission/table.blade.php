<form id="addPermission" method="post">@csrf
<div class="panel-body">
  <div class="row">

     <div class="form-group col-md-6">
         <label>User Role  <span style="color:red;"> * </span></label>
         <select class="form-control" name="role_id">
            <option value="">---select role option---</option>
            @foreach(\App\Models\Role::where('status',1)->get() as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
         </select>
      </div>

      <div class="form-group col-md-6">
         <button type="submit" class="btn btn-success" style="margin-top: 25px;">Create New Permission</button>
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
            <th scope="col">User</th>
            <td><input type="checkbox" name="permission[user][add]" value="1"></td>
            <td><input type="checkbox" name="permission[user][edit]" value="1"></td>
            <td><input type="checkbox" name="permission[user][view]" value="1"></td>
            <td><input type="checkbox" name="permission[user][delete]" value="1"></td>
         </tr>
         <tr>
            <th scope="col">Role</th>
            <td><input type="checkbox" name="permission[role][add]" value="1"></td>
            <td><input type="checkbox" name="permission[role][edit]" value="1"></td>
            <td><input type="checkbox" name="permission[role][view]" value="1"></td>
            <td><input type="checkbox" name="permission[role][delete]" value="1"></td>
         </tr>
         <tr>
            <th scope="col">Permission</th>
            <td><input type="checkbox" name="permission[permission][add]" value="1"></td>
            <td><input type="checkbox" name="permission[permission][edit]" value="1"></td>
            <td><input type="checkbox" name="permission[permission][view]" value="1"></td>
            <td><input type="checkbox" name="permission[permission][delete]" value="1"></td>
         </tr>



      </tbody>
   </table>
</div>
</form>