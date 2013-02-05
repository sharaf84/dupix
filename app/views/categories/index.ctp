<script type="text/javascript">
    $(document).ready(function(){
        //Section view controll
        $('.product-prev').insertAfter('.proSection:eq(1)');
        $('.product-ad').insertAfter('.proSection:eq(1)');
        if($('.proSection').length > 8){
            $(('.proSection:gt(7)')).hide();
            $('.product-more').show();
        }
        $('.product-more').click(function(){
            $('.proSection:gt(1):lt(8)').hide();
            $('.proSection:gt(7)').show();
            $('.product-more').hide();
            $('.product-prev').show();
        });
        $('.product-prev').click(function(){
            $('.proSection:gt(1):lt(8)').show();
            $('.proSection:gt(7)').hide();
            $('.product-more').show();
            $('.product-prev').hide();
        });
    });
</script>
<div id="contain">
    <div id="container">
        <?php 
        foreach ($sections as $section) {
        ?>
        <a class="proSection" href="<?php echo $this->Session->read('Setting.url') . '/categories/products/' . $section['Section']['id']; ?>">
            <div class="product-item" style="background-color: <?php echo '#'.$section['Section']['color'];?>;">
                <div class="product-item-tit"><?php echo $section['Section']['title']; ?></div>
                <div class="product-item-photo" style="background-image: <?php echo 'url('.$this->Session->read('Setting.url') .'/img/upload/'.$section['Section']['image'].')';?>;"></div>
                <div class="product-item-price">100 LE</div>
            </div>
        </a>
        <?php }?>        
        <div class="product-ad"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>pro-ad.jpg" width="300" height="250" border="0" /></a></div>
        <div class="product-prev" style="display: none;"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>prev.png" border="0" /></div>
        <div class="product-more" style="display: none;"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>more.png" width="43" height="62" border="0" /></div>
    </div>
</div>
