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
<div class="members index">
	<h2><?php __('Branches of School <a href="/school/view/'.$parentId.'">' .$parentTitle . '</a>'); ?></h2>
        <table  cellpadding="0" cellspacing="0" style="margin-bottom:0px; width:870px;">
            <tr>
                <th style="width: 30px;"><?php echo $this->Paginator->sort('id'); ?></th>
                <th style="width: 240px;"><?php echo $this->Paginator->sort('name'); ?></th>
                <th style="width: 200px;"><?php __('Actions'); ?></th>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 870px;">
        <tr>
            <td style="border-bottom:none; padding:0px;" >
                <ul id="phonetic1" class="boxy">
                    <?php
                    $i = 0;
                    foreach ($members as $member){
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <li style="width:870px;">
                            <input type="hidden" name="data[Member][ids][]" value="<?php echo $member['Member']['id']; ?>">
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:0px; width:870px;">
                                <tr<?php echo $class; ?>>
                                    <td style="width: 30px;"><?php echo $member['Member']['id']; ?>&nbsp;</td>
                                    <td style="width: 240px;"><?php echo $member['Member']['name']; ?>&nbsp;</td>
                
                                    <td class="actions" style="width: 200px;">
                                        <?php echo $this->Html->link(__('Add Grades', true), array('action' => 'addgrade', $member['Member']['id']), array('title' => 'View')); ?>
                                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $member['Member']['id']), array('title' => 'View')); ?>
                                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $member['Member']['id']), array('title' => 'Edit')); ?>
                                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $member['Member']['id']), array('title' => 'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $member['Member']['id'])); ?>
                                    </td>
                                </tr>
                            </table>
                            
                        </li>
                    <?php } ?>
                </ul>	
            </td>
        </tr>
    </table>
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

</div>