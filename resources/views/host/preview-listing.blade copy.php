@extends('layouts.host')

@section('styles')
<link href="{{ asset('assets/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<style>
    .big-property-image-size{
        width: 100%;
        height: 360px;
        border-radius: 0.5%;
    }
    .small-property-image-size{
        width: 100%;
        height: 165px;
        border-radius: 0.5%;
    }
    .img-thumbnail{
        padding: 0px !important;
    }
    .img-right{
        float: right;
        clear: left;
    }
    .img-left{
        float: left;
        clear: right;
    }

    @media (max-width: 450px){
        .big-property-image-size{
            width: 100%;
            height: 200px !important;
            border-radius: 0.5%;
        }
        .remove-on-small{
            display: none;
        }
    }

    @media (max-width: 880px){
        .big-property-image-size{
            width: 100%;
            height: 200px !important;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 90px !important;
            border-radius: 0.5%;
        }
    }
    @media (max-width: 1024px){
        .big-property-image-size{
            width: 100%;
            height: 260px;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 120px;
            border-radius: 0.5%;
        }
    }
    @media (min-width: 2560px){
        .big-property-image-size{
            width: 100%;
            height: 700px;
            border-radius: 0.5%;
        }
        .small-property-image-size{
            width: 100%;
            height: 330px;
            border-radius: 0.5%;
        }
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Preview Mode</li>
                    </ol>
                </div>
                <h4 class="page-title">Preview Mode</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <a href="javascript:void(0);" class="mr-2 text-primary"><i class="fa fa-save"></i> Save</a>
                        <a href="javascript:void(0);" class="ml-2 text-primary"><i class="fa fa-share"></i> Share</a>
                    </div><hr>
                    <div class="row">
                        <!-- Images -->
                        <div class="col-lg-7 col-md-6 col-sm-6 p-0 nf-item img-thumbnail">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image big-property-image-size" href="{{ asset('assets/images/properties/'.$image->image) }}" title="{{ $image->caption }}">
                                    <img class="item-container big-property-image-size" src="{{ asset('assets/images/properties/'.$image->image) }}" alt="property_photo1" />
                                    <div class="item-mask">
                                        <div class="item-caption">
                                            <h5 class="text-white">{{ $image->caption }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div><!--end item-box-->
                        </div><!--end col-->
                        <div class="col-lg-5 col-sm-6 col-md-6">
                            <div class="row pt-2">
                                @php $i = 1; @endphp
                                @foreach ($images as $item)
                                @php $i++; @endphp
                                <div class="col-lg-6 col-md-6 col-sm-6 p-0 nf-item img-thumbnail remove-on-small">
                                    <div class="item-box">
                                        <a class="cbox-gallary1 mfp-image small-property-image-size" href="{{ asset('assets/images/properties/'.$item->image) }}" title="{{ $item->caption }}">
                                            <img class="item-container small-property-image-size" src="{{ asset('assets/images/properties/'.$item->image) }}" alt="property_photo{{$i}}" />
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <h5 class="text-light">{{ $item->caption }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div><!--end item-box-->
                                </div><!--end col-->
                                @endforeach 
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12"><hr></div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-8 col-sm-8">
                            <!-- Title and Location -->
                            <div class="img-right mr-lg-5 mr-sm-5 text-center">
                                <img src="{{ (empty($property->admin->image))? asset('assets/images/users/user-4.jpg'):asset('assets/images/users/'.$property->admin->image) }}" alt="{{ current(explode(' ',$property->admin->name)) }}" width="60" height="60"  class="rounded-circle" /> 
                                <p>{{ current(explode(' ',$property->admin->name)) }}</p>
                            </div>
                            <h3><b>{{ $property->title }}</b> (<a href="javascript:void(0);" class="text-primary"><i class="fa fa-edit"></i> Edit Listing</a>)</h3>
                            <p><i class="fa fa-map-marker-alt text-success"></i> {{  $property->propertyLocation->location  }} - <a href="javascript:void(0);" class="text-primary" target="_blank">{{ $property->propertyLocation->digital_address }}</a> </p>
                            
                            <hr>
                            <!-- Contained amenities -->
                            <p><i class="fa fa-home text-success"></i> <b>{{  ucwords(str_replace('_',' ',$property->type))  }} in {{  strtolower($property->base)  }} </b> </p>   
                            @if ($property->type=='hostel')
                            @if (count($property->propertyHostelBlocks))
                                <div style="position: relative;  height: 260px; overflow-y:scroll; overflow-x:hidden;">
                                    <div class="activity">
                                    @foreach ($property->propertyHostelBlocks as $block)
                                        <div class="parentDiv">
                                            <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6 class="m-0">{{ $block->block_name }} Block</h6>
                                                    </div>
                                                    <p class="mt-3">
                                                        {{ ucfirst(strtolower($block->type)) }} with {{ $block->no_room }} rooms with {{ $block->per_room }} person per room. 

                                                    </p>
                                                    <div>
                                                        <span class="badge badge-soft-primary">{{ $block->bed }} bed per room </span>                                                  
                                                        @if($block->kitchen)
                                                        <span class="badge badge-soft-primary">Kitchen</span>
                                                        @endif        
                                                        <span class="badge badge-soft-primary">{{ $block->bathroom }} bathroom(s) & it's {{ ($block->bath_private)? 'private bath':'shared bath' }}</span>                                          
                                                        <span class="badge badge-soft-primary">{{ $block->toilet }} toilet(s) & it's {{ ($block->toilet_private)? 'private toilet':'shared toilet' }}</span>                                          
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>   
                                    @endforeach                                                                                                                                
                                    </div>
                                </div>        
                            @endif  
                            @endif 

                            <hr>
                            <!-- Amenities -->
                            <h5><b>Amenities</b></h5>
                            @if (count($property->propertyAmenities))
                            <div class="row">
                                @foreach ($property->propertyAmenities as $amen)
                                <div class="col-sm-6">
                                    <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $amen->name }}</p>
                                </div>                                
                                @endforeach
                            </div>
                            @else
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No amenities reported on property.</p>
                            @endif

                            <hr>
                            <!-- Vacancies -->
                            <h5><b>Vacancy</b></h5>
                            @if ($property->type=='hostel')
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> You will get to know your room mate when renting is 
                                confirmed. Click on vacant block room to book.
                            </p>
                            @if (count($property->propertyHostelBlocks))
                                @foreach ($property->propertyHostelBlocks as $block)
                                    <div class="parentDiv mb-3">
                                        <h6><i class="fa fa-square text-success" style="font-size:9px"></i> {{  $block->block_name  }} Block - <b>{{ $block->propertyHostelPrice->currency }} {{ number_format($block->propertyHostelPrice->property_price,2) }}</b>  <small><b>per {{ $block->propertyHostelPrice->price_calendar }}</b></small></h6>
                                        @foreach ($block->hostelBlockRooms as $item)  
                                            <a href="javascript:void(0);" class="btnBookHostel" data-id="{{ $item->id }}" data-blockid="{{ $block->id }}" data-block="{{ $block->block_name }} Block">  
                                                <span class="badge {{ ($item->full)? 'badge-danger':'badge-success' }} mb-1 mr-1">
                                                        Room {{ $item->room }} {{ ($item->full)?'Not Available':'Available' }} ({{ $item->no_person-$item->occupant }} space)
                                                </span>    
                                            </a>                                                                                      
                                        @endforeach
                                    </div> 
                                @endforeach       
                            @endif  
                            @endif 

                            <hr>
                            <!-- Reviews -->
                            <h5><b>Reviews</b></h5>
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No reviews yet</p>
                            <p>Give the star {{ current(explode(' ',$property->admin->name)) }}'s property deserve</p> 

                            <hr>
                            <!-- Refund policy -->
                            <div>
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="Logo" width="30" height="30"  class="rounded-circle img-left mr-3" /> 
                                <p>We never rest because we care. Real Home is here to protect both interest. All rent rent, sell and auction is covered 
                                    by Real Home's <a href="javascript:void(0)" class="text-primary">Tenant Refund Policy</a>.
                                </p>
                            </div>

                            <hr>
                            <!-- Contact -->
                            <div class="img-right mr-lg-5 mr-sm-5 text-center">
                                <img src="{{ (empty($property->admin->image))? asset('assets/images/users/user-4.jpg'):asset('assets/images/users/'.$property->admin->image) }}" alt="{{ current(explode(' ',$property->admin->name)) }}" width="60" height="60"  class="rounded-circle" /> 
                            </div>
                            <h4><b>Hosted by {{ current(explode(' ',$property->admin->name)) }}</b></h4>                           
                            <p>{{ empty($property->admin->profile->city)? '':$property->admin->profile->city }} - Joined {{ \Carbon\Carbon::parse($property->admin->created_at)->format('F, Y') }}</p>                           
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Contact Landlord</button>     
                            <hr>
                            <div>
                                <p><b>Communication always happens on Real Home's platform.</b> For the protection of your payments, never make  
                                payments outside Real Home's website and app.</p>    
                            </div>     

                            <hr>
                            <!-- The descriptions and directions -->
                            <h5><b>The description, neighbourhood and directions</b></h5>       
                            <div class="card mt-4">
                                <div class="card-body">        
                                    <h6 class="mt-0">{{ current(explode(' ',$property->admin->name)) }}'s property is located @ {{ $property->propertyLocation->location }}</h6>     
                                    <div id="gmaps-markers" class="gmaps"></div>
                                </div><!--end card-body-->
                            </div>                    
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i>  Description and directions 
                                @if($property->type_status=='rent')
                                are given out to tenant after renting is confirmed.
                                @elseif($property->type_status=='sell')
                                are given out to buyer after buying is confirmed.
                                @else
                                are given out to highest bidder after auctioning is won.
                                @endif
                            </p>                           
                            <hr>     
                            <h5><b>Cancellation {{ $property->type_status=='rent'? 'and Eviction':'' }}</b></h5>  
                            <p>
                                <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                Cancellation is free up to 72 hours after 
                                @if($property->type_status=='rent')
                                renting is confirmed.
                                @elseif($property->type_status=='sell')
                                buying is confirmed.
                                @else
                                auctioning is won and confirmed.
                                @endif
                            </p>       
                            <p>
                                <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                Cancellation after 72 hours of
                                @if($property->type_status=='rent')
                                renting will attract pernalty of waiting for that property to be rented.
                                @elseif($property->type_status=='sell')
                                buying will attract pernalty of waiting for that property to be bought.
                                @else
                                auctioning will attract pernalty of waiting for that property to be auctioned.
                                @endif
                                 
                            </p>  
                            @if($property->type_status=='rent')   
                            <p>
                                <i class="fa fa-minus-circle" style="font-size: 9px"></i> 
                                Eviction notice will be sent to tenants 3 months before time. Tenants will wish to extend or evict.
                            </p>
                            @endif                        

                            <hr>
                            <!-- Property rules -->
                            <h5><b>Property Rules</b></h5>
                            @if (count($property->propertyRules))
                            <div class="row">
                                @foreach ($property->propertyRules as $rule)
                                <div class="col-sm-6">
                                    <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $rule->rule }}</p>
                                </div>                                
                                @endforeach
                            </div>
                            @else
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No rule reported on property</p>
                            @endif
                                  
                            @if (count($property->propertyOwnRules))
                            <div class="row">
                                @foreach ($property->propertyOwnRules as $rule)
                                <div class="col-sm-6">
                                    <p><i class="fa fa-check-square text-success" style="font-size: 12px"></i> {{ $rule->rule }}</p>
                                </div>                                
                                @endforeach
                            </div>
                            @else
                            <p><i class="fa fa-dot-circle" style="font-size: 9px"></i> No rule reported on property</p>
                            @endif
                        </div><!-- end col -->

                        <div class="col-lg-12 col-sm-12"></div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <hr>
                            <!-- Interested properties -->
                            <h5><b>Properties you may be interested in</b></h5>
                            
                            <hr>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 

    
    @if ($property->type=='hostel')
    <!-- tutorial modal -->
    <div id="hostelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hostelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="hostelModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formCheckHost">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary">Submit</button>
                        <button type="button" class="btn btn-gradient-danger">Cancel</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif

        
</div><!-- container -->

@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/filter/jquery.magnific-popup.min.js') }}"></script>
<script>
$('.mfp-image').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  mainClass: 'mfp-fade',
  gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
          // Will preload 0 - before current, and 1 after the current image 
  }
});


@if ($property->type=='hostel')
$(".btnBookHostel").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#hostelModal .modal-title").text($this.data('block'));
    $("#hostelModal").modal();
    return false;
})
@endif
</script>
@endsection