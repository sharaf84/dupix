<!--DRAG DROP SCRIPTS AND CSS-->
<?php 
echo $this->Html->css('dragdrop/lists', null, array('inline' => false));   
echo $this->Javascript->link('dragdrop/core', 	false); 
echo $this->Javascript->link('dragdrop/events', false);
echo $this->Javascript->link('dragdrop/css', false);
echo $this->Javascript->link('dragdrop/coordinates', false);
echo $this->Javascript->link('dragdrop/drag', false);
echo $this->Javascript->link('dragdrop/dragsort', false);
echo $this->Javascript->link('dragdrop/cookies', false);
echo $this->Javascript->link('dragdrop/main', false);
?>
<!--END DRAG DROP SCRIPTS AND CSS-->

<div class="sections index">
	<h2><?php __('Sections');?></h2>
	<?php echo $this->Form->create('Section');?>
	<table  width="850px" cellpadding="0" cellspacing="0" style="margin-bottom:0px;">
	<tr>
		<th width="4%" style="padding:0px;"><?php echo $this->Paginator->sort('id');?></th>
		<th width="40%" style="padding:0px;"><?php echo $this->Paginator->sort('title');?></th>
		<th width="40%" style="padding:0px;"><?php echo $this->Paginator->sort('position');?></th>
		<th style="padding:0px;"><?php __('Actions');?></th>
	</tr>
	</table>
	<table width="850px" cellpadding="0" cellspacing="0">
    	<tr>
    		<td style="border-bottom:none; padding:0px;" >
       			<ul id="phonetic1" class="boxy">
					<?php
                    $i = 0;
                    foreach ($sections as $section):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <li style="width:870px;">
                    	<input type="hidden" name="data[Section][ids][]" value="<?php echo $section['Section']['id'];?>">
                        <table cellpadding="0" cellspacing="0"  style="margin-bottom:0px;">
                            <tr<?php echo $class;?>>
                                <td width="5%" style="padding:6px 0"><?php echo $section['Section']['id']; ?>&nbsp;</td>
                                <td width="40%" style="padding:6px 0 "><?php echo $section['Section']['title'];?>&nbsp;</td>
                                <td width="40%" style="padding:6px 0"><?php echo $section['Section']['position']; ?>&nbsp;</td>
                                <td class="actions" style="padding:6px 0;">
                                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $section['Section']['id'])); ?>
                                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $section['Section']['id'])); ?>
                                	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $section['Section']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $section['Section']['id'])); ?>
                                </td>
                            </tr>
                        </table>
                    </li>    
					<?php endforeach; ?>
	    		</ul>	
    		</td>
    	</tr>
	</table>
    <?php echo $this->Form->end(__('Save positions', true));?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Section', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cats', true), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat', true), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>