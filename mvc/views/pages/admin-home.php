<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/CSS/bootstrap.min.css">
    <script type="text/javascript" src="../../../public/JS/bootstrap.bundle.js"></script>
    <title></title>
</head>
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <section class="col-lg-6 connectedSortable pt-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-info p-2">
                                <div class="inner">
                                    <h3 id="total_users"><?=count($data['ListUser']);?></h3>
                                    <p>Tổng thành viên</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-success text-light p-2">
                                <div class="inner">
                                    <h3 id="total_accounts">
                                        <?=count($data['ListProduct']);?>
                                    </h3>
                                    <p>Sản phẩm đang bán</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-store"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-success text-light p-2">
                                <div class="inner">
                                    <h3 id="total_accounts">
                                        <?=$data['soLuongHangTonKho'];?>
                                    </h3>
                                    <p>Sản phẩm hàng tồn kho</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-store"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-success text-light p-2">
                                <div class="inner">
                                    <h3 id="total_accounts">
                                        <?=$data['soLuongHangDangXuLy'];?>
                                    </h3>
                                    <p>Số đơn hàng đang xử lý</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-store"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
               
                
            </div>
            <!-- /.content -->
    </div>




    


</body>
</html>

