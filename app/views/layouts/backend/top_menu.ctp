<div id="menu">
	<?php if(($this->action != 'login')){?>
    <div id="dropdown-holder">
    <ul id="nav" class="dropdown">
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/users';?>">Users</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/videos';?>">Home Video</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/sections';?>">Sections</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/products';?>">Products</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/orders';?>">Orders</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/members';?>">Members</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/school';?>">Schools</a></li>
        
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/grads';?>">Grades and classes</a></li>
        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/events';?>">Events</a></li>
        
<!--        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/responses';?>">Responses</a></li>-->
        <li class="heading">
        	<a href="<?php echo $this->Session->read('Setting.url').'/contents';?>">Contents</a>
        	<ul>
        		<li><a href="<?php echo $this->Session->read('Setting.url').'/contents/edit/1';?>">About Us</a></li>
        		<li><a href="<?php echo $this->Session->read('Setting.url').'/contents/edit/2';?>">Contact Us</a></li>
                <li><a href="<?php echo $this->Session->read('Setting.url').'/contents/edit/3';?>">Terms &amp; Conditions</a></li>
        	</ul>
        </li
    </ul>
    </div>
	<?php }?>
</div>