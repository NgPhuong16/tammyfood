<div class="page-header ">

			<div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

			<!-- Breadcrumb start -->
			<ol class="breadcrumb d-md-flex d-none">
				<li class="breadcrumb-item">
					<i class="bi bi-house"></i>
					<a href="index.php?type=home">Home</a>
				</li>
				<li class="breadcrumb-item breadcrumb-active" aria-current="page"><?php if(isset($_GET['type'])){ echo $_GET['type'];}else{echo 'home';}?></li>
			</ol>
			<!-- Breadcrumb end -->
			<!-- Header actions ccontainer start -->
			<div class="header-actions-container">

				<!-- Search container start -->
				<div class="search-container">
				</div>
				<!-- Search container end -->
				<!-- Header actions start -->
				<ul class="header-actions">
					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="d-none d-md-block"><?php if(isset($_SESSION['user'])){
                switch ($_SESSION['user']['idRole_user']) {
                  case 2:
                    echo '<strong>Nhân viên: '.$_SESSION['user']['fullName'].'</strong> ';
                    break;
                    case 3:
                      echo '<strong>Chủ quán: '.$_SESSION['user']['fullName'].'</strong> ';
                      break;
                      case 4:
                        echo '<strong>Admin: '.$_SESSION['user']['fullName'].'</strong> ';
                        break;
                  default:
                    # code...
                    break;
                }

              }  ?> </span>
							<span class="avatar">
								<img src="public/assets/images/user.png" alt="Admin Templates">
								<span class="status online"></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
							<div class="header-profile-actions">
								<!-- <a href="profile.html">Profile</a> -->
								<!-- <a href="account-settings.html">Settings</a> -->
								<a href="index.php?type=home&logout=request">Logout</a>
							</div>
						</div>
					</li>
				</ul>
				<!-- Header actions end -->

			</div>
			<!-- Header actions ccontainer end -->

		</div>