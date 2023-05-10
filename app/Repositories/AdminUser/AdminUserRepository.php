<?php
namespace App\Repositories\AdminUser;
use App\Models\Admin;
use Auth;
class AdminUserRepository implements AdminUserInterface{

    protected $model;
    public function __construct(Admin $model) {
        $this->model = $model;
    }


    public function getAll() {
        return Admin::orderByDesc('id')
        ->where('id', '!=', Auth::guard('admin')->id())
        ->get();
    }


     public function store($request) {
      $adminData = new Admin();
      $adminData->name = $request['name'];
      $adminData->email = $request['email'];
      $adminData->password = bcrypt($request['password']);
      $adminData->address = $request['address'];
      $adminData->type = $request['type'];
      $adminData->mobile_number = $request['mobile_number'];
      $adminData->gender = $request['gender'];
      $adminData->user_post = $request['user_post'];
      $adminData->facebook = $request['facebook'];
      $adminData->instagram = $request['instagram'];
      $adminData->twiter = $request['twiter'];
      $adminData->linkedin = $request['linkedin'];
      $adminData->bio = $request['bio'];
      return $adminData->save();
    }


    public function getById($id) {
      return $this->model->findOrFail($id);
    }

    public function update($request, $id) {
      $adminData = Admin::findOrFail($id);
      $adminData->name = $request['name'];
      $adminData->email = $request['email'];
      $adminData->address = $request['address'];
      $adminData->type = $request['type'];
      $adminData->mobile_number = $request['mobile_number'];
      $adminData->gender = $request['gender'];
      $adminData->user_post = $request['user_post'];
      $adminData->facebook = $request['facebook'];
      $adminData->instagram = $request['instagram'];
      $adminData->twiter = $request['twiter'];
      $adminData->linkedin = $request['linkedin'];
      $adminData->bio = $request['bio'];
      $adminData->update();
        
    }

     public function delete($id){
        $adminData = Admin::whereId($id)->first();
        $adminData->delete();
    }

   




}
