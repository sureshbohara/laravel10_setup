<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Repositories\Permission\PermissionInterface;
use App\Http\Requests\PermissionRequest;
use Session;
use Auth;
class PermissionController extends Controller
{
 
    private $repository;
    public function __construct(PermissionInterface $repository)
    {
      $this->repository = $repository;
      $this->middleware('auth:admin');
    }
     public function index(){
      $permissionsData = $this->repository->all();
      return view('admin.permission.index',['permissionsData'=>$permissionsData]);
    }
     public function store(PermissionRequest $request){
        $this->repository->store($request);
        return response()->json(['msg'=>'Data Created Successfully!!']);
            
    }

     public function edit($id){
      $permission = $this->repository->getById($id);
     return view('admin.permission.edit',compact('permission'));
     }

     public function update(Request $request,$id){
      $this->repository->update($request->all(),$id);
      return response()->json(['msg'=>'Data Updated Successfully!!']);

    }

    public function destroy($id){
    $this->repository->delete($id);
    return back(); 
    }
    
}
