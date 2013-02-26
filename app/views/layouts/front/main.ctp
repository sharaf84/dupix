<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php
            if ($this->name != 'Home')
                echo $title_for_layout . ': ';
            echo $this->Session->read('Setting.title');
            ?>
        </title>
        <?php
        //META
        echo $this->Html->meta('icon', $this->Session->read('Setting.url') . '/img/front/favicon.ico');
        if (isset($metaKeywords))
            echo $this->Html->meta('keywords', $metaKeywords);
        echo $this->Html->meta('keywords', $this->Session->read('Setting.meta_keywords'));
        if (isset($metaDescription))
            echo $this->Html->meta('description', $metaDescription);
        echo $this->Html->meta('description', $this->Session->read('Setting.meta_description'));
        //CSS
        echo $this->Html->css(array(
            'front/style',
            'front/style1',
            'front/skin',
            'colorbox/colorbox_ex3'
        ));
        //SCRIPTS
        echo $this->Html->scriptBlock("var siteUrl ='" . $this->Session->read('Setting.url') . "';"); //Define global var siteUrl
        echo $this->Javascript->link(array('front/jquery'));
        ?>
    </head>
    <body>
        <?php
        echo $this->Session->flash();
        include_once('header.ctp');
        echo $content_for_layout;
        include_once('footer.ctp');
        ?>
        <?php echo '<div style="float:left; width:1000px;">' . $this->element('sql_dump') . '</div>'; ?>
        <?php
        //SCRIPTS
        echo $this->Javascript->link(array(
            'colorbox/jquery.colorbox',
            'colorbox/jquery.colorbox.custum',
            'front/animatedcollapse',
        ));
        echo $scripts_for_layout;
        echo $this->Javascript->link(array('front/all'));
        ?>
    </body>
</html>