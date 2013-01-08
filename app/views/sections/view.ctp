<div class="sections view">
    <h2><?php __('Section'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Image'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php
            echo $this->element('backend/image_view', array(
                'data'   => array(
                    'image'   => $section['Section']['image'],
                    'caption' => $section['Section']['title'],
                    'size'    => '' 
                )
            ));
            ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Photo Print'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['photo_print']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Meta Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['meta_title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Meta Keywords'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['meta_keywords']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Meta Description'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['meta_description']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Position'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $section['Section']['position']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Section', true), array('action' => 'edit', $section['Section']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Section', true), array('action' => 'delete', $section['Section']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $section['Section']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Sections', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Section', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php __('Related Products'); ?></h3>
<?php if (!empty($section['Product'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php __('Id'); ?></th>
                <th><?php __('Title'); ?></th>
                <th><?php __('Body'); ?></th>
                <th><?php __('Price'); ?></th>
                <th><?php __('Hits'); ?></th>
                <th><?php __('Min Images'); ?></th>
                <th><?php __('Max Images'); ?></th>
                <th><?php __('Crop Width'); ?></th>
                <th><?php __('Crop Height'); ?></th>
                <th><?php __('Home'); ?></th>
                <th><?php __('Hot'); ?></th>
                <th><?php __('Meta Title'); ?></th>
                <th><?php __('Meta Keywords'); ?></th>
                <th><?php __('Meta Description'); ?></th>
                <th><?php __('Position'); ?></th>
                <th><?php __('Home Position'); ?></th>
                <th><?php __('Section Id'); ?></th>
                <th class="actions"><?php __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($section['Product'] as $product):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['title']; ?></td>
                    <td><?php echo $product['body']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['hits']; ?></td>
                    <td><?php echo $product['min_images']; ?></td>
                    <td><?php echo $product['max_images']; ?></td>
                    <td><?php echo $product['crop_width']; ?></td>
                    <td><?php echo $product['crop_height']; ?></td>
                    <td><?php echo $product['home']; ?></td>
                    <td><?php echo $product['hot']; ?></td>
                    <td><?php echo $product['meta_title']; ?></td>
                    <td><?php echo $product['meta_keywords']; ?></td>
                    <td><?php echo $product['meta_description']; ?></td>
                    <td><?php echo $product['position']; ?></td>
                    <td><?php echo $product['home_position']; ?></td>
                    <td><?php echo $product['section_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
        <?php echo $this->Html->link(__('Delete', true), array('controller' => 'products', 'action' => 'delete', $product['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['id'])); ?>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
