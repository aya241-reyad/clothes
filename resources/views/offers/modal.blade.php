<div class="modal fade" id="basicModa6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{ __('dashboard.offers') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('offers.destroy', ['offer' => $offer->id]) }}" method="post">
                    <input id="id" name="id" hidden>

                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">{{ __('dashboard.sureofdelete') }}</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('dashboard.delete') }}</button>
            </div>
            </form>
        </div>
    </div>