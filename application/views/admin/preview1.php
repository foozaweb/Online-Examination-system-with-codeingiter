<main class="mn-inner ">
                <div class="middle-content">
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
                        <div class="col s12 m12 l12">
							<div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
										Duration - <?php echo $exam['duration'].' minutes';?>
                                    </div>
                                    <span class="card-title"><?php echo $exam['title'];?></span>
									<?php
									$q2 = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id']));
									if($this->db->affected_rows() < $exam['questions']){
									?>
									<p><a href="<?php echo base_url("index.php/dashboard/questions");?>/<?php echo $exam['id'];?>" class="btn waves-effect teal">Add Questions</a></p>
									<?php }?>
								</div>
                            </div>
							
							<div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
										Questions
                                    </div>
                                    
									
									<?php
									$q2 = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id']));
									$i = 1;
									foreach ($q2->result() as $read)
									{
									?>
									<span class="card-title"></span>
									<div class="row">
									<div class="col s12" style="margin-bottom:50px;margin-top:30px">
									<form id="ansForm<?php echo $i;?>" class="prevorm" method="POST" action="">
									<h5><?php echo $read->quest;?></h5>
									
									<?php 
									$q3 = $this->db->get_where('ffd_answers', array('quest_id' => $read->id));
									foreach ($q3->result() as $ans)
									{?>
										<div class="input-field col s12">
                                            <input class="with-gap" <?php if($ans->correct == 1){ echo "checked";}?> value="<?php echo $ans->id;?>" name="ans<?php echo $i;?>" type="radio" id="test<?php echo $ans->id;?>">
                                            
                                            <label for="test<?php echo $ans->id;?>"><?php echo $ans->answer;?></label>
                                        </div>
									
									<?php 
									}?>
									<input value="<?php echo $exam['questions'];?>" name="questions" type="hidden">									
									<input value="<?php echo $read->id;?>" name="quest_id" type="hidden">									
									<div class="input-field col s12" style="margin-top:30px !important">
                                    <button type="submit" id="btnAns<?php echo $i;?>" class="btn waves-effect teal">Answer</button>
									</div>
									</form>
									</div>
									
									<hr/>
									<?php $i++; }?>
									
                                    
								</div>
							</div>
							
							
						</div>
                    </div>
                </div>
                <!--<div class="inner-sidebar">
                    
                </div>-->
            </main>
            