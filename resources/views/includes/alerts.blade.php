@if(session()->has('success'))
    <div class="alert alert-secondary border-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <strong>Success!</strong> {{ session()->get('success') }}
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger border-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <strong>Opps!</strong> {{ session()->get('error') }}
    </div>
@elseif(session('status'))
    <div class="alert alert-secondary border-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <strong>Success!</strong> {{ session('status') }}
    </div>
@endif


