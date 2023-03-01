@extends('dashboard.master')

@section('content')
    @include('dashboard.alerts.alerts')

    <div class="container mt-3">

        <div class="card">
            <div class="card-header">
                <h3>{{ __('dashboard.sliders') }}
                    <a href="{{ route('sliders.create') }}" class="btn btn-primary float-end btn-sm text-white  ">{{ __('dashboard.add') }}</a>
                  </h3>
            </div>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.title') }}</th>
                            <th>{{ __('dashboard.description') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.image') }}</th>
                           <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       
                    
                       @forelse($sliders as $slider)
                       @include('sliders.modal')
                   
                            <tr>
                                <td>  {{$slider->title}}  </td>
                                <td>  {{$slider->description}}  </td>
                                <td>
                                    
                                    

                                    <span class="form-check form-switch">
                                    <input  data-id="{{ $slider->id }}" class="toggle-class form-check-input" data-onstyle="primary" data-offstyle="danger"  data-on="Yes" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-off="No" {{ $slider->status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                    </span>

                                    
                                    </td>

                                 
                                <td><img src="{{asset($slider->attachmentRelation[0]->path)}}"width="50" height="50"> </td>
                                <td>

                                    <a class="btn btn-sm round btn-outline-primary"
                                        href="{{ route('sliders.edit', $slider->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></i>
                                    </a>
                                   
                                  
                                <span class="btn btn-sm round btn-outline-danger" data-id={{ $slider->id }}
                                    class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#basicModa7"><i
                                        class="fa-solid fa-trash"></i></span>


                                </td>
                              
                             
                                
                               
                               
                           
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No data</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
             
               



            </div>
        </div>
    


@endsection
@section('scripts')
  <script>
            
                  $(function() {
                
                    $('.toggle-class').change(function() {
                
                        var is_active = $(this).prop('checked') == true ? 1 : 0; 
                
                        var slider_id = $(this).data('id'); 
                
                        $.ajax({
                
                            type: "GET",
                
                            dataType: "json",
                
                            url: '/change-slider-status',
                
                            data: {'status': is_active, 'id': slider_id},
                
                            success: function(data){
                
                              console.log(data.success)
                
                            }
                
                        });
                      })
                
                        })
                
                </script>

@endsection
