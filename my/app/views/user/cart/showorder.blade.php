<div id="orderItem">
            <div style="min-height: 50px; width: 100%;">
                <span style="float:left; text-transform: uppercase; font-weight: bold;">ORDER # {{$orderStatus->unique_token_id}}</span>
                <span style="float:right;text-transform: uppercase; font-weight: bold;">Order Date # {{$orderStatus->created_at}}</span>
            </div>
            <p style="font-weight: bold;" >Got a question? Please contact our friendly Customer Experience team at support@yolove.it We are happy to help.</p>

            <table id="item_table" class="table-bordered table-hovered table-order">
                <th width='20%'>ID</th>
                <th>ITEMS(S)</th>
                <th>PRICE</th>
                <th>CURRENT STATUS</th>
                <th>LAST UPDATED</th>

                @foreach($orderProduct as $key=>$item)
                <tr>
                    <td>{{$orderStatus->unique_token_id}}-@if($key<9) 0{{$key+1}} @else {{$key+1}} @endif</td>
                    <td>{{$item->title}}</td>
                    <td>RM{{$item->price}}</td>
                    <td>
                        
                    <select id="selectOrder" onchange="statusChange({{$item->id}})">
                    @if ($item->status == "Order Being Processed")              
                    <option value="">On Process</option>
                    <option value="received">Received</option>
                    @else
                    <option value="">Received</option>
                    <option value="received">On Process</option>
                   
                    @endif
                   
                    </select>
                    </td>
                   <!--<td style="text-transform: uppercase;" >{{$item->status}}</td> -->
                    <td>{{$orderStatus->last_update}}</td>
                </tr>
                @endforeach
            </table>
           <div id="message"></div> 
            <div class="pull-right">Total Price: RM{{$orderStatus->total_cost}}</div><br/>
        <img class="pull-right" id="btnPrint" alt="Print" height="20" src="http://cdn.printfriendly.com/button-print-grnw20.png" width="62">       
</div>
<script>
    $("#btnPrint").on("click", function() {
        var divContents = $("#orderItem").html();
        var printWindow = window.open('', '', 'height=500,width=1000');
        printWindow.document.write('<html><head><title>DIV Contents</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
    
    function statusChange(id) {
    
    var idVal=id;
    if (document.getElementById("selectOrder").value == ""){
       var status=document.getElementById("selectOrder").value;
       
      //document.getElementById("message").innerHTML = idVal;
     
        }     
    else if(document.getElementById("selectOrder").value == "received"){
        
      //document.getElementById("message").innerHTML = idVal;
       var status=document.getElementById("selectOrder").value; 
    }
    
     $.ajax({
        url: "<?php echo URL::to('/'); ?>" + "/updateShippingStatus",
        type: "post",
        data: {idVal: idVal,status:status}
      });
    
    
    }
    
</script>