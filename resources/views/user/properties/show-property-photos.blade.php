@php $i = 0; @endphp
@foreach ($images as $item)
@php $i++; @endphp
<div class="col-lg-6 col-sm-4 col-xs-4 img-thumbnail mb-2 p-2 propertyImage">
    <i class="fa fa-trash text-danger float-left clearfix remove-property-image btnDelete" data-href="{{ route('property.photos.delete',$item->id) }}"> Remove</i>
    <img src="{{ asset('assets/images/properties/'.$item->image) }}" class="property-image-width" heigth="120" alt="property_photo{{$i}}">
    <input type="text" data-id="{{ $item->id }}" name="caption" value="{{ $item->caption }}"  class="form-control inputCaption" placeholder="Caption" style="border-top: none; height:40px">
</div>
@endforeach

<script>
    $(".btnDelete").on("click", function(e){
        e.stopPropagation();
        $this = $(this);
        $.ajax({
            url: $this.data('href'),
            type: "GET",
            success: function(resp){
                if(resp=='success'){
                    $this.parent(".propertyImage").fadeOut('slow', function(){
                        $this.parent('.propertyImage').remove();
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

    $(".inputCaption").on("focusout", function(e){
        $this = $(this);
        var data = {id:$this.data('id'), name:$this.val()}
        $.ajax({
            url: "{{ route('property.caption.submit') }}",
            type: "POST",
            data: data,
            success: function(resp){
                
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    });
</script>