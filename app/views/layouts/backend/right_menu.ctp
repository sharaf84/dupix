
<div id="slideimg">
<div id="top">
<?php
echo $this->Html->image('backend/slidetop.jpg');
?>
</div>
</div>
<div class="drawers-wrapper">
<ul class="drawerssmall">

<li class="drawer last">
<h2 class="any drawerssmall-handle">Settings</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Edit Settings', true), array('controller' => 'settings/index')); ?><br />
</div>
</li>
</ul>
</li>

<li class="drawer">
<h2 class="any drawerssmall-handle">Groups Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Groups', true), array('controller' => 'groups/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Group', true), array('controller' => 'groups/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Users Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Users', true), array('controller' => 'users/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New User', true), array('controller' => 'users/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Issues Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Issues', true), array('controller' => 'issues/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Issue', true), array('controller' => 'issues/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Sections Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Sections', true), array('controller' => 'sections/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Section', true), array('controller' => 'sections/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Categories Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Categories', true), array('controller' => 'cats/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Category', true), array('controller' => 'cats/add')); ?><br />
</div>
</li>
</ul>
</li>


<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle open">Articles Manager</h2>
<ul style="display: block;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Articles', true), array('controller' => 'articles/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Article', true), array('controller' => 'articles/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Columns Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Columns', true), array('controller' => 'columns/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Column', true), array('controller' => 'columns/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Medias Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Medias', true), array('controller' => 'medias/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Media', true), array('controller' => 'medias/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer last">
<h2 class="any drawerssmall-handle">Events Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Events', true), array('controller' => 'events/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Event', true), array('controller' => 'events/add')); ?><br />
</div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer last">
<h2 class="any drawerssmall-handle">Comments Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>


<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Members Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer last">
<h2 class="any drawerssmall-handle">Newsletter</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Social Network</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer last">
<h2 class="any drawerssmall-handle">Archive Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>

<li style="position: static;" class="drawer">
<h2 class="any drawerssmall-handle">Ads Banners Sys.</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">			<?php
echo $this->Html->image('backend/linkbg.jpg');
?>&nbsp;&nbsp;&nbsp;<a href="#">Add New Article</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Comments Manager</a><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;<a
href="#">Give Your Approval</a></div>
</li>
</ul>
</li>

<li class="drawer">
<h2 class="any drawerssmall-handle">Contents Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Contents', true), array('controller' => 'contents/index')); ?><br />
</div>
</li>
</ul>
</li>

<li class="drawer">
<h2 class="any drawerssmall-handle">Poll Manager</h2>
<ul style="display: none;" class="alldownloads">
<li id="sn-downloadsmacosx">
<div id="slidein">
<?php echo $this->Html->image('backend/linkbg.jpg');?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('View Polls', true), array('controller' => 'polls/index')); ?><br />
<?php echo $this->Html->image('backend/linkbg.jpg'); ?>&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(__('Add New Poll', true), array('controller' => 'polls/add')); ?><br />
</div>
</li>
</ul>
</li>

</ul>
<div class="boxcap"></div>
</div>
<div id="slideimg">
<div id="down">
<?php echo $this->Html->image('backend/slidedown.jpg'); ?>
</div>
</div>

