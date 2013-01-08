<div class="pagination">
    <ul>
        <li><?php echo $this->Paginator->prev('', array(), null, array('class'=>'prev disabled'));?></li>
        <?php echo $this->Paginator->numbers(array('tag'=>'li', 'separator'=>''));?>
        <li><?php echo $this->Paginator->next('', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>