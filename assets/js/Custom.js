
// function Follow_func()
// {
// 	 var  xmlhttp;
// 	 xmlhttp=new XMLHttpRequest();
	  
// 	 xmlhttp.onreadystatechange=function()
// 	 {
		  
// 		 if(xmlhttp.readyState==4 && xmlhttp.status==200)
// 		 {
			
// 			 document.getElementById("Follow_btn").innerHTML=xmlhttp.responseText;
// 		 }
// 	 }
	 
// 	 //window.alert("Hello");
	
// 	 xmlhttp.open('POST','index.php',false);
// 	 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
// 	 xmlhttp.send("action=FollowerReq"+"&followed="+document.getElementById('followed').value+"&folloedBy="+document.getElementById('folloedBy').value);
// };



function spinner()
        {
            var SubmitButton = document.getElementById('submit');
            if (SubmitButton.indexOf("icon-spinner") != -1) {

                SubmitButton.className='ast-alt icon-spin ';
            }
            else{
                SubmitButton.className='ast-alt icon-spin icon-spinner';
            };
            
            
        };

// $("#selected_Skill").on('click', function(){
//    var checked = $(this).attr('checked');
//    if(checked){
//       var value = $(this).val();
//       $.post('../index.php?action=skills_update', { value:value }, function(data){
//           // data = 0 - means that there was an error
//           // data = 1 - means that everything is ok
//           if(data == 1){
//              // Do something or do nothing :-)
//              alert('Data was saved in db!');
//           }
//       });
//    }
// });

// $("#follow_btn").on('click', function(){
// 	var followed = $("#followed").val();
// 	var folloedBy = $("#folloedBy").val();
// 	$.post('../index.php?action=FollowerReq&',{ followed:followed , folloedBy:folloedBy , function(data){
// 		if (data == 1) {
// 			$.("#follow_btn").innerHTML(data);
// 		}else{
// 			$.("#follow_btn").innerHTML(data);
// 		}
		
// 	}});
// });
