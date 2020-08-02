<?php
/**
 * Template Nameeee: Home2
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

<div class="noti-nav">
			<div class="container text-center py-3">
				<a href="https://youtu.be/d5OA8TTfpIo" >👉🏻 觀看網上崇拜直播 </a>
			</div>
		</div>

		<div id="carouselWithControls" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <li data-target="#carouselWithControls" data-slide-to="0" class="active"></li>
        <?php 
        $sql = "SELECT * FROM img WHERE type = 'banners' AND file LIKE '%DES%'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result))
        {
            echo '<li data-target="#carouselWithControls" data-slide-to="1"></li>';
        }
        ?>
    </ol>

		<div class="carousel-inner">
			<div class="carousel-item active">
				<picture class="d-block w-100">   <!-- Desktop is 769px -->
				<?php 
				$sql = "SELECT * FROM img WHERE type = 'bannerDesk' ORDER BY date DESC";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
				echo 
					"<source 
					media='(min-width: 669px)'
					srcset=" .$row["file"].">" 
				?>

				<?php 
				$sql = "SELECT * FROM img WHERE type = 'bannerMob' ORDER BY date DESC";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
				echo 
					"<source 
					media='(min-width: 319px)'
					srcset=" .$row["file"]. ">" 
				?>

				<img class="d-block w-100" src="img/hautakWeb_Desktop6.png">
				</picture>
			</div>

			<?php 
			$count = 0;
			$sql = "SELECT * FROM img WHERE type = 'banners' and file LIKE '%DES%'";
			$results = mysqli_query($conn, $sql);

			while($rows = mysqli_fetch_array($results)){
				echo
					"<div class='carousel-item'>
					<picture class='d-block w-100'>   <!-- Desktop is 769px -->";

				$sql = "SELECT * FROM img WHERE type = 'banners' and file LIKE '%DES%' LIMIT $count, 18446744073709551615";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
				echo
					"<source 
					media='(min-width: 669px)'
					srcset=" .$row["file"]."> ";

				$sql = "SELECT * FROM img WHERE type = 'banners' and file LIKE '%MOB%' LIMIT $count, 18446744073709551615";
				$result = mysqli_query($conn,$sql);
				$roww = mysqli_fetch_array($result);
				echo
					"<source 
					media='(min-width: 319px)'
					srcset=" .$roww["file"]. ">

					<img class='d-block w-100' src=" .$row["file"]. ">
					</picture>
					</div>";
				$count++;
			}
			?>
     
			</div>

			<a class="carousel-control-prev" href="#carouselWithControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="carousel-control-next" href="#carouselWithControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="jumbotron jumbotron-fluid py-5" style="background : #D2B48C">
		<div class="container mx-auto">
			<p class="text-center d-none d-md-block" style="color:#FFFFFF; font-size:23px">
				「你們要嘗嘗主恩的滋味，便知道祂是美善；投靠祂的人有福了！」<br> ( 詩 三十四 8 )
			</p>
			<p class="text-center d-none d-sm-block d-md-none" style="color:#FFFFFF; font-size:16px">
				「你們要嘗嘗主恩的滋味，<br>便知道祂是美善；投靠祂的人有福了！」 <br> ( 詩 三十四 8 )
			</p>
			<p class="text-center d-sm-none" style="color:#FFFFFF; font-size:14px">
				「你們要嘗嘗主恩的滋味，<br>便知道祂是美善；投靠祂的人有福了！」 <br> ( 詩 三十四 8 )
			</p>
		</div>
		</div>


        <div class="container">
    <div class="row my-4">
    <div class="col-lg-4">
        <div class="card ">
        <div class="card-body">
            <div class="container">
            <div class="row my-3">
                <div class="col">
                    <h3>最新消息</h3>
                </div>
            </div>
            
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                        echo "hi";
                        // get_template_part( 'template-parts/content',  );
                    endwhile; // End of the loop.
                endif;
            ?>

            <div class="row">
            <div class="col">
                <a href="notice.php" style="color : inherit"><p class="text-left">查看更多</p></a>
            </div>
            </div>
        </div>
        </div>
    </div>
            
        <div class="card my-4">
        <div class="card-body">
            <div class="container">
	        <div class="row my-3">
		        <div class="col">
		            <h3>其他資訊</h3>
		        </div>
	        </div>
	            
            <?php 
            $result = mysqli_query($conn,"SELECT * FROM info ORDER BY date DESC");
            while ($row = mysqli_fetch_array($result))
            {
                echo 
                '<div class="row my-2">
                <div class="col">';
                
                echo '<p style="font-size : 16px">
                         ・ &nbsp&nbsp <a href="'.$row["file"].'" style="color:inherit;">' .$row["topic"].'</a>
                     </p>
                </div>
                </div>';
            }
            ?>
					
            </div>
        </div>
        </div>
    </div>
                 
    <div class="col-lg-8">
        <div class="card">
        <div class="card-body">
            <div class="container">
            <div class="row my-2">
                <div class="col">
                	<h2>地址</h2>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-lg-6">
                    <h5>陳耀星小學<br>（主日崇拜及親子崇拜）</h5>
                    <br>
                    <p>九龍將軍澳第二期第三十四區</p>
                    <p>仁濟醫院陳耀星小學<br> (坑口和明苑內)</p>
                    <p>(電話：2623 6316)</p>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.0114692578404!2d114.2657493931575!3d22.31540599226394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404038a0cc6661d%3A0x876b97c79896f14f!2z5LuB5r-f6Yar6Zmi6Zmz6ICA5pif5bCP5a24!5e0!3m2!1szh-TW!2shk!4v1538198333696" width="280" height="210" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                </div>
            <div class="row my-5">
                <div class="col-lg-6">
                    <h5>教會幼稚園<br>（週六崇拜及其他聚會）</h5>
                    <br>
                    <p>九龍將軍澳厚德村裕明苑裕榮閣地下</p>
                    <p>(電話：2623 6316)</p>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2672.4530064727173!2d114.26576213867793!3d22.317151169091883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040475a93567cf%3A0x9838d1c77d45d33b!2z5a6j6YGT5pyD5Y6a5b635aCC!5e0!3m2!1szh-TW!2shk!4v1538198125667" width="280" height="210" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
			</div>
						
            <div class="row my-4">
                <div class="col-lg-6">
                <h4>辦公室</h4>
                <br>
                <p>九龍將軍澳坑口村11號B地下</p>
                <p>(電話：2623 6316)</p>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.859793711618!2d114.26448855035744!3d22.321141685240676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340405c51c4681e1%3A0x145c1aecbf011f1b!2z5Y6a5b635aCC6L6m5YWs5a6k!5e0!3m2!1szh-TW!2shk!4v1538198371074" width="280" height="210" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
			</div>
            </div>
        </div> 
        </div>               
    </div>  
</div>
</div>

<?php
get_footer();
