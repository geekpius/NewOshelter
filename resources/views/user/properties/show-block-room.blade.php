<div class="text-danger mt-4 font-13 text-center"><strong>Note:</strong> Please make sure to add rooms to your blocks</div>
<div class="table-responsive">
    <table id="myBlockRoomTable" class="table table-striped small">
        <thead>
            <tr class="text-primary">
                <th>Block Name</th>
                <th>Room Type</th>
                <th>Gender</th>
                <th>Rooms on Block</th>
                <th>Persons</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blocks as $item)
                @foreach ($item->hostelBlockRooms as $room)
                <tr class="records">
                    <td>{{ $item->block_name }}</td>
                    <td>{{ $room->block_room_type }}</td>
                    <td>{{ $room->gender }}</td>
                    <td>{{ $room->block_no_room }}</td>
                    <td>{{ $room->person_per_room }}</td>
                    <td class="">
                        <a href="{{ route('property.blockroom.delete', $room->id) }}" title="Remove {{ $item->block_name }}" class="btnRemoveBlock"><i class="fa fa-times-circle text-danger"></i></a>
                    </td>
                </tr>  
                @endforeach  
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(".btnRemoveBlock").on("click", function(e){
    e.preventDefault();
    var $this = $(this);
    $.ajax({
        url: $this.attr('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){
                $this.parents('.records').fadeOut('slow', function(){
                    $this.parents('.records').remove();
                });
            }
        },
        error: function(resp){
            console.log("Something went wrong with request");
        }
    });
    return false;
});
</script>