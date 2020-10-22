<form autocomplete="off" action="{{ route('browse.property.search') }}" method="GET" id="formSearch">
    <input type="hidden" name="query_id" value="{{ str_random(32) }}" readonly>
    <div class="d-flex">
        <div class="pxp-content-side-search-form">
            <div class="row pxp-content-side-search-form-row">
                <div class="col-5 col-sm-5 col-md-4 col-lg-3 pxp-content-side-search-form-col">
                    <select class="custom-select" id="pxp-p-search-status" name="status">
                        {{-- <option value="short_stay" selected>Short Stay</option> --}}
                        <option value="rent" selected>Rent</option>
                        {{-- <option value="sell">Sell</option>
                        <option value="auction">Auction</option> --}}
                    </select>
                </div>
                <div class="col-7 col-sm-7 col-md-8 col-lg-9 pxp-content-side-search-form-col autocomplete">
                    <input type="text" name="location" id="search_input" class="form-control pxp-is-address" value="{{ request()->input('location') }}" placeholder="Search by City, Neighborhood, or Address" id="location">
                    <span class="fa fa-map-marker"></span>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <a role="button" class="pxp-adv-toggle"><span class="fa fa-sliders"></span></a>
        </div>
    </div>
    <div class="pxp-content-side-search-form-adv mb-3">
        <div class="row pxp-content-side-search-form-row">

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
                    <label for="min_price">Price</label>
                    <input type="text" class="form-control" name="min_price" value="{{ request()->input('min_price') }}" placeholder="Min" id="min_price">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                <div class="form-group">
                    <label for="max_price" class="d-none d-sm-inline-block">&nbsp;</label>
                    <input type="text" class="form-control" name="max_price" value="{{ request()->input('max_price') }}" placeholder="Max" id="max_price">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 pxp-content-side-search-form-col">
                <div class="form-group">
                    <label for="bedroom">Bedroom</label>
                    <select class="custom-select" name="bedroom" id="bedroom">
                        <option value="" selected="selected">Any</option>
                        <option value="1">1 Bedroom</option>
                        @for ($i = 2; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }} Bedrooms</option>    
                        @endfor
                        <option value="50+">50+ Bedrooms</option>
                    </select>
                </div>
            </div>       

            <div class="col-sm-6 col-md-6 pxp-content-side-search-form-col">
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
            {{-- <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                <div class="form-group">
                    <label for="min_size">Size (sq ft)</label>
                    <input type="text" class="form-control" name="min_size" value="{{ request()->input('min_size') }}" id="min_size" placeholder="Min">
                </div>
            </div>
            <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                <div class="form-group">
                    <label for="max_size" class="d-none d-sm-inline-block">&nbsp;</label>
                    <input type="text" class="form-control" name="max_size" value="{{ request()->input('max_size') }}" id="max_size" placeholder="Max">
                </div>
            </div> --}}
        </div>
        {{-- <div class="form-group">
            <label class="mb-2">Amenities</label>
            <div class="row pxp-content-side-search-form-row">
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="TV"><span class="fa fa-check"></span> TV</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Fridge"><span class="fa fa-check"></span> Fridge</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Fiber Broadband Modem"><span class="fa fa-check"></span> Fiber Broadband Modem</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Telephone"><span class="fa fa-check"></span> Telephone</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Towel,Soap"><span class="fa fa-check"></span> Towel,Soap</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Fire Extinguisher"><span class="fa fa-check"></span> Fire Extinguisher</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Smoke Detector"><span class="fa fa-check"></span> Smoke Detector</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Air Conditioning"><span class="fa fa-check"></span> Air Conditioning</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="amenities[]" value="Ceiling Fan"><span class="fa fa-check"></span> Ceiling Fan</label>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
        {{-- <div class="form-group">
            <label class="mb-2">Shared Amenities</label>
            <div class="row pxp-content-side-search-form-row">
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Swimming Pool"><span class="fa fa-check"></span> Swimming Pool</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Laundary"><span class="fa fa-check"></span> Laundary</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Emergency Bell"><span class="fa fa-check"></span> Emergency Bell</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Garden"><span class="fa fa-check"></span> Garden</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Basketball Court"><span class="fa fa-check"></span> Basketball Court</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Tennis Court"><span class="fa fa-check"></span> Tennis Court</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 pxp-content-side-search-form-col">
                    <div class="form-group">
                        <div class="checkbox custom-checkbox">
                            <label><input type="checkbox" name="shared_amenities[]" value="Car Park"><span class="fa fa-check"></span> Car Park</label>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
        {{-- <div class="form-group">
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
        </div> --}}
        <input type="hidden" name="query_param" value="complex" readonly>
        <button type="submit" class="pxp-filter-btn">Apply Filters</button>
    </div>
    <div class="row pb-4">
        <div class="col-sm-6">
            <h2 class="pxp-content-side-h2">
                @if (empty(request()->input('location')))
                {{ ($properties->total()>1)? number_format($properties->total()).' results':number_format($properties->total()).' result' }}
                @else
                {{ ($properties->total()>1)? number_format($properties->total()).' results':number_format($properties->total()).' result' }} for {{ ucwords(request()->input('location')) }}
                @endif
            </h2>
        </div>
        <div class="col-sm-6">
            <div class="pxp-sort-form form-inline float-right">
                {{-- <div class="form-group">
                    <select class="custom-select" id="pxp-sort-results">
                        <option value="" selected="selected">Default Sort</option>
                        <option value="">Price (Lo-Hi)</option>
                        <option value="">Price (Hi-Lo)</option>
                        <option value="">Beds</option>
                        <option value="">Baths</option>
                        <option value="">Size</option>
                    </select>
                </div> --}}
                <div class="form-group d-flex">
                    <a role="button" class="pxp-map-toggle"><span class="fa fa-map-o"></span></a>
                </div>
            </div>
        </div>
    </div>
</form>