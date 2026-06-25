<?php get_header(); ?>

<main class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop">
	<div class="max-w-container-max mx-auto max-w-[720px]">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-8' ); ?>>
				<header class="space-y-4">
					<?php the_title( '<h1 class="font-headline-lg text-headline-lg text-primary">', '</h1>' ); ?>
					<div class="font-body-md text-on-surface-variant">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<span class="mx-2">·</span>
						<?php the_author(); ?>
					</div>
				</header>
				<div class="font-body-lg text-on-surface-variant space-y-6">
					<?php the_content(); ?>
				</div>
				<?php comments_template(); ?>
			</article>
		<?php endwhile; endif; ?>
	</div>
</main>

<?php get_footer(); ?>
