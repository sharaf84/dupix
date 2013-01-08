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
    <table width="850px" cellpadding="0" cellspacing="0" style="margin-bottom:0px;">
        <tr>
            <th width="2%" style="padding:0px;"><?php echo $this->Paginator->sort('id'); ?></th>
            <th width="31%" style="padding:0px;"><?php echo $this->Paginator->sort('title'); ?></th>            
            <th width="8%" style="padding:0px;"><?php echo $this->Paginator->sort('price'); ?></th>
            <th width="5%" style="padding:0px;"><?php echo $this->Paginator->sort('hot'); ?></th>            
            <th width="7%" style="padding:0px;"><?php echo $this->Paginator->sort('home'); ?></th>
            <th width="14%" style="padding:0px;"><?php echo $this->Paginator->sort('section_id'); ?></th>
            <th width="10%" style="padding:0px;"><?php echo $this->Paginator->sort('position'); ?></th>
            <th style="padding:0px;"><?php __('Actions'); ?></th>
        </tr>
    </table>
    <table width="850px" cellpadding="0" cellspacing="0">
        <tr>
            <td style="border-bottom:none; padding:0px;" >
                <ul id="phonetic1" class="boxy">
                    <?php
                    $i = 0;
                    foreach ($products as $product):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <li style="width:870px;">
                            <input type="hidden" name="data[Product][ids][]" value="<?php echo $product['Product']['id']; ?>">
                            <table cellpadding="0" cellspacing="0"  style="margin-bottom:0px;">
                                <tr<?php echo $class; ?>>
                                    <td width="3%" style="padding:6px 0"><?php echo $product['Product']['id']; ?>&nbsp;</td>
                                    <td width="31%" style="padding:6px 0 "><?php echo $product['Product']['title']; ?>&nbsp;</td>
                                  
                                    <td width="8%" style="padding:6px 0"><?php echo $product['Product']['price']; ?>&nbsp;</td>
                                    <td width="5%" style="padding:6px 0"><?php echo $product['Product']['hot'];?> </td>
                                    <td width="7%" style="padding:6px 0"><?php echo $product['Product']['home'];?></td>
                                    <td width="14%" style="padding:6px 0">
                                        <?php echo $this->Html->link($product['Section']['title'], array('controller' => 'sections', 'action' => 'view', $product['Section']['id'])); ?>
                                    </td> 
                                     <td width="10%" style="padding:6px 0"><?php echo $product['Product']['position']; ?>&nbsp;</td>
                                    <td class="actions" style="padding:6px 0;">
                                    	<?php echo $this->Html->link(__('Hot', true), array('action' => 'setHot', $product['Product']['id'])); ?>
                                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $product['Product']['id'])); ?>
                                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?>
                                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
                                    </td>
                                </tr>
                            </table>
                        </li>    
                    <?php endforeach; ?>
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
