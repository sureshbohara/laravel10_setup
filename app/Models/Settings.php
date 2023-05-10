<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Settings extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
         $this->addMediaConversion('logo')
         ->width(100)
         ->height(100)
         ->performOnCollections('logo');

         $this->addMediaConversion('fav')
         ->width(32)
         ->height(32)
         ->performOnCollections('fav');

         $this->addMediaConversion('banner')
         ->width(1200)
         ->height(500)
         ->performOnCollections('banner');

         $this->addMediaConversion('maintainance')
         ->width(500)
         ->height(500)
         ->performOnCollections('maintainance');

         $this->addMediaConversion('img1')
         ->width(500)
         ->height(500)
         ->performOnCollections('img1');

         $this->addMediaConversion('img2')
         ->width(500)
         ->height(500)
         ->performOnCollections('img2');

         $this->addMediaConversion('img3')
         ->width(500)
         ->height(500)
         ->performOnCollections('img3');

         $this->addMediaConversion('img4')
         ->width(500)
         ->height(500)
         ->performOnCollections('img4');

         $this->addMediaConversion('img5')
         ->width(500)
         ->height(500)
         ->performOnCollections('img5');
     

    }
     
     public function getLogoUrlAttribute(){
      return $this->getFirstMediaUrl('logo');
     }

     public function getfavUrlAttribute(){
      return $this->getFirstMediaUrl('fav');
     }

     public function getBannerUrlAttribute(){
      return $this->getFirstMediaUrl('banner');
     }

     public function getMaintainanceUrlAttribute(){
      return $this->getFirstMediaUrl('maintainance');
     }

     public function getImg1UrlAttribute(){
      return $this->getFirstMediaUrl('img1');
     }

     public function getImg2UrlAttribute(){
      return $this->getFirstMediaUrl('img2');
     }
     public function getImg3UrlAttribute(){
      return $this->getFirstMediaUrl('img3');
     }
     public function getImg4UrlAttribute(){
      return $this->getFirstMediaUrl('img4');
     }
      public function getImg5UrlAttribute(){
      return $this->getFirstMediaUrl('img5');
     }
}
