<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php get_search_form(); ?>

<?php /*
<h2>Archives by Month:</h2>
<ul>
	<?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Archives by Subject:</h2>
<ul>
	 <?php wp_list_categories(); ?>
</ul>
*/ ?>


                <h2>Archives by Month</h3>
				<ul class="archives">
				<?php
					$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
					foreach($years as $year) :
						$count=0;
						$my_query = new WP_Query('year='.$year);
						while ($my_query->have_posts()) : $my_query->the_post();
							$count++;
						endwhile;
				?>
					<li>
						<h3><a href="<?php echo get_year_link($year); ?>" title="<?= $year ?> Archives"><?= $year ?></a></h3>
						<ul><?php
								$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = $year ORDER BY post_date ASC");
								foreach($months as $month) :
									$tstamp = mktime(0, 0, 0, $month, 1, $year);
							?>
								<li class="m<?= $month ?>"><a href="<?php echo get_month_link($year, $month); ?> " title="<?php echo date("M", $tstamp); ?> <?= $year?>"><span><?php echo date("m", $tstamp); ?></span></a></li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
				</ul>

				
				<h3>Most Common Tags:</h3>
				<?php wp_tag_cloud(''); ?>
				
				
				<h3>Archives by Subject:</h3>
				<ul>
					<?php wp_list_categories('style=list&title_li='); ?>
				</ul>



<?php get_footer(); ?>