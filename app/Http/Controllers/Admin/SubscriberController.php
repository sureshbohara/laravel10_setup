<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Repositories\Subscriber\SubscriberInterface;
use App\Http\Requests\SubscriberRequest;
use Auth;
use Carbon\Carbon;
use App\Mail\SubscriptionConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SubscriberNotification;
use Illuminate\Support\Facades\Notification;
class SubscriberController extends Controller
{
    private $repository;
    public function __construct(SubscriberInterface $repository)
    {
      $this->repository = $repository;
    }

     public function index(){
      $subscriberData = $this->repository->all();
     return view('admin.setting.subscriber',compact('subscriberData'));
    }

      public function store(SubscriberRequest $request){
         $subscriber = $this->repository->store($request);
         Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber));
        $message = "You have been subscribed to our newsletter.";
       return response()->json(['msg'=>$message]);
            
    }


    // public function update(Request $request,$id){
    //   $this->repository->update($request, $id);
    //   $message = "Data Updated Successfully";
    //   return response()->json(['msg'=>$message]);

    // }

    public function destroy($id){
    $this->repository->delete($id);
    return back(); 
    }


    public function confirmSubscription(Subscriber $subscriber){
     Subscriber::where('email', $subscriber->email)->update(['status' => 'Success']); 
   return redirect()->route('subscribers.index');
  }




    public function allUser(Request $request){
       $customerData = Subscriber::all();
       foreach($customerData as $emailsData){
        $name = $request->name;
        $body = $request->body;
        Notification::send($emailsData, new SubscriberNotification($name,$body)); 
       }
      $message = "Notification Send Successfully!!";
      return response()->json(['msg'=>$message]);
    }


  public function singleUserEmail(Request $request, $id){
        $user = Subscriber::find($id);
        $name = $request->name;
        $body = $request->body;
        Notification::send($user, new SubscriberNotification($name,$body));
        $message = "Notification Send Successfully!!";
        return response()->json(['msg'=>$message]);
    }


    
}
