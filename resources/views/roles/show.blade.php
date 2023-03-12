@extends('dashboard.master')
@section('content')
<div class="container mt-3">
    <div class="card">
<div class="row">
    <div class="card-header">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> {{ __('dashboard.roles') }}</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ __('dashboard.back') }}</a>
</div>
</div>
    </div>
</div>
<div class="row">
    <div class="card-body">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.name') }}:</strong>
{{ $role->name }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.roles') }}:</strong>
@if(!empty($rolePermissions))
@foreach($rolePermissions as $v)
<label class="label label-success">{{ $v->name }},</label>
@endforeach
@endif
</div>
</div>
</div>
</div>
</div>
    </div>
</div>
@endsection