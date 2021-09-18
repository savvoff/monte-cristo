<?php
/*
  Template Name: Contacts page
  Template Post Type: page
  */
get_header();

$addresses = get_field('addresses');

$mg = get_field('messengers', 'option');
?>

<section class="page-section py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="row text-center">
          <div class="col-12">
            <h1 class="h2 page-section__title mb-3 mb-sm-5"><?php the_title() ?></h1>
          </div>
        </div>
        <div class="row justify-content-center align-items-center mb-5">
          <?php
          $phone = get_field('phone', 'option');
          $tel = preg_replace('/[^0-9+]+/', '', $phone);
          ?>
          <a class="h4 text-primary m-0" href="tel:<?php esc_attr_e($tel); ?>"><?php esc_html_e($phone); ?></a>
          <div class="socials d-flex align-items-center rounded m-3">
            <a class="d-inline-flex bg-white border rounded-circle mr-3" href="<?php echo $mg['telegram'] ?>" target="_blank" rel="nofollow">
              <i class="fab fa-fw fa-lg fa-telegram m-auto"></i>
            </a>
            <a class="d-inline-flex bg-white border rounded-circle mr-3" href="<?php echo $mg['viber'] ?>" target="_blank" rel="nofollow">
              <i class="fab fa-fw fa-lg fa-viber m-auto"></i>
            </a>
            <small class="text-secondary">связаться <br>с нами</small>
          </div>
        </div>
      </div>
      <div class="col-12 text-center">
        <p class="h2 page-section__title mb-3 mb-sm-5"><?php echo __('Наши адреса', 'kayak') ?></p>
      </div>
      <div class="col-12 col-lg-11">
        <div class="row">
          <div class="col-12 col-lg-5">
            <div class="map form-inline">
              <?php
              foreach ((array)$addresses as $key => $address) :
                $class = ($key == 0) ? 'is-filled border-y' : 'border-bottom';
              ?>
                <div class="form-group form-check w-100 <?php echo $class ?> border-light-blue py-2">
                  <span class="circle mr-n4"></span>
                  <input class="form-control" type="radio" name="map" id="map<?php echo $key ?>" <?php echo ($key == 0) ? 'selected' : '' ?>>
                  <label class="col-form-label mx-2" for="map<?php echo $key ?>"><?php echo $address['address'] ?></label>
                </div>
              <?php
              endforeach;
              ?>
            </div>
          </div>
          <div class="col-12 col-lg-7">
            <a href="https://maps.google.com/maps?q=<?php echo $addresses[0]['lat'] . ',' . $addresses[0]['lng'];?>&t=m&z=15" class="d-block acf-map ratio-16x9 rounded overflow-hidden" data-zoom="16" target="_blank">
              <?php
              foreach ((array)$addresses as $address) :
              ?>
                <div class="marker" data-lat="<?php esc_attr_e($address['lat']); ?>" data-lng="<?php esc_attr_e($address['lng']); ?>"></div>
              <?php
              endforeach;
              ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('api_key', 'option') ?>"></script>
<script type="text/javascript">
  (function($) {
    var myLatLng = {};
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    /**
     * initMap
     *
     * Renders a Google Map onto the selected jQuery element
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @return  object The map instance.
     */
    function initMap($el) {

      // Find marker elements within map.
      var $markers = $el.find('.marker');

      // Create gerenic map.
      var mapArgs = {
        zoom: $el.data('zoom') || 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        fullscreenControl: false,
        panControl: true,
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: true,
        rotateControl: true
      };
      var map = new google.maps.Map($el[0], mapArgs);

      // Add markers.
      map.markers = [];
      $markers.each(function(i, el) {
        initMarker($(el), map, i);
      });

      // Center map based on markers.
      centerMap(map);

      // Return map instance.
      return map;
    }

    /**
     * initMarker
     *
     * Creates a marker for the given jQuery element and map.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @param   object The map instance.
     * @return  object The marker instance.
     */
    function initMarker($marker, map, i) {

      // Get position from marker.
      var lat = $marker.data('lat');
      var lng = $marker.data('lng');
      var latLng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
      };

      // Create marker instance.
      var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        icon: {
          url: "<?php echo KAYAK_URI ?>/dist/img/sprites/sprite.svg#marker",
          scaledSize: new google.maps.Size(38, 45)
        }
      });
      // marker.addListener('click', function() {        
      //   directionsDisplay.setMap(null);
      //   directionsService.route({
      //     origin: myLatLng,
      //     destination: latLng,
      //     travelMode: 'DRIVING'
      //   }, function(response, status) {
      //     if (status === 'OK') {
      //       directionsDisplay.setDirections(response);
      //     } else {
      //       alert('Directions request failed due to ' + status);
      //     }
      //   });
      //   directionsDisplay.setMap(map);
      // });
      $('.map .form-control').eq(i).on('change', function() {
        map.setCenter(latLng);
        $('.acf-map').attr('href', 'https://maps.google.com/maps?q=' + latLng.lat + ',' + latLng.lng + '&t=m&z=15');
      });

      // Append to reference for later use.
      map.markers.push(marker);

      // If marker contains HTML, add it to an infoWindow.
      if ($marker.html()) {

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
      }
    }

    /**
     * centerMap
     *
     * Centers the map showing all markers in view.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   object The map instance.
     * @return  void
     */
    function centerMap(map) {
      // Create map boundaries from all map markers.
      var bounds = new google.maps.LatLngBounds();
      map.markers.forEach(function(marker) {
        bounds.extend({
          lat: marker.position.lat(),
          lng: marker.position.lng()
        });
      });
      map.setCenter(map.markers[0].getPosition());
      // // Case: Single marker.
      // if (map.markers.length == 1) {
      //   map.setCenter(bounds.getCenter());

      //   // Case: Multiple markers.
      // } else {
      //   map.fitBounds(bounds);
      // }
    }

    function geoSuccess(position) {
      myLatLng.lat = position.coords.latitude;
      myLatLng.lng = position.coords.longitude;
    }

    function geoError() {
      console.log("Geocoder failed.");
    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }
    // Render maps on page load.
    $(document).ready(function() {
      $('.acf-map').each(function() {
        var map = initMap($(this));
      });
      getLocation();
      $('[name="map"]').on('click', function() {
        var top = $('.acf-map').offset().top;
        $('body, html').animate({
          scrollTop: top - $('.acf-map').height() / 2
        }, 1000);
      });
    });

  })(jQuery);
</script>
<?php get_footer(); ?>