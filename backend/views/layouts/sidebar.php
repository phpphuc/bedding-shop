<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo Yii::$app->homeUrl; ?>/images/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?= Yii::$app->user->identity->username; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <!--    <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-cogs"></i> <span>Cài đặt</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/config/update"><i class="far fa-circle"></i> Cấu hình website</a></li>
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/configs/index"><i class="far fa-circle"></i> Tùy chỉnh website</a></li>
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/menu/index?type=main"><i class="far fa-circle"></i> Menu chính</a></li>
                <!--                <li><a href="</?php echo Yii::$app->homeUrl; ?>/menu/index?type=left"><i class="far fa-circle"></i> Menu footer</a></li>
                <li><a href="</?php echo Yii::$app->homeUrl; ?>/menu/index?type=mobile"><i class="far fa-circle"></i> Menu mobile</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-book-open"></i> <span>Quản Lý Bài Viết</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/page/index"><i class="far fa-circle"></i> Bài Viết Đơn</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-user-edit"></i> <span>Lõi Giá Trị</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/camket/index"><i class="far fa-circle"></i> Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-user-md"></i> <span>Danh Mục đội ngũ</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/bacsi/index"><i class="far fa-circle"></i> Đội ngũ</a></li>
            </ul>
        </li>
        <!--        <li class="treeview">
            <a href="#">
                <i class="fas fa-hotel"></i> <span>Danh Mục Chi Nhánh</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<//?php echo Yii::$app->homeUrl; ?>/chinhanh/index"><i class="far fa-circle"></i> Chi nhánh</a></li>
            </ul>
        </li>-->
        <!--        <li class="treeview">
            <a href="#">
                <i class="fas fa-trophy"></i> <span>Cảm Nhận Khách Hàng</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<//?php echo Yii::$app->homeUrl; ?>/camnhan/index"><i class="far fa-circle"></i> Cảm nhận</a></li>
            </ul>
        </li>-->
        <li class="treeview">
            <a href="#">
                <i class="fas fa-book"></i> <span>Danh Mục Bài Viết</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/postscat/index"><i class="far fa-circle"></i> Danh Mục</a></li>
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/posts/index"><i class="far fa-circle"></i> Bài Viết</a></li>
            </ul>
        </li>
        <!--        <li class="treeview">
                    <a href="#">
                        <i class="fas fa-gifts"></i> <span>COMBO Khuyến mãi</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/comboscat/index"><i class="far fa-circle"></i> Danh mục</a></li>
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/combos/index"><i class="far fa-circle"></i> Combos</a></li>
                    </ul>
                </li>-->
        <li class="treeview">
            <a href="#">
                <i class="fas fa-cubes"></i> <span>Quản Lý Sản Phẩm</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/categorys/index"><i class="far fa-circle"></i> Danh Mục</a></li>
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/products/index"><i class="far fa-circle"></i> Sản Phẩm</a></li>
            </ul>
        </li>
        <!--                <li class="treeview">
                    <a href="#">
                        <i class="far fa-file-image"></i> <span>Quản Lý Thư Viện</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<//?php echo Yii::$app->homeUrl; ?>/thuvien/index"><i class="far fa-circle"></i> Album ảnh</a></li>
                    </ul>
                </li>-->
        <!--        <li class="treeview">
                    <a href="#">
                        <i class="fas fa-shopping-cart"></i> <span>Quản Lý Đơn Hàng</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/customers/index"><i class="far fa-circle"></i> Danh sách đơn hàng</a></li>
                    </ul>
                </li>-->
        <!--                <li class="treeview">
                            <a href="#">
                                <i class="far fa-file-image"></i> <span>Album Hình Ảnh</span>
                                <span class="pull-right-container">
                                    <i class="fas fa-angle-left"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="</?php echo Yii::$app->homeUrl; ?>/hoatdong/update"><i class="far fa-circle"></i> Hình ảnh</a></li>
                            </ul>
                        </li>-->
        <li class="treeview">
            <a href="#">
                <i class="far fa-images"></i> <span>Quản Lý SlideShow</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <!--                <li><a href="</?php echo Yii::$app->homeUrl; ?>/slideshowcat/index"><i class="far fa-circle"></i> Danh Mục</a></li>-->
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/slideshow/index"><i class="far fa-circle"></i> Hình ảnh</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="far fa-file-image"></i> <span>Quản Lý Mạng Xã Hội</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/gallery/index"><i class="far fa-circle"></i> Social</a></li>
            </ul>
        </li>
        <!--        <li class="treeview">
            <a href="#">
                <i class="fas fa-video"></i> <span>Quản Lý Videos</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<//?php echo Yii::$app->homeUrl; ?>/videoscat/index"><i class="far fa-circle"></i> Danh mục</a></li>
                <li><a href="<//?php echo Yii::$app->homeUrl; ?>/videos/index"><i class="far fa-circle"></i> Videos</a></li>
            </ul>
        </li>-->
        <!--        <li class="treeview">
                    <a href="#">
                        <i class="fas fa-users"></i> <span>Quản Lý Thành Viên</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/site/userlist"><i class="far fa-circle"></i> Danh sách</a></li>
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/site/signup"><i class="far fa-circle"></i> Thêm thành viên</a></li>
                    </ul>
                </li>-->
        <li class="treeview">
            <a href="#">
                <i class="fas fa-address-book"></i> <span>Quản Lý Lịch Hẹn</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/baogia/index"><i class="far fa-circle"></i> Hẹn thông thường</a></li>
                <!--                <li><a href="<//?php echo Yii::$app->homeUrl; ?>/khachhang/index"><i class="far fa-circle"></i> Hẹn với bác sĩ</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fas fa-user-lock"></i> <span>Quản Lý Mật Khẩu</span>
                <span class="pull-right-container">
                    <i class="fas fa-angle-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>/site/resetadmin"><i class="far fa-circle"></i> Đổi mật khẩu</a></li>
            </ul>
        </li>
        <!--        <li class="treeview">
                    <a href="#">
                        <i class="fas fa-users-cog"></i> <span>Phân Quyền</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/rbac/route"><i class="far fa-circle"></i> Quyền quản trị</a></li>
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/rbac/permission"><i class="far fa-circle"></i> Tạo nhóm quyền</a></li>
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/rbac/role"><i class="far fa-circle"></i> Tạo vai trò</a></li>
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/rbac/assignment"><i class="far fa-circle"></i> Gán quyền</a></li>
                    </ul>
                </li>-->
        <!--        <li class="treeview">
                    <a href="#">
                        <i class="fas fa-envelope-open-text"></i> <span>Đăng ký nhận tin</span>
                        <span class="pull-right-container">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="</?php echo Yii::$app->homeUrl; ?>/newsletter/default/list"><i class="far fa-circle"></i> Danh sách đăng ký</a></li>
                    </ul>
                </li>-->
    </ul>
</section>