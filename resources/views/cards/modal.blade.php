<div class="modal fade" id="basicModal5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{ __('dashboard.deletecard') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cards.destroy', ['card' => $card->id]) }}" method="post">
                    <input id="id" name="id" hidden>

                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">{{ __('dashboard.sureofdelete') }}</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('dashboard.deletecard') }}</button>
            </div>
            </form>
        </div>
    </div>