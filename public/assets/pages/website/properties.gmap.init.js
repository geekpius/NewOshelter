
(function($) {
  "use strict";

  var map;
  var markers = [];
  var markerCluster;
  var styles;
  var propertiesList;
  var options = {
      zoom : 14,
      mapTypeId : 'Styled',
      panControl: false,
      zoomControl: true,
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      overviewMapControl: false,
      scrollwheel: false,
      zoomControlOptions: {
          position: google.maps.ControlPosition.RIGHT_BOTTOM,
      },
      fullscreenControl: false,
  };

  // removed "stylers": [{"color": "#e9e9e9"}]} to get colored map
  styles = [
    {"featureType": "water","elementType": "geometry","stylers": [{"lightness": 17}]},
    {"featureType": "landscape","elementType": "geometry","stylers": [{"lightness": 20}]},
    {"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},
    {"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"lightness": 29},{"weight": 0.2}]},
    {"featureType": "road.arterial","elementType": "geometry","stylers": [{"lightness": 18}]},
    {"featureType": "road.local","elementType": "geometry","stylers": [{"lightness": 16}]},
    {"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},
    {"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},
    {"elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},
    {"elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},
    {"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},
    {"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},
    {"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]}];

  
  propertiesList = $.parseJSON($.ajax({
      url: $("#propertyMainRow").data('href'),
      type: "GET",
      dataType: "json",
      async: false
  }).responseText);
  
  // alert(JSON.stringify(propertiesList.data))


  // propertiesList = [{
  //     id: 1,
  //     title: 'Chic Apartment in Downtown',
  //     photo: 'images/ph-thmb.jpg',
  //     position: {
  //         lat: '5.5739466',
  //         lng: '-0.1428917'
  //     },
  //     price: {
  //         long: '$890,000',
  //         short: '$890k'
  //     },
  //     link: 'single-property.html',
  //     features: {
  //         beds: 2,
  //         baths: 2,
  //         size: '920 SF'
  //     }
  // }];

  function CustomMarker(id, latlng, map, classname, html) {
      this.id        = id;
      this.latlng_   = latlng;
      this.classname = classname;
      this.html      = html;

      this.setMap(map);
  }

  CustomMarker.prototype = new google.maps.OverlayView();

  CustomMarker.prototype.draw = function() {
      var me = this;
      var div = this.div_;

      if (!div) {
          div = this.div_ = document.createElement('div');
          div.classList.add(this.classname);
          div.innerHTML = this.html;

          google.maps.event.addDomListener(div, 'click', function(event) {
              google.maps.event.trigger(me, 'click');
          });

          var panes = this.getPanes();
          panes.overlayImage.appendChild(div);
      }

      var point = this.getProjection().fromLatLngToDivPixel(this.latlng_);

      if (point) {
          div.style.left = point.x + 'px';
          div.style.top = point.y + 'px';
      }
  };

  CustomMarker.prototype.remove = function() {
      if (this.div_) {
          this.div_.parentNode.removeChild(this.div_);
          this.div_ = null;
      }
  };

  CustomMarker.prototype.getPosition = function() {
      return this.latlng_;
  };

  CustomMarker.prototype.addActive = function() {
      if (this.div_) {
          $('.pxp-price-marker').removeClass('active');
          this.div_.classList.add('active');
      }
  };

  CustomMarker.prototype.removeActive = function() {
      if (this.div_) {
          this.div_.classList.remove('active');
      }
  };

  function addMarkers(props, map) {
      $.each(props, function(i, prop) {
          var latlng = new google.maps.LatLng(prop.position.lat, prop.position.lng);
          let price = (prop.price=='')? prop.rooms:prop.price;
          var html = '<div class="pxp-marker-short-price">' + prop.currency + price + '</div>' + 
                      '<a href="' + prop.link + '" class="pxp-marker-details">' + 
                          '<div class="pxp-marker-details-fig pxp-cover" style="background-image: url(' + prop.photo + ');"></div>' + 
                          '<div class="pxp-marker-details-info">' + 
                              '<div class="pxp-marker-details-info-title">' + prop.title + '</div>' + 
                              '<div class="pxp-marker-details-info-price">' + prop.currency + price + '<small>'+prop.calendar+'</small></div>' + 
                              '<div class="pxp-marker-details-info-feat">' + prop.position.location + '</div>' + 
                          '</div>' + 
                      '</a>';

          var marker = new CustomMarker(prop.id, latlng, map, 'pxp-price-marker', html);

          marker.id = prop.id;
          markers.push(marker);
      });
  }

  setTimeout(function() {
      if($('#results-map').length > 0) {
          map = new google.maps.Map(document.getElementById('results-map'), options);
          var styledMapType = new google.maps.StyledMapType(styles, {
              name : 'Styled',
          });

          map.mapTypes.set('Styled', styledMapType);
          map.setCenter(new google.maps.LatLng(37.7577627,-122.4726194));
          map.setZoom(15);

          addMarkers(propertiesList.data, map);

          map.fitBounds(markers.reduce(function(bounds, marker) {
              return bounds.extend(marker.getPosition());
          }, new google.maps.LatLngBounds()));

          markerCluster = new MarkerClusterer(map, markers, {
              maxZoom: 18,
              gridSize: 60,
              styles: [
                  {
                      width: 40,
                      height: 40,
                  },
                  {
                      width: 60,
                      height: 60,
                  },
                  {
                      width: 80,
                      height: 80,
                  },
              ]
          });

          google.maps.event.trigger(map, 'resize');

          $('.pxp-results-card-1').each(function(i) {
              var propID = $(this).attr('data-prop');

              $(this).on('mouseenter', function() {
                  if (map) {
                      var targetMarker = $.grep(markers, function(e) {
                          return e.id == propID;
                      });

                      if(targetMarker.length > 0) {
                          targetMarker[0].addActive();
                          map.setCenter(targetMarker[0].latlng_);
                      }
                  }
              });
              $(this).on('mouseleave', function() {
                  var targetMarker = $.grep(markers, function(e) {
                      return e.id == propID;
                  });

                  if(targetMarker.length > 0) {
                      targetMarker[0].removeActive();
                  }
              });
          });
      }
  }, 300);

  var autocomplete;
  autocomplete= new google.maps.places.Autocomplete((document.getElementById("search_input")), {
      types: ['geocode']
  });
  

  $('#min_price, #max_price').keypress(function(event) {
      if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
              $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
    }).on('paste', function(event) {
      event.preventDefault();
    });
    
    $("#formSearch").on('submit', function(e){
      e.stopPropagation();
      if($("#location").val()==''){
          return false;
      }else{
          return true;
      }
      return false;
    });
    
    $("#formSearch #location, #formSearch status").on('keydown', function(e){
      e.stopPropagation();
      if(e.which==13){
          $("#formSearch").trigger("submit");
      }
    });

    autocomplete.addListener("place_changed", function() {
        const place = autocomplete.getPlace();
        if (place.place_id) {
            $("#formSearch").trigger("submit");
            return;
        }
    });
    

})(jQuery);