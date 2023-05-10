<?php
namespace App\Repositories\Cms;
use App\Models\CmsPage;
class CmsPageRepository implements CmsPageInterface{

    protected $model;
    public function __construct(CmsPage $model){
    $this->model = $model;
    }

    public function all(){
      return CmsPage::orderByDesc('id')->get();
    }

    public function store($request){
      $cmsData = new CmsPage();
      $cmsData->name = $request->name;
      $cmsData->type = $request->type;
      $cmsData->content = $request->content;
      $cmsData->save();
    }


    public function update($request,$id){
     $cmsData = CmsPage::findOrFail($id);
     $cmsData->name = $request['name'];
     $cmsData->type = $request['type'];
     $cmsData->content = $request['content'];
     $cmsData->update(); 
     }

    public function delete($id){
        $cmsPage = CmsPage::whereId($id)->first();
        $cmsPage->delete();
    }
}
