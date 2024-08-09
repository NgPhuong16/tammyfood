<div id="loading-wrapper">
	<div class="spinner">
		<div class="line1"></div>
		<div class="line2"></div>
		<div class="line3"></div>
		<div class="line4"></div>
		<div class="line5"></div>
		<div class="line6"></div>
	</div>
</div>
<!-- Loading wrapper end -->

<!-- Page wrapper start -->

	<!-- Sidebar wrapper start -->
	<nav class="sidebar-wrapper">

		<!-- Sidebar brand starts -->
		<div class="sidebar-brand">
			<a href="#" class="logo">
				<img src="public/assets/images/logo.svg" alt="Admin Dashboards" />
			</a>
		</div>
		<!-- Sidebar brand starts -->

		<!-- Sidebar menu starts -->
		<div class="sidebar-menu">
			<div class="sidebarMenuScroll">
				<ul>
                    <?php
                         if(isset($_SESSION['user'])){
                            switch ($_SESSION['user']['idRole_user']) {
                              case 2:
                                echo ' 
                                <li class="sidebar-dropdown">
						<a href="#">
							<i class="bi bi-handbag"></i>
							<span class="menu-text">Giao hàng</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="orders.html">Cập nhật tiến độ</a>
								</li>
								<li>
									<a href="index.php?type=order&type1=ordertoday">Đơn hàng của quán</a>
								</li>
								<li>
									<a href="index.php?type=order&type1=his">Lịch sử đơn ship</a>
								</li>
								<li>
									<a href="index.php?type=order">Phê duyệt giao hàng</a>
								</li>
								<li>
									<a href="index.php?type=takeorder">Nhận đơn hôm nay</a>
								</li>
							</ul>
						</div>
					</li>
                                ';
                                break;
                                case 3:
                                  echo '
					<li class="sidebar-dropdown">
						<a href="#">
							<i class="bi bi-handbag"></i>
							<span class="menu-text">Quản lý đơn hàng</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="index.php?type=order1&type1=orderlist&id='.$_SESSION['user']['belongTo'].'">Lịch sử đơn hàng</a>
								</li>
								<li>
									<a href="index.php?type=order&type1=order">Phê duyệt đơn hàng</a>
								</li>
								<li>
									<a href="index.php?type=order&type1=order1">Đơn hàng hôm nay</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="sidebar-dropdown">
						<a href="#">
							<i class="bi bi-handbag"></i>
							<span class="menu-text">Quản lý món ăn</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="index.php?type=product&type1=addproduct">Thêm món ăn</a>
								</li>
								<li>
									<a href="index.php?type=product&type1=productlist&id='.$_SESSION['user']['belongTo'].'">Danh sách món ăn</a>
								</li>
							</ul>
						</div>
					</li>
					
                                  ';
                                  break;
                                  case 4:
                                    echo '
					<li class="sidebar-dropdown">
						<a href="#">
							<i class="bi bi-handbag"></i>
							<span class="menu-text">Quản lý món ăn</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="index.php?type=product&type1=addproduct">Thêm món ăn</a>
								</li>
								<li>
									<a href="index.php?type=addoncate">Danh mục lựa chọn</a>
								</li>
								<li>
									<a href="index.php?type=product">Danh sách món ăn</a>
								</li>
							</ul>
						</div>
					</li>
                    <li class="sidebar-dropdown">
						<a href="#">
							<i class="bi bi-handbag"></i>
							<span class="menu-text">Quản lý đơn hàng</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="index.php?type=order">Lịch sử đơn hàng</a>
								</li>
								<li>
									<a href="index.php?type=order1">Đơn hàng hôm nay</a>
								</li>
								<li>
									<a href="index.php?type=order&type1=confirm">Giao đơn cho ship</a>
								</li>
							</ul>
						</div>
					</li>
                    <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-handbag"></i>
                        <span class="menu-text">Quản lý quán ăn</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="index.php?type=shop&type1=addshop">Thêm quán</a>
                            </li>
                            <li>
                                <a href="index.php?type=shop">Danh sách quán</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-handbag"></i>
                        <span class="menu-text">Quản lý ca giao</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="index.php?type=shift">Danh sách ca giao</a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-handbag"></i>
                        <span class="menu-text">Quản lý tài khoản</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="index.php?type=user&type1=adduser">Thêm tài khoản</a>
                            </li>
                            <li>
                                <a href="index.php?type=user">Danh sách tài khoản</a>
                            </li>
                        </ul>
                    </div>
                </li>
                                    ';
                                    break;
                              default:
                                break;
                            }
            
                          }
                    ?>
					
                    
                   
                    
					
					
					
				</ul>
			</div>
		</div>
		<!-- Sidebar menu ends -->

	</nav>