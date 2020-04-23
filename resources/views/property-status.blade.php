@extends('layouts.site')

@section('style')

@endsection

@section('content')

<div class="pxp-content pxp-full-height">
    <div class="pxp-map-side pxp-map-right pxp-half">
        <div id="results-map"></div>
        <a href="javascript:void(0);" class="pxp-list-toggle"><span class="fa fa-list"></span></a>
    </div>
    <div class="pxp-content-side pxp-content-left pxp-half">
        <div class="pxp-content-side-wrapper">
            <div class="d-flex">
                <div class="pxp-content-side-search-form">
                    <form autocomplete="off">
                        <div class="row pxp-content-side-search-form-row">
                            <div class="col-5 col-sm-5 col-md-4 col-lg-3 pxp-content-side-search-form-col">
                                <select class="custom-select" id="pxp-p-search-status" name="status">
                                    <option value="short_stay" selected>Short Stay</option>
                                    <option value="rent">Rent</option>
                                    <option value="sell">Sell</option>
                                    <option value="auction">Auction</option>
                                </select>
                            </div>
                            <div class="col-7 col-sm-7 col-md-8 col-lg-9 pxp-content-side-search-form-col autocomplete">
                                <input type="text" name="location" class="form-control pxp-is-address" placeholder="Search by City, Neighborhood, or Address" id="location">
                                <span class="fa fa-map-marker"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <a role="button" class="pxp-adv-toggle"><span class="fa fa-sliders"></span></a>
                </div>
            </div>
            <div class="pxp-content-side-search-form-adv mb-3">
                <div class="row pxp-content-side-search-form-row">
                    <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="min_price">Price</label>
                            <input type="text" class="form-control" name="min_price" placeholder="Min" id="min_price">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="max_price" class="d-none d-sm-inline-block">&nbsp;</label>
                            <input type="text" class="form-control" name="max_price" placeholder="Max" id="max_price">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="bedroom">Bedroom</label>
                            <select class="custom-select" name="bedroom" id="bedroom">
                                <option value="" selected="selected">Any</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5+">5+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="furnish">Furnish</label>
                            <select class="custom-select" name="furnish" id="furnish">
                                <option value="" selected="selected">Any</option>
                                <option value="fully_furnished">Fully Furnished</option>
                                <option value="partially_furnished">Partially Furnished</option>
                                <option value="not_furnished">Not Furnished</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="custom-select" name="type" id="type">
                                <option value="">Select type</option>
                                @foreach ($property_types as $type)
                                <option value="{{ strtolower(str_replace(' ','_',$type->name))  }}">{{ $type->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="min_size">Size (sq ft)</label>
                            <input type="text" class="form-control" name="min_size" id="min_size" placeholder="Min">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                        <div class="form-group">
                            <label for="max_size" class="d-none d-sm-inline-block">&nbsp;</label>
                            <input type="text" class="form-control" name="max_size" id="max_size" placeholder="Max">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mb-2">Amenities</label>
                    <div class="row pxp-content-side-search-form-row">
                        @foreach ($amenities as $amenity)   
                        <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                            <div class="form-group">
                                <div class="checkbox custom-checkbox">
                                    <label><input type="checkbox" name="amenities[]" value="{{ $amenity->name }}"><span class="fa fa-check"></span> {{ $amenity->name }}</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="mb-2">Property Rules</label>
                    <div class="row pxp-content-side-search-form-row">
                        <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                            <div class="form-group">
                                <div class="checkbox custom-checkbox">
                                    <label><input type="checkbox" name="property_rules[]" value="No smoking"><span class="fa fa-check"></span> No smoking</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                            <div class="form-group">
                                <div class="checkbox custom-checkbox">
                                    <label><input type="checkbox" name="property_rules[]" value="No deadly weapons"><span class="fa fa-check"></span> No deadly weapons</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                            <div class="form-group">
                                <div class="checkbox custom-checkbox">
                                    <label><input type="checkbox" name="property_rules[]" value="Dont urinate in pool"><span class="fa fa-check"></span> Dont urinate in pool</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                            <div class="form-group">
                                <div class="checkbox custom-checkbox">
                                    <label><input type="checkbox" name="property_rules[]" value="No washing outside laundary"><span class="fa fa-check"></span> No washing outside laundary</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="pxp-filter-btn">Apply Filters</a>
            </div>
            <div class="row pb-4">
                <div class="col-sm-6">
                    <h2 class="pxp-content-side-h2">{{ number_format(count($properties)) }} Results</h2>
                </div>
                <div class="col-sm-6">
                    <div class="pxp-sort-form form-inline float-right">
                        <div class="form-group">
                            <select class="custom-select" id="pxp-sort-results">
                                <option value="" selected="selected">Default Sort</option>
                                <option value="">Price (Lo-Hi)</option>
                                <option value="">Price (Hi-Lo)</option>
                                <option value="">Beds</option>
                                <option value="">Baths</option>
                                <option value="">Size</option>
                            </select>
                        </div>
                        <div class="form-group d-flex">
                            <a role="button" class="pxp-map-toggle"><span class="fa fa-map-o"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
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
                                <div class="pxp-results-card-1-details-price">{{ $property->propertyHostelBlockRooms()->sum('block_no_room') }} Rooms</div>

                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>
                                    @if ($property->vacant)
                                        @if ($property->type_status=='rent')
                                            Rent
                                        @elseif($property->type_status=='sell')
                                            Sell
                                        @elseif($property->type_status=='auction')
                                            Auction
                                        @else
                                            Short Stay
                                        @endif
                                    @else
                                        @if ($property->type_status=='rent')
                                            Rented
                                        @elseif($property->type_status=='sell')
                                            Sold
                                        @elseif($property->type_status=='auction')
                                            Auctioned
                                        @else
                                            Booked
                                        @endif
                                    @endif
                                    </strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $property->propertyLocation->location }} <i class="fa fa-map-marker"></i> <span>|</span> {{ $property->propertyDescription->size }} {{ $property->propertyDescription->unit }}</span>
                            </div>
                        @else
                            <div class="pxp-results-card-1-details">
                                <div class="pxp-results-card-1-details-title">{{ $property->title }}</div>
                                <div class="pxp-results-card-1-details-price">{{ $property->propertyPrice->currency }}{{ number_format($property->propertyPrice->property_price,2) }}<small>/{{ $property->propertyPrice->price_calendar }}</small></div>

                                <span class="fa fa-tag text-white pull-right"> 
                                    <strong>
                                    @if ($property->vacant)
                                        @if ($property->type_status=='rent')
                                            Rent
                                        @elseif($property->type_status=='sell')
                                            Sell
                                        @elseif($property->type_status=='auction')
                                            Auction
                                        @else
                                            Short Stay
                                        @endif
                                    @else
                                        @if ($property->type_status=='rent')
                                            Rented
                                        @elseif($property->type_status=='sell')
                                            Sold
                                        @elseif($property->type_status=='auction')
                                            Auctioned
                                        @else
                                            Booked
                                        @endif
                                    @endif
                                    </strong>
                                </span>
                            </div>
                            <div class="pxp-results-card-1-features">
                                <span>{{ $property->propertyContain->bedroom }} BD <span>|</span> {{ $property->propertyContain->bathroom }} BA <span>|</span> {{ $property->propertyDescription->size }} {{ $property->propertyDescription->unit }}</span>
                            </div>
                        @endif
                        
                        <div class="pxp-results-card-1-save btnHeart" data-id="{{ $property->id }}"><span class="fa fa-heart text-primary heart-hover" style="cursor:pointer"></span></div>
                    </a>
                </div>
                @endforeach
            </div>


        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY_HERE&amp;libraries=geometry&amp;libraries=places"></script>
<script src="{{ asset('assets/light/js/markerclusterer.js') }}"></script> 
<script src="{{ asset('assets/light/js/map.js') }}"></script>
<script>
    function autocomplete(inp, arr) {
        var currentFocus;
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the location of properties listed:*/
    var countries = [
        @foreach($locations as $location)
        "{{ $location->location }}",
        @endforeach
    ];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("location"), countries);

    $('#min_price, #max_price').keypress(function(event) {
        if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
                $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    }).on('paste', function(event) {
        event.preventDefault();
    });
</script>
@endsection