@extends('layouts.site')

@section('style')

@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="pxp-map-side pxp-map-right pxp-half">
        <div id="results-map"></div>
        <a href="javascript:void(0);" class="pxp-list-toggle"><span class="fa fa-list"></span></a>
    </div>
    <div class="pxp-content-side pxp-content-left pxp-half">
        <div class="pxp-content-side-wrapper">
            
            @include('includes.search-form')

            <div class="row" id="propertyMainRow" data-href="{{ route('browse.property_types_map') }}">
                @php $i=0; @endphp
                @foreach ($properties as $property)
                @php $i++; @endphp
                <div class="col-sm-12 col-md-6 col-xxxl-4">
                    <a href="{{ route('single.property', $property->id) }}" class="pxp-results-card-1 rounded-lg" data-prop="{{ $i }}">
                        <div id="card-carousel-{{ $i }}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                @php $j=0; @endphp
                                @foreach ($property->propertyImages as $image)
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
                        @if ($property->type=='hostel')
                            <div class="pxp-results-card-1-details">
                                <div class="pxp-results-card-1-details-title">{{ $property->title }}</div>
                                <div class="pxp-results-card-1-details-price">{{ $property->propertyHostelBlockRooms()->sum('block_no_room') }} {{ str_plural('Room', $property->propertyHostelBlockRooms()->sum('block_no_room')) }}</div>

                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>Rent</strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $property->propertyLocation->location }} <i class="fa fa-map-marker"></i> </span>
                            </div>
                        @else
                            <div class="pxp-results-card-1-details">
                                <div class="pxp-results-card-1-details-title">{{ $property->title }}</div>
                                <div class="pxp-results-card-1-details-price">{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}<small>/{{ $property->propertyPrice->price_calendar }}</small></div>

                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>
                                    @if ($property->type_status=='rent')
                                        Rent
                                    @elseif($property->type_status=='sell')
                                        Sell
                                    @elseif($property->type_status=='auction')
                                        Auction
                                    @else
                                        Short Stay
                                    @endif
                                    </strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $property->propertyContain->bedroom }} <i class="fa fa-home"></i> <span>|</span> {{ $property->propertyContain->bathroom }} <i class="fas fa-bath"></i> <span>|</span> {{ $property->propertyContain->toilet }} <i class="fas fa-toilet"></i> </span>
                            </div>
                        @endif
                        
                        <div class="pxp-results-card-1-save btnHeart" data-id="{{ $property->id }}" data-url="{{ route('saved.submit') }}">
                            @auth
                            <span class="fa fa-heart {{ (Auth::user()->userSavedProperties()->whereProperty_id($property->id)->count()>0)? 'text-pink':'text-primary' }} heart-hover"></span>
                            @else
                            <span class="fa fa-heart text-primary heart-hover"></span>
                            @endauth
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 small">
                    {{ $properties->links() }}
                </div>
                <div class="col-sm-12 small">
                    {{ ($properties->lastPage()==$properties->currentPage())? ($properties->total()-$properties->count())+1:(($properties->currentPage()*$properties->count())-15)+1 }} - {{ ($properties->lastPage()==$properties->currentPage())? $properties->total():$properties->currentPage()*$properties->count() }} of {{ $properties->total() }} properties
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/markerclusterer.js') }}"></script>
<script src="{{ asset('assets/pages/website/properties.gmap.init.js') }}"></script>
@endsection