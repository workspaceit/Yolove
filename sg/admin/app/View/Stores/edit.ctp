<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('Store'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit Store
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Store Basic Information</h4>

            <?php
             echo $this->Form->input('id');
            echo $this->Form->input('store_name', array('required' => 'required'));
            echo $this->Form->input('domain_name');
            echo $this->Form->input('store_desc');
            echo $this->Form->input('province');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            echo $this->Form->input('zip_code');
            echo $this->Form->input('address');
            echo $this->Form->input('phone');
            echo $this->Form->input('phone2');
            echo $this->Form->input('phone3');
            echo $this->Form->input('shipping_fee', array('min' => 0));
            if($this->request->data['Store']['isregister'])
            {
                 echo '<label for="SettingsSiteVerified">Verified</label>';
                echo $this->Form->input('isverified', array(
                    'div' => true,
                    'label' => true,
                    'type' => 'radio',
                    'legend' => false,
                    'options' => array(1 => 'Yes', 0 => 'No'),
                ));
            }
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Stores">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>