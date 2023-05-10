<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
class Admin extends Authenticatable implements HasMedia
{
    use HasFactory,Notifiable,InteractsWithMedia;
    protected $guarded = 'admin';
    protected $fillable = [
        'name',
        'email',
        'address',
        'type',
        'mobile_number',
        'status',
        'gender',
        'user_post',
        'facebook',
        'instagram',
        'twiter',
        'linkedin',
        'bio',
        'image'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


     public function registerMediaConversions(Media $media = null): void
    {
         $this->addMediaConversion('image')
         ->width(80)
         ->height(80)
         ->performOnCollections('image');

         $this->addMediaConversion('banner')
         ->width(1200)
         ->height(120)
         ->performOnCollections('banner');

         

    }


    // image link url
     public function getImageUrlAttribute(){
      return $this->getFirstMediaUrl('image');
     }

     public function getBannerUrlAttribute(){
      return $this->getFirstMediaUrl('banner');
     }


}









