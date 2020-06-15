@if (count($rooms))
<hr class="mt-sm-5">
<h4 class="header-title mt-0 mb-3">Hostel Room Types Amenities. <small class="text-danger text-lowercase">Uncheck to remove amenity</small></h4>
<hr>
<div style="position: relative;  height: 460px; overflow-y:scroll; overflow-x:hidden;">
    <div class="activity">
        @foreach ($rooms as $item)
            <div class="parentDiv">
                <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
                <div class="time-item">
                    <div class="item-info">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="m-0">{{ $item->propertyHostelBlock->block_name }} - <small class="text-primary">{{ $item->block_room_type }} ({{ $item->gender }})</small></h6>
                         </div>
                         
                        <div class="mt-4">
                           @if(count($item->hostelRoomAmenities))
                           @foreach ($item->hostelRoomAmenities as $amenity)
                           <span class="mr-4 font-12 removeAmenity" style="cursor:pointer" data-href="{{ route('property.room.amenities.delete', $amenity->id) }}"><span class="fa fa-check-square text-success"></span>  {{ $amenity->name }}</span> 
                           @endforeach   
                           @else
                           <p class="text-danger">No amenity reported</p>
                           @endif                                             
                        </div>
                        <hr>
                    </div>
                </div> 
            </div>   
        @endforeach                                                                                                                     
    </div>
</div>

<script>
$(".removeAmenity").on("click", function(e){
    e.stopPropagation();
    $this = $(this);
    $.ajax({
        url: $this.data('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){    
                $this.fadeOut('slow', function(){
                    $this.remove();
                });
            }
        },
        error: function(resp){
            alert("Something went wrong with request");
        }
    });

    return false;
});
</script>
@endif
