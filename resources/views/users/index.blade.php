@extends('dashboard.master')
@section('content')
<div class="container mt-3">
    <div class="card">
<div class="row">
     <div class="card-header">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>{{ __('dashboard.admin') }}</h2>
</div>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('users.create') }}"> {{ __('dashboard.admin') }}</a>
</div>
</div>
     </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered">
<tr>
<th>{{ __('dashboard.no') }}</th>
<th>{{ __('dashboard.name') }}</th>
<th>{{ __('dashboard.email') }}</th>
<th>{{ __('dashboard.roles') }}</th>
<th width="280px">{{ __('dashboard.actions') }}</th>
</tr>
@foreach ($data as $key => $user)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success text-dark">{{ $v }}</label>
@endforeach
@endif
</td>
<td>
<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</table>
{!! $data->render() !!}
    </div>
    </div>
</div>
@endsection