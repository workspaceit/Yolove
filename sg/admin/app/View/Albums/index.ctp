<div class="page-header position-relative">
    <h1>Albums</h1>
</div>

<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_albums">
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('album_title'); ?></th>
                    <th><?php echo $this->Paginator->sort('create_time'); ?></th>
                    <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('total_share'); ?></th>
                    <th><?php echo $this->Paginator->sort('total_like'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($albums as $album): ?>
                    <tr>
                        <td style="display:none;"></td>
                        <td><a href="<?php echo h($siteUrl.'/collection/'.$album['Album']['id']);?>" target="_Blank"><?php echo h($album['Album']['id']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/category/'.$album['category']['id']);?>" target="_Blank"><?php echo h($album['category']['category_name_cn']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/collection/'.$album['Album']['id']);?>" target="_Blank"><?php echo h($album['Album']['album_title']); ?>&nbsp;</a></td>
                        <td><?php echo h(date("d/m/Y", $album['Album']['create_time'])); ?>&nbsp;</td>
                        <td><?php echo h($album['Album']['user_id']); ?>&nbsp;</td>
                        <td><?php echo h($album['Album']['total_share']); ?>&nbsp;</td>
                        <td><?php echo h($album['Album']['total_like']); ?>&nbsp;</td>
                        <td class="actions">						
                            <div class="hidden-phone visible-desktop action-buttons">                                                                                                                                       
                                <?php
                                echo $this->Html->link('<i class="icon-pencil bigger-130"></i>', array('action' => 'edit', $album['Album']['id']), array('class' => 'blue tooltip-default', 'data-original-title' => 'Edit', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                                <?php
                                echo $this->Html->link('<i class="icon-trash bigger-130"></i>', array('action' => 'delete', $album['Album']['id']), array('confirm' => 'Are you sure you wish to delete this album?', 'class' => 'red tooltip-error', 'data-original-title' => 'Delete', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                ?>
                            </div>

                            <div class="hidden-desktop visible-phone">
                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="icon-zoom-in bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="icon-edit bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="icon-trash bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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

        $('#admin_albums').on('click', '.changeVerification', function(e) {
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
            window.location = "<?php echo $this->webroot; ?>Albums/index/" + limits;
        });
    });
</script>
