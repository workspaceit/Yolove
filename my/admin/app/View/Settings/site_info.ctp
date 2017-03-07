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
        echo $this->Form->create('Setting',array('enctype'=>'multipart/form-data'));
        ?>

        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Site Info
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>

                </h1>
            </div>


            <?php
            echo $this->Form->input('site_name', array('value' => $socialApi['site_name'], 'required' => 'required'));
            echo $this->Form->input('site_domain', array('value' => $socialApi['site_domain'], 'required' => 'required'));
            echo $this->Form->input('site_email', array('value' => $socialApi['site_email'], 'type' => 'email'));
            echo $this->Form->input('site_banner', array('type' => 'file'));
            echo $this->Form->input('site_analyze_code', array('value' => $socialApi['site_analyze_code'], 'type' => 'textarea'));
            echo '<label for="SettingsSiteClosed">site closed</label>';
            echo $this->Form->input('siteclosed', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No'),
                'value' => $socialApi['siteclosed'],
            ));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
    </div>
</div>
