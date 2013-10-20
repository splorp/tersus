<?php
/**
 * @package WordPress
 * @subpackage Tersus

Template Name: Archives

*/
?>

<?php get_header(); ?>

<section id="content">
	<h2>Archives</h2>
	<ul>
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
			<h3><a href="<?php echo get_year_link($year); ?>" title="<?php $year ?> Archives"><?php $year ?></a></h3>
			<ul><?php
					$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = $year ORDER BY post_date ASC");
					foreach($months as $month) :
						$tstamp = mktime(0, 0, 0, $month, 1, $year);
				?>
					<li class="m<?php $month ?>"><a href="<?php echo get_month_link($year, $month); ?> " title="<?php echo date("M", $tstamp); ?> <?php $year?>"><span><?php echo date("m", $tstamp); ?></span></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
	</ul>
	
	<h2>Tags</h2>
	<?php wp_tag_cloud(''); ?>
	
	<h2>Categories</h2>
	<ul>
		<?php wp_list_categories('style=list&title_li='); ?>
	</ul>
</section>

<?php get_footer(); ?>