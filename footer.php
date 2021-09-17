<footer class="pt-5 bg-2">
	<div class="pb-3 text-center text-white">
		<a class="text-white" href="#">プライバシーポリシー</a>　|　<a class="text-white" href="#">お問い合わせ</a>
	</div>
	<div class="footer-text text-center p-3">
		Copyright <?php echo date('Y') ?> Shumpei Asahi.<br> 
		Powered by WordPress.
	</div>

</footer>
</main>
<?php wp_footer(); ?>
<!-- /.wrap -->
</div>
</body>
	<!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
   <!-- font awesomw -->
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"> 

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <script>
	function buttonClick(){
		const btn = document.getElementById("btn");
		const nav = document.getElementById("g-nav");
		
		const s1 = document.getElementById("span_1");
		const s2 = document.getElementById("span_2");
		const s3 = document.getElementById("span_3");

		if( btn.classList.contains('active') == false ){

			btn.classList.add("active");
			nav.classList.add("panelactive");

			s1.classList.add("active");
			s2.classList.add("active");
			s3.classList.add("active");

		}else {
			btn.classList.remove("active");
			nav.classList.remove("panelactive");

			s1.classList.remove("active");
			s2.classList.remove("active");
			s3.classList.remove("active");
		}
	}
  </script>
</html>