<footer class="bg-surface-container-high border-t border-dashed border-outline/20">
	<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile md:px-margin-desktop py-section-gap max-w-container-max mx-auto">
		<div class="md:col-span-1">
			<div class="font-display-lg text-headline-md text-primary mb-6">Borneo Artisans</div>
			<p class="text-on-surface-variant mb-6 font-body-md">Sustaining cultural excellence through interactive craftsmanship and global heritage patronage.</p>
			<div class="flex gap-4">
				<a class="w-10 h-10 rounded-full border border-outline/20 flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
					<span class="material-symbols-outlined text-[18px]">share</span>
				</a>
				<a class="w-10 h-10 rounded-full border border-outline/20 flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
					<span class="material-symbols-outlined text-[18px]">mail</span>
				</a>
			</div>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<?php
			$footer_menu = wp_nav_menu( array(
				'theme_location' => 'footer',
				'echo'           => false,
				'container'      => false,
				'fallback_cb'    => false,
				'depth'          => 1,
			) );
			if ( $footer_menu ) {
				echo '<div>';
				echo '<h6 class="font-label-caps text-[11px] tracking-widest text-primary mb-6">EXPLORE STUDIO</h6>';
				echo $footer_menu;
				echo '</div>';
			}
			?>
		<?php else : ?>
			<div>
				<h6 class="font-label-caps text-[11px] tracking-widest text-primary mb-6">EXPLORE STUDIO</h6>
				<ul class="space-y-4">
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Artist Residences</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Sustainability Report</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Dyeing Process</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Press Archive</a></li>
				</ul>
			</div>
			<div>
				<h6 class="font-label-caps text-[11px] tracking-widest text-primary mb-6">PATRON PORTAL</h6>
				<ul class="space-y-4">
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Order Tracking</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Care Instructions</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md font-bold text-primary" href="#">Artisan Dashboard</a></li>
					<li><a class="text-on-surface-variant hover:text-secondary transition-all font-body-md" href="#">Privacy &amp; Terms</a></li>
				</ul>
			</div>
			<div>
				<h6 class="font-label-caps text-[11px] tracking-widest text-primary mb-6">KUCHING HUB</h6>
				<p class="text-on-surface-variant mb-2 font-body-md">Heritage Hub, Level 4</p>
				<p class="text-on-surface-variant mb-2 font-body-md">Kuching Waterfront, Sarawak</p>
				<p class="text-on-surface-variant mb-6 font-body-md">Malaysia</p>
				<p class="text-on-surface-variant font-bold font-body-md">studio@borneoartisans.com</p>
			</div>
		<?php endif; ?>
	</div>
	<div class="px-margin-mobile md:px-margin-desktop py-8 border-t border-outline/10 text-center">
		<p class="font-label-caps text-[10px] tracking-widest text-on-surface-variant">&copy; <?php echo esc_html( date( 'Y' ) ); ?> BORNEO ARTISANS STUDIO. PRESERVATION THROUGH INTERACTIVE CRAFT.</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
