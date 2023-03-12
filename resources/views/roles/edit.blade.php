@extends('dashboard.master')
@section('content')
<div class="container mt-3">
    <div class="card">
<div class="row">
     <div class="card-header">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>{{ __('dashboard.roles') }}</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ __('dashboard.back') }}</a>
</div>
</div>
     </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="card-body">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.name') }}:</strong>
{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Permission:</strong>
<br/>
@foreach($permission as $value)
<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
{{ $value->name }}</label>
<br/>
@endforeach
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">{{ __('dashboard.add') }}</button>
</div>
</div>
{!! Form::close() !!}
</div>
    </div>
</div>
@endsection