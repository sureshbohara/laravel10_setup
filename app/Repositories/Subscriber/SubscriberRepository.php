<?php
namespace App\Repositories\Subscriber;
use App\Repositories\Subscriber\SubscriberInterface;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;
class SubscriberRepository implements SubscriberInterface{

	 private $model;
    public function __construct(Subscriber $model)
    {
     $this->model = $model;
    }

	   public function all(){
	   return Subscriber::orderByDesc('id')->get();
	  }

    public function store($request){
        $subscriber = $this->model->create([
          'email' => $request['email'],
          'name' => $request['name'],
          'status' => $request['status'],
        ]);
        return $subscriber;
       
       }

    // public function update($request,$id){
    //     $updateData = Subscriber::where('id',$id)->first();
    //     $updateData->name = $request['name'];
    //     $updateData->email = $request['email'];
    //     $updateData->update();


    //  }

    public function delete($id){
     $subscriberData = Subscriber::whereId($id)->first();
     $subscriberData->delete();
    }

 

 }
