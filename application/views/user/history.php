
              <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Exams Taken</div>
                    </div>
                    <div class="col s12">
                        
                <section id="cd-timeline" class="cd-container">
				<?php 
				$query = $this->db->get_where('ffd_taken',array('user_id' => $this->session->user_id, 'end !=' => NULL));
				foreach($query->result() as $row):
				?>
				<div class="cd-timeline-block">
					<div class="cd-timeline-img cd-picture">
						<img src="<?php echo base_url("public/plugins/vertical-timeline/img/cd-icon-picture.svg");?>" alt="Picture">
					</div> <!-- cd-timeline-img -->

					<div class="cd-timeline-content">
						<h2>
						<?php 
						$exam = $this->db->get_where('ffd_examination', array('id' => $row->exam_id));
						$exm = $exam->row();
						echo $exm->title;
						?></h2>
						<p><?php echo $exm->details;?></p>
						<h4>Score: <?php echo $row->score.'%';?></h4>
						<span class="cd-date">Written: <?php echo date('d F, Y H:m:i', $row->start);?></span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
				<?php endforeach ?>
		
	</section> <!-- cd-timeline -->

                    </div>
                </div>
            </main>
            