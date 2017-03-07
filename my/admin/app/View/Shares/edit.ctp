<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_categories"> 
        <?php echo $this->Form->create('Share'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit Shares
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Shares Basic Information</h4>
            <img src="<?php echo h($apiUrl . $this->request->data['Item']['image_square']); ?>" alt="No Image"/>
            <?php
            echo $this->Form->input('id');

            echo '<label for="ItemItemTitle">Title</label>';
            echo $this->Form->input('item_title', array('label' => false, 'value' => $this->data['Item']['title']));
            echo $this->Form->input('category_id', array(
                'options' => $catArray,
                    //'empty' => '(choose one)'
            ));
            echo $this->Form->input('album_id', array(
                'options' => $albumArray,
                    //'empty' => '(choose one)'
            ));

            echo '<label for="ItemItemPrice">Price</label>';
            echo $this->Form->input('item_price', array('label' => false, 'value' => $this->data['Item']['price']));
            echo $this->Form->input('item_id', array('type' => 'hidden', 'value' => $this->data['Item']['id']));
            echo '<label for="IsMixup">Is Mixup</label>';
                            echo $this->Form->input('ismixup', array('div' => true,
                                'label' => true,
                                'type' => 'radio',
                                'legend' => false,
                                'options' => array(1 => 'Yes', 0 => 'No'),
                            ));
            echo '<label for="IsNew">Is New</label>';
                            echo $this->Form->input('isnew', array('div' => true,
                                'label' => true,
                                'type' => 'radio',
                                'legend' => false,
                                'options' => array(1 => 'Yes', 0 => 'No'),
                            ));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Shares">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>