<div class="shares view">
    <h2><?php echo __('Share'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Item Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['item_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Poster Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['poster_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Poster Nickname'); ?></dt>
        <dd>
            <?php echo h($share['Share']['poster_nickname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Original Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['original_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['user_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Nickname'); ?></dt>
        <dd>
            <?php echo h($share['Share']['user_nickname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Comment'); ?></dt>
        <dd>
            <?php echo h($share['Share']['total_comment']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Click'); ?></dt>
        <dd>
            <?php echo h($share['Share']['total_click']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Like'); ?></dt>
        <dd>
            <?php echo h($share['Share']['total_like']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Forwarding'); ?></dt>
        <dd>
            <?php echo h($share['Share']['total_forwarding']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h($share['Share']['create_time']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Comments'); ?></dt>
        <dd>
            <?php echo h($share['Share']['comments']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Category Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['category_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Album Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['album_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Channel'); ?></dt>
        <dd>
            <?php echo h($share['Share']['channel']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Store Id'); ?></dt>
        <dd>
            <?php echo h($share['Share']['store_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Dtype'); ?></dt>
        <dd>
            <?php echo h($share['Share']['dtype']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Lastcomment Time'); ?></dt>
        <dd>
            <?php echo h($share['Share']['lastcomment_time']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Share'), array('action' => 'edit', $share['Share']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Share'), array('action' => 'delete', $share['Share']['id']), array(), __('Are you sure you want to delete # %s?', $share['Share']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Shares'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Share'), array('action' => 'add')); ?> </li>
    </ul>
</div>
