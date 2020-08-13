<?php
/**
 *
 * The template for displaying front page
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

    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri()?>/img/hero-image.png');">
		<div class="container">
            <div class="text-wrapper">
                <!-- <h1>25周年堂慶 <br> 同頌神恩</h1>
                <h2>建人建殿 愛神愛人</h2> -->
                <h1>非我唯主齊誇勝</h1>
                <h1>內聖外王顯基督</h1>
                <h2>疫情下的聚會</h2>
                <a class="btn" href="#jumbotron-event">最新活動 <i class="fas fa-arrow-circle-right"></i></a>
                <a class="btn" href="https://m.youtube.com/watch?feature=youtu.be&v=aYcyF7MYcsw">觀看直播 <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>
    </section>

    <section class="jumbotron-news jumbotron">
        <div class="container">
            
            <div class="col-lg-4">
            <div class="card card-intro">
                <h3>最新消息</h3>
                <p>在此關注教會的最新消息，教會將在此發放最新消息，請時常留意網頁更新</p>
                <a class="btn" href="<?php echo get_category_link( get_cat_ID('最新消息')); ?>">閱讀更多最新消息 <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-8">
            <div class="glider-contain">

                <div class="glider glider1">

                <?php 
                    query_posts( array(
                        'category_name'  => '最新消息',
                        'posts_per_page' => 4
                    ) );

                    if (have_posts()) :
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', 'news');
                        endwhile;
                    endif;
                ?>

                <!-- <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-bullhorn"></i>
                        <h3>更新崇拜直播安排通告</h3>
                        <p class="card-time">七月 26, 2020</p>
                        <p class="card-content">鑒於香港近日疫情反覆，社區不明源頭的感染個案持續增加，教會由即日起至 7 月 31日，暫停所有實體崇拜及聚會..</p>
                    </div>
                </div>
                <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-bullhorn"></i>
                        <h3>崇拜聚會及防疫指引安排</h3>
                        <p class="card-time">七月 10, 2020</p>
                        <p class="card-content">由於本港多區出現疫情個案增加，為減少感染風險，由即日至７月 24 日教會將實施以下聚會安排，各人需..</p>
                    </div>
                </div>
                <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-bullhorn"></i>
                        <h3>抗疫同行分享</h3>
                        <p class="card-time">五月 29, 2020</p>
                        <p class="card-content">門外是誰？（創 4:7）「你若行得好，豈不蒙悅納？你若行得不好，罪就伏在門前。它必戀慕你，你郤要制伏它...</p>
                    </div>
                </div> -->
                </div>
            <div class="glider-arrow-container">
                <button aria-label="Previous" class="glider-prev glider-prev-1"><i class="fas fa-chevron-circle-left"></i></button>
                <button aria-label="Next" class="glider-next glider-next-1"><i class="fas fa-chevron-circle-right"></i></button>
            </div>
            </div>
            </div>
        </div>
    </section>

    <section class="jumbotron-verse">
        <div class="text-wrapper">
            <h3>了解我們</h3>
            <h4>「你們要嘗嘗主恩的滋味，便知道祂是美善；投靠祂的人有福了！」<br>( 詩 三十四 8 )</h4>
            <a class="btn" href="<?php echo get_page_link( get_page_by_title( "聚會時間" )->ID ); ?>">加入我們 <i class="fas fa-arrow-circle-right"></i></a>
            <a class="btn" href="https://m.youtube.com/watch?feature=youtu.be&v=aYcyF7MYcsw">觀看直播 <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </section>
    
    <section class="jumbotron-notice jumbotron">
        <div class="container">
            
            <div class="col-lg-4">
            <div class="card card-intro">
            <h3>其他資訊</h3>
                <p>在此關注教會的其他資訊，教會將在此發放其他資訊 ，請時常留意網頁更新</p>
                <a class="btn" href="<?php echo get_category_link( get_cat_ID('其他資訊')); ?>">閱讀更多其他資訊 <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-8">
            <div class="glider-contain">
                <div class="glider glider2">

                <?php 
                    query_posts( array(
                        'category_name'  => '其他資訊',
                        'posts_per_page' => 4
                    ) );

                    if (have_posts()) :
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', 'notice');
                        endwhile;
                    endif;
                ?>
<!-- 
                <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-sticky-note"></i>
                        <h3>2020年行事曆</h3>
                        <p class="card-time">七月 26, 2020</p>
                        <p class="card-content">2020行事曆已經上載到教會網站... </p>
                    </div>
                </div>
                <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-sticky-note"></i>
                        <h3>暴雨天氣及風暴措施指引</h3>
                        <p class="card-time">七月 10, 2020</p>
                        <p class="card-content">黃色暴雨 週六及主日崇拜 (照常) 青少年團契 (照常) 親崇、兒童及長者主日學及長者團契 (照常) 成人團契/小組 (照常) ...</p>
                    </div>
                </div>
                <div class="glider-item">
                    <div class="card">
                        <i class="fas fa-sticky-note"></i>
                        <h3>抗疫同行分享</h3>
                        <p class="card-time">五月 29, 2020</p>
                        <p class="card-content">門外是誰？（創 4:7）「你若行得好，豈不蒙悅納？你若行得不好，罪就伏在門前。它必戀慕你，你郤要制伏它...</p>
                    </div>
                </div> -->
                </div>
            <div class="glider-arrow-container">
                <button aria-label="Previous" class="glider-prev glider-prev-2"><i class="fas fa-chevron-circle-left"></i></button>
                <button aria-label="Next" class="glider-next glider-next-2"><i class="fas fa-chevron-circle-right"></i></button>
            </div>
            </div>
            </div>
        </div>
    </section>
    
    <script>

    new Glider(document.querySelector('.glider1'), {
        slidesToShow: 1,
        draggable: true,
        dragVelocity: 1,
        arrows: {
            prev: '.glider-prev-1',
            next: '.glider-next-1'
        },
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2.2,
                }
            }, {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 2.5,
                }
            }, {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 2.8,
                }
            }
        ]
    });

    new Glider(document.querySelector('.glider2'), {
        slidesToShow: 1,
        draggable: true,
        dragVelocity: 1,
        arrows: {
            prev: '.glider-prev-2',
            next: '.glider-next-2'
        },
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2.2,
                }
            }, {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 2.5,
                }
            }, {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 2.8,
                }
            }
        ]
    });
    </script>

    <div id="jumbotron-event"></div>
    <section class="jumbotron-event">
        <div class="container">
           <div class="col-lg-7">
                <div class="img-wrapper">
                    <img src="<?php echo get_template_directory_uri()?>/img/leafletDES2.png" alt="leaflet">
                </div>
           </div>
            <div class="col-lg-5">
                <div class="text-wrapper">
                    <h3>最新活動</h3>
                    <p>褔音主日</p>
                    <p>時間：10月27日 11:00</p>
                    <p>地點：仁濟醫院陳耀星小學禮堂</p>
                    <a class="btn" href="<?php echo get_category_link( get_cat_ID('最新活動')); ?>">瀏覽更多活動 <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <div class="map" id="map"></div>

    <script>
        function initMap() { 
            let map = new google.maps.Map(document.getElementById('map'), {
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

            infoWindow1.open(map, marker1);
            infoWindow2.open(map, marker2);
            infoWindow3.open(map, marker3);

            function addInfoWindow(content) {
                let infoWindow = new google.maps.InfoWindow({
                content: content
                });

                return infoWindow;
            }
            
            function addMarker(coord) {
                let marker = new google.maps.Marker({
                    position: coord,
                    map: map,
                    icon: '<?php echo get_template_directory_uri() ?>/img/marker.svg'
                });

                return marker;
            }
        }
    </script>
    <script defer
        <?php require_once 'key.php' ?>
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>&callback=initMap">
    </script>


        <?php 
        // custom loop
        $sliderQuery = new WP_Query(array(
            'post_type'     => 'slider',
            'post_status'   => 'publish',
            'orderby'       => 'title',
            'order'         => 'ASC',
            // 'category_name' => '電腦版'
        ));

        ?>


        <?php 
        $active = 'active';
        $postThumbnailUrl = array();
        $postThumbnailUrlM = array();
        $index = 0;
        $indexM = 0;

        while ($sliderQuery->have_posts()):
            $sliderQuery->the_post();

            if (in_category('電腦版')){
                $postThumbnailUrl[$index++] = get_the_post_thumbnail_url();
            }
            if (in_category('手機版')){
                $postThumbnailUrlM[$indexM++] = get_the_post_thumbnail_url();
            }

        endwhile;

        $index = 0;
        $indexM = 0;
        while ($sliderQuery->have_posts()):
            $sliderQuery->the_post();
            if (in_category('電腦版')):
        ?>

<!-- 
            <picture>
                <source media="(min-width: 669px)" srcset="<?php echo $postThumbnailUrl[$index++] ?>">
                <source media="(min-width: 319px)" srcset="<?php echo $postThumbnailUrlM[$indexM++] ?>">
                <img src="<?php echo get_the_post_thumbnail_url() ?>" class="d-block w-100" style="width: 100%"alt="carousel-img">
            </picture> -->
        <?php endif ?>
        <?php $active = "" ?>
        <?php endwhile; ?>

<?php
get_footer();
