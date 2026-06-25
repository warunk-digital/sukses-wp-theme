<?php get_header(); ?>

<main class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop">
	<div class="max-w-container-max mx-auto">
		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-surface p-6 border border-outline/10 space-y-4' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-48 object-cover' ) ); ?>
							</a>
						<?php endif; ?>
						<?php the_title( '<h2 class="font-headline-md text-headline-md text-primary"><a href="' . esc_url( get_permalink() ) . '" class="hover:underline">', '</a></h2>' ); ?>
						<div class="font-body-md text-on-surface-variant">
							<?php the_excerpt(); ?>
						</div>
						<div class="font-label-caps text-[10px] tracking-widest text-secondary">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="mt-12 flex justify-center gap-4 font-body-md">
				<?php
				the_posts_pagination( array(
					'prev_text' => '<span class="px-4 py-2 border border-outline/20 hover:bg-primary hover:text-on-primary transition-all">← PREV</span>',
					'next_text' => '<span class="px-4 py-2 border border-outline/20 hover:bg-primary hover:text-on-primary transition-all">NEXT →</span>',
					'mid_size'  => 2,
				) );
				?>
			</div>
		<?php else : ?>
			<div class="text-center py-24">
				<h1 class="font-headline-lg text-headline-lg text-primary mb-4">Nothing Found</h1>
				<p class="font-body-lg text-on-surface-variant">No posts matched your criteria.</p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
