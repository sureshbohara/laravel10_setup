<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AdminUserController;

// admin route
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::match(['get','post'],'/',[AdminController::class,'adminLogin'])->name('admin.login');

    Route::group(['middleware'=>['admin']],function(){
       Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
       Route::get('logout',[AdminController::class,'adminLogout'])->name('admin.logout'); 

       Route::match(['GET','POST'],'update/password',[AdminController::class,'updatePassword'])->name('update.password');

       Route::match(['GET','POST'],'update',[AdminController::class,'updateAdminDetails'])->name('update.details'); 

       Route::match(['GET','POST'],'account/delete',[AdminController::class,'accountDelete'])->name('account.delete'); 

       Route::get('profile',[AdminController::class,'adminProfile'])->name('profile');

       Route::resource('adminuser', AdminUserController::class);
       Route::post('change/status', [AdminUserController::class,'changeStatus'])->name('change.status');

       // cms page route
       Route::resource('cmspage', CmsPageController::class);
       Route::post('cms/status', [CmsPageController::class,'changeStatus'])->name('cmspage.status'); 
       Route::post('cms/highlite/{id}', [CmsPageController::class,'highliteStatus'])->name('cmspage.highlite'); 

     //role and permission
      Route::resource('role',RoleController::class);
      Route::post('role/status', [RoleController::class, 'changeRoleStatus'])->name('role.status');
      Route::resource('permissions',PermissionController::class);


   Route::get('/admin/dashboard', function() {
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      Alert::success('Cache Cleared', 'System Cache Has Been Removed.');
      return redirect()->route('dashboard');
 })->name('cache.clear');

  });  
});
Route::get('/', function () {
    echo "Hello Home Page";
});




