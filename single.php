<?php get_header(); ?>
<main class="bg-1">
	<div class="container px-0">
			<div class="row py-5 px-0">
			<div class="col-md-8 col-12 pb-5 mx-auto">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!--メインコンテンツ-->
				<div class="bg-white py-3">
		<!--記事タイトル-->
				<div class="px-5per py-1">
					<h1 class="font-weight-bolder py-4 pagetitle"><?php the_title(); ?></h1>
				</div>
		<!--日付-->
		<div class="px-5per pb-3">
				<span class="text-secondary"><?php the_time('Y/n/j'); ?></span>
		<!--カテゴリー-->
		<?php
		$category = get_the_category();
		 
		if (!empty( $category )) { ?>
		<ul class="px-0 d-inline">
		<?php
		foreach($category as $cat){
				
		echo '<li class="d-inline px-1"><a class="p-1 text-white bg-2 text-decoration-none" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a></li>';
		 
		} ?>
		    
		</ul>
		<?php } ?>
	    </div>
		<!--サムネイル-->
				<div class="pb-5">
						<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( '', array('class' => 'img-fluid' ) ); ?>
						<?php else : ?>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/image/noimage.jpg" alt="">
						<?php endif; ?>
					</div>
		<!--目次-->
				
		<!--本文-->
					<div class="text-left px-2">
					<?php the_content(); ?></div>
				</div>
				<?php endwhile; else : ?>
		<p>記事がありません。</p>
		<?php endif; ?>
		</div>
	<?php get_sidebar(); ?>
</div>
</div>
	<!--フッター-->
<?php get_footer(); ?>

