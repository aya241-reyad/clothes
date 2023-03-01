@extends('dashboard.master')

@section('content')
    @include('dashboard.alerts.alerts')
<style>
        .pagination{
            float: right;
            margin-top: 10px;
        }
</style>
<div>
    <livewire:product-index>

</div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var is_featured = $(this).prop('checked') == true ? 1 : 0;
                var product_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/change/status/featured',
                    data: {
                        'is_featured': is_featured,
                        'product_id': product_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection

