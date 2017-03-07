<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($settings as $setting):

    $socialApi = unserialize($setting['Setting']['set_value']);

endforeach;
?>


<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories"> 
        <?php
        echo $this->Form->create('Setting');
        ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit API
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>API Information</h4>


            <?php
            echo '<label for="SettingsSiteName">Site Name</label>';
            echo $this->Form->input('name', array('value' => $socialApi[$name]['name'], 'label' => false));
            echo '<label for="SettingsAppkey">APPKEY</label>';
            echo $this->Form->input('appkey', array('value' => $socialApi[$name]['appkey'], 'label' => false));
            echo '<label for="SettingsAppsecret">APPSECRET</label>';
            echo $this->Form->input('appsecret', array('value' => $socialApi[$name]['appsecret'], 'label' => false));
            echo '<label for="SettingsCallback">CallBack</label>';
            echo $this->Form->input('callback', array('value' => $socialApi[$name]['callback'], 'label' => false));
            echo '<label for="SettingsUnionid">Relate ID</label>';
            echo $this->Form->input('unionid', array('value' => $socialApi[$name]['unionid'], 'label' => false));
            echo '<label for="SettingsOpen">Open</label>';
            echo $this->Form->input('open', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No'),
                'value' => $socialApi[$name]['open'],
            ));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
    </div>
</div>