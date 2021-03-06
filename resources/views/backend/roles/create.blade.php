@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Roles' => route('admin.roles.index'),
        'Create' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.roles.index'), 'icon-list', 'List Roles') !!}
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">

            <div class="card-header">
                <strong>@lang('global.app_create')</strong>
            </div><!--card-header-->

            {!! Form::open(['method' => 'POST', 'route' => ['admin.roles.store']]) !!}
            <div class="card-body">
                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif


                {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                <p class="help-block"></p>
                @if($errors->has('permission'))
                    <p class="help-block">
                        {{ $errors->first('permission') }}
                    </p>
                @endif
            </div><!--card-body-->

            <div class="card-footer">
                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-square btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div><!--card-->
    </div><!--col-->
</div><!--row-->
@endsection


