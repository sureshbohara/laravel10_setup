<form id="addAdminUser" method="post" enctype="multipart/form-data">@csrf
<div class="panel-body">

      <div class="form-group col-md-3">
         <label>User Type  <span style="color:red;"> * </span></label>
         <select name="type" class="form-control">
           <option value="">--- select type ---</option>
           <option value="admin"> Admin </option>
           <option value="employeer"> Employeer </option>
         </select>
      </div>

      <div class="form-group col-md-3">
         <label>User Name  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="name" placeholder="User Name">
      </div>

      <div class="form-group col-md-3">
         <label>User Address  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="address" placeholder="User Address">
      </div>

      <div class="form-group col-md-3">
         <label>User Mobile Number  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="mobile_number" placeholder="User Mobile Number">
      </div>

      <div class="form-group col-md-3">
         <label>Gender  <span style="color:red;"> * </span></label>
          <select name="gender" class="form-control">
           <option value="">--- select Gender ---</option>
           <option value="Male"> Male </option>
           <option value="Female"> Female </option>
           <option value="Other"> Other </option>
         </select>
      </div>

      <div class="form-group col-md-3">
         <label>User Post  <span style="color:red;"> * </span></label>
         <input type="text" class="form-control" name="user_post" placeholder="User Post eg:Sr.Developer">
      </div>

      <div class="form-group col-md-3">
         <label>Facebook </label>
         <input type="text" class="form-control" name="facebook" placeholder="Facebook Link">
      </div>
      <div class="form-group col-md-3">
         <label>Instagram </label>
         <input type="text" class="form-control" name="instagram" placeholder="Instagram Link">
      </div>
      <div class="form-group col-md-3">
         <label>Twiter </label>
         <input type="text" class="form-control" name="twiter" placeholder="Twiter Link">
      </div>

      <div class="form-group col-md-3">
         <label>Linkedin </label>
         <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Link">
      </div>

      <div class="form-group col-md-3">
         <label>Email <span style="color:red;"> * </span></label>
         <input type="email" class="form-control" name="email" placeholder="Email Address">
      </div>

      <div class="form-group col-md-3">
         <label>Password <span style="color:red;"> * </span></label>
         <input type="password" class="form-control" name="password" id="password" placeholder="Password">
         <span class="passwordShow">
            <i class="fa fa-eye-slash" id="eye" onclick="toggle()"></i>
         </span>
      </div>

      <div class="form-group col-md-12">
         <label>User BIO </label>
         <textarea name="bio" id="bio" class="form-control" rows="5"></textarea>
         <span class="passwordShow" id="count">0</span>
      </div>

</div>

  <div class="panel-footer">
      <button type="reset" class="btn btn-o btn-default">Reset Data</button>
      <button type="submit" class="btn btn-success">Create New User</button>
  </div>
 </form>