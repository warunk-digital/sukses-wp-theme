<?php get_header(); ?>

<main class="py-section-gap px-margin-mobile md:px-margin-desktop">
	<div class="max-w-container-max mx-auto">
		<?php if ( have_posts() ) : ?>
			<header class="mb-section-gap">
				<?php
				the_archive_title( '<h1 class="font-headline-lg text-headline-lg text-primary mb-4">', '</h1>' );
				the_archive_description( '<div class="font-body-lg text-on-surface-variant max-w-2xl">', '</div>' );
				?>
			</header>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-gutter gap-y-section-gap">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'group' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="aspect-[4/3] overflow-hidden mb-6 bg-surface-container">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="space-y-3">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) :
								?>
								<span class="font-label-caps text-label-caps text-secondary tracking-[0.2em] block uppercase">
									<?php echo esc_html( $categories[0]->name ); ?>
								</span>
							<?php endif; ?>
							<h2 class="font-headline-md text-headline-md text-primary">
								<a href="<?php the_permalink(); ?>" class="hover:underline decoration-1 underline-offset-4">
									<?php the_title(); ?>
								</a>
							</h2>
							<p class="font-body-md text-on-surface-variant">
								<?php echo get_the_excerpt(); ?>
							</p>
							<a class="font-label-caps text-[11px] tracking-widest text-secondary flex items-center gap-2 group-hover:gap-4 transition-all" href="<?php the_permalink(); ?>">
								READ MORE <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
							</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="mt-section-gap flex justify-center gap-4">
				<?php
				echo paginate_links( array(
					'prev_text' => '<span class="material-symbols-outlined">arrow_back</span>',
					'next_text' => '<span class="material-symbols-outlined">arrow_forward</span>',
					'type'      => 'list',
				) );
				?>
			</div>

		<?php else : ?>
			<p class="font-body-lg text-on-surface-variant"><?php _e( 'No posts found.', 'sukses' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
