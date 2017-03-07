<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($settings as $setting):

    $socialApi = unserialize($setting['Setting']['set_value']);

endforeach;
?>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_categories">   
        <?php
        echo $this->Form->create('Setting');
        ?>

        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Email Setting
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>


            <?php
            echo $this->Form->input('protocol', array(
                'options' => $protocols,
                //'empty' => '(choose one)'
                'value' => $socialApi['protocol']
            ));
            echo $this->Form->input('from', array('value' => $socialApi['from']));
            echo $this->Form->input('sender', array('value' => $socialApi['sender']));
            echo $this->Form->input('smtp_host', array('value' => $socialApi['smtp_host']));
            echo $this->Form->input('smtp_user', array('value' => $socialApi['smtp_user']));
            echo $this->Form->input('smtp_pass', array('value' => $socialApi['smtp_pass']));
            echo $this->Form->input('smtp_port', array('value' => $socialApi['smtp_port']));
//echo '<label for="SettingsSiteClosed">site closed</label>';
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
    </div>
</div>
