<?php get_header(); ?>

<main class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop">
	<div class="max-w-container-max mx-auto">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</article>
		<?php endwhile; endif; ?>
	</div>
</main>

<?php get_footer(); ?>
