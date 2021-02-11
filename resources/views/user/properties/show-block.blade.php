@if (count($blocks))
    <table id="myBlockTable" class="table table-striped mt-2">
        <thead>
            <tr class="font-12 text-primary">
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
                }else{
                    swal('Warning', resp, 'warning');
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
        return false;
    });
    </script>
@else
<div class="text-danger mt-2 font-13 text-center">No hostel block name added <br>Please add block names before you move next</div>
@endif