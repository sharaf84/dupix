<?php
if(!empty($product)) 
	$gallery = $this->requestAction('home/getFeaturedProducts/Product.section_id:'.$product['Product']['section_id']);
if(!empty($gallery)){?>
<?php
	echo $this->Html->css('front/stepcarousel', null, array('inline'=>false));
	echo $this->Javascript->link('front/jquery_stepcarousel'); 
	echo $this->Javascript->link('front/stepcarousel');
?>
<script type="text/javascript">
stepcarousel.setup({
	galleryid: 'galleryb', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:true, persist:false},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['leftnav.gif', -5, 80], rightnav: ['rightnav.gif', -18, 80]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})
</script>
<div id="we_also_recommend">Featured Gallery</div>
<div id="step-gallery"><a class="gal-back" href="javascript:stepcarousel.stepBy('galleryb',%20-1)"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/'?>ad_scroll_back.png" border="0" /></a><a class="gal-forward" href="javascript:stepcarousel.stepBy('galleryb',%201)"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/'?>ad_scroll_forward.png" border="0" /></a>
  <div id="galleryb" class="stepcarousel">
    <div class="belt">
      <?php foreach ($gallery as $product){?>	
          <div class="panel">
              <a href="<?php echo $this->Session->read('Setting.url').'/categories/details/'.$product['Product']['id'].'/'.Inflector::slug(strtolower($product['Exhibitor']['title']), '-').'/'.Inflector::slug(strtolower($product['Product']['title']), '-').'/Product.section_id:'.$product['Product']['section_id'].'/Product.cat_id:'.$product['Product']['cat_id'].'/from:featured';?>">
                  <img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$product['Product']['image']?>" alt="<?php echo $product['Cat']['title'].' by '.$product['Exhibitor']['title'];?>" title="<?php echo $product['Cat']['title'].' by '.$product['Exhibitor']['title'];?>" width="90" height="65" border="0">
              </a>
          </div>
      <?php }?>
    </div>
  </div>
</div>
<?php }?>