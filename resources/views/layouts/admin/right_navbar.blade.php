<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle no-caret nav-notification" data-toggle="dropdown">
<i class="icon icon-inline fa fa-envelope-open-o"></i>
<span class="hidden-sm hidden-md hidden-lg">Notifications</span>
<span class="badge badge-danger badge-notification">7</span>
</a>
<ul class="dropdown-menu dropdown-menu-right navbar-notifications-dropdown">
   <li class="title">New Messages</li>
   <li>
      <a href="#" class="notification">
         <div class="avatar avatar-lg image">
            <img src="{{asset('image/icon1.png')}}" alt="Lori Harrison">
         </div>
         <div class="user-name">Lori Harrison</div>
         <div class="date">today 08:27 PM</div>
         <p>Text message</p>
      </a>
   </li>
   <li>
      <a href="#" class="btn btn-default btn-block btn-no-border">See All Messages</a>
   </li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <div class="profile-avatar circle">
      @if(!empty(Auth::guard('admin')->user()->image_url))
      <img src="{{Auth::guard('admin')->user()->image_url}}" align="{{Auth::guard('admin')->user()->name}}">
      @else
       <img src="{{asset('image/icon1.png')}}" alt="{{Auth::guard('admin')->user()->name}}">
      @endif
   </div>
   <span class="user-name">{{Auth::guard('admin')->user()->name}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-right">
   <li style="background: #34495e;">
      <a href="#" style="color: white;"><span>User Type : {{Auth::guard('admin')->user()->type}}</span></a>
   </li>
   <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">
      <a href="{{route('profile')}}"><i class="icon icon-inline fa fa-address-card-o"></i> Your Profile</a>
   </li>
   <li class="{{ request()->routeIs('update.details') ? 'active' : '' }}"><a href="{{route('update.details')}}">
      <i class="icon icon-inline fa fa-tasks"></i> User Setting</a></li>
   <li class="divider"></li>
   <li>

   <li><a href="{{route('user.chat.boot')}}"><i class="icon icon-inline fa fa-comments-o"></i> Chat Boot </a></li>

   <li><a href="{{route('admin.logout')}}"><i class="icon icon-inline fa fa-sign-out"></i> Sign out</a></li>
   <li><a href="{{route('account.delete')}}"><i class="icon icon-inline fa fa-trash"></i> Delete Account</a></li>
</ul>
</li>
</ul>