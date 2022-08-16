<?php include('page_components/links.php');
		if(is_home()||$currentPage == 'cursos'|| $currentPage == 'sobre' || $currentPage == 'equipe')
		{
		    ?><script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDccchbca5lrF3DzGGLYS2RFqCXqOa5GDw"></script>
		<?php } ?>
	<script>
// 		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// 				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// 			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// 		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

// 		ga('create', 'UA-98273002-1', 'auto');
// 		ga('send', 'pageview');

	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180577162-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-180577162-1');
	</script>
	<style>
		.cursos .cursos__specials .cursos__specials_box .cursos__specials_boxcontent .box__right .box__right_bottom .box__bottom_price{display: none;}	
		.box__bottom_price{display: none;}
		@media (min-width: 320px){
			.cursos .cursos__specials .cursos__specials_box .cursos__specials_boxcontent .box__right .box__right_bottom .box__bottom_price{display: none;}	
			.box__bottom_price{display: none;}
		};
	</style>
    </body>
</html>