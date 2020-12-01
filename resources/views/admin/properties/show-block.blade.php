<table id="myTable" class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Block Name</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blocks as $item)
        <tr class="records">
            <td>{{ $item->block_name }}</td>
            <td class="">
                <a href="{{ route('property.block.delete', $item->id) }}" title="Remove {{ $item->block_name }}" class="btnRemoveBlock"><i class="fa fa-times-circle text-danger"></i></a>
            </td>
        </tr>    
        @endforeach
    </tbody>
</table>
<script>
$(".btnRemoveBlock").on("click", function(){
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
            alert("Something went wrong with request");
        }
    });
    return false;
});
</script>