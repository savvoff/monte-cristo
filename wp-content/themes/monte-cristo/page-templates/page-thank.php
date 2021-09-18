<?php
/*
  Template Name: Thank you page
  Template Post Type: page
  */
get_header();

global $post;

get_page_part('/page-parts/part-hero', array(
  'class' => 'text-center',
  'title' => get_the_title(),
  'desc'  => get_field('subtitle'),
  'info'  => wpautop($post->post_content),
  'img'   => get_field('image')['url'],
  'img_mob'   => get_field('image_mob')['url']
));
?>
<?php
$event_title = get_field('event_title');
$event_desc = get_field('event_desc');
$event_caption = get_field('event_caption');
?>
<section class="page-section py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-11 col-xl-10">
        <?php if ($event_title) : ?>
          <div class="row">
            <div class="col-12">
              <h3 class="page-section__title mb-3 mb-sm-5"><?php echo $event_desc; ?></h3>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-12">
            <?php if ($event_title) : ?>
              <p class="h4 font-weight-normal text-primary mb-3 mb-sm-5"><?php echo $event_title; ?></p>
            <?php endif; ?>
            <ul class="row">
              <?php foreach ((array)get_field('event_steps') as $key => $item) : ?>
                <li class="col-12 <?php echo $key % 2 == 0 ? 'col-lg-4' : 'col-lg-8'; ?> h6 font-weight-normal text-primary pl-sm-4 pl-xl-5 mb-3 mb-md-5"><?php echo $item['text']; ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if ($event_caption) : ?>
              <p class="h4 font-weight-normal text-primary"><?php echo $event_caption; ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$impression_bg = get_field('impression_bg');
$impression_desc = get_field('impression_desc');
?>
<section class="page-section">
  <?php if ($impression_bg) : ?>
    <figure class="img-fit img-fit_top ratio-11x4 mb-4 mb-xl-6">
      <img class="position-absolute img-fluid" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $impression_bg['url']; ?>" alt="<?php echo $impression_bg['alt']; ?>">
    </figure>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-11 col-xl-10">
        <?php if ($impression_desc) : ?>
          <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-10">
              <p class="h4 text-primary font-weight-normal mb-4 mb-xl-6">
                <?php echo $impression_desc; ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <?php foreach ((array)get_field('impression_briefings') as $item) : ?>
            <div class="col-12 col-lg-6">
              <div class="ratio-16x9 img-fit overflow-hidden rounded mb-3">
                <div data-video data-id="<?php echo getYoutubeID($item['video']); ?>"></div>
                <img class="position-absolute" src="<?php echo $item['banner']['url']; ?>" width="" height="" alt="<?php echo $item['banner']['alt']; ?>">

                <button class="btn btn-video" type="button" aria-label="Video button">
                  <svg class="icon-play">
                    <use xlink:href="#play"></use>
                  </svg>
                </button>
              </div>
              <p class="h6 text-primary font-weight-normal"><?php echo $item['caption']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$find_title = get_field('find_title');
$addresses = get_field('addresses');
?>
<section class="page-section py-4 py-lg-6">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-11 col-xl-10">
        <?php if ($find_title) : ?>
          <div class="row">
            <div class="col-12">
              <h2 class="h1 page-section__title text-center mb-3 mb-sm-5"><?php echo $find_title; ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-2xl-8 map form-inline justify-content-center mb-5">
            <?php foreach ((array)$addresses as $key => $address) : ?>
              <button type="button" class="btn mr-3 mb-3<?php echo ($key == 0) ? ' btn-secondary' : ' bg-white border-secondary text-secondary'; ?>" id="map<?php echo $key ?>" style="border-width: 2px;"><?php echo $address['address'] ?></button>
            <?php endforeach; ?>
          </div>
          <div class="col-12">
            <a href="https://maps.google.com/maps?q=<?php echo $addresses[0]['lat'] . ',' . $addresses[0]['lng']; ?>&t=m&z=15" class="d-block acf-map ratio-16x9 rounded overflow-hidden" data-zoom="16" target="_blank">
              <?php foreach ((array)$addresses as $address) : ?>
                <div class="marker" data-lat="<?php esc_attr_e($address['lat']); ?>" data-lng="<?php esc_attr_e($address['lng']); ?>"></div>
              <?php endforeach; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$take_title = get_field('take_title');
$take_things = get_field('take_things');
?>
<section class="page-section take-with">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-11 col-xl-10">
        <?php if ($take_title) : ?>
          <div class="row">
            <div class="col-12">
              <h2 class="h1 page-section__title text-center mb-3 mb-sm-5"><?php echo $take_title; ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <?php foreach ((array)$take_things as $item) : ?>
            <div class="d-flex col-12 col-md-6 mb-4">
              <figure class="img-fit img-fit_contain mr-3 mr-md-5 mb-0">
                <img class="img-fluid h-auto shadow" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
              </figure>
              <p class="h6 text-primary font-weight-normal my-auto"><?php echo $item['text']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$important_title = get_field('important_title');
$important_bg = get_field('important_bg');
$important_wish = get_field('important_wish');
?>
<section class="page-section py-4 py-lg-6">
  <div class="container-fluid mb-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <?php if ($important_title) : ?>
          <div class="row text-center">
            <div class="col-12">
              <h2 class="h1 page-section__title mb-3 mb-sm-5"><?php echo $important_title ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-12">
            <ul class="pl-4 pl-sm-5 m-0">
              <?php foreach ((array)get_field('important_list') as $item) : ?>
                <li class="h4 font-weight-normal text-primary pl-sm-4 mb-3">
                  <?php echo $item['text'] ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="position-relative">
    <?php if ($important_bg) : ?>
      <figure class="img-fit img-fit_top ratio-11x4">
        <img class="position-absolute img-fluid" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $important_bg['url']; ?>" alt="<?php echo $important_bg['alt']; ?>">
      </figure>
    <?php endif; ?>
    <?php if ($important_wish) : ?>
      <div class="page-section_center w-100">
        <h3 class="page-section__title text-center"><?php echo $important_wish; ?></h3>
      </div>
    <?php endif; ?>
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
      $('.map button').eq(i).on('click', function() {
        $(this).addClass('btn-secondary')
          .removeClass('bg-white border-secondary text-secondary')
          .siblings()
          .removeClass('btn-secondary')
          .addClass('bg-white border-secondary text-secondary');
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
      $('[id^="map"]').on('click', function() {
        var top = $('.acf-map').offset().top;
        $('body, html').animate({
          scrollTop: top - 32
        }, 1000);
      });
    });

  })(jQuery);
</script>
<?php
get_footer();
?>
