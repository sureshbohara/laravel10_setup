<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\ChatApplicationController;


/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin

Route::group(['prefix' =>'admin', 'middleware' => ['admin']], function(){
  Route::match(['GET','POST'],'setting/general',[SettingsController::class,'settingGeneral'])->name('setting.general');

  Route::match(['GET','POST'],'setting/smtp',[SettingsController::class,'smtpSetting'])->name('setting.smtp');

  Route::match(['GET','POST'],'setting/google',[SettingsController::class,'googleSeting'])->name('setting.google');

  Route::match(['GET','POST'],'setting/image',[SettingsController::class,'imageSeting'])->name('setting.image');

  Route::match(['GET','POST'],'setting/other',[SettingsController::class,'otherSeting'])->name('setting.other');
  Route::match(['GET','POST'],'setting/introduction',[SettingsController::class,'introductionSetting'])->name('setting.introduction');


  Route::resource('subscribers',SubscriberController::class);
  
  Route::match(['GET','POST'],'confirm/subscriber',[SubscriberController::class,'confirmSubscription'])->name('confirm.subscription');


   Route::post('user/send/all', [SubscriberController::class, 'allUser'])->name('email.send.all');
   Route::post('user/send/{id}', [SubscriberController::class, 'singleUserEmail'])->name('email.send');


  Route::match(['GET','POST'],'system/backup',[BackupController::class,'systemBackup'])->name('system.backup');

  Route::match(['GET','POST'],'database/backup',[BackupController::class,'databaseBackup'])->name('database.backup');

Route::match(['GET','POST'],'chat/boot',[ChatApplicationController::class,'userChatBoot'])->name('user.chat.boot');



});
