<main class="mn-inner ">
                <div class="middle-content">
				<div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Users</span>
                                <p></p><br>
                                <table id="example" class="display responsive-table datatable-example dataTable" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 314px;">
										Name
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:149px;">
										Designation
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 46px;">
										Zone
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width:149px;">
										Chapter
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 128px;">
										Status
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">
										Action
										</th>
										</tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
									<?php
									// $this->db->limit('100');
									$query = $this->db->get('data_capture');
										foreach($query->result() as $getUser){
									?>
                                    <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $getUser->userTitle.' '.$getUser->name;?></td>
                                            <td><?php echo $getUser->designation;?></td>
                                            <td><?php echo $getUser->zone;?></td>
                                            <td><?php echo $getUser->chapter;?></td>
                                            <td>
											<?php 
											$online = $this->db->get_where('ffd_online', array('user' => $getUser->dc_id,'end' => null));
											if($this->db->affected_rows() > 0){
												echo 'online';
											}else{
												echo 'offline';
											}
											?>
											</td>
                                            <td>
											
											<a class="delUser" id="<?php echo $getUser->dc_id;?>" href="javascript:;"><i class="fa fa-trash"></i></a>
											&nbsp;&nbsp;&nbsp;&nbsp;
											<a class="showUserInfo" id="<?php echo $getUser->dc_id;?>" email="<?php echo $getUser->email;?>" phone="<?php echo $getUser->phone;?>" name="<?php echo $getUser->userTitle.' '.$getUser->name;?>" href="javascript:;"><i class="fa fa-phone"></i></a>
											
											</td>
                                        </tr>
									<?php }?>
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				</div>
			</div>