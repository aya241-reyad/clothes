@extends('dashboard.master')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="card-header">
                    <div class="pull-left">
                        <h2>{{ __('dashboard.roles') }}</h2>
                    </div>
                    <div class="pull-right">
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> {{ __('dashboard.roles') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>{{ __('dashboard.no') }}</th>
                    <th>{{ __('dashboard.name') }}</th>
                    <th width="280px">{{ __('dashboard.actions') }}</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            </div>
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
