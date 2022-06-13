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