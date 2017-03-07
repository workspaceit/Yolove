<div class="smiles view">
    <h2><?php echo __('Smile'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($smile['Smile']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Typeid'); ?></dt>
        <dd>
            <?php echo h($smile['Smile']['typeid']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Displayorder'); ?></dt>
        <dd>
            <?php echo h($smile['Smile']['displayorder']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Code'); ?></dt>
        <dd>
            <?php echo h($smile['Smile']['code']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Url'); ?></dt>
        <dd>
            <?php echo h($smile['Smile']['url']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Smile'), array('action' => 'edit', $smile['Smile']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Smile'), array('action' => 'delete', $smile['Smile']['id']), array(), __('Are you sure you want to delete # %s?', $smile['Smile']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Smiles'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Smile'), array('action' => 'add')); ?> </li>
    </ul>
</div>
