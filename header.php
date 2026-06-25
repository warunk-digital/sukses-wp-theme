<!DOCTYPE html>
<html class="scroll-smooth" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-background text-on-surface font-body-md overflow-x-hidden' ); ?>>
<?php wp_body_open(); ?>

<header class="fixed top-0 w-full z-50 bg-background/90 backdrop-blur-md border-b border-outline/10">
	<nav class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
		<div class="font-display-lg text-headline-md text-primary tracking-tight">Borneo Artisans</div>

		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'hidden md:flex gap-gutter items-center',
				'fallback_cb'    => false,
				'depth'          => 1,
			) );
		} else {
			?>
			<div class="hidden md:flex gap-gutter items-center">
				<a class="font-label-caps text-[11px] tracking-widest text-primary border-b border-primary pb-1" href="#">THE STUDIO</a>
				<a class="font-label-caps text-[11px] tracking-widest text-on-surface-variant hover:text-primary transition-colors" href="#">COLLECTIONS</a>
				<a class="font-label-caps text-[11px] tracking-widest text-on-surface-variant hover:text-primary transition-colors" href="#">WORKSHOPS</a>
				<a class="font-label-caps text-[11px] tracking-widest text-on-surface-variant hover:text-primary transition-colors" href="#">COMMISSIONS</a>
			</div>
			<?php
		}
		?>

		<button class="bg-primary text-on-primary px-6 py-2 font-label-caps text-[11px] tracking-widest hover:bg-secondary transition-all">
			BOOK STUDIO TOUR
		</button>
	</nav>
</header>
