<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysqli;
class BackupController extends Controller
{
   public function systemBackup(){
       $zip = new Zip();
       $dir = public_path();
       $zip_file = Carbon::now().'-backup.zip';
       $rootPath = realpath($dir);
       $zip->create($zip_file)->add($rootPath, true);
       $zip = Zip::make()->create($zip_file)->add($rootPath, true);
       $zip->close();
       header('Content-disposition: attachment; filename='.$zip_file);
       header('Content-type: application/zip');
       readfile($zip_file);
       @unlink($zip_file);
    }

    public function databaseBackup(){

    }

}
