@extends('layouts.admin.main')
@section('title')
User || Admin Profiles
@endsection
@section('content')
<main class="main-container">
   <div class="content container">
   <div class="row">
      <div class="col-xs-12">
         <div class="profile-cover">
            <div class="profile-cover-image parallax" style="background-image: url({{$adminProfile['banner_url']}});" data-stellar-background-ratio="0.6"></div>
            <div class="profile-avatar image">
               <img src="{{$adminProfile['image_url']}}" align="{{$adminProfile['name']}}" width="100%" height="145px">
            </div>
            <div class="profile-user-information">
               <div class="profile-user-name">{{$adminProfile['name']}}</div>
               <div class="profile-user-post">{{$adminProfile['user_post']}}</div>
            </div>

            <div class="container-fluid">
               <nav class="navbar personal-menu">
               <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="#">Your Profile</a></li>
               </ul>
               </nav>
               </div>

         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-3">

         <div class="panel">
            <div class="panel-body">
               <div class="h4 mb">Contact Information</div>
               <ul class="list-unstyled no-mb">
                  <li><i class="icon-theme icon-theme-xs icon-primary mb-0p5 fa fa-phone"></i> {{$adminProfile['mobile_number']}}</li>
                  <li><i class="icon-theme icon-theme-xs icon-primary mb-0p5 fa fa-envelope"></i> 
                     <a href="#">{{$adminProfile['email']}}</a></li>
                  <li><i class="icon-theme icon-theme-xs icon-primary fa fa-map-marker"></i> {{$adminProfile['address']}}</li>
               </ul>
            </div>
            <div class="panel-footer">
               <ul class="list-inline no-mb">
                  <li><a href="{{$adminProfile['facebook']}}"><i class="icon-theme icon-brand-facebook fa fa-facebook"></i></a></li>
                  <li><a href="{{$adminProfile['twitter']}}"><i class="icon-theme icon-brand-twitter fa fa-twitter"></i></a></li>
                  <li><a href="{{$adminProfile['instagram']}}"><i class="icon-theme icon-brand-instagram fa fa-instagram"></i></a></li>

                  <li><a href="{{$adminProfile['linkedin']}}"><i class="icon-theme icon-brand-linkedin fa fa-linkedin"></i></a></li>

               </ul>
            </div>
         </div>
      </div>

      <div class="col-xs-12 col-sm-9">

         <div class="panel">
            <table class="table table-striped table-user-information">
               <tr>
                  <td class="td-icon"><i class="icon fa fa-envelope"></i></td>
                  <td class="td-title">Email</td>
                  <td><a href="#">{{$adminProfile['email']}}</a></td>
               </tr>
               <tr>
                  <td class="td-icon"><i class="icon fa fa-phone"></i></td>
                  <td class="td-title">Phone</td>
                  <td>{{$adminProfile['mobile_number']}}</td>
               </tr>
               <tr>
                  <td class="td-icon"><i class="icon fa fa-map-marker"></i></td>
                  <td class="td-title">Address</td>
                  <td>{{$adminProfile['address']}}</td>
               </tr>
               <tr>
                  <td class="td-icon"><i class="icon fa fa-male"></i></td>
                  <td class="td-title">Gender</td>
                  <td>{{$adminProfile['gender']}}</td>
               </tr>
               <tr>
                  <td class="td-icon"><i class="icon fa fa-drivers-license"></i></td>
                  <td class="td-title">Post</td>
                  <td>{{$adminProfile['user_post']}}</td>
               </tr>

               <tr>
                  <td class="td-icon"><i class="icon fa fa-pencil"></i></td>
                  <td class="td-title">BIO</td>
                  <td>{{$adminProfile['bio']}}</td>
               </tr>

            </table>
         </div>

      </div>
   </div>
   </div>
</main>
@endsection