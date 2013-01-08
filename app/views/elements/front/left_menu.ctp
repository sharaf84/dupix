<!--Read Albums if comming from "/showrooms/details/". else read section and cats-->
<?php 
if(isset($referer) && (strpos($referer, "/showrooms/details/") !== false)){
	$url = explode("/", $referer);
	$albums = $this->Session->read('exhAlbums');
	if(!empty($albums)){
?>
<div id="title_category">Albums</div>
    <ul id="nav_accordion">
    	<?php 
		foreach($albums as $album){ 
		?>
        <li>
        	<a href="<?php echo $this->Session->read('Setting.url').'/showrooms/details/'.$url[3].'/'.$url[4].'/'.$album['Product']['album'];?>" style="cursor:pointer"><?php echo $album['Product']['album'];?></a>
        </li>
        <?php }?>
    </ul>
<?php }?>
	
<?php }else {?>
<div id="title_category">CATEGORY</div>
<?php 
$sections = $this->requestAction('main/getSections/cats');
if(!empty($sections)){
?>
    <ul id="nav_accordion">
    	<?php 
		foreach($sections as $section){ 
		?>
        <li><a style="cursor:pointer"><?php echo $section['Section']['title'].' ('.$this->requestAction('categories/productsCount/'.$section['Section']['id']).')';?></a>
            <?php if(!empty($section['Cat'])){?>
            <ul>
            	<?php 
				foreach($section['Cat'] as $cat){
				?>
                <li>
                	<a href="<?php echo $this->Session->read('Setting.url').'/categories/display/'.$section['Section']['id'].'/'.$cat['id'].'/1';?>">
                    	<?php echo $cat['title'].' ('.$this->requestAction('categories/productsCount/'.$section['Section']['id'].'/'.$cat['id']).')';?>
                	</a>
                </li>
                <?php }?>
            </ul>
            <?php }?>
        </li>
        <?php }?>
    </ul>
<?php }}?>
<?php echo $this->element('front/left_banner');?>