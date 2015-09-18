<footer class="footer">
<div class="container">
<div class="row-fluid">
  <div class="span6"> <p class="copyright"><img class="foot-logo" src="assets/img/logo-ts.png" alt="Brand Logo"/> &copy; 2013 <strong>Watchopolis</strong> Video Portal Theme - Crafted by <a href="https://wrapbootstrap.com/user/themestrap">Themestrap</a> </p></div>
<div class="span6">   <div class="pagination pull-right">
 <ul>
<li><a data-rel="tooltip" data-placement="top" data-original-title="Follow us on Twitter" href="#"><i class="icon-twitter"></i></a></li>
<li><a data-rel="tooltip" data-placement="top" data-original-title="Share us on Pinterest" href="#"><i class="icon-pinterest"></i></a></li>
<li><a data-rel="tooltip" data-placement="top" data-original-title="Like us on Facebook" href="#"><i class="icon-facebook"></i></a></li>
<li><a data-rel="tooltip" data-placement="top" data-original-title="+1 us on Google+" href="#"><i class="icon-google-plus"></i></a></li>          
</ul>
</div>
</div>
</div>
</div>
</footer>



    <!-- Include Javascript/JQuery Assets
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script src="assets/js/Custom.js"></script>
 <script src="assets/js/jquery.js"></script>
 <script src="assets/js/bootstrap.js"></script>
 <script src="assets/js/jquery.jkit.1.1.10.js"></script>
 <script src="assets/js/jquery.easing.1.3.js"></script>


<script type="text/javascript">
    $("[data-rel=tooltip]").tooltip();
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('body').jKit();
});

</script>
<script>
                $("#follow_btn").on('click', function(){
                 // var checked = $(this).attr('checked');
                 // if(checked){
                    var value = $("#followed").val();
                    var FollowBy = $("#folloedBy").val();
                    $.post('index.php?action=FollowerReq&', { followed:value , followby:FollowBy }, function(data){
                        // data = 0 - means that there was an error
                        // data = 1 - means that everything is ok
                        if(data == 0){
                           //location.reload();
                           alert('Something went wrong !!');
                        }
                        else{
                          //alert('Data was not saved in db!');
                          //location.reload();
                          $("#follow_btn").html(data);
                          $.post('index.php?action=FollowerCount',{ userid:value }, function(data){
			             		if (data == 0) {
			             			alert(data);
			             		}
			             		else{
			             			$("#ShowFollwer").html(data);
			             		}
			             	});
                        }
                    });
                    
                 // }
              });

             // $("#follow_btn").hover( function(){
             // 	var value = $("#followed").val();
             // 	$.post('index.php?action=FollowerCount',{ userid:value }, function(data){
             // 		if (data == 0) {
             // 			alert(data);
             // 		}
             // 		else{
             // 			$("#ShowFollwer").html(data);
             // 		}
             // 	});
             // })
               </script>


  </body>


</html>
