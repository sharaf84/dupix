<div class="pagination">
	<?php
	$sectionId = isset($this->params['pass'][0])?$this->params['pass'][0]:0;
	$catId =  isset($this->params['pass'][1])?$this->params['pass'][1]:0;
	$currentPage = isset($this->params['pass'][2])?$this->params['pass'][2]:1;
	$pagesNo = ceil($this->requestAction('main/productsCount/'.$sectionId.'/'.$catId)/20);
	if($pagesNo > 0){
		$start = 1; $end = 9;
		if($pagesNo > 9 && $currentPage >= 9){
			if(($pagesNo - $currentPage) < 4){
				$start = $pagesNo-8; $end = $pagesNo;
			}else
				$start = $currentPage-4; $end = $currentPage+4;
		}
	?>
    <ul>
    	<?php if($currentPage > 1){?>
            <li><a href="<?php echo $this->Session->read('Setting.url').'/categories/display/'.$sectionId.'/'.$catId.'/'.($currentPage-1);?>" class="prev"></a></li>
    	<?php }?>
		<?php 
		for($i=$start; $i<=$pagesNo; $i++){
			$class = ($i == $currentPage)?'currentpage':'';
		?>
            <li>
                <a href="<?php echo ($class=='currentpage')?'#':$this->Session->read('Setting.url').'/categories/display/'.$sectionId.'/'.$catId.'/'.$i;?>" class="<?php echo $class ;?>">
                   <?php 
                   //if(($start > 1) && ($i == $start)) echo '...';
                   echo $i;
                   //if(($end < $pagesNo) && ($i == $end)) echo '...';
                   ?>
                </a>
            </li>
        <?php if($i == $end) break;}?>
        <?php if($currentPage < $pagesNo){?>
            <li><a href="<?php echo $this->Session->read('Setting.url').'/categories/display/'.$sectionId.'/'.$catId.'/'.($currentPage+1);?>" class="next"></a></li>
        <?php }?>
    </ul>
    <?php }?>
</div>
