(function($) {
    "use strict";

    var map;
    var marker = [];
    var styles;

    // Property map marker position
    var propLat = '5.5739466';
    var propLng = '-0.1428917';

    var options = {
        zoom : 15,
        mapTypeId : 'Styled',
        panControl: false,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: true,
        overviewMapControl: false,
        scrollwheel: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_BOTTOM,
        },
        fullscreenControl: true,
    };

    // styles = [{"featureType": "water","elementType": "geometry","stylers": [{"color": "#e9e9e9"},{"lightness": 17}]},{"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 16}]},{"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},{"elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},{"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]}];

    function CustomMarker(latlng, map, classname) {
        this.latlng_   = latlng;
        this.classname = classname;

        this.setMap(map);
    }

    CustomMarker.prototype = new google.maps.OverlayView();

    CustomMarker.prototype.draw = function() {
        var me = this;
        var div = this.div_;

        if (!div) {
            div = this.div_ = document.createElement('div');
            div.classList.add(this.classname);

            let source  = document.getElementById('pxp-contact-map');
            let img = document.createElement("img");
            img.src = source.getAttribute('data-image');
            img.classList.add(this.classname);
            div.appendChild(img);

            var panes = this.getPanes();
            panes.overlayImage.appendChild(div);
        }

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);

        if (point) {
            div.style.left = point.x + 'px';
            div.style.top = point.y + 'px';
        }
    };

    function addContactMarker(propLat, propLng, map) {
        var latlng = new google.maps.LatLng(propLat, propLng);
        marker = new CustomMarker(latlng, map, 'pxp-single-marker');
    }

    setTimeout(function() {
        if($('#pxp-contact-map').length > 0) {
            map = new google.maps.Map(document.getElementById('pxp-contact-map'), options);
            var styledMapType = new google.maps.StyledMapType({
                name : 'Styled',
            });
            var center = new google.maps.LatLng(propLat, propLng);

            map.mapTypes.set('Styled', styledMapType);
            map.setCenter(center);
            map.setZoom(16);

            addContactMarker(propLat, propLng, map);

            google.maps.event.trigger(map, 'resize');
        }
    }, 300);


    $("#formContact").on("submit", function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var valid = true;
        $('#formContact input, #formContact select, #formContact textarea').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                if($this.attr("name")!="phone"){
                    valid = false;
                    $this.parents('.validate').find('.mySpan').text(`The ${$this.attr('name').replace(/[\_]+/g, ' ')} field is required`);
                }
            }
        });
        if(valid){
            $(".pxp-contact-form-btn").html('<i class="fa fa-spin fa-spinner"></i> Sending Message...').attr('disabled', true);
            var data  = $this.serialize();
            $.ajax({
                url: $this.data('url'),
                type: "POST",
                data: data,
                success: function(resp){
                    if(resp=='success'){
                        swal("Submitted", "Your message is sent", "success");
                        $("#formContact input[name='name']").val('');
                        $("#formContact input[name='email']").val('');
                        $("#formContact input[name='help_desk']").val('');
                        $("#formContact input[name='phone']").val('');
                        $("#formContact textarea[name='message']").val('');
                    }
                    else{
                        swal("Warning",resp, "warning");
                    }
                    $(".pxp-contact-form-btn").html('<i class="fa fa-send"></i> Send Message').attr('disabled', false);
                },
                error: function(resp){
                    alert("Something went wrong with your request");
                    $(".pxp-contact-form-btn").html('<i class="fa fa-send"></i> Send Message').attr('disabled', false);
                }
            });
        }
        return false;
    });
    

     //check remaining characters
     var maxNumber = 500;
     var counter = $("#formContact textarea[name='message']").val().length;
     maxNumber=maxNumber-counter;
     $("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");
     
     $("#formContact textarea[name='message']").on("input", function(){
         var maxNumber = 500;
         var $this = $(this);
         if($this.val()!=""){
             var counter = $this.val().length;
             maxNumber=maxNumber-counter;
             $("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");
         }else{
             $("#myMessageCharacters").text(maxNumber.toString()+" characters remaining");
         }
     });

    
    $("#formContact input, #formContact textarea").on('input', function(){
        if($(this).val()!=''){
            $(this).parents('.validate').find('.mySpan').text('');
        }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required.'); }
    });
    
    $("#formContact select").on('change', function(){
        if($(this).val()!=''){
            $(this).parents('.validate').find('.mySpan').text('');
        }else{ 
            $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });


})(jQuery);