<div class="shares form">
    <?php echo $this->Form->create('Share'); ?>
    <fieldset>
        <div class="page-header position-relative">
            <h1>
                Add Share
                <small>
                    <i class="icon-double-angle-right"></i>
                </small>
            </h1>
        </div>
        <h4 class="green"><i class="icon-tags green"></i>Add Share Basic Information</h4>



        <?php
        echo $this->Form->input('item_id');
        echo $this->Form->input('poster_id');
        echo $this->Form->input('poster_nickname');
        echo $this->Form->input('original_id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('user_nickname');
        echo $this->Form->input('total_comment');
        echo $this->Form->input('total_click');
        echo $this->Form->input('total_like');
        echo $this->Form->input('total_forwarding');
        echo $this->Form->input('create_time');
        echo $this->Form->input('comments');
        echo $this->Form->input('category_id');
        echo $this->Form->input('album_id');
        echo $this->Form->input('channel');
        echo $this->Form->input('store_id');
        echo $this->Form->input('dtype');
        echo $this->Form->input('lastcomment_time');
        ?>
    </fieldset>
    <button class="btn btn-info" type="submit">
        <i class="icon-ok bigger-110"></i>
        Submit
    </button>


</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Shares'), array('action' => 'index')); ?></li>
    </ul>
</div>
