<?php
/**
 * Template Name: 聚會時間
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

<div class="container text-container timetable">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    
    <section class="rows row-1">
        <div class="row-title">
            <h2>崇拜<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>主日崇拜</h3>
                <p>週日 上午 11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">任何人士</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>親子崇拜</h3>
                <p>週日 上午 11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">小二以下家長及兒童</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>少年崇拜</h3>
                <p>週日 上午 11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">初中生</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>週六崇拜</h3>
                <p>週六 下午 4:30</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">任何人士</span></p>
            </div> 
        </div>
    </section>
    
    <section class="rows row-2">
        <div class="row-title">
            <h2>祈禱會<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>祈禱會(一)</h3>
                <p>週日 上午 9:15</p>
                <p><span class="location">陳耀星小學</span> <span class="person">任何人士</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>祈禱會(二)</h3>
                <p>週三 上午11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">小二以下家長及兒童</span></p>
            </div> 
        </div>
    </section>

    <section class="rows row-3">
        <div class="row-title">
            <h2>主日學<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>成青主日學</h3>
                <p>週日 上午 9:45</p>
                <p><span class="location">陳耀星小學</span> <span class="person">青少年或以上</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>兒童主日學</h3>
                <p>週日 上午 11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">小六或以下</span></p>
            </div> 
        </div>
    </section>

    <section class="rows row-4">
        <div class="row-title">
            <h2>每週團契/小組<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>Pre新Teen地</h3>
                <p>週日 上午 11:00</p>
                <p><span class="location">陳耀星小學</span> <span class="person">初中生</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>路得加油站</h3>
                <p>週二 上午 10:00</p>
                <p><span class="location">辦公室</span> <span class="person">家長</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>靈友小組</h3>
                <p>週三 上午 10:00</p>
                <p><span class="location">辦公室</span> <span class="person">成人、長者</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>新Teen地</h3>
                <p>週六 下午 3:00</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">高中至大學</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6 single-item">
                <h3>青年團契</h3>
                <p>週六 下午 6:00</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">大學至初職</span></p>
            </div> 
        </div>
    </section>

    <section class="rows row-5">
        <div class="row-title">
            <h2>每月團契/小組<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>信望愛小組</h3>
                <p>週日(第二週) 下午 12:45</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">職青</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>以斯帖約書亞小組</h3>
                <p>週日(第二週) 下午 12:45</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">成人</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>以利亞團</h3>
                <p>週日(第三週) 下午 12:45</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">成人</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>五餅二魚團契</h3>
                <p>週日(第四週) 下午 2:00</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">已婚</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6">
                <h3>弟兄團契</h3>
                <p>週三(第二週) 晚上 7:00</p>
                <p><span class="location">辦公室</span> <span class="person">弟兄</span></p>
            </div> 
            <div class="col-lg-6">
                <h3>婦女團契</h3>
                <p>週六(第二、五週) 下午 1:30</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">姊妹</span></p>
            </div> 
        </div>
        <div class="flex-container">
            <div class="col-lg-6 single-item">
                <h3>以馬內利團</h3>
                <p>週六(第三週) 下午 8:00</p>
                <p><span class="location">宣道幼稚園</span> <span class="person">成人</span></p>
            </div> 
        </div>
    </section>

    <section class="rows row-6">
        <div class="row-title">
            <h2>事工小組<h2>
        </div>
        <div class="flex-container">
            <div class="col-lg-6 single-item">
                <h3>兒童音樂團</h3>
                <p>週日 上午 9:45</p>
                <p><span class="location">陳耀星小學</span> <span class="person">4-8歲兒童</span></p>
            </div> 
        </div>
    </section>

</div>

<?php

get_footer();
