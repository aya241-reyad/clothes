@extends('dashboard.master')

@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"></h5> <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('color.update', $color->id) }}" method="POST">
                            @method('PUT')

                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">{{ __('dashboard.name') }}</label>
                                <input type="text" value="{{ $color->name }}"name="name" class="form-control"
                                    id="basic-default-fullname" placeholder="Enter name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">{{ __('dashboard.code') }}</label>
                                <input type="color" name="code" class="form-control form-control-color"
                                    id="exampleColorInput" value="{{ $color->code }}" title="Choose your color">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('dashboard.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
