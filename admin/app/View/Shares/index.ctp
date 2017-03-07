<div class="page-header position-relative">
    <h1>Share Manage</h1>
</div>

<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_shares">

        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th style="color: #08c"><?php echo "Id"; ?></th>
                    <th style="color: #08c"><?php echo "Image"; ?></th>
                    <th style="color: #08c"><?php echo "Title"; ?></th>
                    <th style="color: #08c"><?php echo "Author"; ?></th>
                    <th style="color: #08c"><?php echo "Category"; ?></th>
                    <th style="color: #08c"><?php echo "Type"; ?></th>
                    <th style="color: #08c"><?php echo "Collection"; ?></th>
                    <th style="color: #08c"><?php echo "Item Price"; ?></th>
                    <th style="color: #08c"><?php echo "IsMixup"; ?></th>
                    <th style="color: #08c"><?php echo "IsNew"; ?></th>

                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shares as $share): ?>
                    <tr>
                        <td><a href="<?php echo h($siteUrl.'/item/'.$share['Share']['id']).'/'.$share['Item']['title'];?>" target="_blank"><?php echo h($share['Share']['id']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/item/'.$share['Share']['id']).'/'.$share['Item']['title'];?>" target="_blank"><img width='32' src="<?php echo h($apiUrl . $share['Item']['image_square']); ?>" alt="No Image
                                 "/>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/item/'.$share['Share']['id']).'/'.$share['Item']['title'];?>" target="_blank"><?php echo h($share['Item']['title']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/profile/uid/'.$share['Share']['user_id'].'/uname/'.$share['Share']['user_nickname']);?>" target="_blank"><?php echo h($share['Share']['user_nickname']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo h($siteUrl.'/category/'.$share['Category']['id']);?>" target="_blank"><?php echo h($share['Category']['category_name_cn']); ?>&nbsp;</a></td>
                        <td><?php echo h($share['Item']['item_type']); ?>&nbsp;</td>
                        <td><a href="<?php echo h($siteUrl.'/collection/'.$share['Album']['id']);?>" target="_blank"><?php echo h($share['Album']['album_title']); ?>&nbsp;</a></td>
                        <td>$<?php echo h($share['Item']['price']); ?>&nbsp;</td>
                        <td><?php
                                                if($share['Share']['ismixup']==1)
                                                    echo h('Yes');
                                                else
                                                    echo h('No');
                                            ?>&nbsp;</td>
                        <td><?php
                                                if($share['Share']['isnew']==1)
                                                    echo h('Yes');
                                                else
                                                    echo h('No');
                                            ?>&nbsp;</td>
                        <td class="actions">						
                            <div class="hidden-phone visible-desktop action-buttons">                                               
                                <!--<a href="http://workspaceit.com/yolove_web/editProduct/<?php // echo $share['Share']['id']; ?>" class="blue tooltip-default" data-original-title="Edit" data-rel="tooltip"><i class="icon-pencil bigger-130"></i></a>-->
                                <?php
                                echo $this->Html->link('<i class="icon-pencil bigger-130"></i>', array('action' => 'edit', $share['Share']['id']), array('class' => 'blue tooltip-default', 'data-original-title' => 'Edit', 'data-rel' => 'tooltip', 'escape' => FALSE));
                                echo $this->Html->link('<i class="icon-trash bigger-130"></i>', array('action' => 'delete', $share['Share']['id']), array('confirm' => 'Are you sure you wish to delete this share?', 'class' => 'red tooltip-error', 'data-original-title' => 'Delete', 'data-rel' => 'tooltip', 'escape' => FALSE));
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
            "bSort": false,
        });

        $('#admin_shares').on('click', '.changeVerification', function(e) {
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
            window.location = "<?php echo $this->webroot; ?>Shares/index/" + limits;
        });
    });
</script>
