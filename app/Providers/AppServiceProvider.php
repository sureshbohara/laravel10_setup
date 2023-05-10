<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Cms\CmsPageRepository;
use App\Repositories\Cms\CmsPageInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\AdminUser\AdminUserRepository;
use App\Repositories\AdminUser\AdminUserInterface;
use App\Repositories\Subscriber\SubscriberRepository;
use App\Repositories\Subscriber\SubscriberInterface;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Settings;
use Config;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(CmsPageInterface::class, CmsPageRepository::class);
        $this->app->bind(AdminUserInterface::class, AdminUserRepository::class);
        $this->app->bind(SubscriberInterface::class, SubscriberRepository::class);
    }

    /**
     * Bootstrap any application services.
     */

     public function boot(): void
    {
        Paginator::useBootstrap();

        $mailsetting = Settings::first();
        if($mailsetting){
            $data = [
                'driver'            => $mailsetting->mail_transport,
                'host'              => $mailsetting->mail_host,
                'port'              => $mailsetting->mail_port,
                'encryption'        => $mailsetting->mail_encryption,
                'username'          => $mailsetting->mail_username,
                'password'          => $mailsetting->mail_password,
                'from'              => [
                    'address'=>$mailsetting->mail_from,
                    'name'   =>$mailsetting->mail_from_name,
                ]
            ];
            Config::set('mail',$data);
        }
    }
}
