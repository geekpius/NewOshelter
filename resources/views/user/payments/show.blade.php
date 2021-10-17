@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Subscription Packages</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner
        </p>
        <div id="" class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    
                <div class="container">
                    <div class="card-deck mb-3 text-center">
                       
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(".btnSubscribe").on('click', function(){
    window.location.href = $(this).data('href');
});
</script>

@endsection
