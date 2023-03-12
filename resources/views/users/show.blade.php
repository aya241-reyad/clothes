@extends('dashboard.master')
@section('content')
<div class="container mt-3">
    <div class="card">
<div class="row">
    <div class="card-header">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> {{ __('dashboard.admin') }}</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('dashboard.back') }}</a>
</div>
</div>
</div>
</div>
<div class="row">
     <div class="card-body">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.name') }}:</strong>
{{ $user->name }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.email') }}:</strong>
{{ $user->email }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>{{ __('dashboard.roles') }}:</strong>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</div>
</div>
</div>
    </div>
</div>
@endsection