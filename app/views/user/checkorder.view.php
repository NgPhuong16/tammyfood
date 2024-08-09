<div class="d-flex justify-content-center mt-5  "><h1 class="title">Theo dõi đơn hàng</h1></div>
<div class="table-responsive">
										<table class="table table-danger table-striped table-bordered v-middle">
											<thead>

												<tr>
													<th class="col-1">Mã đơn</th>
													<th class="d-none col-2 d-md-table-cell">Khách hàng</th>
													<th class="col-1">Phòng</th>
													<th class="col-1 text-danger">Thực thu</th>
													<th class="d-none col-2 d-md-table-cell">SĐT</th>
													<th class="col-2">Trạng thái</th>
													<th class="col-2">Giao hàng</th>
													<th class="col-1">Ca giao</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($seeOrdersByDateAndShift2 as $key => $value) {
													echo '
                                                        <tr>
														<td class="">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">' . $value['id_order'] . '</div>
																</div>
															</div>
														</td>
														<td class="d-none col-3 d-md-table-cell">
															<div class="media-box">
																<div class="media-box-body">
																	<div class="text-truncate">' . $value['fullName'] . '</div>
																</div>
															</div>
														</td>
														<td class="">' . $value['address_order'] . '</td>
														<td class="">' . number_format($value['total_order'], 0, ',', '.') . '₫</td>
														<td class="d-none col-2 d-md-table-cell">' . $value['phone_order'] . '</td>
														<td class="">';
													if ($value['status_order'] == 1) {
														echo '
															<span class="text-red"><i class="bi bi-x-circle-fill"></i> ' . $value['nameStatus'] . '</span>
                                                           ';
													} else {
														echo '
															<span class="text-green"><i class="bi bi-check-circle-fill"></i> ' . $value['nameStatus'] . '</span>
                                                           ';
													}
													echo '</td>
                                                    <td class="">
															' . $value['nameDelivery'] . '
														</td>
                                                    <td class="">
															' . $value['nameShift'] . '
														</td>
													</tr>
													<tr>
													<td colspan="6">
														<table class="table table-primary table-striped table-bordered  v-middle">
											<tr>
												<th class="text-danger col-5">Món</th>
												<th class="text-danger col-4">Số lượng</th>
												<th class="text-danger col-3">Giá</th>
											</tr>
											';
													$getOrderDetailByIdOrder = getOrderDetailByIdOrder($value['id_order']);
													foreach ($getOrderDetailByIdOrder as $key1 => $value1) {
														$getAddonByIdOrderdetail = getAddonByIdOrderdetail($value1['id_orderdetail']);
														echo '
												<tr>
													<th class="">' . $value1['nameProduct'] . '';
														if (count($getAddonByIdOrderdetail) > 0) {
															echo '***(';
															foreach ($getAddonByIdOrderdetail as $key2 => $value2) {
																echo $value2['name_addon'] . ',';
															}
															echo ')';
														}
														echo '</th>
													<th class="">' . $value1['quantity'] . '</th>
													<th class="">' . number_format($value1['total_orderdetail'], 0, ',', '.') . '₫</th>
												</tr>
												';
													}
													echo '
										</table>
														
														</td>
													</tr>
                                                        ';
												?>

												<?php
												}
												?>
											</tbody>
										</table>
									</div>