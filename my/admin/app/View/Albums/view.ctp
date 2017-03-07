<div class="albums view">
    <h2><?php echo __('Album'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($album['Album']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Category Id'); ?></dt>
        <dd>
            <?php echo h($album['Album']['category_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Album Title'); ?></dt>
        <dd>
            <?php echo h($album['Album']['album_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $album['Album']['create_time'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Update Time'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $album['Album']['update_time'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Id'); ?></dt>
        <dd>
            <?php echo h($album['Album']['user_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Share'); ?></dt>
        <dd>
            <?php echo h($album['Album']['total_share']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Like'); ?></dt>
        <dd>
            <?php echo h($album['Album']['total_like']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Album'), array('action' => 'edit', $album['Album']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Album'), array('action' => 'delete', $album['Album']['id']), array(), __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?> </li>
    </ul>
</div>
