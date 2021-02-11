@if (count($prices))
<h6 class="header-title mt-0 mb-3">Hostel Room Types Prices</h6>
<hr>
<div style="position: relative;  height: 460px; overflow-y:scroll; overflow-x:hidden;">
    <div class="activity">
    @foreach ($prices as $item)
        <div class="parentDiv">
            <div class="time-item">
                <div class="item-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0">{{ $item->propertyHostelBlock->block_name }}</h6>
                    </div>
                    <p class="mt-1 font-13">
                        <span class="text-primary">{{ $item->block_room_type }} ({{ $item->gender }})</span> with {{ $item->block_no_room }} rooms of {{ ($item->person_per_room==1)? $item->person_per_room.' person':$item->person_per_room.' persons' }} per room.
                    </p>
                    <div class="removeDiv">
                        @if(!empty($item->propertyHostelPrice))
                        <span class="badge badge-soft-primary font-13"><span class="font-15">{{ $item->propertyHostelPrice->currency }}</span> {{ number_format($item->propertyHostelPrice->property_price,2) }}/ {{ $item->propertyHostelPrice->price_calendar }} </span>                                                  
                        <span class="badge badge-soft-primary font-13">{{ $item->propertyHostelPrice->getPaymentDuration() }}</span> 
                        <span data-href="{{ route('property.blockprice.delete',$item->propertyHostelPrice->id) }}" class="text-danger float-right font-13 remove-property-image btnDelete">Remove</span>  
                        @else
                        <p class="text-danger font-13">Price is not set</p>                                               
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
$(".btnDelete").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $this = $(this);
    $.ajax({
        url: $this.data('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){    
                $this.parents(".parentDiv").find('.removeDiv').fadeOut('slow', function(){
                    $this.parents('.parentDiv').find('.removeDiv').remove();
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
