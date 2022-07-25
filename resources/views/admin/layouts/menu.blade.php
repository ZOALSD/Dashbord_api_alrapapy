<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
{{-- @if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif --}}
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admins','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--categories_start_route-->
@if(admin()->user()->role("categories_show"))
<li class="nav-item {{active_link('categories','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('categories','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.categories')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('categories')}}" class="nav-link  {{active_link('categories','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.categories')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('categories/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--categories_end_route-->

<!--productscontrollrt_start_route-->
@if(admin()->user()->role("productscontrollrt_show"))
<li class="nav-item {{active_link('productscontrollrt','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('productscontrollrt','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.productscontrollrt')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('productscontrollrt')}}" class="nav-link  {{active_link('productscontrollrt','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.productscontrollrt')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('productscontrollrt/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--productscontrollrt_end_route-->



<!--videos_start_route-->
@if(admin()->user()->role("videos_show"))
<li class="nav-item {{active_link('videos','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('videos','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.videos')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('videos')}}" class="nav-link  {{active_link('videos','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.videos')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('videos/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--videos_end_route-->



<!--images_start_route-->
@if(admin()->user()->role("images_show"))
<li class="nav-item {{active_link('images','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('images','active')}}">
    <i class="nav-icon fa fa-images"></i>
    <p>
      {{trans('admin.images')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('images')}}" class="nav-link  {{active_link('images','active')}}">
        <i class="fa fa-images nav-icon"></i>
        <p>{{trans('admin.images')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('images/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--images_end_route-->

<!--locations_start_route-->
@if(admin()->user()->role("locations_show"))
<li class="nav-item {{active_link('locations','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('locations','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.locations')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('locations')}}" class="nav-link  {{active_link('locations','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.locations')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('locations/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--locations_end_route-->

<!--contacts_start_route-->
@if(admin()->user()->role("contacts_show"))

<li class="nav-item">
  <a href="{{aurl('contacts')}}" class="nav-link  {{active_link('contacts','active')}}">
    <i class="fa fa-icons nav-icon"></i>
    <p>{{trans('admin.contacts')}} </p>
  </a>
</li>

{{-- <li class="nav-item {{active_link('contacts','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('contacts','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.contacts')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('contacts')}}" class="nav-link  {{active_link('contacts','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.contacts')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('contacts/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li> --}}
@endif
<!--contacts_end_route-->
