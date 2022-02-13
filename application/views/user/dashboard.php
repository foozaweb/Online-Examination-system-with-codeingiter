<main class="mn-inner ">
                <div class="">
                                        
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l9">
						<?php
						$query = $this->db->get_where('data_capture', array('dc_id' => $this->session->user_id));
						$raw = $query->row();
						
						$this->db->order_by('id', 'DESC');
						$exam = $this->db->get_where('ffd_examination', array('live' => 1));
						
						if($this->db->affected_rows() > 0){
							
							foreach($exam->result() as $read):
								if($read->eligibility == 'All' || $read->eligibility == $raw->designation){
						?>
						<div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
                                      Duration - <?php echo $read->duration.' minutes';?>  
									</div>
                                    <span class="card-title"><?php echo $read->title;?></span>
									<div class="row">
									<div>
									<p>
									<?php echo $read->details;?>
									</p><br/>
									<p>
									<a id="<?php echo $read->id;?>" href="javascript:;" class="startExam btn waves-effect waves-light red accent-1">Start</a>
									</p>
									</div>
									</div>
                                </div>
                            </div>
						<?php }
						endforeach;
						}else{?>
							<div class="card invoices-card">
                                <div class="card-content">
                                    <div class="row">
									<ul id="analog-clock" class="analog">
										  <li class="hour"></li>
										  <li class="min"></li>
										  <li class="sec"></li>
									</ul>
									<div class="center">
									<h4 class="card-title">No scheduled exam yet!</h4>
									</div>
									</div>
                                </div>
                            </div>
						<?php }?>
						
							
                            			
							
							
                        </div>
                    </div>
                </div>
                <!--<div class="inner-sidebar">
                    
                </div>-->
            </main>
            