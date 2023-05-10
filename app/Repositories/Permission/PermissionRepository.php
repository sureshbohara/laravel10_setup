<?php
namespace App\Repositories\Permission;
use App\Repositories\Permission\PermissionInterface;
use App\Models\Permission;
class PermissionRepository implements PermissionInterface 
{
    private $model;
    public function __construct(Permission $model)
    {
     $this->model = $model;
    }

   public function all(){
      return Permission::orderByDesc('id')->get();
    }

     public function store($request){
        $createData = new Permission();
        $createData->permission = $request->permission;
        $createData->role_id = $request->role_id;   
        return $createData->save();
       }
   

    public function getById($id){
     return $this->model->findOrFail($id);
    }

    public function update($request,$id){
        $updateData = Permission::where('id',$id)->first();
        $updateData->permission = $request['permission'];
        $updateData->role_id = $request['role_id'];
        $updateData->update();

     }

    //data delete
    public function delete($id){
     $deleteData = Permission::whereId($id)->first();
     $deleteData->delete();

    }

}