@extends('layouts.site')

@section('styles')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Wishlist</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> wishlist 
        </p>
        <div class="pt-4">
            @if (count($lists))
            <div class="row">
                @php $i=0; @endphp
                @foreach ($lists as $list)
                @php $i++; @endphp
                <div class="col-sm-12 col-md-6 col-lg-4 parentDiv">
                    <a href="{{ route('single.property', $list->property->id) }}" class="pxp-results-card-1 rounded-lg" data-prop="{{ $i }}">
                        <div id="card-carousel-{{ $i }}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                @php $j=0; @endphp
                                @foreach ($list->property->propertyImages->take(3) as $image)
                                @php $j++; @endphp
                                <div class="carousel-item{{ $j==1? ' active':'' }}" style="background-image: url({{ asset('assets/images/properties/'.$image->image) }})"></div>
                                @endforeach
                            </div>
                            <span class="carousel-control-prev" data-href="#card-carousel-{{ $i }}" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                            </span>
                            <span class="carousel-control-next" data-href="#card-carousel-{{ $i }}" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="pxp-results-card-1-gradient"></div>
                        @if ($list->property->type=='hostel')
                            <div class="pxp-results-card-1-details">
                                <div class="pxp-results-card-1-details-title">{{ $list->property->title }}</div>
                                <div class="pxp-results-card-1-details-price"><small class="font-weight-bold">{{ $list->property->userHostelVisits->count() }} visits</small></div>

                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>Rent</strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $list->property->propertyLocation->location }} <i class="fa fa-map-marker"></i> </span>
                            </div>
                        @else
                            <div class="pxp-results-card-1-details">
                                <div class="pxp-results-card-1-details-title">{{ $list->property->title }}</div>
                                <div class="pxp-results-card-1-details-price"><small class="font-weight-bold">{{ $list->property->userVisits->count() }} visits</small></div>
                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>
                                        @if ($list->property->type_status=='rent')
                                        Rent
                                    @elseif($list->property->type_status=='sell')
                                        Sell
                                    @elseif($list->property->type_status=='auction')
                                        Auction
                                    @else
                                        Short Stay
                                    @endif
                                    </strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $list->property->propertyContain->bedroom }} <i class="fa fa-home"></i> <span>|</span> {{ $list->property->propertyContain->bathroom }} <i class="fas fa-bath"></i> <span>|</span> {{ $list->property->propertyContain->toilet }} <i class="fas fa-toilet"></i></span>
                            </div>
                        @endif
                        <div class="pxp-results-card-1-save btnRemove" title="Remove" data-url="{{ route('saved.remove', $list->id) }}"><span class="fa fa-trash fa-lg text-danger" style="cursor:pointer"></span></div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                No property found in your wishlists.
            </div>
            @endif
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script>
    $(".btnRemove").on("click", function(e){
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: $this.data('url'), 
            type: 'GET',
            success: function (resp) {
                if(resp=='success'){
                    $this.parents('.parentDiv').hide().remove();
                }else{
                    console.log('Something went wrong');
                }
            },
            error: function(resp){
                console.log('Something went wrong with request');
            }
            
        });
        return false;
    });
</script>
@endsection