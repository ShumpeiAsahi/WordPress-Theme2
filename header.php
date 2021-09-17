<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/theme.css">
    <?php wp_head(); ?>
	<!--タイトル-->
    <?php if ( is_home() ) { ?>
			    <title><?php bloginfo('name'); ?></title>
	<?php } elseif (is_category($category)) { ?>
				 <title><?php single_cat_title( '', true ); ?> | <?php bloginfo('name'); ?></title>
	<?php } else { ?>
			   <title><?php the_title(); ?></title>
		<?php } ?>
</head>
<body class="wrap">
	<!-- スクロールさせない -->
	<div class="wrap">
<header class="bg-1 d-none d-md-block">
	<div class="container">
			<a href="<?php echo home_url(); ?>" class="py-1 mb-0"><img src="https://pelife.dev/wp-content/uploads/2021/09/logo-2.png" class="title-logo"></a>
	</div>
</header>
<!---グローバルナビ--->
<nav class="navbar navbar-expand-md bg-2 py-0">
	<div class="container nav" id="g-menu">
		<a href="<?php echo home_url(); ?>" class="navbar-brand w-75 d-md-none px-3"><img src="https://pelife.dev/wp-content/uploads/2021/09/logo_mobile.png" class="title-logo-mobile"></a>
		<button class="navbar-toggler d-md-none" type="button" onclick="buttonClick()" id="btn">
		<span class="navbar-toggler-icon" id="span_1"></span>
		<span class="navbar-toggler-icon" id="span_2"></span>
		<span class="navbar-toggler-icon" id="span_3"></span>
		</button>
		<div class="collapse navbar-collapse py-3">
			<?php
			$defaults = array(
				'menu_class'      => 'navbar-nav',
				'container'       => false,
				'link_before'     => '<span class="text-white mr-4 px-1 text-decoration-none titletext">',
				'link_after'      => '<span>',
				'theme_location'  => 'gloval-navigation',
			);
			wp_nav_menu( $defaults );
			?>
		</div>
	</div>
	<div id="g-nav" class="d-md-none">
			<a href="<?php echo home_url(); ?>" class="py-1 mb-0"><img src="https://pelife.dev/wp-content/uploads/2021/09/logo-2.png" class="w-50"></a>
			<?php
			$defaults = array(
				'menu_class'      => 'navbar-nav',
				'container'       => false,
				'link_before'     => '<span class="mr-4 text-decoration-none titletext">',
				'link_after'      => '<span>',
				'theme_location'  => 'gloval-navigation',
			);
			wp_nav_menu( $defaults );
			?>
		</div>
</nav>
<?php if ( is_home() ) { ?>
	<h1 class="d-none"><?php bloginfo('name'); ?></h1>	    
<?php } ?>