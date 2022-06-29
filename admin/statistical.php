 <?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Thống kê</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tùy chọn thống kê</h1>
        </div>
    </div>
    <!-- table -->
    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">
        
                <div class="panel-body">
                <div id="toolbar" class="btn-group">
<a href="index.php?page_layout=bill_week" class="btn btn-success">
     7 ngày vừa qua
</a>
</div>  <div id="toolbar" class="btn-group">
<a href="index.php?page_layout=bill_month" class="btn btn-primary">
     1 tháng vừa qua
</a>
</div>  <div id="toolbar" class="btn-group">
<a href="index.php?page_layout=bill_year" class="btn btn-warning">
     1 năm vừa qua
</a>
</div>

                </div>
            </div>
        </div>
    </div>



<!--/.row-->        

