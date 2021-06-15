@extends('layouts.site')

@section('style')

@endsection

@section('content')

<div class="pxp-content pull-content-down">
    <div class="pxp-map-side pxp-map-right">
        <div id="results-map"></div>
        <a href="javascript:void(0);" class="pxp-list-toggle"><span class="fa fa-list"></span></a>
    </div>
    <div class="pxp-content-side pxp-content-left">
        <div class="pxp-content-side-wrapper">
            @include('includes.search-auction-form')

            <div class="row">
                @php $i=0; @endphp
                @foreach ($properties as $property)
                @php $i++; @endphp
                <div class="col-sm-12 col-md-6 col-xxxl-4">
                    <a href="{{ route('single.property', $property->id) }}" class="pxp-results-card-1 rounded-lg" data-prop="{{ $i }}">
                        <div id="card-carousel-{{ $i }}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active" style="background-image: url({{ asset('assets/images/properties/default.png') }})"></div>
                            </div>
                            <span class="carousel-control-prev" data-href="#card-carousel-{{ $i }}" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                            </span>
                            <span class="carousel-control-next" data-href="#card-carousel-{{ $i }}" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="pxp-results-card-1-gradient"></div>
                        
                        <div class="pxp-results-card-1-details">
                            <div class="pxp-results-card-1-details-title">{{ $property->title }}</div>
                            
                            <span class="fa fa-tag text-white pull-right"> 
                                <strong>For Auction</strong>
                            </span>
                        </div>
                        <div class="pxp-results-card-1-features">
                            <span>{{ $property->propertyContain->bedroom }} <i class="fa fa-home"></i> <span>|</span> {{ $property->propertyContain->bathroom }} <i class="fas fa-bath"></i> <span>|</span> {{ $property->propertyContain->toilet }} <i class="fas fa-toilet"></i> </span>
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
                    {{ ($properties->lastPage()==$properties->currentPage())? ($properties->total()-$properties->count())+(($properties->total()==0)?0:1):(($properties->currentPage()*$properties->count())-15)+1 }} - {{ ($properties->lastPage()==$properties->currentPage())? $properties->total():$properties->currentPage()*$properties->count() }} of {{ $properties->total() }} properties
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
     var autocomplete;
  autocomplete= new google.maps.places.Autocomplete((document.getElementById("search_input")), {
      types: ['geocode']
  });
  

  $('#min_price, #max_price').keypress(function(event) {
      if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
              $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
    }).on('paste', function(event) {
      event.preventDefault();
    });
    
    $("#formSearch").on('submit', function(e){
      e.stopPropagation();
      if($("#location").val()==''){
          return false;
      }else{
          return true;
      }
      return false;
    });
    
    $("#formSearch input[name='location'], #formSearch select[name='status']").on('keydown', function(e){
      e.stopPropagation();
      if(e.which==13){
          $("#formSearch").trigger("submit");
      }
    });

    $("#formSearch select[name='status']").on('change', function(e){
        e.stopPropagation();
        $("#formSearch").trigger("submit");
    });
    
    autocomplete.addListener("place_changed", function() {
        const place = autocomplete.getPlace();
        if (place.place_id) {
            $("#formSearch").trigger("submit");
            return;
        }
    });
</script>
@endsection