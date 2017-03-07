<div class="page-header position-relative">
    <h1>Smiles</h1>
</div>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_smiles">

        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('displayorder'); ?></th>
                    <th><?php echo 'picture'; ?></th>
                    <th><?php echo $this->Paginator->sort('code', 'smile code'); ?></th>
                    <th><?php echo $this->Paginator->sort('url', 'Filename'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smiles as $smile): ?>
                    <tr>
                        <td style="display:none;"></td>
                        <td><?php echo h($smile['Smile']['id']); ?>&nbsp;</td>
                        <td><?php echo h($smile['Smile']['displayorder']); ?>&nbsp;</td>
                        <td><img src="<?php echo $this->webroot; ?>app/webroot/assets/smiley/<?php echo $smile['Smile']['url']; ?>"  alt="no image found"/>&nbsp;</td>
                        <td><?php echo h($smile['Smile']['code']); ?>&nbsp;</td>
                        <td><?php echo h($smile['Smile']['url']); ?>&nbsp;</td>

                        <td class="actions">						
                            <div class="hidden-phone visible-desktop action-buttons">                                               
                                <?php
//                                echo $this->Html->link('<i class="icon-pencil bigger-130"></i>', array('action' => 'edit', $smile['Smile']['id']), array('class' => 'blue tooltip-default', 'data-original-title' => 'Edit', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                                <?php
                                echo $this->Html->link('<i class="icon-trash bigger-130"></i>', array('action' => 'delete', $smile['Smile']['id']), array('confirm' => 'Are you sure you wish to delete this smile?', 'class' => 'red tooltip-error', 'data-original-title' => 'Delete', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="row-fluid">
    <!--PAGE CONTENT ENDS-->
    <div class="span6">
        <div id="sample-table-2_info" class="dataTables_info"><?php
            echo $this->Paginator->counter(array(
                'format' => __('showing {:current} records out of {:count} total, starting on record {:start}')
            ));
            ?>	</div>
    </div>
    <div class="span6">
        <div class="dataTables_paginate paging_bootstrap pagination">
            <ul>
                <?php
                echo ' <li class="prev disabled">';
                echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo ' </li>';
                echo '<li class="active">';
                echo $this->Paginator->numbers(array('separator' => ''));
                echo "</li>";
                echo '<li class="next">';
                echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'next disabled'));
                echo '</li>';
                ?> 
            </ul>
        </div>
    </div>
</div>
<input type="hidden" id="limits" value="<?php echo $limits; ?>" />

<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(function() {
        $('.data-table').dataTable({
//            "aoColumnDefs": [
//                {
//                    
//                    'aTargets': [1, 2, 3, 4],
//                    'bSortable': false,
//                    "bSearchable": true,
//                }
//            ],
            "bSort": false
        });

        $('#admin_smiles').on('click', '.changeVerification', function(e) {
            e.preventDefault();
            var $this = $(this);

            $.ajax({
                url: $(this).attr('href'),
                type: 'post',
                success: function(d) {
                    var spanClass = $this.find('span');
                    if (spanClass.hasClass('label-success')) {
                        spanClass.removeClass('label-success arrowed-in arrowed-in-right');
                        spanClass.addClass('label-warning');
                        spanClass.text('Inactive');
                    } else {
                        spanClass.addClass('label-success arrowed-in arrowed-in-right');
                        spanClass.removeClass('label-warning');
                        spanClass.text('Active');
                    }
                }
            });
        });


    });
    $(document).ready(function() {
        $('#sample-table-2_length select').val($("#limits").val());
        $('#sample-table-2_length select').trigger("change");
        $(".row-fluid").eq(2).css('display', 'none');
        $('#sample-table-2_length select').change(function() {
            var limits = $('#sample-table-2_length').find('select').val();
            window.location = "<?php echo $this->webroot; ?>Smiles/index/" + limits;
        });
    });
</script>

