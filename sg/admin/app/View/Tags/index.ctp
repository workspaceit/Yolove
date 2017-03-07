<div class="page-header position-relative">
    <h1>Hashtags</h1>
</div>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_hashtag">
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('tag_name'); ?></th>
                    <!--<th><?php // echo $this->Paginator->sort('share_id'); ?></th>-->
                    <th><?php echo $this->Paginator->sort('is_show'); ?></th>
                    <th><?php echo $this->Paginator->sort('create_time'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
	<?php foreach ($tags as $tag): ?>
                <tr>
                    <td><a href="<?php echo h($siteUrl.'/hashtag/'.$tag['Tag']['tag_name']);?>" target="_blank"><?php echo h($tag['Tag']['id']); ?>&nbsp;</a></td>
                    <td><a href="<?php echo h($siteUrl.'/hashtag/'.$tag['Tag']['tag_name']);?>" target="_blank"><?php echo h($tag['Tag']['tag_name']); ?>&nbsp;</a></td>
                    <!--<td><?php // echo h($tag['Tag']['share_id']); ?>&nbsp;</td>-->
                    <td><?php
                        if($tag['Tag']['is_show']==1)
                            echo h('Yes');
                        else
                            echo h('No');
                    ?>&nbsp;</td>
                    <td><?php echo h(date("d/m/Y", $tag['Tag']['create_time'])); ?>&nbsp;</td>
                    <td class="actions">						
                        <div class="hidden-phone visible-desktop action-buttons">                                                                                                                                      
                                <?php
                                echo $this->Html->link('<i class="icon-pencil bigger-130"></i>', array('action' => 'edit', $tag['Tag']['id']), array('class' => 'blue tooltip-default', 'data-original-title' => 'Edit', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                                <?php
                                echo $this->Html->link('<i class="icon-trash bigger-130"></i>', array('action' => 'delete', $tag['Tag']['id']), array('confirm' => 'Are you sure you wish to delete this hashtag?', 'class' => 'red tooltip-error', 'data-original-title' => 'Delete', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                        </div>
                    </td>
                </tr>
<?php endforeach; ?>
            </tbody>
        </table>
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
    </div>
</div>

<input type="hidden" id="limits" value="<?php echo $limits; ?>" />

<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(function() {
        $('.data-table').dataTable({
            "bSort": false,
        });

        $('#admin_hashtag').on('click', '.changeVerification', function(e) {
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
            window.location = "<?php echo $this->webroot; ?>Tags/index/" + limits;
        });
    });
</script>

