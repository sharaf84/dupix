<?php 
Router::connect('/', array('controller' => 'home', 'action' => 'index'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>
