@if (count($prices))
<h4 class="header-title mt-0 mb-3">Hostel Block Prices</h4>
<div style="position: relative;  height: 460px; overflow-y:scroll; overflow-x:hidden;">
    <div class="activity">
    @foreach ($prices as $item)
        <div class="parentDiv">
            <i class="mdi mdi-checkbox-marked-circle-outline icon-success"></i>
            <div class="time-item">
                <div class="item-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0">{{ $item->propertyHostelBlock->block_name }} Block</h6>
                        <span data-href="{{ route('property.blockprice.delete',$item->id) }}" class="text-danger remove-property-image btnDelete">Remove</span>
                    </div>
                    <p class="mt-3">
                        {{ $item->propertyHostelBlock->type }} with {{ $item->propertyHostelBlock->no_room }} rooms.
                    </p>
                    <div>
                        <span class="badge badge-soft-primary">{{ $item->currency }} {{ number_format($item->property_price,2) }} per {{ $item->price_calendar }} </span>                                                  
                        <span class="badge badge-soft-primary">
                            @if($item->payment_duration==3)
                            3 months advance payment
                            @elseif($item->payment_duration==6)
                            6 months advance payment
                            @elseif($item->payment_duration==12)
                            1 year advance payment
                            @elseif($item->payment_duration==24)
                            2 years advance payment
                            @endif
                        </span>                                                  
                    </div>
                </div>
            </div> 
        </div>   
    @endforeach                                                                                                                                
    </div>
</div>

<script>
$(".btnDelete").on("click", function(e){
    e.stopPropagation();
    $this = $(this);
    $.ajax({
        url: $this.data('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){    
                $this.parents(".parentDiv").fadeOut('slow', function(){
                    $this.parents('.parentDiv').remove();
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
