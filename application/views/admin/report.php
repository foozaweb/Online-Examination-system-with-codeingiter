<main class="mn-inner ">
                <div class="middle-content">
				<div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Exam Report</span>
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
										Date
										</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">
										Score
										</th>
										</tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
									<?php 
									foreach($exam as $real){
										$query = $this->db->get_where('data_capture', array('dc_id' => $real['user_id']));
										$getUser = $query->row_array();
										$searchVal = array("STCP", "STCC", "ZS", "ZD", "GP", "CP", "GraduatePastor", "ACP", "FC", "PCF", "Cell", "BSCT", "Choir", "DnD", "VM", "MEMBER", "Ushering", "Media");

										$replaceVal = array("2nd tier Church Pastors", "2nd tier Church Coordinators", "ZONAL SECRETARIES", "ZONAL DIRECTORS", "Group Pastors", "Chapter Pastors", "Graduate Pastors", "Assistant Chapter Pastors", "Fellowship coordinators", "PCF Leaders", "Cell Leaders", "Bible Study Class Teachers", "Choir Members", "Dance and Drama Members", "Venue managers", "MEMBERS", "Ushers", "media Team");

									?>
                                    <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $getUser['userTitle'].' '.$getUser['name'];?></td>
                                            <td><?php echo str_replace($searchVal, $replaceVal, $getUser['designation']);?></td>
                                            <td><?php echo str_replace('-',' ',$getUser['zone']);?></td>
                                            <td><?php echo str_replace('-',' ',$getUser['chapter']);?></td>
                                            <td>
											<?php 
											echo date('d M,y H:m:i', $real['start']);
											?>
											</td>
                                            <td>
											<?php echo $real['score'].'%';?>
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