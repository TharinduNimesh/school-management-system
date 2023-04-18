<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @if ($isCentered == 'true')
        <div class="modal-dialog modal-dialog-centered">
    @else
        <div class="modal-dialog">
    @endif
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" data-bs-dismiss="modal" class="btn" onclick="{{ $onConfirm }}" style="background: #006ee5; color: white;">Submit</button>
            </div>
        </div>
    </div>
</div>