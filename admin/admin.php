<?php
if (!defined("security")) {
	die("Bạn không có quyền truy cập");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Điện lạnh Tuấn Bảo</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/styles.css" rel="stylesheet">
<script src="ckeditor/ckeditor.js"></script>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script> s
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><span>Tuấn Bảo </span>Store</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
								 <?php 
								 $mail = $_SESSION['mail'];
								 $pass = $_SESSION['pass'];
								$sql = "SELECT * FROM employeei WHERE user_mail='$mail' AND user_pass='$pass'";
								$query = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($query);

								if ($row['user_level'] == 0) {echo "Admin";} elseif($row['user_level'] == 2) {echo "Member";}else{echo "Manager";} ?> 
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="#"><svg class="glyph stroked male-user"></svg>Đổi mật khẩu</a></li>
									<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">


		<ul class="nav menu">
			<?php 
			if($row['user_level']==1){ ?>
			<li class="<?php if(!isset($_GET['page_layout'])){echo "active";} ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<?php }
			?>
			<?php if($row['user_level']==1){ ?>
			<li class="<?php if($_GET['page_layout'] == 'user' || $_GET['page_layout'] == 'edit_user' || $_GET['page_layout'] == 'add_user'){echo 'active';}?>"><a href="index.php?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<?php } ?>
			<?php if($row['user_level']==1){ ?>
			<li class="<?php if($_GET['page_layout'] == 'category' || $_GET['page_layout'] == 'edit_category' || $_GET['page_layout'] == 'add_category'){echo 'active';} ?>"><a href="index.php?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<?php } ?>
			<?php if($row['user_level']==1){ ?>
			<li class="<?php if($_GET['page_layout'] == 'brand' || $_GET['page_layout'] == 'edit_brand' || $_GET['page_layout'] == 'add_brand'){echo 'active';} ?>"><a href="index.php?page_layout=brand"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý thương hiệu</a></li>
			<?php } ?>
			
			<?php if($row['user_level']==1 || $row['user_level']== 2){ ?>
			<li class="<?php if($_GET['page_layout'] == 'product' || $_GET['page_layout'] == 'edit_product' || $_GET['page_layout'] == 'add_product'){echo 'active';} ?>"><a href="index.php?page_layout=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<?php }?>
			<?php if($row['user_level']==1 || $row['user_level']== 2){ ?>
			<li class="<?php if($_GET['page_layout'] == 'comment'){echo 'active';} ?>"><a href="index.php?page_layout=comment"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg>Quản lý bình luận</a></li>
			<?php }?>
			<?php if($row['user_level']==1 || $row['user_level']== 2){ ?>
			<li class="<?php if($_GET['page_layout'] == 'order'||$_GET['page_layout'] == 'order_details'){echo 'active';} ?>"><a href="index.php?page_layout=order"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý đơn hàng</a></li>
			<?php } ?>
			<?php if($row['user_level']==1 || $row['user_level']== 2){ ?>
			<li class="<?php if($_GET['page_layout'] == 'ship'||$_GET['page_layout'] == 'ship_details'){echo 'active';} ?>"><a href="index.php?page_layout=ship"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý giao hàng</a></li>
			<?php } ?>
		
			<?php if($row['user_level']==1){ ?>
            <li class="<?php if($_GET['page_layout'] == 'statistical'||
            $_GET['page_layout'] == 'bill_week'||$_GET['page_layout'] == 'bill_month'||$_GET['page_layout'] == 'bill_year'){echo 'active';} ?>"><a href="index.php?page_layout=statistical"><svg class="glyph stroked open folder"><use xlink:href="#stroked-chain"/></svg>Thống kê</a></li>
            <?php } ?>
			<!-- <li><a href="ads.html"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->
		</ul>

	</div><!--/.sidebar-->
		
	<!-- master page logout -->
	<?php

	if(isset($_GET['page_layout'])){
		switch($_GET['page_layout']){
		
			case 'user': include_once("user.php");break;
			case 'edit_user': include_once("edit_user.php");break;
			case 'add_user': include_once("add_user.php");break;
		
			case 'category': include_once("category.php");break;
			case 'edit_category': include_once("edit_category.php");break;
			case 'add_category': include_once("add_category.php");break;

			case 'brand': include_once("brand.php");break;
			case 'edit_brand': include_once("edit_brand.php");break;
			case 'add_brand': include_once("add_brand.php");break;
			
			case 'product': include_once("product.php");break;
			case 'edit_product': include_once("edit_product.php");break;
			case 'add_product': include_once("add_product.php");break;
		
			case 'comment': include_once("comment.php");break;
		
			case 'statistical': include_once("statistical.php");break;
			case 'bill_option': include_once("statis_option/bill_option.php");break;
			case 'cat_option': include_once("statis_option/cat_option.php");break;
			case 'prd_option': include_once("statis_option/prd_option.php");break;
			case 'bill_month': include_once("statis_option/bill_month.php");break;
			case 'bill_week': include_once("statis_option/bill_week.php");break;
			case 'bill_year': include_once("statis_option/bill_year.php");break;

			
			case 'order': include_once("bill.php");break;
			case 'order_details': include_once("bill_detail.php");break;
			case 'ship': include_once("ship.php");break;
			case 'ship_details': include_once("ship_details.php");break;
			case 'xuly': include_once("xuly.php");break;
		}
	}else{
		include_once("dashboard.php");
	}

	?>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/bootstrap-table.js"></script>
</body>

</html>


