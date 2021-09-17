<?php get_header(); ?>

<main class="bg-1">
	<div class="container px-0">
	<!--ピックアップ記事-->
	<div class="row py-3">
		<div class="col-md-8 md-3">
		<?php if (!is_paged()) : ?>
		<?php $top_query = new WP_Query( 'tag=toppickup' ); ?>
		<?php if ( $top_query->have_posts() ) : ?>

		<?php while ( $top_query->have_posts() ) : $top_query->the_post(); ?>
			<div class="bg-white">
				<!--サムネイル-->
				<div class="pb-1">
					<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( '', array('class' => 'img-fluid' ) ); ?>
						<?php else : ?>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/image/noimage.jpg" alt="">
						<?php endif; ?>
					</a>
				</div>
				<!--記事タイトル-->
				<h2 class="h4 px-3 bg-1 pb-3 m-0 border-0"><a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<?php endwhile; ?>
	
		<?php wp_reset_postdata(); ?>

		<?php endif; ?>
		<?php endif; ?>
	<!--メインコンテンツ-->
	<div class="row py-1 o-3column">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="py-2 col-sm-6">
		<div class="bg-1 pb-1">
		<!--サムネイル-->
			<div class="pb-2"><a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( '', array('class' => 'img-fluid' ) ); ?>
						<?php else : ?>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/image/noimage.jpg" alt="">
						<?php endif; ?>
					</a>
					</div>
		<!--記事タイトル-->
		<h2 class="h6 bg-1 pb-2 titletext border-0"><a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="pb-3 px-2">
		<!--日付-->
		<span class="text-secondary"><?php the_time('Y.n.j'); ?></span>
		<!--カテゴリー-->
		<?php
		$category = get_the_category();
		 
		if (!empty( $category )) { ?>
		<ul class="px-0 d-inline">
		<?php
		foreach($category as $cat){
				
		echo '<li class="d-inline px-1"><a class="cate text-white bg-2 text-decoration-none" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a></li>';
		 
		} ?>
		    
		</ul>
		<?php } ?>
		</div>
		</div>
		</div>
		<?php endwhile; else : ?>
		<p>記事がありません。</p>
		<?php endif; ?>
	</div>
	<div class="text-center py-5">
			<?php global $wp_rewrite;
			$paginate_base = get_pagenum_link(1);
			if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
				$paginate_format = '';
				$paginate_base = add_query_arg('paged','%#%');
			}
			else{
				$paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
				user_trailingslashit('page/%#%/','paged');;
				$paginate_base .= '%_%';
			}
			echo paginate_links(array(
				'base' => $paginate_base,
				'format' => $paginate_format,
				'total' => $wp_query->max_num_pages,
				'mid_size' => 4,
				'current' => ($paged ? $paged : 1),
				'prev_text' => '«',
				'next_text' => '»',
			)); ?>
		</div>
</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<!--フッター-->
<?php get_footer(); ?>