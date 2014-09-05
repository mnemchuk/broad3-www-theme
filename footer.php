    </div></div> <!-- /#main-inner, /#main -->
      <div id="footer"><div id="footer-inner" class="region region-footer">
        <div id="footer-nav-menu" class="clear-block">
            <?php echo generateFooterNavMenu() ?>    
        </div>

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>
        <?php /*echo theme('links', menu_navigation_links('menu-footer-boilerplate'))*/ ?>

      </div></div> <!-- /#footer-inner, /#footer -->

  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>
	<div style="position: absolute; display: none;" id="autocomplete-results"></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17042794-1']);
  _gaq.push(['_setDomainName', '.broadinstitute.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
    setTimeout(function(){
		 var a=document.createElement("script");
		 var b=document.getElementsByTagName("script")[0];
		 a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0009/5289.js?"+Math.floor(new Date().getTime()/3600000);
		 a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

</body>
</html>
