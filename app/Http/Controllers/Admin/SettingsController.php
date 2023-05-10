<?php
namespace App\Http\Controllers\Admin;
use App\Models\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SystemSettingRequest;
class SettingsController extends Controller
{
    public function settingGeneral(SystemSettingRequest $request){
      $setting = Settings::find(1);
       if($request->isMethod('POST')){
        $data = $request->all();
        $data = Settings::find(1);
        $data->system_name = $request->get('system_name');
        $data->email = $request->get('email');
        $data->email1 = $request->get('email1');
        $data->phone = $request->get('phone');
        $data->contact = $request->get('contact');
        $data->address = $request->get('address');
        $data->address1 = $request->get('address1');
        $data->opening_hr = $request->get('opening_hr');
        $data->facebook = $request->get('facebook');
        $data->twitter = $request->get('twitter');
        $data->linkedin = $request->get('linkedin');
        $data->instagram = $request->get('instagram');
        $data->webiste = $request->get('webiste');
        $data->github = $request->get('github');
        $data->title1 = $request->get('title1');
        $data->title2 = $request->get('title2');
        $data->title3 = $request->get('title3');
        $data->title4 = $request->get('title4');
        $data->title5 = $request->get('title5');
        $data->title6 = $request->get('title6');
        $data->update();
        $message = "Data Update Successfully!!";
        return response()->json(['settingGeneral'=>$data,'msg'=>$message]);
        }
        return view('admin.setting.general_setting',compact('setting'));
    }


    public function smtpSetting(SystemSettingRequest $request){
       $setting = Settings::find(1);
       if($request->isMethod('POST')){
          $data = $request->all();
          $data = Settings::find(1);
          $data->mail_transport = $request->get('mail_transport');
          $data->mail_host = $request->get('mail_host');
          $data->mail_port = $request->get('mail_port');
          $data->mail_username = $request->get('mail_username');
          $data->mail_password = $request->get('mail_password');
          $data->mail_encryption = $request->get('mail_encryption');
          $data->mail_from = $request->get('mail_from');
          $data->mail_from_name = $request->get('mail_from_name');
          $data->update();
         $message = "Data Update Successfully!!";
        return response()->json(['settingGeneral'=>$data,'msg'=>$message]);
     }
     return view('admin.setting.smtp_setting',compact('setting'));
    }

    public function googleSeting(SystemSettingRequest $request){
       $setting = Settings::find(1);
       if($request->isMethod('POST')){
          $data = $request->all();
          $data = Settings::find(1);
          $data->google_analytic_id = $request->get('google_analytic_id');
          $data->is_analytic = $request->get('is_analytic');
          $data->google_recaptcha_site_key = $request->get('google_recaptcha_site_key');
          $data->google_recaptcha_secret_key = $request->get('google_recaptcha_secret_key');
          $data->is_recaptcha = $request->get('is_recaptcha');
          $data->cookie_consent_message = $request->get('cookie_consent_message');
          $data->cookie_consent_btn_text = $request->get('cookie_consent_btn_text');
          $data->is_cookie = $request->get('is_cookie');
          $data->is_maintainance = $request->get('is_maintainance');
          $data->maintainance_text = $request->get('maintainance_text');
          $data->update();

          if(request()->hasFile('maintainance')){
            $data->clearMediaCollection('maintainance');
            $data->addMediaFromRequest('maintainance')->toMediaCollection('maintainance');
          }

         $message = "Data Update Successfully!!";
        return response()->json(['settingGeneral'=>$data,'msg'=>$message]);
     }
     return view('admin.setting.google_setting',compact('setting'));
    }


     public function imageSeting(Request $request){
       $setting = Settings::find(1);
       if($request->isMethod('POST')){
          $data = $request->all();
          $data = Settings::find(1);
          $data->link_1 = $request->get('link_1');
          $data->link_2 = $request->get('link_2');
          $data->link_3 = $request->get('link_3');
          $data->link_4 = $request->get('link_4');
          $data->link_5 = $request->get('link_5');
          $data->update();

          if(request()->hasFile('logo')){
            $data->clearMediaCollection('logo');
            $data->addMediaFromRequest('logo')->toMediaCollection('logo');
          }

          if(request()->hasFile('fav')){
            $data->clearMediaCollection('fav');
            $data->addMediaFromRequest('fav')->toMediaCollection('fav');
          }

          if(request()->hasFile('banner')){
            $data->clearMediaCollection('banner');
            $data->addMediaFromRequest('banner')->toMediaCollection('banner');
          }

          
          if(request()->hasFile('img1')){
            $data->clearMediaCollection('img1');
            $data->addMediaFromRequest('img1')->toMediaCollection('img1');
          }
          if(request()->hasFile('img2')){
            $data->clearMediaCollection('img2');
            $data->addMediaFromRequest('img2')->toMediaCollection('img2');
          }

          if(request()->hasFile('img3')){
            $data->clearMediaCollection('img3');
            $data->addMediaFromRequest('img3')->toMediaCollection('img3');
          }
          if(request()->hasFile('img4')){
            $data->clearMediaCollection('img4');
            $data->addMediaFromRequest('img4')->toMediaCollection('img4');
          }
          if(request()->hasFile('img5')){
            $data->clearMediaCollection('img5');
            $data->addMediaFromRequest('img5')->toMediaCollection('img5');
          }


         $message = "Data Update Successfully!!";
        return response()->json(['settingGeneral'=>$data,'msg'=>$message]);
     }
     return view('admin.setting.media_setting',compact('setting'));
    }


    public function otherSeting(Request $request){
       $setting = Settings::find(1);
        if($request->isMethod('POST')){
          $data = $request->all();
          $data = Settings::find(1);
          $data->twilio_sid = $request->get('twilio_sid');
          $data->twilio_token = $request->get('twilio_token');
          $data->twilio_form_number = $request->get('twilio_form_number');
          $data->twilio_country_code = $request->get('twilio_country_code');
          $data->meta_title = $request->get('meta_title');
          $data->meta_keywords = $request->get('meta_keywords');
          $data->meta_description = $request->get('meta_description');
           $data->currency_name = $request->get('currency_name');
           $data->currency_sign = $request->get('currency_sign');
           $data->currency_value = $request->get('currency_value');
          $data->update();
          $message = "Data Update Successfully!!";
        return response()->json(['settingGeneral'=>$data,'msg'=>$message]);
     }
     return view('admin.setting.other_setting',compact('setting'));
    }


    public function introductionSetting(Request $request){
         $setting = Settings::find(1);
         if($request->isMethod('POST')){
          $data = $request->all();
          $data = Settings::find(1);
          $data->introduction = $request->get('introduction');
          $data->our_vision = $request->get('our_vision');
          $data->our_mission = $request->get('our_mission'); 
          $data->update();
          $message = "Data Update Successfully!!";
         return response()->json(['msg'=>$message]);
        }
     return view('admin.setting.introduction_setting',compact('setting'));
    }

}
