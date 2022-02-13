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
                            <div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
                                       <?php 
											$query = $this->db->get_where('admin', array('id' => $this->session->admin_id));
											$row = $query->row_array();
										?>
                                    </div>
                                    <span class="card-title">Security</span>
									<div class="row">
									<form class="col s12" id="securityForm" action="<?php echo base_url("index.php/dashboard/sec");?>" method="POST">
											  <div class="input-field col s12">
                                                   <input id="email" name="email" type="email" value="<?php echo $row['username'];?>" class="">
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="phone" name="password" type="password" class="">
                                                   <label for="phone">Password</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password2" name="confirm_password" type="password" class="">
                                                   <label for="password2">Confrim Password</label>
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
            