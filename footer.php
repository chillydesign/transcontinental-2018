<?php $td = get_template_directory_uri(); ?>


<!-- footer -->
<footer class="footer" role="contentinfo">


	<!-- copyright -->
	<div class="container-fluid copyright">
	<div class="row">
		<div class="col-sm-4 col-md-2">
			<h3></h3>
			<a href="http://www.transcontinental.ch/" target="_blank"><img src="<?php echo $td; ?>/img/trans.png" alt="" /></a>
		</div>
		<div class="col-sm-4 col-md-5">
			<h3>Autres sociétés membres du groupe Transcontinental</h3>
			<a href="http://www.zenithvoyages.ch/" target="_blank"><img src="<?php echo $td; ?>/img/zenith.svg" alt="" /></a>
			<a href="http://www.gva-vip.ch/" target="_blank"><img style="background:#353537; padding: 5px;" src="<?php echo $td; ?>/img/logo_gva.png" alt="" /></a>
			<a href="http://gtmgolf.ch/" target="_blank"><img style="padding: 0; margin-left: 10px;" src="<?php echo $td; ?>/img/gtm.jpg" alt="" /></a>
		</div>
		<div class="col-sm-4 col-md-5">
			<h3>Affiliations professionnelles</h3>
			<a href="http://www.garantiefonds.ch/fr/page-daccueil/" target="_blank"><img src="<?php echo $td; ?>/img/garantie.jpg" alt="" /></a>
			<a href="http://www.iata.org/Pages/default.aspx" target="_blank"><img src="<?php echo $td; ?>/img/iata.png" alt="" /></a>
			<a href="http://www.srv.ch/fr/page-daccueil/" target="_blank"><img src="<?php echo $td; ?>/img/fsv.png" alt="" /></a>
		<a href="http://itptravel.com/" target="_blank"><img src="<?php echo $td; ?>/img/itp.png" alt="" /></a>
		</div>
	</div>
<!-- 		<a href="http://www.iata.org/Pages/default.aspx" target="_blank"><img src="<?php echo $td; ?>/img/iata.png" alt="" /></a> -->
		<!-- <a href="http://www.srv.ch/fr/page-daccueil/" target="_blank"><img src="<?php echo $td; ?>/img/fsdadv.png" alt="" /></a> -->
<!-- 		<a href="http://www.srv.ch/fr/page-daccueil/" target="_blank"><img src="<?php echo $td; ?>/img/fsv.png" alt="" /></a>
		<a href="http://itptravel.com/" target="_blank"><img src="<?php echo $td; ?>/img/itp.png" alt="" /></a>
		<a href="http://www.garantiefonds.ch/fr/page-daccueil/" target="_blank"><img src="<?php echo $td; ?>/img/garantie.jpg" alt="" /></a>
		<a href="http://www.transcontinental.ch/" target="_blank"><img src="<?php echo $td; ?>/img/trans.png" alt="" /></a>
		<a href="http://www.zenithvoyages.ch/" target="_blank"><img src="<?php echo $td; ?>/img/zenith.svg" alt="" /></a> -->
	</div>

	<div class="footer_inner">
	<div class="container">
		<div style="margin-top:15px" class="row">
			<p style="text-align:left"  class="col-sm-3">&copy;  Transcontinental <?php echo date('Y'); ?></p>
			<p  class="col-sm-6"><a href="https://www.flickr.com/photos/80805361@N08" target="_blank"><i class="fa fa-flickr"></i>Flickr</a><a href="https://twitter.com/transcontinent3" target="_blank" ><i class="fa fa-twitter-square"></i>Twitter</a><a href=" https://www.facebook.com/pages/transcontinental-voyages/127200380677071" target="_blank"><i class="fa fa-facebook-square"></i>Facebook</a>  <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FTranscontinental-Voyages-127200380677071&width=135&layout=button_count&action=like&show_faces=true&share=true&height=46&appId=1877600889151299" width="135" height="46" style="border:none;overflow:hidden; width: 135px;height: 46px; margin: -3px 0 -30px;" scrolling="no" frameborder="0" allowTransparency="true"></iframe></p>
			<p style="text-align:right" class="col-sm-3">Website by <a href="http://webfactor.ch/">WebFactor</a></p>

		</div>



	</div>
	</div>

			</footer>
			<!-- /footer -->

			<div id="social_bar">

			    <ul>
			      <li class="booking_bar"><span class="tittle">Réservation en ligne</span><a href="<?php echo get_home_url(); ?>/reservations-2424-h"><?php include('img/booking.svg'); ?></a></li>
			      <li class="gift_bar"><span class="tittle">Pour offrir</span><a href="<?php echo get_home_url(); ?>/pour-offrir"><?php include('img/gift.svg'); ?></a></li>
			      <li class="contact_bar"><span class="tittle">Contactez-nous</span><a href="<?php echo get_home_url(); ?>/contact"><?php include('img/contact.svg'); ?></a></li>
			    </ul>
			  </div>


<?php if ( is_front_page() ): ?>
	<div id="mylightbox"><div id="googleMap" style="height:300px;width:300px"></div></div>
	<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyAxQfqRqtPLAW4BolFMCxTiv9y--R8CXdU"></script>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/unslider-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.shuffle.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/featherlight.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/featherlight.gallery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.justifiedGallery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js?v=0.2"></script>
<!-- analytics -->
<script>
	// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
	// 	(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
	// 	l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
	// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
	// ga('send', 'pageview');
</script>

</body>
</html>
