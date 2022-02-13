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
								    <span class="card-title">Exam Portal</span><br/>
									</div>
                                       <div class="row">
                                           <form class="col s12" id="" method="POST" action="">
                                               <div class="input-field col s12">
                                                   <?php if($this->session->flashdata('emailerror')){?>
                                                       <div class="alert alert-danger" style="background:#f4f4f4; color:#000; padding:10px">
                                                           <i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('emailerror'); ?>
                                                        </div>
                                                <?php  }else if($this->session->flashdata('resetsuccess')){ ?>
<div class="alert alert-danger" style="background:#f4f4f4; color:#000; padding:10px">
                                                           <i class="fa fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('resetsuccess'); ?>
                                                        </div>
<?php } ?>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="email" name="email" type="email" value="<?php echo set_value('email');?>" required class="validate">
                                                   <label for="email">Email</label>
                                               </div>
                                               
                                               <div class="col s12 right-align m-t-sm">
                                                   
                                                   <button type="submit" name="submit" value="1" class="waves-effect waves-light btn teal" style="width:100%" id="resetBtn">Reset</button>
												   
                                               </div>
                                           </form>
										   <div class="col s12">
										   <div class="col s12 m-t-sm" style="text-align:center">
                                                <a href="<?php echo base_url("index.php/home/signup");?>" class="waves-effect waves-grey btn-flat" style="width:100%">sign up</a>
											</div>
											</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
        </div>
        