@extends('layouts.admin.main')
@section('title')
User || Chat Boot
@endsection
@section('content')
<main class="main-container">
   <div class="content container-fluid">
      <div class="row">
         <div class="col-xs-12">
            <div class="social-wrapper panel-social js-100p-wrapper" style="height: 167.009px;">
               <div class="social-left">
                  <div class="social-top-panel social-panel-form">
                     <div class="form-group wide">
                        <div class="input-group input-group-transparent">
                           <div class="input-group-addon no-border no-bg text-muted"><i class="icon fa fa-search"></i></div>
                           <input type="text" class="form-control no-border" placeholder="Search User...">
                        </div>
                     </div>
                  </div>
                   @include('admin.chat_boot.user_list')
               </div>
               <div class="social-right">
                  <div class="social-top-panel">
                     <div class="name startHeader">
                        <span class="status status-online"></span> Click to start the chat
                     </div>
                  </div>
                  @include('admin.chat_boot.chat_section')
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection