<?php
namespace App\Repositories\Permission;
interface PermissionInterface 
{
    public function all();
    public function store($request);
    public function getById($id);
    public function update($request,$id);
    public function delete($id);
}