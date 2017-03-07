<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Passwd'); ?></dt>
        <dd>
            <?php echo h($user['User']['passwd']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nickname'); ?></dt>
        <dd>
            <?php echo h($user['User']['nickname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Gender'); ?></dt>
        <dd>
            <?php echo h($user['User']['gender']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Province'); ?></dt>
        <dd>
            <?php echo h($user['User']['province']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('City'); ?></dt>
        <dd>
            <?php echo h($user['User']['city']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $user['User']['create_time'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Follow'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_follow']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Follower'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_follower']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Share'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_share']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Album'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_album']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Like'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_like']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Favorite Share'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_favorite_share']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Favorite Album'); ?></dt>
        <dd>
            <?php echo h($user['User']['total_favorite_album']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Is Social'); ?></dt>
        <dd>
            <?php echo h($user['User']['is_social']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
    </ul>
</div>
