
    <body class="signup-page">
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
            <main class="mn-inner container ">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m8 l8 offset-l2 offset-m2">
                              <div class="card white darken-1">
                                  <div class="card-content ">
								  <div style="text-align:center">
								  <!--<img src="<?php echo base_url("public/images/hand.png");?>"><br/>
								    <span class="card-title">Exam Portal</span><br/>-->
									</div>
									<span class="card-title">Sign Up</span>
                                      <div class="row">
                                           <form class="col s12" id="regForm" action="<?php echo base_url("index.php/home/register");?>" method="POST">
											  <div class="input-field col s3">
												<select name="title">
												  <option  value="" disabled selected>Title</option>
												   
							<option value="Pastor">Pastor</option>
							<option value="Sister">Sister </option>
							<option value="Brother">Brother</option>
							<option value="Deacon">Deacon</option>
							<option value="Deaconess" >Deaconess</option>  
												</select>												
											  </div>
                                               <div class="input-field col s9">
                                                   <input id="name" name="name" type="text" class="">
                                                   <label for="name">Name</label>
                                               </div>
											   <div class="input-field col s6">
												<select name="designation">
												  <option  value="" disabled selected>Designation</option>
												  <option value="Cell Executive " >Cell Executive </option>
							<option value="Bible Study Class Teacher">Bible Study Class Teacher</option>
							<option value="Cell Leader ">Cell Leader </option>
							<option value="Senior Cell Leader">Senior Cell Leader</option>
							<option value="PCF Leader">PCF Leader</option>
							<option value="PFCC Leader " >PFCC Leader </option>
							<option value="Asst. Coordinator">Asst. Coordinator</option>
							<option value="Coordinator">Coordinator</option>
							<option value="Asst. Chapter Pastor">Asst. Chapter Pastor</option>
							<option value="Chapter Pastor ">Chapter Pastor </option>
							<option value="Second-Tier Church Pastor" >Second-Tier Church Pastor</option>
							<option value="Group Pastor ">Group Pastor </option>
							<option value="Zonal Secretary ">Zonal Secretary </option>
							<option value="Zonal Director ">Zonal Director </option>
							<option value="CM Staff">CM Staff</option> 
												  <option value="Others">Others</option>
												</select>												
											  </div>
											  <div class="input-field col s6">
												<select name="zone">
												  <option  value="" disabled selected>Zone</option>
												  <option value="NIGERIA ZONE A">NIGERIA ZONE A</option> 
                          <option value="NIGERIA ZONE B">NIGERIA ZONE B</option> 
                          <option value="NIGERIA ZONE C">NIGERIA ZONE C</option> 
                          <option value="NIGERIA ZONE D">NIGERIA ZONE D</option> 
                          <option value="NIGERIA ZONE E">NIGERIA ZONE E</option> 
                          <option value="NIGERIA ZONE F">NIGERIA ZONE F</option> 
                          <option value="NIGERIA ZONE G">NIGERIA ZONE G</option> 
                          <option value="NIGERIA ZONE H">NIGERIA ZONE H</option> 
                          <option value="NIGERIA ZONE I">NIGERIA ZONE I</option> 
                          <option value="NIGERIA ZONE J">NIGERIA ZONE J</option>
                          <option value="NIGERIA ZONE K">NIGERIA ZONE K</option> 
                          <option value="NIGERIA ZONE L">NIGERIA ZONE L</option> 
                          <option value="UK ZONE A">UK ZONE A</option> 
                          <option value="UK ZONE B">UK ZONE B</option> 
                          <option value="GHANA ZONE A">GHANA ZONE A</option> 
                          <option value="GHANA ZONE B">GHANA ZONE B</option> 
                          <option value="SOUTH AFRICA ZONE A">SOUTH AFRICA ZONE A</option>
                          <option value="SOUTH AFRICA ZONE B">SOUTH AFRICA ZONE B</option>
                          <option value="SOUTH AFRICA ZONE C">SOUTH AFRICA ZONE C</option>
                          <option value="SOUTH AFRICA ZONE D">SOUTH AFRICA ZONE D</option>
                          <option value="SOUTH AFRICA ZONE E">SOUTH AFRICA ZONE E</option>
                          <option value="KENYA ZONE">KENYA ZONE</option> 
                          <option value="USA GROUP 1">USA GROUP 1</option>
                          <option value="USA GROUP 2">USA GROUP 2</option>
                          <option value="USA GROUP 3">USA GROUP 3</option>
                          <option value="USA GROUP 4">USA GROUP 4</option>
                          <option value="CAMEROON GROUP 1">CAMEROON GROUP 1</option>
                          <option value="CAMEROON GROUP 2">CAMEROON GROUP 2</option> 
                          <option value="UGANDA GROUP">UGANDA GROUP</option> 
                          <option value="BLW INTERNATIONAL MISSIONS">BLW INTERNATIONAL MISSIONS</option>  
                          <option value="SECOND TIER CHURCHES">SECOND TIER CHURCHES</option> 
												</select>												
											  </div>
											  <div class="input-field col s12">
                                                   <input id="chapter" name="chapter" type="text" class="">
                                                   <label for="chapter">Chapter</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="email" name="email" type="email" class="">
                                                   <label for="email">Email</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="phone" name="phone" type="number" min="0" class="">
                                                   <label for="phone">Phone</label>
                                               </div>
                                               <div class="input-field col s12" style="display:none;">
                                                   <input id="password2" name="password" value="default" type="password" class="">
                                                   <label for="password2">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   <a href="<?php echo base_url();?>" class="waves-effect waves-grey btn-flat">Sign in</a>
                                                   <button type="submit" class="waves-effect waves-light btn teal" id="regBtn">Sign Up</button>
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
		
        