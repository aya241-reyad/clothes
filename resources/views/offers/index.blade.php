@extends('dashboard.master')

@section('content')
    @include('dashboard.alerts.alerts')

    <div class="container mt-3">

        <div class="card">
            <div class="card-header">
                <h3>{{ __('dashboard.offers') }} 
                    @can('add-offer')
                    <a href="{{ route('offers.create') }}" class="btn btn-primary float-end btn-sm text-white  ">{{ __('dashboard.add') }}</a>
                    @endcan
</h3>

               
            </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.title') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.image') }}</th>
                            <th>{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                       @forelse($offers as $offer)
                       @include('offers.modal')
                            <tr>
                                <td> {{ $offer->title }} </td>
                                <td >
                                    

                                    <span class="form-check form-switch">
                                    <input  data-id="{{ $offer->id }}" class="toggle-class form-check-input" data-onstyle="primary" data-offstyle="danger"  data-on="Yes" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-off="No" {{ $offer->status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                    </span>

                                    
                                    </td>
                                <td><img src="{{asset($offer->attachmentRelation[0]->path)}}"width="50" height="50"> </td>
                               
                               <td>
                                <a class="btn btn-sm round btn-outline-primary"
                                href="{{ route('offers.edit', $offer->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></i>
                            </a>

                                <span class="btn btn-sm round btn-outline-danger" data-id={{ $offer->id }}
                                  class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#basicModa6"><i
                                      class="fa-solid fa-trash"></i></span>
                                      
                               </td>
                                
                               
                               
                           
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
               
                <script>
            
                  $(function() {
                
                    $('.toggle-class').change(function() {
                
                        var is_active = $(this).prop('checked') == true ? 1 : 0; 
                
                        var offer_id = $(this).data('id'); 
                
                        $.ajax({
                
                            type: "GET",
                
                            dataType: "json",
                
                            url: '/changeStatus',
                
                            data: {'status': is_active, 'id': offer_id},
                
                            success: function(data){
                
                              console.log(data.success)
                
                            }
                
                        });
                      })
                
                        })
                
                </script>



            </div>
        </div>
    </div>
@endsection


