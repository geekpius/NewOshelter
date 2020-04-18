@if (count($rules))
@foreach ($rules as $item)
<tr class="records">
    <td><i class="fa fa-check-square text-primary font-12"></i> {{ $item->rule }}</td>
    <td class="pb-2"><a href="javascript:void(0);" data-href="{{ route('property.rule.delete', $item->id) }}" class="text-danger ml-3 btnRemoveRule"><i class="fa fa-trash"></i></a></td>
</tr>   
@endforeach 
        

<script>
    $(".btnRemoveRule").on("click", function(){
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
@endif