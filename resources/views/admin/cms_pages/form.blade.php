<form id="addCmsPage" method="post" enctype="multipart/form-data">@csrf
<div class="panel-body">
      <div class="form-group col-md-6">
         <label>Page Name  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="name" placeholder="Page Name">
      </div>
      <div class="form-group col-md-6">
         <label>Page Type  <span style="color:red;"> * </span></label>
         <select name="type" class="form-control">
            <option value="">---select option---</option>
            <option value="header"> Header Page</option>
            <option value="footer"> Footer Page </option>
         </select>
      </div>
      <div class="form-group col-md-12">
         <label>Page Description  <span style="color:red;"> * </span></label>
         <textarea class="form-control" rows="10" name="content" placeholder="Type your page content here"></textarea>
      </div>
</div>

  <div class="panel-footer">
      <button type="reset" class="btn btn-o btn-default">Reset Data</button>
      <button type="submit" class="btn btn-success">Create New Page</button>
  </div>
 </form>