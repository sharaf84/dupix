<?php 
if (!empty($products)) { 
    $section = $products[0]['Section']['title'];
    $color = '#'.$products[0]['Section']['color'];
?>
<style>
    .img-border {
        border: solid 10px <?php echo $color;?>;
    }
</style>
<div id="contain">
    <div id="container">
        
        <div class="product-menu"><a href="<?php echo $this->Session->read('Setting.url'); ?>">Home</a> &gt; <a href="<?php echo $this->Session->read('Setting.url') . '/categories'; ?>">Products</a> &gt; <a href="#"><?php echo $section;?></a></div>
        
        <div class="product-large">
            <a href="<?php echo $this->Session->read('Setting.url') . '/categories/product/' . $products[0]['Product']['id']; ?>">
                <div class="pro-large-price">
                    <div class="price-value"><?php echo $products[0]['Product']['price'];?> LE</div>
                    <div class="price-tit"><?php echo $products[0]['Product']['title'];?></div>
                </div>
                <img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/' . $products[0]['Product']['top_image']; ?>" class="img-border" width="712" height="230" border="0" />
            </a>
        </div>
        <?php 
        array_shift($products);
        if(!empty($products)){
        ?>
        <div class="product-medium">
            <a href="<?php echo $this->Session->read('Setting.url') . '/categories/product/' . $products[0]['Product']['id']; ?>">
                <div class="product-medium-desc"><?php echo $products[0]['Product']['title'];?> <?php echo $products[0]['Product']['price'];?> LE</div>
                <img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/' . $products[0]['Product']['middle_image']; ?>" class="img-border" width="402" height="230" border="0" />
            </a>
        </div>
        <?php array_shift($products);}?>
        
        <div class="product-view-ad">
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>pro-ad.jpg" width="300" height="250" border="0" /></a>
        </div>
        
        <?php foreach($products as $product){?>
        <div class="product-small img-border">
            <div class="product-small-photo"><img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/' . $product['Product']['bottom_image']; ?>" width="220" height="137" border="0" /></div>
            <div class="product-small-dtails">
                <div class="product-small-tit"><?php echo $product['Product']['title'];?></div>
                <div class="product-small-price">
                    <div class="small-price-left">From <?php echo $product['Product']['price'];?> LE</div>
                    <div class="small-price-right"><a href="product-details.php">> More</a></div>
                </div>
            </div>
        </div>
        <?php }?>
        
    </div>
</div>
<?php }else echo '<div class="no_data">No dat found!</div>'; ?>