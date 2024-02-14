<div class="south-wind-cards-wrapper">
	<div class="south-wind-cards-row step1">
		<p class="south-wind-info">Sort Cards To Most Important, Middle Important and Least Important.<br>
			Choose from 1-3 where 1 is Most Important, 2 is Middle Important 3 is Least Important
		</p>
		
		<div class="south-wind-tabs">
			<span class="south-wind-tab active" data-index="0|0">Unsorted</span>
			<span class="south-wind-tab" data-index="0|1">Most Important</span>
			<span class="south-wind-tab" data-index="0|2">Middle Important</span>
			<span class="south-wind-tab" data-index="0|3">Least Important</span>
		</div>
		<div class="south-wind-cards-col cards-unsorted active" data-index="0|0">
		<?php $img_path = plugins_url( 'southwind-card-sorter/img/' ); ?>
		
		<?php if ( have_rows( 'cards', 'option' ) ) : ?>
			<ul>
			<!-- // Loop through rows. -->
			<?php while ( have_rows( 'cards', 'option' ) ) : ?>
				<?php the_row(); ?>

				<!-- // Load sub field value. -->
				<?php $sub_value = get_sub_field( 'card_name' ); ?>
				<?php
				printf(
					'<li class="south-wind-card">
						<span>%s</span>
						<div class="rating-row">
							<span class="rate-num" data-index="0"><img src="%s" /></span>
							<span class="rate-num" data-index="1"><img src="%s" /></span>
							<span class="rate-num" data-index="2"><img src="%s" /></span>
							<span class="rate-num" data-index="3"><img src="%s" /></span>
						</div>
					</li>',
					$sub_value,
					$img_path . 'star.svg',
					$img_path . 'sparkles-outline.svg',
					$img_path . 'star-half-outline.svg',
					$img_path . 'star.svg'
				);
				?>

				<!-- // End loop. -->
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		</div>

		<div class="south-wind-cards-col cards-most " data-index="0|1">
			<ul></ul>
		</div>

		<div class="south-wind-cards-col cards-middle" data-index="0|2">
			<ul></ul>
		</div>

		<div class="south-wind-cards-col cards-least" data-index="0|3">
			<ul></ul>
		</div>
		<a href="#" class="south-wind-continue south-wind-step2">Continue</a>
	</div>

	<!-- // step 2 -->
	<div class="south-wind-cards-row step2">
		<p class="south-wind-info">Sort Previously Most Important Cards To New Three Piles</p>

		<div class="south-wind-tabs">
			<span class="south-wind-tab active" data-index="1|0">Unsorted</span>
			<span class="south-wind-tab" data-index="1|1">Most Important</span>
			<span class="south-wind-tab" data-index="1|2">Middle Important</span>
			<span class="south-wind-tab" data-index="1|3">Least Important</span>
		</div>

		<div class="south-wind-cards-col cards-unsorted" data-index="1|0">
			<ul></ul>
		</div>
		<div class="south-wind-cards-col cards-most" data-index="1|1">
			<ul></ul>
		</div>
		<div class="south-wind-cards-col cards-middle" data-index="1|2">
			<ul></ul>
		</div>
		<div class="south-wind-cards-col cards-least" data-index="1|3">
			<ul></ul>
		</div>

		<a href="#" class="south-wind-continue south-wind-step3">Continue</a>
	</div>

	<!-- // step 3 -->
	<div class="south-wind-cards-row step3">
		<p class="south-wind-info">Select Top 5 From Previously Most Important</p>
		<div class="south-wind-tabs">
			<span class="south-wind-tab active" data-index="2|0">Unsorted</span>
			<span class="south-wind-tab" data-index="2|1">Top 5</span>
		</div>

		<div class="south-wind-cards-col cards-unsorted" data-index="2|0">
			<ul></ul>
		</div>
		<div class="south-wind-cards-col cards-most" data-index="2|1">
			<ul></ul>
		</div>
	</div>
</div>
