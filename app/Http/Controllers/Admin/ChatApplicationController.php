<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
class ChatApplicationController extends Controller
{
    public function userChatBoot(){
        $adminUsers = Admin::where('id', '!=', Auth::guard('admin')->id())->get();
        return view('admin.chat_boot.index',compact('adminUsers'));
    }
}
