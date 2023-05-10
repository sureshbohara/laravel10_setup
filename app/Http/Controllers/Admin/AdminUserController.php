<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Repositories\AdminUser\AdminUserInterface;
use App\Http\Requests\AdminUserRequest;
class AdminUserController extends Controller
{
    

    protected $repository;
    public function __construct(AdminUserInterface $repository){
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }
    

    public function index() {
      $getData = $this->repository->getAll();
      return view('admin.users.index', compact('getData'));
     }

     public function store(AdminUserRequest $request) {
        $data = $request->all();
        $user = $this->repository->store($data);
        $message = "Data Created Successfully!!";
        return response()->json(['user'=>$user,'msg'=>$message]);
    }

     public function edit($id){
      $editData = $this->repository->getById($id);
     return view('admin.users.edit',compact('editData'));
     }

      public function update(Request $request,$id){
       $this->repository->update($request->all(),$id);
      return response()->json(['msg'=>'Data Updated Successfully!!']);

    }

    public function destroy($id){
        $this->repository->delete($id);
        return back();
    }

    public function changeStatus(Request $request){
        $id = $request->get('admin_id');
        $data = Admin::find($id);
        if($data->status == 1) {
          $data->status = 0;
         }else {
          $data->status = 1;
        }
        $data->update();
        return back(); 
    }


}
