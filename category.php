<?php get_header(); ?>

<main class="bg-1">
	<div class="container px-0">
	<div class="row py-3">
		<div class="col-md-8">
	<h1 class="pagetitle mb-5 mt-2"><?php single_cat_title()?>に関する記事</h1>
	<!--メインコンテンツ-->
	<div class="row py-1 o-3column">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="py-2 col-6">
		<div class="bg-white pb-1">
		<!--サムネイル-->
			<div class="pb-3"><a href="<?php the_permalink(); ?>">
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
		<span class="text-secondary"><?php the_time('Y/n/j'); ?></span>
		<!--カテゴリー-->
		<?php
		$category = get_the_category();
		 
		if (!empty( $category )) { ?>
		<ul class="px-0 d-inline">
		<?php
		foreach($category as $cat){
				
		echo '<li class="d-inline px-1"><a class="cate text-white bg-cyan text-decoration-none" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a></li>';
		 
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
</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<!--フッター-->
<?php get_footer(); ?>