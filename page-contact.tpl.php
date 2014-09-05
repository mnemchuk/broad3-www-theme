<?php include dirname(__FILE__) . '/header.php' ?>
	<?php if ($navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="clear-block region region-navbar">

          <a name="navigation" id="navigation"></a>

          <?php print $navbar; ?>

        </div></div> <!-- /#navbar-inner, /#navbar -->
      <?php endif; ?>
      <div class="breadcrumb-outer">
          <?php echo $breadcrumb ?>
      </div>
      <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
            </div></div> <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>
      <div id="content"><div id="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

       

        <?php if ($title || $tabs || $help || $messages): ?>
          <div id="content-header" >
           
            <h1 class="title">Contact Us</h1>
            <p>We welcome your questions, comments, and observations. To find specific Broad members, please see our <a href='/directory/'>Institute Directory</a>.</p>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          	<div id='contactBuilding'>
            	<div id="buildingAlpha">
                	<span class='address'>301 Binney Street</span>
                    <p>
                    	Cambridge, MA 02142<br/>
                        Ph: 617-714-7000<br/>
                        Fax: 617-714-8102
                    </p>
				<a href="https://www.google.com/maps/place/Broad+Institute+%7C+301B/@42.366684,-71.0871,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0x5bad2e8c6226c930">Google map</a> 
                    <?php
						//echo l('Directions and maps', 'node/501');
					?>                    
                
                </div>
                
                <div id="buildingBravo">
                	<span class='address'>415 Main Street</span>
                    <p>
                    	Cambridge, MA 02142<br/>
                        Ph: 617-714-7000<br/>
                        Fax: 617-714-8102
                    </p>
					<a href="https://www.google.com/maps/place/Broad+Institute+%7C+7CC/@42.362808,-71.088956,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0xaa05ffeecb6e9e37">Google map</a> | <a href="/files/sections/about/broad-parking-map.pdf">Parking map</a>
                     <?php
						//echo l('Directions and maps', 'node/501');
					 ?>  	
                </div>
                
                <div id="buildingCharlie">
                	<span class='address'>320 Charles Street</span>
                    <p>
                    	Cambridge, MA 02142<br/>
                        Ph: 617-714-7000<br/>
                        Fax: 617-714-8102
                    </p>
					<a href="https://www.google.com/maps/place/Broad+Institute+%7C+320C/@42.368088,-71.086907,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0x2d06309652595256">Google map</a> 
                	 <?php
						//echo l('Directions and maps', 'node/501');
					?>  
                </div>
                <br style='clear:both'/> 
                
                
                    <div id="buildingAmes">
                	<span class='address'>75 Ames Street</span>
                    <p>
                    	Cambridge, MA 02142<br/>
                        Ph: 617-714-7000<br/>
                        Fax: 617-714-8102
                    </p> 
					<a href="https://www.google.com/maps/place/Broad+Institute+%7C+75A/@42.363452,-71.088176,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0x62fbfbca32cc6ce4">Google map</a> | <a href="/files/sections/about/broad-parking-map.pdf">Parking map</a>
                	 <?php
						//echo l('Directions and maps', 'node/501');
					?>  
                </div>
                <br style='clear:both'/>      
                           
            </div>
          
          
          </div> <!-- /#content-header -->
        <?php endif; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>
<!--
        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>-->

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /#content-inner, /#content -->

      

<?php include dirname(__FILE__) . '/footer.php' ?>
