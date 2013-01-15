<!--DRAG DROP SCRIPTS AND CSS-->
<?php
echo $this->Html->css('dragdrop/lists', null, array('inline' => false));
echo $this->Javascript->link('dragdrop/core', false);
echo $this->Javascript->link('dragdrop/events', false);
echo $this->Javascript->link('dragdrop/css', false);
echo $this->Javascript->link('dragdrop/coordinates', false);
echo $this->Javascript->link('dragdrop/drag', false);
echo $this->Javascript->link('dragdrop/dragsort', false);
echo $this->Javascript->link('dragdrop/cookies', false);
echo $this->Javascript->link('dragdrop/main', false);
?>
<!--END DRAG DROP SCRIPTS AND CSS-->
<style>
    th, th a {padding: 2px;}
</style>
<div class="products index">
    <h2><?php echo "Products"; ?></h2>
    <fieldset style="width: 300px;">
        <legend><?php __('Filter Products'); ?></legend>
        <div>
            <?php
            echo $this->Form->create('Product', array('action' => 'filter'));
            echo $this->Form->input('section_id', array('empty' => 'All'));              
            echo $this->Form->input('home');
			echo $this->Form->input('hot');
            echo $this->Form->end(__('Filter', true));
            ?>
        </div>
    </fieldset>

    <?php echo $this->Form->create('Product', array('url' => substr($this->params['url']['url'], 9))); ?>
    <table  cellpadding="0" cellspacing="0" style="margin-bottom:0px; width:870px;">
        <tr>
            <th style="width: 30px;"><?php echo $this->Paginator->sort('id'); ?></th>
            <th style="width: 240px;"><?php echo $this->Paginator->sort('title'); ?></th>            
            <th style="width: 100px;"><?php echo $this->Paginator->sort('price'); ?></th>
            <th style="width: 100px;"><?php echo $this->Paginator->sort('hot'); ?></th>            
            <th style="width: 100px;"><?php echo $this->Paginator->sort('home'); ?></th>
            <th style="width: 100px;"><?php echo $this->Paginator->sort('section_id'); ?></th>
            <th style="width: 200px;"><?php __('Actions'); ?></th>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" style="width: 870px;">
        <tr>
            <td style="border-bottom:none; padding:0px;" >
                <ul id="phonetic1" class="boxy">
                    <?php
                    $i = 0;
                    foreach ($products as $product){
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <li style="width:870px;">
                            <input type="hidden" name="data[Product][ids][]" value="<?php echo $product['Product']['id']; ?>">
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:0px; width:870px;">
                                <tr<?php echo $class; ?>>
                                    <td style="width: 30px;"><?php echo $product['Product']['id']; ?>&nbsp;</td>
                                    <td style="width: 240px;"><?php echo $product['Product']['title']; ?>&nbsp;</td>
                                    <td style="width: 100px;"><?php echo $product['Product']['price']; ?>&nbsp;</td>
                                    <td style="width: 100px;"><?php echo $product['Product']['hot'];?> </td>
                                    <td style="width: 100px;"><?php echo $product['Product']['home'];?></td>
                                    <td style="width: 100px;">
                                        <?php echo $this->Html->link($product['Section']['title'], array('controller' => 'sections', 'action' => 'view', $product['Section']['id'])); ?>
                                    </td> 
                                    <td class="actions" style="width: 200px;">
                                        <span onclick="$('.<?php echo 'child_'.$product['Product']['id']?>').slideToggle(200);" title="Collapse Childs">+</span>
                                        <?php echo $this->Html->link(__('A', true), array('action' => 'add', $product['Product']['id']), array('title' => 'Add Child')); ?>
                                    	<?php echo $this->Html->link(__('H', true), array('action' => 'setHot', $product['Product']['id']), array('title' => 'Set Hot')); ?>
                                        <?php echo $this->Html->link(__('V', true), array('action' => 'view', $product['Product']['id']), array('title' => 'View')); ?>
                                        <?php echo $this->Html->link(__('E', true), array('action' => 'edit', $product['Product']['id']), array('title' => 'Edit')); ?>
                                        <?php echo $this->Html->link(__('D', true), array('action' => 'delete', $product['Product']['id']), array('title' => 'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
                                    </td>
                                </tr>
                            </table>
                            <?php foreach($product['Child'] as $child){?>
                                <table class="<?php echo 'child_'.$product['Product']['id']?>" cellpadding="0" cellspacing="0" style="width: 850px; margin-bottom:0px; float: right; display: none;">
                                    <tr<?php echo $class; ?>>
                                        <td style="width: 30px;"><?php echo $child['id']; ?>&nbsp;</td>
                                        <td style="width: 220px;"><?php echo $child['title']; ?>&nbsp;</td>
                                        <td style="width: 100px;"><?php echo $child['price']; ?>&nbsp;</td>
                                        <td style="width: 100px;"><?php echo $child['hot'];?> </td>
                                        <td style="width: 100px;"><?php echo $child['home'];?></td>
                                        <td style="width: 100px;">
                                            <?php echo $this->Html->link($product['Section']['title'], array('controller' => 'sections', 'action' => 'view', $product['Section']['id'])); ?>
                                        </td>
                                        <td class="actions" style="width: 200px;">
                                            <?php echo $this->Html->link(__('V', true), array('action' => 'view', $child['id']), array('title' => 'View')); ?>
                                            <?php echo $this->Html->link(__('E', true), array('action' => 'edit', $child['id']), array('title' => 'Edit')); ?>
                                            <?php echo $this->Html->link(__('D', true), array('action' => 'delete', $child['id']), array('title' => 'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $child['id'])); ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php }?>
                        </li>
                    <?php } ?>
                </ul>	
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(__($this->Session->check('conditions.home') ? 'Save home positions' : 'Save positions', true)); ?>
    <p>
        <?php
        echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));
        ?>
    </p>
    <div class="paging">
        <?php echo $this->Paginator->first('<< ' . __('first', true), array(), null, array('class' => 'disabled')); ?> 
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?> | 
        <?php echo $this->Paginator->numbers(); ?> | 
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->last(__('last', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
    <div class="limit" style="margin-top: 15px;">
        <?php
        //make url like products/index/page:1/sort:title/direction:asc/limit:80
        //pr($this->params['named']);
        $url = $this->params['url']['url'];
        if (isset($this->params['named']['limit']))
            $url = str_replace("/limit:" . $this->params['named']['limit'], "", $url);
        if ($url == 'products' || $url == 'products/')
            $url = $url . '/index';
        ?>
        Select Records Per Page: &lt;
        <?php echo $this->Html->link(20, array('controller' => $url . '/limit:20')); ?> | 
        <?php echo $this->Html->link(50, array('controller' => $url . '/limit:50')); ?> | 
        <?php echo $this->Html->link(100, array('controller' => $url . '/limit:100')); ?> |
        <?php echo $this->Html->link(200, array('controller' => $url . '/limit:200')); ?>
        &gt;
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Issues', true), array('controller' => 'issues', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Issue', true), array('controller' => 'issues', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Logs', true), array('controller' => 'logs', 'action' => 'index')); ?> </li>
    </ul>
</div>
