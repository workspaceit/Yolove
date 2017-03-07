<?php
$socialApi = unserialize($settings[0]['Setting']['set_value']);
?>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories"> 
        <div class="page-header position-relative">
            <h1>API Setting</h1>
        </div>
        
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th style="color: #08C"><?php echo "Key" ?></th>
                    <th style="color: #08C"><?php echo "Site Name" ?></th>
                    <th style="color: #08C"><?php echo "APPKEY" ?></th>
                    <th style="color: #08C"><?php echo "APPSECRET" ?></th>
                    <th style="color: #08C"><?php echo "CallBack" ?></th>
                    <th style="color: #08C"><?php echo "Open" ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (current($socialApi)) {
                    $keys = key($socialApi);
                    ?>
                    <tr>

                        <td><?php echo h($socialApi[$keys]['key']); ?>&nbsp;</td>
                        <td><?php echo h($socialApi[$keys]['name']); ?>&nbsp;</td>
                        <td><?php echo h($socialApi[$keys]['appkey']); ?>&nbsp;</td>
                        <td><?php echo h($socialApi[$keys]['appsecret']); ?>&nbsp;</td>
                        <td><?php echo h($socialApi[$keys]['callback']); ?>&nbsp;</td>

                        <td>
                            <?php
                            if ($socialApi[$keys]['open'] == 0)
                                echo h("No");
                            else
                                echo h("Yes");
                            ?>&nbsp;
                        </td>

                        <td class="actions">
                            <div class="hidden-phone visible-desktop action-buttons">

                                <?php
                                echo $this->Html->link('<i class="icon-pencil bigger-130"></i>', array('action' => 'editapi', $socialApi[$keys]['key']), array('class' => 'blue tooltip-default', 'data-original-title' => 'Edit', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                                <a onclick="return confirm('Are you sure you wish to delete this API?');" class="red tooltip-error" data-rel="tooltip" data-original-title="Delete" href="<?php Router::url('/') ?>Settings/deleteapi/<?php echo $keys; ?>"><i class="icon-trash bigger-130"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    next($socialApi);
                }
                ?>
            </tbody>
        </table>


        <?php
        echo $this->Form->create('Setting');
        ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Add API
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>


            <?php
            echo $this->Form->input('key', array('value' => "", 'required' => 'required'));
            echo '<label for="SettingsSiteName">Site Name</label>';
            echo $this->Form->input('name', array('value' => "", 'label' => false, 'required' => 'required'));
            echo '<label for="SettingsAppkey">APPKEY</label>';
            echo $this->Form->input('appkey', array('value' => "", 'label' => false, 'required' => 'required'));
            echo '<label for="SettingsAppsecret">APPSECRET</label>';
            echo $this->Form->input('appsecret', array('value' => "", 'label' => false, 'required' => 'required'));
            echo '<label for="SettingsCallback">CallBack</label>';
            echo $this->Form->input('callback', array('value' => "", 'label' => false, 'required' => 'required'));
            echo '<label for="SettingsOpen">open</label>';
            echo $this->Form->input('open', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No'),
                'value' => 1,
            ));
            ?>
        </fieldset>

        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
    </div>
</div>