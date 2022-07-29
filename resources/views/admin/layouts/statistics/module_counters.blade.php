<!--admingroups_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\AdminGroup::count() }}</h3>
        <p>{{ trans('admin.admingroups') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admingroups') }}" class="small-box-footer">{{ trans('admin.admingroups') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admingroups_end-->
<!--admins_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\Admin::count() }}</h3>
        <p>{{ trans('admin.admins') }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ aurl('admins') }}" class="small-box-footer">{{ trans('admin.admins') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admins_end-->

<!--categories_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\category::count()) }}</h3>
        <p>{{ trans("admin.categories") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("categories") }}" class="small-box-footer">{{ trans("admin.categories") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--categories_end-->
<!--productscontrollrt_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\product::count()) }}</h3>
        <p>{{ trans("admin.productscontrollrt") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("productscontrollrt") }}" class="small-box-footer">{{ trans("admin.productscontrollrt") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--productscontrollrt_end-->


<!--videos_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\video::count()) }}</h3>
        <p>{{ trans("admin.videos") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("videos") }}" class="small-box-footer">{{ trans("admin.videos") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--videos_end-->

<!--images_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Image::count()) }}</h3>
        <p>{{ trans("admin.images") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-images"></i>
      </div>
      <a href="{{ aurl("images") }}" class="small-box-footer">{{ trans("admin.images") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--images_end-->
<!--locations_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Location::count()) }}</h3>
        <p>{{ trans("admin.locations") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("locations") }}" class="small-box-footer">{{ trans("admin.locations") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--locations_end-->
<!--contacts_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Contact::count()) }}</h3>
        <p>{{ trans("admin.contacts") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("contacts") }}" class="small-box-footer">{{ trans("admin.contacts") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--contacts_end-->
<!--favorites_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Favorite::count()) }}</h3>
        <p>{{ trans("admin.favorites") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("favorites") }}" class="small-box-footer">{{ trans("admin.favorites") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--favorites_end-->
<!--services_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Service::count()) }}</h3>
        <p>{{ trans("admin.services") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("services") }}" class="small-box-footer">{{ trans("admin.services") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--services_end-->
<!--sizes_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Size::count()) }}</h3>
        <p>{{ trans("admin.sizes") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ aurl("sizes") }}" class="small-box-footer">{{ trans("admin.sizes") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--sizes_end-->