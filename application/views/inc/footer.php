
        <!-- Javascripts -->
        <script src="<?php echo base_url("public/plugins/jquery/jquery-2.2.0.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/materialize/js/materialize.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/material-preloader/js/materialPreloader.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/jquery-blockui/jquery.blockui.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/google-code-prettify/prettify.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/sweetalert/sweetalert.min.js");?>"></script>
        
        <script src="<?php echo base_url("public/js/alpha.min.js");?>"></script>
		<script>
		var $buoop = {
		vs:{i:10,f:25,o:12.1,s:7,c:10},
		reminder:0
		} 
		function $buo_f(){ 
		 var e = document.createElement("script"); 
		 e.src = "//browser-update.org/update.min.js"; 
		 document.body.appendChild(e);
		};
		try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
		catch(e){window.attachEvent("onload", $buo_f)}


		$(function(){
			
			if(!Modernizr.localstorage){
				alert("Kindly upgrade your browser!");
			}
			$('#regForm').submit(function(e){
			e.preventDefault();
			var url = $(this).attr("action");
			var data = $(this).serialize();
			$('#regBtn').prop('disabled', true).html('Processing...');
			//console.log(data);
			$.post(url,data,function(resp){
				if(resp.result == 0){
					$('#regBtn').prop('disabled', false).html('Sign Up');
					var info = "<ul>";
					for( var key in resp.data){
						info += '<li><h6>'+resp.data[key]+'</h6></li>';
					}
					info += "</ul>";
					console.log(info);
					swal({   
							title: "Caution",   
							text: info,   
							type: "warning",   
					});
				}else if(resp.result == 2){
					$('#regBtn').prop('disabled', false).html('Sign Up');					
					swal({   
							title: "Caution",   
							text: resp.data,   
							type: "warning",   
					});
				}else{
					$('#regBtn').prop('disabled', false).html('Sign Up');					
					swal({   
							title: "Successful",   
							text: resp.details,   
							type: "success",   
					});
				}
				
			}, 'json');
		});
		
		$('#signinForm').submit(function(e){
			e.preventDefault();
			var url = $(this).attr("action");
			var data = $(this).serialize();
			$('#logBtn').prop('disabled', true).html('Processing...');
			//console.log(data);
			$.post(url,data,function(resp){
				if(resp.result == 0){
					$('#logBtn').prop('disabled', false).html('Sign In');
					var info = "<ul>";
					for( var key in resp.data){
						info += '<li><h6>'+resp.data[key]+'</h6></li>';
					}
					info += "</ul>";
					console.log(info);
					swal({   
							title: "Caution",   
							text: info,   
							type: "warning",   
					});
				}else if(resp.result == 2){
					$('#logBtn').prop('disabled', false).html('Sign In');
					swal({   
							title: "Caution",   
							text: resp.data,   
							type: "warning",   
					});
				}else{
					window.location.href = '<?php echo base_url("index.php/user");?>';
				}
				
			}, 'json');
		})
		})
		</script>
        
    </body>
</html>