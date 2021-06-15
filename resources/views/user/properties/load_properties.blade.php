
@if (count($properties))
<div class="row">
    @foreach ($properties as $property)
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="card-body myParent" style="padding-top: 0% !important">
                <div class="dropdown float-right">
                    <a class="nav-link" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                        @if ($property->type_status == 'rent' || $property->type_status == 'short_stay')
                        <a class="dropdown-item text-purple" href="javascript:void(0);" onclick="window.location='{{ route('property.visits',$property->id) }}';"><i class="fa fa-building"></i> Visits</a>
                        <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.bookings', $property->id) }}';"><i class="mdi mdi-briefcase"></i> Bookings</a>
                        @endif
                        @if ($property->type_status == 'sale')
                        <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.orders', $property->id) }}';"><i class="mdi mdi-cart"></i> Orders</a>
                        @endif
                        @if ($property->type_status == 'auction')
                        <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.events', $property->id) }}';"><i class="mdi mdi-briefcase"></i> Auction Bookings</a>
                        @endif
                        <a class="dropdown-item {{$property->publish? 'text-pink':'text-success'}} btnVisibility" href="javascript:void(0);" data-href="{{ route('property.visibility', $property->id) }}" data-title="{{ $property->title }}"><i class="{{$property->publish? 'fa fa-eye-slash':'fa fa-check'}}"></i> {{$property->publish? 'Hide':'Publish'}}</a>
                        <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.edit', $property->id) }}';"><i class="fa fa-edit"></i> Edit</a>
                        <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="window.location='{{ route('property.confirmdelete', $property->id) }}';"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>

                <div class="blog-card">
                    <a href="{{ route('property.preview', $property->id) }}">
                        <img src="{{ empty($property->propertyImages->first()->image)? asset('assets/images/properties/default.png'):asset('assets/images/properties/'.$property->propertyImages->first()->image) }}" alt="PropertyPhoto" class="img-fluid">
                    </a>
                    <div class="meta-box">
                        <ul class="p-0 mt-2 list-inline">
                            <li class="list-inline-item font-14" style="text-transform: none"><i class="fa fa-star text-warning"></i>
                                @php
                                    $countReview = $property->propertyReviews->count();
                                    $accuracyStar = (!$countReview)? 0: $property->sumAccuracyStar()/$countReview;
                                    $locationStar = (!$countReview)? 0: $property->sumLocationStar()/$countReview;
                                    $securityStar = (!$countReview)? 0: $property->sumSecurityStar()/$countReview;
                                    $valueStar = (!$countReview)? 0: $property->sumValueStar()/$countReview;
                                    $commStar = (!$countReview)? 0: $property->sumCommunicationStar()/$countReview;
                                    $tidyStar = (!$countReview)? 0: $property->sumCleanStar()/$countReview;
                                    $sumReviews = $accuracyStar+$locationStar+$securityStar+$valueStar+$commStar+$tidyStar;
                                @endphp
                                @if (count($property->propertyReviews))
                                {{ number_format($sumReviews/6,2) }}
                                @else
                                No reviews yet
                                @endif
                            </li>
                            @if ($property->type=='hostel')
                                <li class="list-inline-item" style="text-transform: none">
                                    {{ $property->userHostelVisits->whereIn('is_in', [0,1])->count() }} {{ str_plural('occupant', $property->userHostelVisits->whereIn('is_in', [0,1])->count()) }}
                                </li>
                                <br>
                                <li class="list-inline-item">
                                    @if ($property->hostelRoomLeft() >0)
                                        <span class="badge badge-secondary px-3">Available for {{ str_replace('_',' ',$property->type_status) }}</span>
                                    @else
                                        <span class="badge badge-danger px-3">Hostel is full</span>
                                    @endif
                                </li>
                            @else
                                @if ($property->type_status=='sale')
                                <li class="list-inline-item">
                                    <span class="badge badge-secondary px-3">Available for sale</span>
                                </li>
                                @elseif ($property->type_status=='auction')
                                <li class="list-inline-item">
                                    <span class="badge badge-secondary px-3">Available for auction</span>
                                </li>
                                @else
                                <li class="list-inline-item" style="text-transform: none">
                                    {{ $property->userVisits->whereIn('status', [0,1])->count() }} {{ str_plural('occupant', $property->userVisits->whereIn('status', [0,1])->count()) }}                                                 
                                </li>
                                <br>
                                <li class="list-inline-item">
                                    @if (!$property->userVisits->count())
                                        <span class="badge badge-secondary px-3">Available for {{ str_replace('_',' ',$property->type_status) }}</span>
                                    @else
                                        <span class="badge badge-danger px-3">
                                            @if ($property->type_status=='rent')
                                                Rented
                                            @else
                                                Booked
                                            @endif
                                        </span>
                                    @endif
                                </li>
                                @endif
                            @endif
                            
                            <li class="list-inline-item font-14"><i class="fa fa-clock"></i> {{  \Carbon\Carbon::parse($property->created_at)->format('d M, Y')  }}</li>
                            <li class="list-inline-item text-capitalize publishStatus font-14">{{  $property->publish? 'Published':"Hidden"  }}</li>
                        </ul>
                    </div><!--end meta-box-->            
                    <h6 class="">
                        <a href="{{ route('property.preview', $property->id) }}" class="text-primary">{{ $property->title }}</a>
                    </h6>
                    <span class="font-14">{{ $property->propertyLocation->location }}</span>
                </div><!--end blog-card-->                                   
            </div><!--end card-body-->
        </div>
    </div>
    @endforeach
