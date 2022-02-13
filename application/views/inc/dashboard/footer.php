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
        <script src="<?php echo base_url("public/js/pages/table-data.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/google-code-prettify/prettify.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/sweetalert/sweetalert.min.js");?>"></script>
		<script src="<?php echo base_url("public/plugins/datatables/js/jquery.dataTables.min.js");?>"></script>
        
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
				<?php
				if(isset($exam['id'])){
				$q2 = $this->db->get_where('ffd_questions', array('exam_id'=>$exam['id']));
				foreach($q2->result() as $rack){}?>
				var curr = "<?php echo $rack->questnumber;?>";
				console.log(curr);
				<?php }?>
				$('#analog-clock').clock({offset: '+1', type: 'analog'});
			
			$('#counter').countdown({
				until: "1800",
				labels: ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Min', 'Sec'],
				onExpiry: function(){
					swal("Hello!");
				}
				//onTick: watchCountdown
			})
		$("#examForm").submit(function(e){
			e.preventDefault();
			$("#examBtn").prop("disabled", true).html("<i class='fa fa-1x fa-spin fa-refresh' aria-hidden='true'></i> Processing...");
			var url = $(this).attr('action');
			var data = $(this).serialize();
			$.post(url,data,function(resp){
				var info = "<ul>";
				for( var key in resp.details){
					info += '<li><h6>'+resp.details[key]+'</h6></li>';
				}
				info += "</ul>";
				if(resp.error == 1){
					$("#examBtn").prop("disabled", false).html("Create");
					swal({
						title: 'Caution',
						text: info,
						type: 'warning'
					});
				}else if(resp.error == 2){
					$("#examBtn").prop("disabled", false).html("Create");
					swal({
						title: 'Caution',
						text: resp.details,
						type: 'warning'
					});
				}else{
					window.location.href = '<?php echo base_url("index.php/dashboard/questions");?>/'+resp.eid+'/'+resp.qnum;
				}
			},'json');
		});
		
		/********************************************************************************************************************/
		/*******************************************************Security****************************************************/
		/*******************************************************************************************************************/
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
		
		/*******************************************************************************************************************/
		/************************************************Users**************************************************************/
		/*******************************************************************************************************************/
		$('#example').on('click','.delUser',function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			var url = "<?php echo base_url("index.php/dashboard/delusers");?>";
			if(confirm("Are you sure you want to delete this user??")){
				$.post(url,{'id':id}, function(resp){
				if(resp.error == 0){
					window.location.reload();
				}else{
					swal({
						title: 'Caution',
						type: 'warning',
						text:resp.details
					})
				}
			},'json');
			}			
		})
		
		$('#example').on('click','.showUserInfo',function(e){
			e.preventDefault();
			var name = $(this).attr('name');
			var phone = $(this).attr('phone');
			var email = $(this).attr('email');
				var info = "<ul>"+
				"<li><h6>"+name+"</h6></li>"+
				"<li><h6><i class='fa fa-phone'></i> "+phone+"</h6></li>"+
				"<li><h6><i class='fa fa-envelope'></i> "+email+"</h6></li></ul>";
					swal({
						title: 'Contact Details',
						imageUrl:"<?php echo base_url('public/images/av.png')?>",
						text:info
					})
				
		})
		
		/*******************************************************************************************************************/
		/***********************************************Questions***********************************************************/
		/*******************************************************************************************************************/
		
			$('.cald').each(function(key){
				curr = parseInt(curr)
				var i = key+1+curr;
				$("#quest"+i).submit(function(e){
					e.preventDefault();
					var url = $(this).attr('action');
					var data = $(this).serialize();
					$("#btnQuest"+i+"").prop("disabled", true).html("<i class='fa fa-spin fa-refresh'></i> Processing..");
					//console.log(data);
					$.post(url,data,function(resp){
						var info = "<ul>";
						for( var key in resp.details){
							info += '<li><h6>'+resp.details[key]+'</h6></li>';
						}
						info += "</ul>";
						if(resp.error == 1){
							$("#btnQuest"+i).prop("disabled", false).html("<i class='fa fa-add'></i> Add");
							swal({
								title: 'Caution',
								text: info,
								type: 'warning'
							});
						}else if(resp.error == 2){
							$("#btnQuest"+i).prop("disabled", false).html("<i class='fa fa-add'></i> Add");
							swal({
								title: 'Caution',
								text: resp.details,
								type: 'warning'
							});
						}else{
							swal({
								title: 'Success',
								text: 'Question successfully added!',
								type: 'success'
							});
							$("#btnQuest"+i).prop("disabled", true).html("<i class='fa fa-check'></i> Success");
							
						}
					},'json');
				}
			)
			});
			$('.prevorm').each(function(key){
				var i = key+1;
				
				$("#ansForm"+i).submit(function(e){
					e.preventDefault();
					var url = '<?php echo base_url("index.php/dashboard/adanswers");?>';
					var data = $(this).serialize();
					$("#btnAns"+i+"").prop("disabled", true).html("<i class='fa fa-spin fa-refresh'></i> Processing..");
					console.log(data);
					$.post(url,data,function(resp){
						if(resp.error == 2){
							$("#btnAns"+i).prop("disabled", false).html(" Answer");
							swal({
								title: 'Caution',
								text: resp.details,
								type: 'warning'
							});
						}else{
							window.location.reload();
						}
					},'json');
				}
			)
			})
			
			/*******************************************************************************************************************/
		/*********************************************** Sub Questions *******************************************************/
		/*******************************************************************************************************************/
		
			$('.sub').each(function(key){
				curr = parseInt(curr)
				var i = key+1+curr;
				//console.log(i);
				
			$("#sub"+i).submit(function(e){
				console.log(i);
					e.preventDefault();
					var url = $(this).attr('action');
					var data = $(this).serialize();
					$("#btnSub"+i+"").prop("disabled", true).html("<i class='fa fa-spin fa-refresh'></i> Processing..");
					console.log(data);
					$.post(url,data,function(resp){
						var info = "<ul>";
						for( var key in resp.details){
							info += '<li><h6>'+resp.details[key]+'</h6></li>';
						}
						info += "</ul>";
						if(resp.error == 1){
							$("#btnSub"+i).prop("disabled", false).html("<i class='fa fa-add'></i> Add");
							swal({
								title: 'Caution',
								text: info,
								type: 'warning'
							});
						}else if(resp.error == 2){
							$("#btnSub"+i).prop("disabled", false).html("<i class='fa fa-add'></i> Add");
							swal({
								title: 'Caution',
								text: resp.details,
								type: 'warning'
							});
						}else{
							swal({
								title: 'Success',
								text: 'Question successfully added!',
								type: 'success'
							});
							
							$("#btnSub"+i).prop("disabled", true).html("<i class='fa fa-check'></i> Success");
							
						}
					},'json');
				}
			)
			});
			$('.prevorm').each(function(key){
				var i = key+1;
				
				$("#ansForm"+i).submit(function(e){
					e.preventDefault();
					var url = '<?php echo base_url("index.php/dashboard/adanswers");?>';
					var data = $(this).serialize();
					$("#btnAns"+i+"").prop("disabled", true).html("<i class='fa fa-spin fa-refresh'></i> Processing..");
					console.log(data);
					$.post(url,data,function(resp){
						if(resp.error == 2){
							$("#btnAns"+i).prop("disabled", false).html(" Answer");
							swal({
								title: 'Caution',
								text: resp.details,
								type: 'warning'
							});
						}else{
							window.location.reload();
						}
					},'json');
				}
			)
			})
			
			
		/*******************************************************************************************************************/
		/************************************************ Exam Switch *****************************************************/
		/*****************************************************************************************************************/
		
		$(".live").change(function(e){
			var data = {'id' : $(this).attr('id'),'value': $(this).val()};
			var url = "<?php echo base_url("index.php/dashboard/addlive");?>";
				if(confirm("Are you sure about this???")){
					$.post(url,data, function(resp){
						
					},'json');	
				}
			})
		
		})
		</script>
        
    </body>
</html>