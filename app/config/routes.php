<?php 
Router::connect('/', array('controller' => 'home', 'action' => 'index'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/grads/:action/*', array('controller' => 'friends'));
Router::connect('/grads', array('controller' => 'friends'));
?>