</div>

{{-- <div class="row">
    <div class="col-12 ml-2">
        @if ($properties->hasPages())
        <div class="font-12">Page: {{ $properties->currentPage() }}</div>
        <div class="font-12">{{ $properties->count() }} out of {{ $properties->total() }} properties</div>
        <div>{{ $properties->links() }}</div>
        @endif
    </div>
</div> --}}
@else
<div class="text-center mt-5 mb-3">
    <div class="alert alert-outline-pink b-round fade show" role="alert">                                            
        <i class="mdi mdi-alert-outline alert-icon text-danger"></i>
        <div class="alert-text">
            No property found in your lists. You can add <a href="{{ route('property.add') }}">new property</a> list now.
        </div>
    </div>
</div>                    
@endif

@if(count($properties))
<script>
    // toggle between listed property invisible and visible
    $(".btnVisibility").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        swal({
            title: "Are you sure?",
            text: "You are about "+$this.text().toLowerCase()+" "+$this.data("title")+" listing.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: ((jQuery.trim($this.text().toLowerCase())=="hide")? "btn-danger":"btn-success")+" btn-sm",
            cancelButtonClass: "btn-sm",
            confirmButtonText: "Yes, "+$this.text(),
            closeOnConfirm: false
            },
        function(){
            $.ajax({
                url: $this.data('href'),
                type: "POST",
                success: function(resp){
                    if(resp=='success'){
                        swal(((jQuery.trim($this.text().toLowerCase())=="hide")? "Hidden":"Published"), "Property "+((jQuery.trim($this.text().toLowerCase())=="hide")? "hidden":"published")+" successful", "success");
                        $this.parents(".myParent").find(".blog-card .publishStatus").html(((jQuery.trim($this.text().toLowerCase())=="hide")? 'Hidden':'Published'));
                        $this.html(((jQuery.trim($this.text().toLowerCase())=="hide")? '<i class="fa fa-check"></i> Publish':'<i class="fa fa-eye-slash"></i> Hide'));
                        if(jQuery.trim($this.text().toLowerCase())=="hide"){
                            $this.removeClass('text-success').addClass('text-pink');
                        }else{
                            $this.removeClass('text-pink').addClass('text-success');
                        }
                    }
                    else{
                        alert("Something went wrong");
                    }
                },
                error: function(resp){
                    alert("Something went wrong with request");
                }
            });
        });
        return false;
    });
</script>
@endif

                