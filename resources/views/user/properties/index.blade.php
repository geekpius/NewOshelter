@extends('layouts.site')

@section('styles')
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Your Properties</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings  > <small><a class="btn btn-primary btn-sm" href="{{ route('property.add') }}">List new</a></small>
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    @include('includes.alerts')
                </div>
                <div class="col-sm-3">
                    <form method="GET" id="formStatus">
                        <select name="status" id="status" class="form-control">
                            <option value="">Filter property status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form method="GET" id="formFilter">
                        <select name="filter" id="filter" class="form-control">
                            <option value="">Filter property type</option>
                            @foreach ($property_types as $type)
                                <option value="{{ strtolower(str_replace(' ','_',$type->name)) }}">{{ str_plural($type->name) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-sm-5">
                    <form method="GET">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search property title...">
                    </form>
                </div>
                <div class="col-sm-12 mt-4" id="propertyContent">
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
                                                    <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='#';"><i class="mdi mdi-briefcase"></i> Bookings</a>
                                                    <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.edit', $property->id) }}';"><i class="fa fa-edit"></i> Edit</a>
                                                    @if($property->status == 'rejected')
                                                        <a class="dropdown-item text-primary" href="javascript:void(0);" onclick="window.location='{{ route('property.send.approval', $property->id) }}';"><i class="fa fa-check-circle"></i> Send Approval</a>
                                                    @endif
                                                    <a class="dropdown-item {{$property->publish? 'text-pink':'text-success'}} btnVisibility" href="javascript:void(0);" data-href="{{ route('property.visibility', $property->id) }}" data-title="{{ $property->title }}"><i class="{{$property->publish? 'fa fa-eye-slash':'fa fa-check'}}"></i> {{$property->publish? 'Hide':'Publish'}}</a>
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
                                                        @if ($property->isHostelPropertyType())
                                                            <li class="list-inline-item" style="text-transform: none">
                                                                {{--                                    {{ $property->userHostelVisits->whereIn('is_in', [0,1])->count() }} {{ str_plural('occupant', $property->userHostelVisits->whereIn('is_in', [0,1])->count()) }}--}}
                                                            </li>
                                                            <br>
                                                            <li class="list-inline-item">
                                                                    <span class="badge badge-secondary px-3">Available for {{ str_replace('_',' ',$property->type_status) }}</span>
                                                                <!-- @if ($property->hostelRoomLeft() >0)
                                                                    <span class="badge badge-secondary px-3">Available for {{ str_replace('_',' ',$property->type_status) }}</span>
                                                                @else
                                                                    <span class="badge badge-danger px-3">Hostel is full</span>
                                                                @endif -->
                                                            </li>
                                                        @else
                                                            @if ($property->isSaleProperty())
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-secondary px-3">Available for sale</span>
                                                                </li>
                                                            @elseif ($property->isAuctionProperty())
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-secondary px-3">Available for auction</span>
                                                                </li>
                                                            @else
                                                                <li class="list-inline-item" style="text-transform: none">
                                                                    {{ $property->isPropertyTaken() }}
                                                                </li>
                                                                <br>
                                                                <li class="list-inline-item">
                                                                    @if (!$property->isPropertyTaken())
                                                                        <span class="badge badge-secondary px-3">Available for {{ str_replace('_',' ',$property->type_status) }}</span>
                                                                    @else
                                                                        <span class="badge badge-danger px-3">
                                            @if ($property->isRentProperty())
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
                                                        @if($property->status == 'pending')
                                                        <span class="badge badge-primary text-capitalize small">{{  $property->status }}</apan>
                                                        @elseif($property->status == 'approved')
                                                        <span class="badge badge-success text-capitalize small">{{  $property->status }}</apan>
                                                        @else
                                                        <span class="badge badge-danger text-capitalize small">{{  $property->status }}</apan>
                                                        @endif
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

                        <div class="row">
                            <div class="col-12 ml-2">
                                @if ($properties->hasPages())
                                    <div class="font-12">Page: {{ $properties->currentPage() }}</div>
                                    <div class="font-12">{{ $properties->count() }} out of {{ $properties->total() }} properties</div>
                                    <div>{{ $properties->links() }}</div>
                                @endif
                            </div>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if(count($properties))
    <script>
        $('#filter').on('change', function (){
            $("#formFilter").submit();
        });

        $('#status').on('change', function (){
            $("#formStatus").submit();
        });

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
@endsection
