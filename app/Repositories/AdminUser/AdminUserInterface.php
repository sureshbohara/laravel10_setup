<?php
namespace App\Repositories\AdminUser;
interface AdminUserInterface
{
    public function getAll();
    public function store($request);
    public function update($request, $id);
    public function delete($id);
    public function getById($id);
   


}
