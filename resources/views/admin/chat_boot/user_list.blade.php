<ul class="social-users-list custom-scroll height100p mCustomScrollbar _mCS_3">
<div id="mCSB_3" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
<div id="mCSB_3_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
@if(count($adminUsers)>0)
@foreach($adminUsers as $user)
 <li>
    <a href="#" class="user-block userList">
       <div class="avatar avatar-lg image">
           @if($user['image_url'])
            <img src="{{$user['image_url']}}" alt="{{$user['name']}}" class="mCS_img_loaded">
           @else
            <img src="{{asset('image/icon.png')}}" alt="{{$user['name']}}" class="mCS_img_loaded">
           @endif
       </div>
       <div class="user-info">
          <div class="name">{{$user['name']}}</div>
          <div id="{{$user->id}}-status" class="date-last-post status status-online">Online</div>
       </div>
    </a>
 </li>
 @endforeach
@else
<li>
<div class="user-info">
 <div class="name">User Not Found...</div>
</div>
 </li>
@endif
</div>
<div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: block;">
 <div class="mCSB_draggerContainer">
    <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; height: 5px; top: 0px; display: block; max-height: 55px;">
       <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
    </div>
    <div class="mCSB_draggerRail"></div>
 </div>
</div>
</div>
</ul>