<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



//this was for test
?>



<table>
    <thead>
    <th>ID</th>
    <th>Payment Transaction Id</th>
    <th>Email</th>
    <th>Nickname</th>
    <th>Product Title</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Size</th>
    <th>Shipping Cost</th>
    <th>Shipping Address</th>
    <th>Status</th>
    <th>Created At</th>
</thead>
<tbody>
<?php
foreach ($products as $key => $product):
    ?>
        <tr>
            <td><?php echo $product['ShippingProduct']['id'] ?></td>
            <td><?php echo $sh ?></td>
            <td></td>
            <td></td>
            <td><?php echo $items[$key]['item']['title'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<?php endforeach;
?>
</tbody>
</table>

