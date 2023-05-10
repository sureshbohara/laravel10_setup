@extends('layouts.admin.main')
@section('title')
  Admin || Dashboard
@endsection
@section('content')
<main class="main-container">
<div class="content container-fluid">

   <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3">
         <div class="card-box bg-primary">
            <div class="box">
               <i class="icon fa fa-envelope-o"></i>
               <div class="content">
                  <div class="title"><span class="strong">New</span> Messages</div>
                  <div class="value">138</div>
               </div>
            </div>
            <div class="card-bottom">
               <a class="btn btn-block btn-show-all">Show All Messages</a>
            </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
         <div class="card-box bg-danger">
            <div class="box">
               <i class="icon fa fa-comments-o"></i>
               <div class="content">
                  <div class="title"><span class="strong">New</span> Comments</div>
                  <div class="value">792</div>
               </div>
            </div>
            <div class="card-bottom">
               <a class="btn btn-block btn-show-all">Read All Comments</a>
            </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
         <div class="card-box bg-info">
            <div class="box">
               <i class="icon fa fa-credit-card"></i>
               <div class="content">
                  <div class="title"><span class="strong">Today</span> Earnings</div>
                  <div class="value">2,900 <i class="fa fa-dollar"></i></div>
               </div>
            </div>
            <div class="card-bottom">
               <a class="btn btn-block btn-show-all">Show Earnings</a>
            </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
         <div class="card-box bg-success">
            <div class="box">
               <i class="icon fa fa-users"></i>
               <div class="content">
                  <div class="title"><span class="strong">New</span> Clients</div>
                  <div class="value">18</div>
               </div>
            </div>
            <div class="card-bottom">
               <a class="btn btn-block btn-show-all">Go To Clients List</a>
            </div>
         </div>
      </div>
   </div>

   <div class="row">

<div class="col-xs-12 col-sm-6 col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="panel-title">Panel Primary</div>
</div>
<div class="panel-body">
<code>.panel-primary</code>
</div>
</div>
</div>


<div class="col-xs-12 col-sm-6 col-md-3">
<div class="panel panel-success">
<div class="panel-heading">
<div class="panel-title">Panel Success</div>
</div>
<div class="panel-body">
<code>.panel-success</code>
</div>
</div>
</div>


<div class="col-xs-12 col-sm-6 col-md-3">
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">Panel Info</div>
</div>
<div class="panel-body">
<code>.panel-info</code>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-3">
<div class="panel panel-info">
<div class="panel-heading">
<div class="panel-title">Panel Info</div>
</div>
<div class="panel-body">
<code>.panel-info</code>
</div>
</div>
</div>




</div>
</div>
</main>
@endsection