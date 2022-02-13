<main class="mn-inner ">
<div class="">
    
    
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l9">
            <div class="card invoices-card">
                <div class="card-content">
                    <div class="card-options">
                        <?php
						$query = $this->db->get_where('data_capture',array('dc_id' => $this->session->user_id));
						$row = $query->row_array();
						?>
                    </div>
                    <span class="card-title">Profile</span>
					<div class="row">
					<form class="col s12" id="profileForm" action="<?php echo base_url("index.php/user/prof");?>" method="POST">
							  <div class="input-field col s3">
								<select name="title">
								  <option  value="" disabled>Title</option>
								  <option value="Pastor" <?php if($row['title'] == 'Pastor'){ echo 'selected';}?> >Pastor</option>
								  <option value="Brother" <?php if($row['title'] == 'Brother'){ echo 'selected';}?>>Brother</option>
								  <option value="Sister" <?php if($row['title'] == 'Sister'){ echo 'selected';}?>>Sister</option>
								  <option value="Deaconness" <?php if($row['title'] == 'Deaconness'){ echo 'selected';}?>>Deaconness</option>
								  <option value="Deacon" <?php if($row['title'] == 'Deacon'){ echo 'selected';}?>>Deacon</option>
								</select>												
							  </div>
                               <div class="input-field col s9">
                                   <input id="name" name="name" value="<?php if($row['name']){ echo $row['name'];}?>" type="text" class="validate">
                                   <label for="name">Name</label>
                               </div>
							   <div class="input-field col s6">
								<select name="designation">
								  <option  value="" disabled>Designation</option>
								  <option value="Pastor" <?php if($row['designation'] == 'Pastor'){ echo 'selected';}?>>Pastor</option>
								  <option value="Assistant Pastor" <?php if($row['designation'] == 'Assistant Pastor'){ echo 'selected';}?>>Assistant Pastor</option>
								  <option value="Group Pastor" <?php if($row['designation'] == 'Group Pastor'){ echo 'selected';}?>>Group Pastor</option>
								  <option value="Graduate Pastor" <?php if($row['designation'] == 'Graduate Pastor'){ echo 'selected';}?>>Graduate Pastor</option>
								  <option value="Coordinator" <?php if($row['designation'] == 'Coordinator'){ echo 'selected';}?>>Coordinator</option>
								  <option value="Others" <?php if($row['designation'] == 'Others'){ echo 'selected';}?>>Others</option>
								</select>												
							  </div>
							  <div class="input-field col s6">
								<select name="zone">
								  <option  value="" disabled >Zone</option>
								  <option value="A" <?php if($row['zone'] == 'A'){ echo 'selected';}?>>Zone A</option>
								  <option value="B" <?php if($row['zone'] == 'B'){ echo 'selected';}?>>Zone B</option>
								  <option value="C" <?php if($row['zone'] == 'C'){ echo 'selected';}?>>Zone C</option>
								  <option value="D" <?php if($row['zone'] == 'D'){ echo 'selected';}?>>Zone D</option>
								  <option value="E" <?php if($row['zone'] == 'E'){ echo 'selected';}?>>Zone E</option>
								  <option value="F" <?php if($row['zone'] == 'F'){ echo 'selected';}?>>Zone F</option>
								  <option value="G" <?php if($row['zone'] == 'G'){ echo 'selected';}?>>Zone G</option>
								</select>												
							  </div>
							  <div class="input-field col s12">
                                   <input id="chapter" value="<?php if($row['chapter']){ echo $row['chapter'];}?>" name="chapter" type="text" class="">
                                   <label for="chapter">Chapter</label>
                               </div>
                               <div class="input-field col s12">
                                   <input id="email" value="<?php if($row['email']){ echo $row['email'];}?>" name="email" type="email" class="">
                                   <label for="email">Email</label>
                               </div>
                               <div class="input-field col s12">
                                   <input id="phone" value="<?php if($row['phone']){ echo $row['phone'];}?>" name="phone" type="number" min="0" class="">
                                   <label for="phone">Phone</label>
                               </div>
                                <div class="col s12 right-align m-t-sm">
                                   <button type="submit" style="width:100%" class="waves-effect waves-light btn teal" id="profBtn">Update</button>
                               </div>
                           </form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
