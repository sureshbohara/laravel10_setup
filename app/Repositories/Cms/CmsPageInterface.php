<?php
namespace App\Repositories\Cms;
interface CmsPageInterface
{
    
    public function all();
    public function store($request);
    public function update($request,$id);
    public function delete($id);

}
