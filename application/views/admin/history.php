
              <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Exam History</div>
                    </div>
                    <div class="col s12">
                        
                <section id="cd-timeline" class="cd-container">
				<?php
				$this->db->order_by('id', 'DESC');
				$exam = $this->db->get('ffd_examination');
				foreach($exam->result() as $hist){
				?>
					<div class="cd-timeline-block">
						<div class="cd-timeline-img cd-picture">
							<img src="<?php echo base_url("public/plugins/vertical-timeline/img/cd-icon-picture.svg");?>" alt="Picture">
						</div> <!-- cd-timeline-img -->

						<div class="cd-timeline-content">
							<h2><?php echo $hist->title;?></h2>
							<p><?php echo $hist->details;?></p>
							
							<div class="switch m-b-md left">
                                            		<label>
                                                	Off
                                                	<input class="live" name="live" id="<?php echo $hist->id;?>" <?php if($hist->live == 1){ echo 'value="0" checked'; }else{ echo 'value="1"';}?> type="checkbox">
                                                	<span class="lever"></span>
                                                	On
                                            		</label>
                                        		</div>
							<a href="<?php echo base_url("index.php/dashboard/report/"); echo $hist->id;?>" class="waves-effect waves-blue btn-flat">Report</a>
							<a href="<?php echo base_url("index.php/dashboard/preview/"); echo $hist->id;?>" class="waves-effect waves-blue btn-flat">Questions</a>
							<span class="cd-date"><?php echo date("d F, Y",$hist->timestamp);?></span>
						</div> <!-- cd-timeline-content -->
					</div> <!-- cd-timeline-block -->
				<?php 
				}?>
	</section> <!-- cd-timeline -->

                    </div>
                </div>
            </main>
            