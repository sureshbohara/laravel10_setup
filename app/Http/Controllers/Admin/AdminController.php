<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use Hash;
class AdminController extends Controller
{
    public function dashboard(){
     return view('admin.dashboard');
    }

    public function adminLogin(Request $request){
       if($request->isMethod('post')){
         $data = $request->all();

           $rules = [
            "email" => "required|string|email|max:255",
            "password" => "required|max:30"
           ]; 
           $customMessage = [
            'email.required' => "Email is required",
            'email.email' => "Valid Email is required",
            'password.required' => "Password is required"
           ];
           $this->validate($request,$rules,$customMessage);
           $userStatus = Admin::where('email',$data['email'])->first();
           if($userStatus === null) {
              $message = "email not found";
               return response()->json(["status"=>false,"msg"=>$message]);
            }else if($userStatus->status == 0){
             $message = "Your account is not active";
             return response()->json(["status"=>false,"msg"=>$message]);
           }else{
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
              // remember me admin email and password cookie
                if(isset($data['remember']) &&!empty($data['remember'])){
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }
             $message = "User login Successfully!";
             return response()->json(["status"=>true,"msg"=>$message]);
            }else{
             $message = "Your Email or Password incorrect!";
             return response()->json(["status"=>false,"msg"=>$message]);
          }
        } 

      }
      return view('admin.login');  
    }

    public function adminLogout(Request $request){
       $request->session()->flush();
       Auth::logout();
       Session::flash('success', 'You have been successfully logged out.');
       return redirect()->route('admin.logout');
    }

    public function updatePassword(Request $request){
       if($request->isMethod('post')){
        $data = $request->all();
         $rules =  [
         'current_password' => 'required',
         'new_password' => 'required|min:6|confirmed',
         ];
         $customMessage = [
              'current_password.required' => 'The current password field is required.',
              'new_password.required' => 'The new password field is required.',
              'new_password.min' => 'The new password must be at least 6 characters.',
              'new_password.confirmed' => 'The new password confirmation does not match.',
           ];

         $this->validate($request, $rules, $customMessage);
         $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();
         if(Hash::check($data['current_password'], $user->password)) {
         $user->password = Hash::make($data['new_password']);
         $user->save();
         $message = "Password changed successfully!!";
         return response()->json(['msg'=>$message]);
         }else{
          return response()->json(['msg'=>['current_password'=>['Current password is incorrect.']]], 422);
         }
       }
    }


  public function updateAdminDetails(Request $request){
   $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
   
   if($request->isMethod('post')){
    $data = $request->all();
    $rules = [
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'address' => 'required|string|max:255',
      'mobile_number' => 'required|string|max:10'
    ];
    $messages = [
      'name.required' => 'The name field is required.',
      'email.required' => 'The email field is required.',
      'email.email' => 'The email must be a valid email address.',
      'address.required' => 'The address field is required.',
      'mobile_number.required' => 'The mobile number field is required.',
      'mobile_number.max' => 'The mobile number field may not be greater than :max characters.',
    ];
    $validatedData = $request->validate($rules, $messages);
    $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->address = $data['address'];
    $user->mobile_number = $data['mobile_number'];
    $user->gender = $data['gender'];
    $user->user_post = $data['user_post'];
    $user->facebook = $data['facebook'];
    $user->instagram = $data['instagram'];
    $user->twiter = $data['twiter'];
    $user->linkedin = $data['linkedin'];
    $user->bio = $data['bio'];

    if(request()->hasFile('image')){
      $user->clearMediaCollection('image');
      $user->addMediaFromRequest('image')->toMediaCollection('image');
    }

    if(request()->hasFile('banner')){
      $user->clearMediaCollection('banner');
      $user->addMediaFromRequest('banner')->toMediaCollection('banner');
    }

    $user->save();
    $message = "Profile updated successfully !!";
    return response()->json(['msg'=>$message]);
  }
  return view('admin.setting.user_details',compact('adminDetails'));  
}


 public function accountDelete(Request $request){
    $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $user->delete();
    return redirect('/admin')->with('success', 'Your account has been deleted.');
}


public function adminProfile(){
 $adminProfile = Admin::where('email',Auth::guard('admin')->user()->email)->first();
 return view('admin.setting.admin_profile',compact('adminProfile'));   
}

}
