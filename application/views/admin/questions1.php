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
									<h5><?php $qcount = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id'])); echo $this->db->affected_rows().' Question(s) Added';?></h5>
									<p><a href="<?php echo base_url("index.php/dashboard/preview");?>/<?php echo $exam['id'];?>" class="btn waves-effect orange">Preview</a></p>
								</div>
                            </div>
							<?php 
							if($exam['type'] == 'Multiple'){
								for($i=1; $i<=$exam['questions']; $i++){
									$q1 = $this->db->get_where('ffd_questions', array('exam_id'=>$exam['id'], 'questnumber' => $i));
									$raw = $q1->row();
									if(isset($raw)){
										
									}else{
									
							?>
							<div class="cald card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
										Question - <?php echo $i;?>
                                    </div>
                                    <span class="card-title"></span>
									<div class="row">
									<form id="quest<?php echo $i?>" method="POST" action="<?php echo base_url("index.php/dashboard/qna");?>">
										<div class="input-field col s12">
										<textarea id="details" name="question<?php echo $i;?>" rows="10" required class="materialize-textarea"></textarea>
										<label for="details">Question (<?php echo $i?>)</label>												
										</div>
										<div class="options">
											<div class="input-field col s6">
                                                <i class="material-icons prefix">A</i>
                                                <input id="a<?php echo $i;?>" name="a<?php echo $i;?>" type="text" required class="">
                                                <label for="a<?php echo $i;?>">Answer</label>
                                            </div>
											<div class="input-field col s6">
                                                <i class="material-icons prefix">B</i>
                                                <input id="b<?php echo $i;?>" name="b<?php echo $i;?>" type="text" required class="">
                                                <label for="b<?php echo $i;?>">Answer</label>
                                            </div>
											<div class="input-field col s6">
                                                <i class="material-icons prefix">C</i>
                                                <input id="c<?php echo $i;?>" name="c<?php echo $i;?>" type="text" required class="">
                                                <input name="exam" type="hidden" value="<?php echo $exam['id'];?>">
                                                <input name="questions" type="hidden" value="<?php echo $exam['questions'];?>">
                                                <input name="number" type="hidden" value="<?php echo $i;?>">
                                                <label for="c<?php echo $i;?>">Answer</label>
                                            </div>
											<div class="input-field col s6">
                                                <i class="material-icons prefix">D</i>
                                                <input id="d<?php echo $i;?>" name="d<?php echo $i;?>" type="text" required class="">
                                                <label for="d<?php echo $i;?>">Answer</label>
                                            </div>
											<!--<div class="input-field col s4">
												<select name="eligibility">
												  <option  value="" disabled selected>Correct Answer</option>
												  <option value="A" >A</option>
												  <option value="B">B</option>
												  <option value="C">C</option>
												  <option value="D">D</option>
												</select>												
											</div>-->
										</div>
										<div class="input-field col s12">
										<button type="submit" class="btn waves-effect teal" id="btnQuest<?php echo $i;?>" style="width:100%"><i class="fa fa-plus"></i> Add</button>
										</div>
									</form>
                                    </div>
								</div>
							</div>
							<?php }
								}
							}else{?>
							
							
							<?php }?>
							
						</div>
                    </div>
                </div>
                <!--<div class="inner-sidebar">
                    
                </div>-->
            </main>
            