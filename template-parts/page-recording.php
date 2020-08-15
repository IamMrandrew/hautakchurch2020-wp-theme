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
                $latestPostID = get_the_ID();
        ?>
        <div class="col-md-5">
            <div class="img-wrapper">
                <img src="<?php echo get_template_directory_uri()?>/img/recording-img.png" alt="recording-img">
            </div>
        </div>
        <div class="col-md-7">
            <p class="meta">
                <span class="preacher">
                    <?php 
                        $medias = get_attached_media('audio', $post->ID); 
                        foreach ($medias as $media){
                            $id = $media->ID; 
                            $audioURL = wp_get_attachment_url($id);
                        }
                    ?>
                    <i class="fas fa-user"></i>
                    <?php echo get_post_meta(get_the_ID(), '_preacher_name_value_key', true) ?>
                </span>
                <span class="time"><?php echo get_the_date('M d, Y')?></span>
            </p>    
            <h3 class="card-title"><?php the_title() ?></h3>
            <p class="quote"><?php echo get_post_meta(get_the_ID(), '_bible_verse_value_key', true) ?></p>
            <?php the_content() ?>
            <figure class="plyr-sm">
                <audio src="<?php echo $audioURL ?>"></audio>
            </figure>
        </div>
    </section>
    <?php endwhile; ?>

    <section class="filter-bar">
        <div class="col-lg-5">
            <h2 class="filter-title">過往講道錄音</h2>
        </div>

        <div class="col-lg-7">
        <form class="filter-form" method="GET" action="<?php  echo get_bloginfo('url') ?>/講道信息/">
            <!-- <select name="orderby" id="orderby">
                <option value="">排序</option>
                <option value="date">從最新至最舊</option>
            </select> -->

            <select name="date-year" id="date-year" onchange="this.form.submit()">
                <option value="">全部年份</option>
                <option value="2020" <?php echo selected($_GET['date-year'], '2020') ?>>2020年</option>
                <option value="2019" <?php echo selected($_GET['date-year'], '2019') ?>>2019年</option>
                <option value="2018" <?php echo selected($_GET['date-year'], '2018') ?>>2018年</option>
            </select>

            <select name="date-month" id="date-month" onchange="this.form.submit()">
                <option value="">全部月份</option>
                <?php for ($i = 12; $i > 0; $i--) : ?>
                    <option value="<?php echo $i ?>" <?php echo selected($_GET['date-month'], $i) ?>> <?php echo $i ?>月</option>
                <?php endfor ?>
            </select>
            <select class="selectBox" name="preachers" id="preachers" onchange="this.form.submit()">
                <option value="" >所有講員</option>
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
                    <option value="<?php echo $preacher ?>" <?php echo selected($_GET['preachers'], $preacher) ?>><?php echo $preacher;?></option>
            <?php endforeach ?>

            </select>
        <button class="btn reset-btn" type="reset" value="reset">重置</button>
        </form>
        </div>
    </section>

    <script type="text/javascript">
        const resetBtn = document.querySelector('.reset-btn');
        const selectBox = document.querySelector('.selectBox');

        resetBtn.addEventListener('click', function() {
            console.log(selectBox.selectedIndex);
            selectBox.selectedIndex = 1;
        })
    </script>
    
    <section class="archive-recording">
        <?php
        $per_page = 10;
        $desireOffset = 1;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        if ($paged == 1) {
            $offset = $desireOffset;
        } else {
            $offset = (($paged - 1) * $per_page) + $desireOffset;
        }

        $recordingQuery = new WP_Query(array(
            'post_type'         => 'recording',
            'post_status'       => 'publish',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => $per_page,
            'paged'             => $paged,
            // 'offset'            => $offset,
            'post__not_in'       => array ($latestPostID),
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
        // the_posts_navigation();
        if (!get_previous_posts_link() && $recordingQuery->max_num_pages > 1){
            echo '<i class="fas fa-chevron-circle-left disable"></i>';
        } else {
            previous_posts_link('<i class="fas fa-chevron-circle-left"></i>', $recordingQuery->max_num_pages);
        }

        echo paginate_links(array(
            'total' => $recordingQuery->max_num_pages,
            'prev_text' => '',
            'next_text' => '',
        ));

        if (!get_next_posts_link(null, $recordingQuery->max_num_pages) && $recordingQuery->max_num_pages > 1) {
            echo '<i class="fas fa-chevron-circle-right disable"></i>';
        } else {
            next_posts_link('<i class="fas fa-chevron-circle-right"></i>', $recordingQuery->max_num_pages);
            // next_posts_link('<i class="fas fa-chevron-circle-right"></i>', ceil(($recordingQuery->found_posts - $desireOffset) / $per_page));
        }
    ?>
    </div>


</div>

<script type="text/javascript">
    const player = new Plyr('.card-latest .wp-block-audio audio', {
            controls: [    
                'play-large', // The large play button in the center
                'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'current-time', // The current time of playback
                'duration', // The full duration of the media
                'mute', // Toggle mute
                'volume', // Volume control
                'settings', // Settings menu
                'pip', // Picture-in-picture (currently Safari only)
                'airplay', // Airplay (currently Safari only)
                'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
            ],
        });

    const playerSM = new Plyr('.card-latest .plyr-sm audio', {
        controls: [    
            'play-large', // The large play button in the center
            'play', // Play/pause playback
            'progress', // The progress bar and scrubber for playback and buffering
            'current-time', // The current time of playback
            'mute', // Toggle mute
            'settings', // Settings menu
            'pip', // Picture-in-picture (currently Safari only)
            'airplay', // Airplay (currently Safari only)
        ],
    });

    const players = Array.from(document.querySelectorAll('.archive-recording .wp-block-audio audio')).map(p => new Plyr(p, {
        controls: [    
                'play-large', // The large play button in the center
                'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'current-time', // The current time of playback
                'mute', // Toggle mute
                'volume', // Volume control
                'settings', // Settings menu
                'pip', // Picture-in-picture (currently Safari only)
                'airplay', // Airplay (currently Safari only)
            ],
    }));

    const playerSMs = Array.from(document.querySelectorAll('.archive-recording .plyr-sm audio')).map(p => new Plyr(p, {
            controls: [    
                'play-large', // The large play button in the center
                'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'current-time', // The current time of playback
                'mute', // Toggle mute
                'settings', // Settings menu
                'pip', // Picture-in-picture (currently Safari only)
                'airplay', // Airplay (currently Safari only)
            ],
    }));
</script>

 <?php

get_footer();
