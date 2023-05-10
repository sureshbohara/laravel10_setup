<?php
namespace App\Repositories\Subscriber;
interface SubscriberInterface
{
    public function all();
    public function store($request);
    public function delete($id);
    // public function update($request,$id);

}
