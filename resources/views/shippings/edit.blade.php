@extends('dashboard.master')
@section('content')
<form action="{{url('shippings/'.$shipping->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('Patch')
    <div class="container mt-3">
        <div class="card mb-4">
            <h5 class="card-header">{{ __('dashboard.shipping') }}</h5>
            <div class="card-body">

                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">{{ __('dashboard.governorate') }}</label>
                    <input type="hidden" id="id" name="id" value="{{$shipping->id}}">
                    <div class="form-group">
                        <select class="form-control" name="governorate_id" aria-label="Default select example">
                            <option value="{{$shipping->governorate_id}}">{{$shipping->governorate->name}}</option>
                            @foreach ($governorates as $governorate)
                                <option value={{ $governorate->id }}>{{ $governorate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="alert-danger">{{ $errors->first('category_id') }}</div>


              
                <div class="mb-3">
                    <label  class="form-label">{{ __('dashboard.price') }}</label>
                    <input type="number" value="{{$shipping->cost}}" class="form-control"  name="cost">
                  </div>
                  <div class="alert-danger">{{ $errors->first('cost') }}</div>

                

                <button type="submit"onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-outline-primary">{{ __('dashboard.edit') }}</button>








            </div>
        </div>
        </div>
  









</form>

@endsection