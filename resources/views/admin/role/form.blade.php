<form id="addRole" method="post" enctype="multipart/form-data">@csrf
<div class="panel-body">
      <div class="form-group col-md-12">
         <label>User Role  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="name" placeholder="Page Name">
      </div>
</div>

  <div class="panel-footer">
      <button type="reset" class="btn btn-o btn-default">Reset Data</button>
      <button type="submit" class="btn btn-success">Create New Role</button>
  </div>
 </form>