<!--サイドバー-->
	<div class="col-md-4">
		<?php dynamic_sidebar( 'sidebar_widget01' ); ?>
	<!--月別アーカイブ-->
	<div class="container bg-white mb-5 px-0 pb-1">
	    <h4 class="text-center py-2 mb-3 font-weight-bolder text-white bg-cyan">月別アーカイブ</h4>
		<?php
		$year_prev = null;
		$postType = get_post_type( );
		$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
		                                    YEAR( post_date ) AS year,
		                                    COUNT( id ) as post_count FROM $wpdb->posts
		                                    WHERE post_status = 'publish' and post_date <= now( )
		                                    and post_type = '$postType'
		                                    GROUP BY month , year
		                                    ORDER BY post_date DESC");
		foreach($months as $month):
		    $year_current = $month->year;
		    if ($year_current != $year_prev) { ?>
		        <?php if($year_prev != null): ?>
		            </ul>
		        <?php endif; ?>

		        <p class="h5 text-secondary px-3"><?php echo $month->year; ?>年</p>
		        <ul>
		    <?php } ?>
		            <li>
		                <a class="text-secondary" href="<?php echo esc_url(home_url()); ?>/date/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
		                    <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月(<?php echo $month->post_count; ?>)
		                </a>
		            </li>
		            <?php $year_prev = $year_current; ?>
		<?php endforeach; ?>
		        </ul>
	</div>
	</div>