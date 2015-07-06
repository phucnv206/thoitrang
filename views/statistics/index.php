<?php
$this->title = 'Thống kê';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="dashboard-index">
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Số lượng danh mục</td>
                    <td><?=$cateCount ?></td>
                </tr>
                <tr>
                    <td>Số lượng sản phẩm</td>
                    <td><?=$productCount ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Tổng lượt truy cập</td>
                    <td><?=$userCount ?></td>
                </tr>
                <tr>
                    <td>Đang online</td>
                    <td><?=$onlineCount ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
