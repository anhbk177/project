<?php
$user_id = $_GET['user_id'];
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM employeei WHERE user_id = $user_id"));
if(isset($_POST['sbm'])){
    $user_mail=$_POST['user_mail'];
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $user_re_pass=$_POST['user_re_pass'];
    $user_level=$_POST['user_level'];
    if($user_pass!=$user_re_pass){ $err1='<div class="alert alert-danger">Mật khẩu không khớp !</div>';}
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_mail='".$user_mail."'" )) >0 && $user_mail!=$row['user_mail'] ){
        $err2 = '<div class="alert alert-danger">Email đã tồn tại !</div>';
    }else{$sql="UPDATE user 
    SET user_full='$user_full', user_mail='$user_mail', user_pass='$user_pass',user_level='$user_level' WHERE user_id=$user_id ";
   $query=mysqli_query($conn,$sql);
   header('location: index.php?page_layout=user');
}}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Sửa thông tin thành viên</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row['user_name']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                  <?php  if(isset($err1)){echo $err1;}
                         elseif(isset($err2)){echo $err2;}
                         ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_name" required class="form-control" value="<?php echo $row['user_name']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" required value="<?php echo $row['user_mail']; ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option <?php if($row['user_level']==1){echo 'selected';} ?> value=1>Admin</option>
                                        <option <?php if($row['user_level']==2){echo 'selected';} ?> value=2>Member</option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
	</div>	<!--/.main-->