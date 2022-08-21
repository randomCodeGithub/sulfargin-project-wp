<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<div class="checklist-video-container" data-stretch>
	<?php if (get_field('title')) : ?>
		<h2 class="h2 text-center h-mgb-xl"><?php the_field('title') ?></h2>
	<?php endif; ?>
	<div class="row">
		<div class="col-lg-6">
			<div>
				<h4 class="checklist-video-title p"><?php echo get_field('before_title'); ?></h4>
			</div>
			<div>
				<?php if (get_field('list')) : ?>
					<ul>
						<?php while (the_repeater_field('list')) : ?>
							<li><span></span><?php echo get_sub_field('text'); ?></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-lg-6">
			<?php if (get_field('youtube_video') == false) : ?>
				<div class="video-wrapper">
					<video controls poster="<?php echo esc_url(get_field('thumbnail')['url']); ?>" preload="none">
						<source src="movie.mp4">
						<source src="<?php echo get_field('video'); ?>" type="video/mp4">
					</video>
				</div>
			<?php else : ?>
				<?php
				$url = pdg_get_youtube_video_id(get_field('youtube_link'));
				?>
				<div class="youtube-video-wrapper">
					<iframe src="https://www.youtube.com/embed/<?php echo $url; ?>"></iframe>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>