<table id="myTable" class="table table-striped small">
    <thead>
        <tr>
            <th>Block Name</th>
            <th>Room Type</th>
            <th>No(Rooms)</th>
            <th>Per Room</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blocks as $item)
        <tr class="records">
            <td>{{ $item->block_name }}</td>
            <td>{{ $item->type }}</td>
            <td class="text-right text-primary">{{ $item->no_room }}</td>
            <td class="text-right text-pink">{{ $item->per_room }}</td>
            <td class="text-center">
                <a href="javascript:void(0);" title="Remove" data-href="{{ route('property.block.delete', $item->id) }}" class="btnRemoveBlock"><i class="fa fa-times text-danger"></i></a>
            </td>
        </tr>    
        @endforeach
    </tbody>
</table>
<script>
$(".btnRemoveBlock").on("click", function(){
    var $this = $(this);
    $.ajax({
        url: $this.data('href'),
        type: "GET",
        success: function(resp){
            if(resp=='success'){
                $this.parents('.records').fadeOut('slow', function(){
                    $this.parents('.records').remove();
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