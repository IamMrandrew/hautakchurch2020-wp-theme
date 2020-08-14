<?php
/**
 * Template Name: 講道信息
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

<?php 
    if($_GET['date-year'] && !empty($_GET['date-year'])) {
        $dateYear = $_GET['date-year'];
    }

    if($_GET['date-month'] && !empty($_GET['date-month'])) {
        $dateMonth = $_GET['date-month'];
    }


    if($_GET['preachers'] && !empty($_GET['preachers'])) {
        $selectedPreacher = $_GET['preachers'];
    }
?>


<div class="container text-container recording">
    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
    <section class="card-latest card">
        <?php
            $recordingQuery = new WP_Query(array(
                    'post_type'         => 'recording',
                    'post_status'       => 'publish',
                    'orderby'           => 'date',
                    'order'             => 'DESC',
                    'posts_per_page'    => 1,
            ));

            while ( $recordingQuery->have_posts() ) :
                $recordingQuery->the_post();
        ?>
        <div class="col-md-5">
            <div class="img-wrapper">
                <img src="<?php echo get_template_directory_uri()?>/img/recording-img.png" alt="recording-img">
            </div>
        </div>
        <div class="col-md-7">
            <p class="meta">
                <span class="preacher">
                    <i class="fas fa-user"></i>
                    <?php echo get_post_meta(get_the_ID(), '_preacher_name_value_key', true) ?>
                </span>
                <span class="time"><?php echo get_the_date('M d, Y')?></span>
            </p>    
            <h3 class="card-title"><?php the_title() ?></h3>
            <p class="quote"><?php echo get_post_meta(get_the_ID(), '_bible_verse_value_key', true) ?></p>
            <?php the_content() ?>
        </div>
    </section>
    <?php endwhile; ?>


    <section class="filter-bar">
        <div class="col-lg-5">
            <h2 class="filter-title">過往講道錄音</h2>
        </div>

        <div class="col-lg-7">
        <form class="filter-form" method="GET">
            <select name="orderby" id="orderby">
                <option value="">排序</option>
                <option value="date">從最新至最舊</option>
            </select>

            <select name="date-year" id="date-year">
                <option value="">年份</option>
                <option value="2020">2020年</option>
                <option value="2019">2019年</option>
                <option value="2018">2018年</option>
            </select>

            <select name="date-month" id="date-month">
                <option value="">月份</option>
                <option value="12">12月</option>
                <option value="11">11月</option>
                <option value="10">10月</option>
                <option value="9">9月</option>
                <option value="8">8月</option>
                <option value="7">7月</option>
                <option value="6">6月</option>
                <option value="5">5月</option>
                <option value="4">4月</option>
                <option value="3">3月</option>
                <option value="2">2月</option>
                <option value="1">1月</option>
            </select>
            <select name="preachers" id="preachers">
                <option value="">講員</option>
            <?php 
                $recordings = get_posts(array(
                                'post_type' => 'recording',
                                'post_status'       => 'publish',
                                'numberposts'   => -1,

                ));

                $allPreacher = array();
                foreach ($recordings as $recordingPost) {
                    $allPreacher[] = get_post_meta($recordingPost->ID, '_preacher_name_value_key', true);
                }

                $preachers = array_unique($allPreacher);
                foreach ($preachers as $preacher):
            ?>
                    <option value="<?php echo $preacher ?>"><?php echo $preacher;?></option>
            <?php endforeach ?>

            </select>
        <button type="submit">篩選</button>
        </form>
        </div>
    </section>
    
    <section class="archive-recording">
        <?php
        $recordingQuery = new WP_Query(array(
            'post_type'         => 'recording',
            'post_status'       => 'publish',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => 2,
            'paged'             => get_query_var('paged'),
            'date_query'        => array (
                                        'year'  => $dateYear,
                                        'month' => $dateMonth,
                                    ),
            'meta_query'        => array (
                                    array(
                                            
                                        'key'       => '_preacher_name_value_key',
                                        'value'     => $selectedPreacher,
                                        'compare'   => 'LIKE'
                                    )
                                    )

            // 'category_name' => '講道錄音'`
        ));

        while ( $recordingQuery->have_posts() ) :
            $recordingQuery->the_post();

            get_template_part( 'template-parts/content', 'recording' );

        endwhile; // End of the loop.
        ?>
    </section>
    
    <div class="pagination">
    <?php
        the_posts_navigation();

        echo paginate_links(array(
            'total' => $recordingQuery->max_num_pages
        ));
    ?>
    </div>


</div>






    
</div>


 <?php

get_footer();
