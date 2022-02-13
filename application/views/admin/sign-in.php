
    <body class="signin-page">
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m6 l6 offset-l3 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content">
								  <div style="text-align:center">
								  <img src="<?php echo base_url("public/images/hand.png");?>"><br/>
								    <span class="card-title">Exam Portal Admin</span><br/>
									</div>
                                       <div class="row">
                                           <form class="col s12" id="logForm" method="POST" action="<?php echo base_url("index.php/admin/login");?>">
                                               <div class="input-field col s12">
                                                   <input id="email" name="email" type="email" required class="validate">
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" name="password" type="password" required  class="validate">
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   
                                                   <button type="submit" class="waves-effect waves-light btn red" style="width:100%" id="logBtn">sign in</button>
												   
                                               </div>
                                           </form>
										</div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
        </div>
        