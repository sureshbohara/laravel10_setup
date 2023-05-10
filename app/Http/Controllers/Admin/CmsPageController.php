<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Repositories\Cms\CmsPageInterface;
use App\Http\Requests\CmsPageRequest;
class CmsPageController extends Controller
{
    protected $repository;
    public function __construct(CmsPageInterface $repository){
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }

     public function index(){
      $getData = $this->repository->all();
      return view('admin.cms_pages.index',['getData'=>$getData]);

    }


    public function store(CmsPageRequest $request){
        $this->repository->store($request);
        return response()->json(['msg'=>'Data Created Successfully!!']);
    }


     public function update(Request $request,$id){
        $this->repository->update($request, $id);
        return response()->json(['msg'=>'Data Updated Successfully!!']);
    }

    public function destroy($id){
        $this->repository->delete($id);
        return back();
    }


    public function changeStatus(Request $request){
        $id = $request->get('cms_id');
        $data = CmsPage::find($id);
        if($data->status == 1) {
          $data->status = 0;
         }else {
          $data->status = 1;
        }
        $data->update();
        return back(); 
    }


    public function highliteStatus(Request $request,$id){
         $changeData = CmsPage::findOrFail($id);
         $changeData->type = $request->type;
         $changeData->update();
         return back();
    }

}
