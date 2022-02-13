<main class="mn-inner ">
                <div class="">
                    
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
                                        <?php 
											$query = $this->db->get_where('users',array('id' => $this->session->user_id));
											$row = $query->row_array();
										?>
                                    </div>
                                    <span class="card-title">Security</span>
									<div class="row">
									<form class="col s12" id="securityForm" action="<?php echo base_url("index.php/user/sec");?>" method="POST">
											  <div class="input-field col s12">
                                                   <input id="email" name="email" value="<?php echo $row['email'];?>" type="email" class="">
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="phone" name="password" type="password" class="">
                                                   <label for="phone">New Password</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password2" name="confirm_password" type="password" class="">
                                                   <label for="password2">Confirm Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   <button type="submit" style="width:100%" class="waves-effect waves-light btn teal" id="secBtn">Update</button>
                                               </div>
                                           </form>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </main>
            