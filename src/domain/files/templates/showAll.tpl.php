

    <div id="fileManager">
    	<div >
    		
    		<?php echo $this->displayNotification() ?>
    		


			<div class='mediamgr'>
			 <div class='mediamgr_left'>
                    <div class="mediamgr_category">
                    	
		        	<form action='/files/showAll<?php if(isset($_GET['modalPopUp'])) { echo"&modalPopUp=true"; }?>' method='post' enctype="multipart/form-data" class="fileModal" >
						<div class="par f-left" style="margin-right: 15px;">
						
					   	 <div class='fileupload fileupload-new' data-provides='fileupload'>
					   	 	<input type="hidden" />
							<div class="input-append">
								<div class="uneditable-input span3">
									<i class="iconfa-file fileupload-exists"></i><span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-file">
									<span class="fileupload-new">Select file</span>
									<span class='fileupload-exists'>Change</span>
									<input type='file' name='file' />
								</span>
									
								<a href='#' class='btn fileupload-exists' data-dismiss='fileupload'>Remove</a>
							</div>
					  	 </div>		
					   	</div>
					   
					   <input type="submit" name="upload" class="button" value="<?php echo $this->__('UPLOAD'); ?>" />
		
					</form>	
					

					</div> 
                    
                   	<!--<div class="mediamgr_category">
                    	<ul id="mediafilter">
                        	<li class="current"><a href="all">All</a></li>
                            <?php foreach($this->get('folders') as $folder): ?>
	                            <li><a href="<?php echo $folder['id'] ?>"><?php echo $folder['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                   	</div>==?<!--mediamgr_category-->
                    
                    <div class="mediamgr_content">          
                    	
                    	<ul id='medialist' class='listfile'>
                    		<?php foreach($this->get('files') as $file): ?>
                    		<li class="<?php echo $file['moduleId'] ?>">
                              	<a class="imageLink" href="<?=SITE_URL?>/download.php?module=<?php echo $file['module'] ?>&encName=<?php echo $file['encName'] ?>&ext=<?php echo $file['extension'] ?>&realName=<?php echo $file['realName'] ?>">
                              		<?php if (in_array(strtolower($file['extension']), $this->get('imgExtensions'))):  ?>
                              			<img style='max-height: 50px; max-width: 70px;' src="/download.php?module=<?php echo $file['module'] ?>&encName=<?php echo $file['encName'] ?>&ext=<?php echo $file['extension'] ?>&realName=<?php echo $file['realName'] ?>" alt="" />
                              		<?php else: ?>
                              			<img style='max-height: 50px; max-width: 70px;' src='/images/thumbs/doc.png' />
                              		<?php endif; ?>
                            		<span class="filename"><?php echo substr($file['realName'], 0, 10)."(...).".$file['extension'] ?></span>
                              	</a>
                           	</li>
                           	<?php endforeach; ?>
                        <br class="clearall" />
                    	</ul>
                        <br class="clearall" />
                        
                    </div><!--mediamgr_content-->
                    
                </div><!--mediamgr_left -->
                
                <div class="mediamgr_right">
                	<!--<div class="mediamgr_rightinner">
                        <h4>Type</h4>
                        <ul class="menuright">
                        	<?php foreach($this->get('modules') as $key => $module): ?>
                        		<?php if ( 
                        				($key != 'client' || ($_SESSION['userdata']['role'] == 2 || $_SESSION['userdata']['role'] == 4)) 
                        				&& ($key != 'lead' || ($_SESSION['userdata']['role'] == 2 || $_SESSION['userdata']['role'] == 4)) 
									): ?>
	                        		<li class="<?php if($this->get('currentModule') == $key): ?>current<?php endif; ?>">
	                        			<?php echo $this->displayLink('files.showAll', $module, array('id' => $key)); ?>
	                        		</li>
                        	<?php endif; ?>
                        	<?php endforeach; ?>
                        </ul>
                    </div><!-- mediamgr_rightinner -->
                </div><!-- mediamgr_right -->
                <br class="clearall" />
            </div><!--mediamgr-->      		 	


		</div>
	</div>
	

<script type='text/javascript'>
    jQuery(window).load(function(){

		jQuery('#widgetAction').click(function(){
			jQuery('.widgetList').toggle();
		});
		jQuery('#widgetAction2').click(function(){
			jQuery('.widgetList2').toggle();
		});		
	});
</script>


    <script type="text/javascript">
        jQuery(document).ready(function(){

            //Replaces data-rel attribute to rel.
            //We use data-rel because of w3c validation issue
            jQuery('a[data-rel]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('rel'));
            });

            //jQuery("#medialist a").colorbox();

            <?php if(isset($_GET['modalPopUp'])) { ?>
                jQuery('#medialist a.imageLink').click(function(event){
                    console.log("Loading Image");
                    event.preventDefault();
                    event.stopImmediatePropagation();

                    var url = jQuery(this).attr("href");
                    jQuery("#"+window.tinyMceUploadFieldname).val(url);

                    jQuery.nmTop().close();
                });

            <?php } ?>


        });
        jQuery(window).load(function(){
            jQuery('#medialist').isotope({
                itemSelector : 'li',
                layoutMode : 'fitRows'
            });

            // Media Filter
            jQuery('#mediafilter a').click(function(){

                var filter = (jQuery(this).attr('href') != 'all')? '.'+jQuery(this).attr('href') : '*';
                jQuery('#medialist').isotope({ filter: filter });

                jQuery('#mediafilter li').removeClass('current');
                jQuery(this).parent().addClass('current');

                return false;
            });


        });
    </script>

