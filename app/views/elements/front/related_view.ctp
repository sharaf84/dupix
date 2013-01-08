<?php if(!empty($articles)){?>
<div class="mid_element">
    <div class="head_title">أخبار ذات صلة</div>
    <?php 
	$first = true;
	foreach($articles as $article){
	?>
    <a href="<?php echo $this->Session->read('Setting.url').'/news/display/article/'.$article['Article']['id'];?>">
        <div class="malf-pic" style="display:<?php echo ($first==true)?'block':'none';?>;">
            <?php
            $first = false; 
            if(isset($article['Gal'][0])){
                echo $this->Html->Image(
                    'upload/medium_'.$article['Gal'][0]['image'],
                    array('border'=>'0', 'width'=>325)
                );
            }
            ?>
            <div class="malf-data">
                <div align="right">
                    <?php echo $article['Article']['header'];?>
                </div>
            </div>
        </div>
    </a>
    <?php }?>
    <div id="malf-bottom">
    <img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>malf-space.jpg" width="325" height="1" border="0" />
    </div>
    <div id="mlf-dots" align="right">
        <?php 
		$first = true;
		foreach($articles as $article){
		?>
        <a href="" class="<?php if($first == true) echo 'selected';?>"><?php echo $article['Article']['title'];?></a>
        <?php $first = false;}?>
    </div>
    <div id="malf-bottom"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>maladata.png" width="325" height="17" /></div>
</div>
<?php }?>