<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\Role\RoleInterface;
use App\Http\Requests\RoleRequest;
use Session;
use Auth;
class RoleController extends Controller
{
    
    private $repository;
    public function __construct(RoleInterface $repository){
      $this->repository = $repository;
      $this->middleware('auth:admin');
    }

     public function index(){
      $roleData = $this->repository->all();
     return view('admin.role.index',['roleData'=>$roleData]);
    }

      public function store(RoleRequest $request){
        $this->repository->store($request);
        return response()->json(['msg'=>'Data Created Successfully!!']);       
    }


    public function update(Request $request,$id){
      $this->repository->update($request->all(),$id);
      return response()->json(['msg'=>'Data Updated Successfully!!']);
    }

   //data delete form database
    public function destroy($id){
     $this->repository->delete($id);
     return back(); 
    }

   public function changeRoleStatus(Request $request){
        $id = $request->get('role_id');
        $data = Role::find($id);
        if($data->status == 1) {
        $data->status = 0;
        }else {
        $data->status = 1;
        }
        $data->update(); 
        return back();
    }

}
