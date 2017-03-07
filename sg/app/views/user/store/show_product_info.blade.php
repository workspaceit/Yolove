<div id="storeItem">
          
            <table id="item_table" class="table-bordered table-hovered table-order" style="width:100%;">
                <th class="producthead">ITEMS(S)</th>
                <th class="producthead">PRICE</th>
                <th class="producthead">CURRENT STATUS</th>

                @foreach($store as $key=>$item)
                <tr>
                    
                    <td class="productbody">{{$item->title}}</td>
                    <td class="productbody">${{$item->price}}</td>
                    <td class="productbody">
                        
                    <select id="selectStoreProduct" onchange="statusChange({{$item->id}})" style="width: 100%;">
                    @if ($item->status == "")              
                    <option value="">On Process</option>
                    
                    @elseif ($item->status == "received")
                    <option value="received">Received</option>
                    <option value="returned">Returned</option>
                    @else
                    <option value="returned">Returned</option>
                   
                    
                    @endif
                   
                    </select>
                    </td>
                   
                </tr> 
                @endforeach
            </table>
           <div id="message"></div> 

        <!--<img class="pull-right" id="btnPrint" alt="Print" height="20" src="http://cdn.printfriendly.com/button-print-grnw20.png" width="62">-->       
</div>

<script>
    
    
    function statusChange(id) {
    
    var idVal=id;
     
     var status=document.getElementById("selectStoreProduct").value;
      
     $.ajax({
        url: "<?php echo URL::to('/'); ?>" + "/saveStoreStatus",
        type: "post",
        data: {idVal: idVal,status:status},
        success: function (result) {
              
                $('#selectStoreProduct').html('<option value="returned">Returned</option>');
                
            }
      });
     
    
    }
    
</script>