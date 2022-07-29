@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('productscontrollrt')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('productscontrollrt/'.$productscontrollrt->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('productscontrollrt/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$productscontrollrt->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$productscontrollrt->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$productscontrollrt->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['productscontrollrt.destroy', $productscontrollrt->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
{!! Form::open(['url'=>aurl('/productscontrollrt/'.$productscontrollrt->id),'method'=>'put','id'=>'productscontrollrt','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('name',trans('admin.name'),['class'=>'control-label']) !!}
        {!! Form::text('name', $productscontrollrt->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('price',trans('admin.price'),['class'=>'control-label']) !!}
        {!! Form::text('price', $productscontrollrt->price ,['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('category_id',trans('admin.category_id'),['class'=>'control-label']) !!}
{!! Form::select('category_id',App\Models\category::whereNotNull('parent_id')->pluck('name','id'), $productscontrollrt->category_id ,['class'=>'form-control select2','placeholder'=>trans('admin.category_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 image">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="'image'">{{ trans('admin.image') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('image',['class'=>'custom-file-input','placeholder'=>trans('admin.image'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"image"]) !!}
                        {!! Form::label('image',trans('admin.image'),['class'=>'custom-file-label']) !!}
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2" style="padding-top: 30px;">
            @include("admin.show_image",["image"=>$productscontrollrt->image])
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <!-- Color Picker -->
    <div class="col-md-11 col-sm-11 col-lg-11 col-xs-11">
        <div class="form-group">
            {!! Form::label('color',trans('admin.color')) !!}
            <div class="input-group colorpicker">
                {!! Form::text('color', $productscontrollrt->color ,['class'=>'form-control','placeholder'=>trans('admin.color'),"readonly"=>"readonly"]) !!}
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $productscontrollrt->color }};"></i></span>
                </div>
            </div>
            <!-- /.input group -->
        </div>
        <!-- /.form group -->
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('size_id',trans('admin.size_id'),['class'=>'control-label']) !!}
{!! Form::select('size_id',App\Models\Size::pluck('size','id'), $productscontrollrt->size_id ,['class'=>'form-control select2','placeholder'=>trans('admin.size_id')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('desc_en',trans('admin.desc_en'),['class'=>'control-label']) !!}
        {!! Form::textarea('desc_en', $productscontrollrt->desc_en ,['class'=>'form-control','placeholder'=>trans('admin.desc_en')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('desc_ar',trans('admin.desc_ar'),['class'=>'control-label']) !!}
        {!! Form::textarea('desc_ar', $productscontrollrt->desc_ar ,['class'=>'form-control','placeholder'=>trans('admin.desc_ar')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection