<?php
if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    $prd_accessories = $_POST['prd_accessories'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_new = $_POST['prd_new'];
    $prd_image = $_FILES['prd_image']['name'];
    $tmp_name = $_FILES['prd_image']['tmp_name'];
    $file_ext=strtolower(end(explode('.',$prd_image)));
      
    $expensions= array("jpg","png");
      
    // if(in_array($file_ext,$expensions)== false){
    //      $errors="Không chấp nhận định dạng ảnh này, mời bạn chọn JPG hoặc PNG.";
    // }
    $cat_id = $_POST['cat_id'];
    $prd_status = $_POST['prd_status'];
    if(isset($_POST['prd_featured'])){
        $prd_featured = 1;
    }else {
        $prd_featured = 0;
    }
    $prd_details = $_POST['prd_details']; 
    // if(empty($errors)==true){
        move_uploaded_file($tmp_name, 'img/products/'.$prd_image);
    //  }
    //  else{
    //     echo $errors;
    //  }
    
    $sql = "INSERT INTO product(prd_name, prd_price, prd_warranty, prd_accessories, 
    prd_promotion, prd_new, prd_image, cat_id, prd_status, prd_featured, prd_details)
			VALUES('$prd_name', '$prd_price', '$prd_warranty', '$prd_accessories', 
            '$prd_promotion', '$prd_new', '$prd_image', '$cat_id', '$prd_status', 
            '$prd_featured', '$prd_details')";
    $query = mysqli_query($conn, $sql);
   
    header("location: index.php?page_layout=product");     
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required name="prd_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required name="prd_price" type="number" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required name="prd_warranty" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input required name="prd_accessories" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input required name="prd_promotion" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required name="prd_new" type="text" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input required name="prd_image" type="file" id="prd_image">
                            <br>
                            <div>
                                <img id ="url">
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files["0"]) {
                                            var reader = new FileReader(); 
                                            // Gán giá trị thuộc tinh src bằng đường dẫn của file upload  
                                            reader.onload = function(e) {    
                                                $('#url').attr('src', e.target.result);
                                            }
                                            // Đọc file nhập vào, biến read sẽ là URL đại diện cho đường dẫn 
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $('#prd_image').change(function() {
                                        readURL(this);
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                $sql_cat = "SELECT*FROM category ORDER BY cat_id ASC";
                                $query_cat = mysqli_query($conn,$sql_cat);
                                while($row_cat = mysqli_fetch_array($query_cat)){
                                ?>
                                <option value="<?php echo $row_cat['cat_id']?>"><?php echo $row_cat['cat_name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option value=1 selected>Còn hàng</option>
                                <option value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                            <script>CKEDITOR.replace( 'prd_details'); </script>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>
<!--/.main-->