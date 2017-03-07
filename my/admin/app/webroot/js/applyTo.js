function confirmation(){
   var i =0;
   var k =0;
   var tot = document.getElementById('total_chk').value;
   for(var j=1;j<=tot;j++){
	   var id = 'check' + j;
	   
	   if(document.getElementById(id).checked == true){
		   k =1;
		 
	   }
	   else
	   {
		   k = 0;
	   }
	   i = i || k;
   }
    if(i==0){
		alert("Please select atleast one item");
		return false;
	}
	else{
		var applying_action = document.getElementById('action_id').value ;
		if(applying_action == 0){
			var block_message = confirm("Are You Sure to Block Selected Item(s)");
			if(block_message){
				return true;
			}
			else
			{
				return false;
			}
		}
		else if(applying_action == 1){
			var unblock_message = confirm("Are You Sure to Unblock Selected Item(s)");
			if(unblock_message){
				return true;
			}
			else
			{
				return false;
			}
		}
		else if(applying_action == 2){
			var delete_message = confirm("Are You Sure to Delete Selected Item(s)");
			if(delete_message){
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}


function confirmation_del(action_id){
   document.getElementById('action_id').value=action_id;
   var i =0;
   var k =0;
   var tot = document.getElementById('total_chk').value;
   for(var j=1;j<=tot;j++){
	   var id = 'check' + j;
	   
	   if(document.getElementById(id).checked == true){
		   k =1;
		 
	   }
	   else
	   {
		   k = 0;
	   }
	   i = i || k;
   }
    if(i==0){
		alert("Please select atleast one item");
		return false;
	}
	else{
		var applying_action = action_id ;
		if(applying_action == 1){
					var delete_message = confirm("Are You Sure to move Selected Item(s) to inbox");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else
			if(applying_action == 2){
					var delete_message = confirm("Are You Sure to move Selected Item(s) to draft");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else
			if(applying_action == 3){
					var delete_message = confirm("Are You Sure to mark Selected Item(s) as read");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else
			if(applying_action == 4){
					var delete_message = confirm("Are You Sure to mark Selected Item(s) as unread");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else
			if(applying_action == 5){
					var delete_message = confirm("Are You Sure to mark Selected Item(s) as important");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else
			if(applying_action == 6){
					var delete_message = confirm("Are You Sure to mark Selected Item(s) as not important");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}else						
				if(applying_action == 7){
					var delete_message = confirm("Are You Sure to Delete Selected Item(s)");
					if(delete_message){
						document.customer_message.submit();
						return true;
					}
					else
					{
						return false;
					}
				}
			}
		}

function checkAll(chk)
{
    if(chk.checked==true){
		var inputs = document.getElementsByTagName('input');
		var checkboxes = [];
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type == 'checkbox') {
				inputs[i].checked =true;
			}
		}
	}
	else
	{	var inputs = document.getElementsByTagName('input');
		var checkboxes = [];
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type == 'checkbox') {
				inputs[i].checked =false;
			}
		}
	}
}

function checkbox(){
	var i =1;
    var k =1;
	 var tot = document.getElementById('total_chk').value;
   for(var j=1;j<=tot;j++){
	   var id = 'check' + j;
	   
	   if(document.getElementById(id).checked == true){
		   k =1;
		 
	   }
	   else
	   {
		   k = 0;
	   }
	   i = i &&  k;
   }
   if(i){
	   document.getElementById('chkAll').checked=true;
   }
   else
   {
	    document.getElementById('chkAll').checked=false;
   }
	
}