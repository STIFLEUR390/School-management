@props(['status'])

@if ($status)
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p>{{ $status }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
