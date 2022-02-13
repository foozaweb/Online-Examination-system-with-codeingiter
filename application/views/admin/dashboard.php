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
                                    </div>
                                    <span class="card-title">Create Examination</span>
									<div class="row">
									 <form class="col s12" id="examForm" action="<?php echo base_url("index.php/dashboard/exams");?>" method="POST">
												<div class="input-field col s12">
                                                   <input id="name" name="title" type="text" class="">
                                                   <label for="name">Title</label>
                                               </div>
											   <div class="input-field col s4">
												<select name="type">
												  <option  value="" disabled selected>Type</option>
												  <option value="Multiple" >Multiple Choice</option>
												  <option value="Sub">Sub-objective</option>
												  <option value="Essay">Theory</option>
												</select>												
											  </div>
											  <div class="input-field col s4">
												<input id="duration" name="duration" step="10" min="0" type="number" class="">
                                                   <label for="duration">Duration (mins)</label>												
											  </div>
											  <div class="input-field col s4">
												<select name="eligibility">
												  <option  value="" disabled selected>Eligibility</option>
												  <option value="All" >All</option>
												  <option value="Pastor">Pastors</option>
												</select>												
											  </div>
											  <div class="input-field col s12">
												<input id="question" name="questions" step="1" min="0" type="number" class="">
                                                   <label for="question">Number of Questions</label>												
											  </div>
											  <div class="input-field col s12">
												<textarea id="details" name="details" rows="10" class="materialize-textarea"></textarea>
												<label for="details">Description (brief)</label>												
											  </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   <button type="submit" class="waves-effect waves-light btn teal btn-fill btn-large" style="width:100%" id="examBtn">Create</button>
                                               </div>
                                           </form>
									</div>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
                <!--<div class="inner-sidebar">
                    
                </div>-->
            </main>
            