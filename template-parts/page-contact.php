<?php
/**
 * Template Name: 聯絡我們
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

get_header();
?>
<div class="container text-container contact">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <section class="contact-section flex-container">
        <div class="col-lg-6" id="staffs-1">
            <h2>同工簡介</h2>
            <div class="text-wrapper">
                <h3>堂主任</h3>
                <?php echo get_theme_mod('staffs-1', get_theme_default( 'staffs-1' )) ?>
            </div>
            <div class="text-wrapper" id="staffs-2">
                <h3>傳道同工</h3>
                <div class="text-group">
                    <?php echo get_theme_mod('staffs-2', get_theme_default( 'staffs-2' )) ?>
                </div>
            </div>
            <div class="text-wrapper" id="staffs-3">
                <h3>幹事</h3>
                <?php echo get_theme_mod('staffs-3', get_theme_default( 'staffs-3' )) ?>
            </div>
        </div> 
        <div class="col-lg-6">
            <h2>聯絡方法</h2>
            <div class="text-group right">
                <p id="contact-phone">
                    <i class="fas fa-phone fa-flip-horizontal"></i>
                    <?php echo get_theme_mod('phone', get_theme_default( 'phone' )) ?>
                </p>
                <p id="contact-fax">
                    <i class="fas fa-fax"></i>
                    <?php echo get_theme_mod('fax', get_theme_default( 'fax' )) ?>
                </p>
                <p id="contact-email">
                    <i class="fas fa-envelope"></i>
                    <?php echo get_theme_mod('email', get_theme_default( 'email' )) ?>
                </p>
            </div>
        </div> 
    </section>


    <section class="dedicate-section flex-container">
        <div class="col-12">
            <h2>奉獻方法</h2>
        </div>
        <div class="col-lg-6" id="dedicate-mail">
            <?php echo get_theme_mod('mail', get_theme_default( 'mail' )) ?>
        </div> 

        <div class="col-lg-6" id="dedicate-transfer">
            <?php echo get_theme_mod('transfer', get_theme_default( 'transfer' )) ?>
        </div> 
    </section>
</div>

<div class="map" id="map-2"></div>

<script>
    function initMap() { 
        let map2 = new google.maps.Map(document.getElementById('map-2'), {
            center: { lat: 22.3177851, lng: 114.2663983 },
            zoom: 17,
            streetViewControl: false,
            fullscreenControl: false,
            // zoomControl: false
        });

        let marker1 = addMarker({ lat: <?php echo get_theme_mod('marker-1-lat', get_theme_default( 'marker-1-lat' )) ?>, lng: <?php echo get_theme_mod('marker-1-lng', get_theme_default( 'marker-1-lng' )) ?> });
        let marker2 = addMarker({ lat: <?php echo get_theme_mod('marker-2-lat', get_theme_default( 'marker-2-lat' )) ?>, lng: <?php echo get_theme_mod('marker-2-lng', get_theme_default( 'marker-2-lng' )) ?> });
        let marker3 = addMarker({ lat: <?php echo get_theme_mod('marker-3-lat', get_theme_default( 'marker-3-lat' )) ?>, lng: <?php echo get_theme_mod('marker-3-lng', get_theme_default( 'marker-3-lng' )) ?> });

        let infoWindow1 = addInfoWindow(
            '<h3 class="title"><?php echo get_theme_mod('marker-1-title', get_theme_default( 'marker-1-title' )) ?></h3>' +
            '<h3><?php echo get_theme_mod('marker-1-name', get_theme_default( 'marker-1-name' )) ?></h3>' +
            '<p><?php echo get_theme_mod('marker-1-address', get_theme_default( 'marker-1-address' )) ?></p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i><?php echo get_theme_mod('marker-1-phone', get_theme_default( 'marker-1-phone' )) ?></p>'
        )
        
        let infoWindow2 = addInfoWindow(
            '<h3 class="title"><?php echo get_theme_mod('marker-2-title', get_theme_default( 'marker-2-title' )) ?></h3>' +
            '<h3><?php echo get_theme_mod('marker-2-name', get_theme_default( 'marker-2-name' )) ?></h3>' +
            '<p><?php echo get_theme_mod('marker-2-address', get_theme_default( 'marker-2-address' )) ?></p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i><?php echo get_theme_mod('marker-2-phone', get_theme_default( 'marker-1-phone' )) ?></p>'
        )

        let infoWindow3 = addInfoWindow(
            '<h3 class="title"><?php echo get_theme_mod('marker-3-title', get_theme_default( 'marker-3-title' )) ?></h3>' + 
            "<?php if (get_theme_mod('marker-2-name', get_theme_default( 'marker-3-name' )) != '')echo '<h3>'.get_theme_mod('marker-3-name', get_theme_default( 'marker-3-name' )).'</h3>'?>" +
            '<p><?php echo get_theme_mod('marker-3-address', get_theme_default( 'marker-3-address' )) ?></p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i><?php echo get_theme_mod('marker-3-phone', get_theme_default( 'marker-3-phone' )) ?></p>'
        )

        infoWindow1.open(map2, marker1);
        infoWindow2.open(map2, marker2);
        infoWindow3.open(map2, marker3);

        marker1.addListener('click', function() {
            infoWindow1.open(map2, marker1);
        });


        marker2.addListener('click', function() {
            infoWindow2.open(map2, marker2);
        });


        marker3.addListener('click', function() {
            infoWindow3.open(map2, marker3);
        });

        function addInfoWindow(content) {
            let infoWindow = new google.maps.InfoWindow({
            content: content
            });

            return infoWindow;
        }
        
        function addMarker(coord) {
            let marker = new google.maps.Marker({
                position: coord,
                map: map2,
                icon: '<?php echo get_template_directory_uri() ?>/img/marker.svg'
            });

            return marker;
        }
    }
</script>
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>&callback=initMap">
</script>
    
<?php

get_footer();
