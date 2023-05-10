<ul class="nav navbar-nav">
<li class="dropdown">
<a href="{{route('dashboard')}}">
   <div class="profile-avatar circle">
      <img src="{{asset('image/icon1.png')}}" align="Louis Hawkins">
   </div>
   <span class="user-name">Dashboard</span>
</a>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon icon-inline fa fa-cogs"></i> Site Setting
</a>
<ul class="dropdown-menu">
   <li class="{{ request()->routeIs('cmspage.index') ? 'active' : '' }}">
      <a href="{{route('cmspage.index')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i> 
      <span class="title">Cms Page</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('setting.general') ? 'active' : '' }}">
      <a href="{{route('setting.general')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">System Setting</span>
      </a>
   </li>

     <li class="{{ request()->routeIs('setting.smtp') ? 'active' : '' }}">
      <a href="{{route('setting.smtp')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">SMTP Setting</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('setting.google') ? 'active' : '' }}">
      <a href="{{route('setting.google')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Google Setting</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('setting.image') ? 'active' : '' }}">
      <a href="{{route('setting.image')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Media Setting</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('setting.other') ? 'active' : '' }}">
      <a href="{{route('setting.other')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Other Setting</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('setting.introduction') ? 'active' : '' }}">
      <a href="{{route('setting.introduction')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Introduction</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('subscribers.index') ? 'active' : '' }}">
      <a href="{{route('subscribers.index')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">User Subscribers</span>
      </a>
   </li>



</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon icon-inline fa fa-users"></i> Other Setting
</a>
<ul class="dropdown-menu">
   <li class="{{ request()->routeIs('adminuser.index') ? 'active' : '' }}">
      <a href="{{route('adminuser.index')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i> 
      <span class="title">Manage Users</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('role.index') ? 'active' : '' }}">
      <a href="{{route('role.index')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Manage Role</span>
      </a>
   </li>

   <li class="{{ request()->routeIs('permissions.index') ? 'active' : '' }}">
      <a href="{{route('permissions.index')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">Manage Permission</span>
      </a>
   </li>

     <li class="{{ request()->routeIs('system.backup') ? 'active' : '' }}">
      <a href="{{route('system.backup')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">System Backup</span>
      </a>
   </li>


 <li class="{{ request()->routeIs('cache.clear') ? 'active' : '' }}">
      <a href="{{route('cache.clear')}}">
      <i class="icon icon-inline fa fa-circle-thin"></i>
      <span class="title">System Cache Clear</span>
      </a>
   </li>



</ul>
</li>
</ul>