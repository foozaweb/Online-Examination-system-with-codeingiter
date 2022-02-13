<!--<div class="page-footer">
                <div class="footer-grid container">
                    <div class="footer-l white">&nbsp;</div>
                    <div class="footer-grid-l white">
                    </div>
                    <div class="footer-r white">&nbsp;</div>
                    <div class="footer-grid-r white">
                        <a class="footer-text" href="mailbox.html">
                            <i class="material-icons arrow-r">arrow_forward</i>
                            <span class="direction">Next</span>
                            <div>
                                Mailbox app
                            </div>
                        </a>--
                    </div>
                </div>
            </div>-->
        </div>
        <div class="left-sidebar-hover"></div>
        
        
        <!-- Javascripts -->
        <script src="<?php echo base_url("public/plugins/jquery/jquery-2.2.0.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/materialize/js/materialize.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/material-preloader/js/materialPreloader.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/jquery-blockui/jquery.blockui.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/waypoints/jquery.waypoints.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/counter-up-master/jquery.counterup.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/jquery-validation/jquery.validate.min.js");?>"></script>
		<!--<script src="<?php echo base_url("public/plugins/jquery.countdown/jquery.countdown.min.js");?>"></script>-->
		<script src="<?php echo base_url("public/plugins/vertical-timeline/js/main.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/clock/js/jquery.clock.js");?>"></script>
		<script src="<?php echo base_url("public/js/alpha.min.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/countdown/js/jquery.plugin.js");?>"></script>
        <script src="<?php echo base_url("public/plugins/countdown/js/jquery.countdown.js");?>"></script>
        <script src="<?php echo base_url("public/js/pages/form-wizard.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/google-code-prettify/prettify.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/sweetalert/sweetalert.min.js");?>"></script>
        
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
			  
			$('#analog-clock').clock({offset: '+1', type: 'analog'});
			
			
			<?php if(isset($exam['id'])){?>
					/*window.onbeforeunload = function(){
						return 'You have attempted to navigate away from this page. Remember if you do you will lose your exam and score zero. If you really wish to exit this page why not just click the submit button.';
					}*/
					//console.log(typeof(localStorage.visit));
					var eid = "<?php echo $exam['id'];?>";
					var title = "<?php echo $exam['title'];?>";
					
					if(localStorage.getItem('visit') == undefined){
						$.post("<?php echo base_url("index.php/user/examstart");?>",{"eid": eid},function(resp){
							if(resp.start == 1){
								localStorage.setItem('visit','1');
							}
						},'json');
					}
					else{
						$.post("<?php echo base_url("index.php/user/examend");?>",{"eid": eid, "title":title},function(resp){
							if(resp.end == 1){
								localStorage.removeItem('visit');
									window.location.reload();	
																
							}
						},'json');
					}
					 
							
						
				/*if(sessionStorage.visit != null){
					swal('Are you sure?',
					'You have attempted to navigate away from this page. Remember if you do you will lose your exam and score zero. If you really wish to exit this page why not just click the submit button.'
					,'warning');
				} else{
					sessionStorage.visit = 1;
				};*/
				
				var examTime = <?php echo $exam['duration']*60;?>;
						
			$('#counter').countdown({
				until: examTime,
				labels: ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Min', 'Sec'],
				onExpiry: function(){
					$.post("<?php echo base_url("index.php/user/examend");?>",{"eid": eid, "title":title},function(resp){
							if(resp.end == 1){
								swal({
									title:'Time is up!',
									text:'You failed to submit your answers',
									type:'warning',
									timer:5000,
									showConfirmButton: false,
									closeOnConfirm: false,
								},function(){
									localStorage.removeItem('visit');
										window.location.reload();
								});												
							}
						},'json');
					}
				//onTick: watchCountdown
			})
			
			$("#examForm").submit(function(e){
				e.preventDefault();
				 $('#counter').countdown('option', { until: 00, onExpiry: function(){} });
				var url = $(this).attr('action');
				var data = $(this).serialize();
				$("#btnAnswer").prop("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Processing...");
				console.log(data);
				$.post(url,data, function(resp){
					if(resp.answer == 1){
						localStorage.removeItem('visit');
						var score = "<h4>"+resp.result+"%</h4>";
						swal({
						title:'You scored',
						text:score,
						type:'success',
						});
						$("#btnAnswer").prop("disabled", true).html("<i class='fa fa-check'></i> "+resp.result+"");
						
					}
				},'json');
			});
			
			$("#subForm").submit(function(e){
				e.preventDefault();
				console.log($(this).serialize());
				 $('#counter').countdown('option', { until: 00, onExpiry: function(){} });
				var url = $(this).attr('action');
				var data = $(this).serialize();
				$("#btnAnswer").prop("disabled", true).html("<i class='fa fa-refresh fa-spin'></i> Processing...");
				console.log(data);
				$.post(url,data, function(resp){
					if(resp.answer == 1){
						localStorage.removeItem('visit');
						var score = "<h4>"+resp.result+"%</h4>";
						swal({
						title:'You scored',
						text:score,
						type:'success',
						});
						$("#btnAnswer").prop("disabled", true).html("<i class='fa fa-check'></i> "+resp.result+"");
						
					}
				},'json');
			});
			
			
			
			
			<?php }?>
			$('.startExam').click(function(e){
				e.preventDefault();
				var btn = $(this);
				var id = $(this).attr("id");
				//console.log(id);
				var time = $(this).attr("time");
				var user = "<?php echo $this->session->user_id;?>";
				var url = "<?php echo base_url("index.php/user/checkstatus/");?>";
				btn.prop('disabled', true).html('<i class="fa fa-refresh fa-spin"></i> Processing...');
				$.post(url+id,{'id':id,'user':user}, function(resp){
					if(resp.taken == 1){
						btn.prop('disabled', false).html('Start Exam');
						swal({
							title:'Uh Oh',
							text:"You've taken this exam already!",
							type:'warning'
						})
					}else{
						btn.prop('disabled', false).html('Start Exam');
						
						var info = '<h6>The following instructions are vital:</h6><ul>'+
									'<li><h6>Do not navigate from the exam page till you have clicked the submit button</h6></li>'+
									'<li><h6>This is a timed exam so work with the time you have and submit before your time is out.</h6></li>'+
									'<li><h6>Use a device that is javascript enabled</h6></li></ul>';
						swal({
							title:'Instructions',
							text:info,
							type:'warning',
							showCancelButton: false,   
							confirmButtonColor: "#DD6B55",   
							confirmButtonText: "Okay", 
							closeOnConfirm: false
						}, function(e){
							window.location.href = '<?php echo base_url("index.php/user/examination/");?>'+id;
						}
							
						)
						
					}
				},'json');
			});
			
			$('#securityForm').submit(function(e){
				e.preventDefault();
				var data = $(this).serialize();
				var url = $(this).attr('action');
				$('#secBtn').prop('disabled', true).html('<i class="fa fa-refresh fa-spin"></i> Processing...');
				$.post(url,data,function(resp){
					if(resp.error == 0){
						$('#secBtn').prop('disabled', false).html('Update');
						
						swal({
							title:'Successful',
							text:'login details updated!',
							type:'success'
						});
					}else{
						var info = "<ul>";
						for( var key in resp.data){
							info += '<li><h6>'+resp.data[key]+'</h6></li>';
						}
						info += "</ul>";
						swal({
							title:'Caution',
							text:info,
							type:'warning'
						});
						$('#secBtn').prop('disabled', false).html('Update');
						
					}
				},'json');
			})
		
		
		$('#profileForm').submit(function(e){
				e.preventDefault();
				var data = $(this).serialize();
				var url = $(this).attr('action');
				$('#profBtn').prop('disabled', true).html('<i class="fa fa-refresh fa-spin"></i> Processing...');
				$.post(url,data,function(resp){
					if(resp.error == 0){
						$('#profBtn').prop('disabled', false).html('Update');
						
						swal({
							title:'Successful',
							text:'Profile details updated!',
							type:'success'
						});
					}else{
						var info = "<ul>";
						for( var key in resp.details){
							info += '<li><h6>'+resp.details[key]+'</h6></li>';
						}
						info += "</ul>";
						swal({
							title:'Caution',
							text:info,
							type:'warning'
						});
						$('#profBtn').prop('disabled', false).html('Update');
						
					}
				},'json');
			});
		})
		</script>
        
    </body>
</html>