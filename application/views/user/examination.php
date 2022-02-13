<main class="mn-inner ">
                <div class="col s12 l8">
                    
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l9">
						<?php 
						if(isset($exam['id'])){
						?>
						<div class="card">
							<div class="card-content">
								<span class="">
									<div id="counter"></div>
									<br/>
								</span>
							</div>							
						</div>
						<div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
									<span class="">
                                      Duration - <?php echo $exam['duration'].' minutes';?>
									</span>
									</div>
                                    <span class="card-title"><?php echo $exam['title'];?></span>
									<div class="row">
									<div>
									
									<p>
									A. Ensure you submit your answers before the timer expires.
									</p>
									<?php if($exam['type'] == 'Sub'){?>
									<p>B. Fill in the word(s) that best answers the questions below</p>
									<?php }?>
									<br/>
									<hr/><br/>
									</div>
									<?php if($exam['type'] == 'Multiple'){ ?>
									<form id="examForm" method="POST" action="<?php echo base_url("index.php/user/answer");?>">
									<?php  
									$quest = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id']));
									foreach($quest->result() as $row){?>
									<div class="row" style="margin:20px auto !important;">
									<h5><span><?php echo $row->questnumber;?>. &nbsp;&nbsp;</span><span><?php echo $row->quest;?></span></h5>
									<p class="options">
									
									<?php 
									
									$q3 = $this->db->get_where('ffd_answers', array('quest_id' => $row->id));
									foreach ($q3->result() as $ans)
									{?>
										<div class="input-field col s12">
                                            <input class="with-gap" value="<?php echo $ans->id;?>" name="ans<?php echo $row->questnumber;?>" type="radio" id="test<?php echo $ans->id;?>">
                                            <label for="test<?php echo $ans->id;?>"><?php echo $ans->answer;?></label>
                                        </div>
									
									<?php 
									
									}?>
									
									</p>
									</div><br/>
									<hr/><br/>
									<?php										
									}
									?>
									<div class="input-field col s12">
									<input value="<?php echo $exam['questions'];?>" name="qestions" type="hidden">
									<input value="<?php echo $exam['id'];?>" name="exam_id" type="hidden">
                                     <button type="submit" id="btnAnswer" class="btn waves-effect teal btn-large" style="width:100%">Submit</button>
                                    </div>
									
									</form>
									<?php } else if($exam['type'] == 'Sub'){
									?>
									
									
									<form id="subForm" method="POST" action="<?php echo base_url("index.php/user/sub");?>">
									<?php 
									$quest = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id']));
									foreach($quest->result() as $row){?>
									<div class="row" style="margin:20px auto !important;">
									<h5><span><?php echo $row->questnumber;?>. &nbsp;&nbsp;</span><span><?php echo $row->quest;?></span></h5>
									<p class="options">
										<div class="input-field col s5">
                                            <input  value="<?php echo $row->id?>" name="quest<?php echo $row->questnumber;?>" type="hidden">
                                            <input  value="" name="ans<?php echo $row->questnumber;?>" type="text" placeholder="provide answer">
                                        </div>		
									</p>
									</div><br/>
									<br/>
									<?php										
									}
									?>
									<div class="input-field col s12">
									<input value="<?php echo $exam['questions'];?>" name="qestions" type="hidden">
									<input value="<?php echo $exam['id'];?>" name="exam_id" type="hidden">
                                     <button type="submit" id="btnAnswer" class="btn waves-effect teal btn-large" style="width:100%">Submit</button>
                                    </div>
									
									</form>
							<?php } else if($exam['type'] == 'Essay'){
									?>
									
									
									<form id="sub" method="POST" action="<?php echo base_url("index.php/user/sub");?>">
									<?php 
									$quest = $this->db->get_where('ffd_questions', array('exam_id' => $exam['id']));
									foreach($quest->result() as $row){?>
									<div class="row" style="margin:20px auto !important; ">
									<h5><span><?php echo $row->questnumber;?>. &nbsp;&nbsp;</span><span><?php echo $row->quest;?></span></h5>
									<p class="options">
									
										<div class="input-field col s5">
                                            <input  value="<?php echo $row->id?>" name="quest<?php echo $row->questnumber;?>" type="hidden">
                                            <input value="" name="ans<?php echo $row->questnumber;?>" rows="18" type="text" placeholder="provide answer"></textarea>
                                        </div>									
									
									</p>
									</div><br/>
									<br/>
									<?php										
									}
									?>
									<div class="input-field col s12">
									<input value="<?php echo $exam['questions'];?>" name="qestions" type="hidden">
									<input value="<?php echo $exam['id'];?>" name="exam_id" type="hidden">
                                     <button type="submit" id="btnAnswer" class="btn waves-effect teal btn-large" style="width:100%">Submit</button>
                                    </div>
									
									</form>
									
									
									<?php }else {
									
								}?>
									</div>
                                </div>

                            </div>
							
								
									
										
								<?php
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
									<h4 class="card-title">This exam is not available!</h4>
									</div>
									</div>
                                </div>
                            </div>
						<?php }?>
						
							
                            			
							
							
                        </div>
                    </div>
                </div>
               			</main>
            