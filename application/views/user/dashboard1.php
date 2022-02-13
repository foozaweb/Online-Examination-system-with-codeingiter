<main class="mn-inner ">
                <div class="">
                    <!--<div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li class="red-text"><span class="badge cyan lighten-1">gross</span></li>
                                    </ul>
                                </div>
                                <span class="card-title">Sales</span>
                                <span class="stats-counter">$<span class="counter">48,190</span><small>This week</small></span>
                            </div>
                            <div id="sparkline-bar"><canvas width="471" height="40" style="display: inline-block; width: 471px; height: 40px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Page views</span>
                                <span class="stats-counter"><span class="counter">83,710</span><small>This month</small></span>
                            </div>
                            <div id="sparkline-line"><canvas style="display: inline-block; width: 489px; height: 45px; vertical-align: top;" width="489" height="45"></canvas></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Reports</span>
                                <span class="stats-counter"><span class="counter">23,230</span><small>Last week</small></span>
                                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>-->
                    
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l9">
						<?php
						$query = $this->db->get_where('data_capture', array('dc_id' => $this->session->user_id));
						$raw = $query->row();
						
						$this->db->order_by('id', 'DESC');
						$this->db->where('eligibility', 'All');
						$this->db->or_where('eligibility', $raw->designation);
						$exam = $this->db->get_where('ffd_examination');
						$read = $exam->row();
						if(isset($read->id)){
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
						<?php }else{?>
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
            