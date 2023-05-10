<?php
namespace App\Repositories\Role;
use App\Repositories\Role\RoleInterface;
use App\Models\Role;
class RoleRepository implements RoleInterface 
{
    private $model;
    public function __construct(Role $model)
    {
     $this->model = $model;
    }

   public function all(){
      return Role::orderByDesc('id')->get();
    }

     public function store($request){
        $createData = new Role();
        $createData->name = $request->name;   
        return $createData->save();
       }
   

    public function getById($id){
     return $this->model->findOrFail($id);
    }

    public function update($request,$id){
        $updateData = Role::where('id',$id)->first();
        $updateData->name = $request['name'];
        $updateData->update();

     }

    //data delete
    public function delete($id){
     $deleteData = Role::whereId($id)->first();
     $deleteData->delete();

    }

}