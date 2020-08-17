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
        <div class="col-lg-6">
            <h2>同工簡介</h2>
            <div class="text-wrapper">
                <h3>堂主任</h3>
                <p>黃錦雲牧師</p>
            </div>
            <div class="text-wrapper">
                <h3>傳道同工</h3>
                <div class="text-group">
                    <p>鄭惠意姑娘</p>
                    <p>黎亦芬姑娘</p>
                    <p>葉謝輝先生</p>
                    <p>郭海笙先生</p>
                </div>
            </div>
            <div class="text-wrapper">
                <h3>幹事</h3>
                <p>王會良弟兄</p>
            </div>
        </div> 
        <div class="col-lg-6">
            <h2>聯絡方法</h2>
            <div class="text-group right">
                <p><i class="fas fa-phone fa-flip-horizontal"></i>2623 6316</p>
                <p><i class="fas fa-fax"></i>2719 0108</p>
                <p><i class="fas fa-envelope"></i>hautakchurch@gmail.com</p>
            </div>
        </div> 
    </section>


    <section class="dedicate-section flex-container">
        <div class="col-12">
            <h2>奉獻方法</h2>
        </div>
        <div class="col-lg-6">
            <h3>郵寄</h3>
            <p class="bold">郵寄支票回教會</p>
            <p><span class="highlight">地址： </span>將軍澳厚德邨裕明苑裕榮閣地下</p>
            <p><span class="highlight">支票抬頭： </span>基督教宣道會厚德堂/ Christian & Missionary Alliance Hau Tak Church</p>
        </div> 

        <div class="col-lg-6">
            <h3>轉帳</h3>
            <p class="bold">轉帳至教會中國銀行戶口，並將入數紙拍照或截圖傳送到教會電郵或whatsapp</p>
            <p><span class="highlight">戶口號碼： </span>036-744-0-000287-7</p>
            <p><span class="highlight">教會電郵： </span>hautakchurch@gmail.com</p>
            <p><span class="highlight">Whatsapp： </span>53600779</p>
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

        let marker1 = addMarker({ lat: 22.3154014, lng: 114.2672707 });
        let marker2 = addMarker({ lat: 22.3183149, lng: 114.2660506 });
        let marker3 = addMarker({ lat: 22.3211118, lng: 114.2665366 });

        let infoWindow1 = addInfoWindow(
            '<h3 class="title">主日崇拜及親子崇拜</h3>' + 
            '<h3>陳耀星小學</h3>' + 
            '<p>九龍將軍澳第二期第三十四區仁濟醫院陳耀星小學(坑口和明苑內) </p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i>2623 6316 </p>'
        )
        
        let infoWindow2 = addInfoWindow(
            '<h3 class="title">週六崇拜及其他聚會</h3>' + 
            '<h3>教會幼稚園</h3>' + 
            '<p>九龍將軍澳厚德村裕明苑裕榮閣地下</p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i>2623 6316 </p>'
        )

        let infoWindow3 = addInfoWindow(
            '<h3 class="title">辦公室</h3>' + 
            '<p>九龍將軍澳坑口村11號B地下</p>' + 
            '<p> <i class="fas fa-phone fa-flip-horizontal"></i>2623 6316 </p>'
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
