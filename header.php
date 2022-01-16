<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/theme.css">
     <!-- font awesomw -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> 
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141399703-3"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-141399703-3');
	</script>

    <?php wp_head(); ?>
	<!--タイトル-->
    <?php if ( is_home() ) { ?>
			    <title><?php bloginfo( $show ); ?></title>
	<?php } elseif (is_category($category)) { ?>
				 <title><?php single_cat_title( '', true ); ?> | <?php bloginfo( $show ); ?></title>
	<?php } else { ?>
			   <title><?php the_title(); ?></title>
		<?php } ?>

	<!--アドセンス広告-->	
	<script data-ad-client="ca-pub-4563208299418637" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body class="wrap">
	<!-- スクロールさせない -->
	<div class="wrap">
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!---ヘッダー--->
<header class="bg-white d-none d-sm-block">
	<div class="container">
		<?php if ( is_home() ) { ?>
			    <h1 class="h1 py-3 bg-white mb-0"><a href="<?php echo home_url(); ?>" class="titletext text-decoration-none"><?php bloginfo('name'); ?></a></h1>
		<?php } else { ?>
			    <div class="h1 py-3 bg-white mb-0"><a href="<?php echo home_url(); ?>" class="titletext text-decoration-none"><?php bloginfo('name'); ?></a></div>
		<?php } ?>
	</div>
</header>
<!---グローバルナビ--->
<nav class="navbar navbar-expand-lg bg-cyan">
	<div class="container">
		<?php if ( is_home() ) { ?>
			    <h1 class="h1 py-3 mb-0 d-block d-sm-none"><a href="<?php echo home_url(); ?>" class="titletext text-white text-decoration-none"><?php bloginfo('name'); ?></a></h1>
		<?php } else { ?>
			    <div class="h1 py-3 mb-0 d-block d-sm-none"><a href="<?php echo home_url(); ?>" class="titletext text-white text-decoration-none"><?php bloginfo('name'); ?></a></div>
		<?php } ?>
		<button class="navbar-toggler" 
		type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" area-label="Togglenavigation">
		<span class="navbar-toggler-icon"></span>
		<span class="navbar-toggler-icon"></span>
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse py-1 text-decoration-none" id="navbarNav">
			<?php
			$defaults = array(
				'menu_class'      => 'navbar-nav',
				'container'       => false,
				'link_before'     => '<span class="nav-item text-white mr-4">',
				'link_after'      => '<span>',
				'theme_location'  => 'gloval-navigation',
			);
			wp_nav_menu( $defaults );
			?>
		</div>
	</div>
</nav>