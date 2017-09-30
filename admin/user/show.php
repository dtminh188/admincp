<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/functions/dbconnect.php';
$record_per_page = 5;
$page   = '';
$output = '';

if (isset($_POST['page'])) {
	$page = $_POST['page'];
} else {
	$page = 1;
}

$start_from = ($page -1)*$record_per_page;
$query      = "SELECT * FROM users LIMIT $start_from,$record_per_page";
$result     = $mysqli->query($query);
$output    .= '
<table class="table table-hover table-sm table-striped">
	<thead>
		<tr>
			<th width="10%">#</th>
			<th width="25%">Tài khoản</th>
			<th width="30%">Họ tên</th>
			<th width="20%">Vị trí</th>
			<th width="15%">Chức năng</th>
		</tr>
	</thead>
<tbody>
';

while ($arUser = mysqli_fetch_assoc($result)) {
	$output .= '
					<tr>
                      <th scope="row">'.$arUser['id'].'</th>
                      <td scope="row">'.$arUser['username'].'</td>
                      <td scope="row">'.$arUser['fullname'].'</td>
                      <td scope="row">'.$arUser['position'].'</td>
                      <td scope="row" class="center">
                        <a href="edit.php?id='.$arUser['id'].'" title="" class="px-1 btn btn-sm btn-outline-primary"><i class="fa fa-edit "></i> Sửa</a>
                        <a href="delete.php?id='.$arUser['id'].'" title="" class="px-1 btn btn-sm btn-outline-danger"><i class="fa fa-pencil"></i> Xóa</a>

                      </td>
                    </tr>
	';
}

$output .= '
		</tbody>
    </table>
';


$page_query    = "SELECT * FROM users";
$page_result   = $mysqli->query($page_query);
$total_records = mysqli_num_rows($page_result);
$total_page    = ceil($total_records/$record_per_page);
$output .= '
	<div class="row">
              <div class="col-sm-6 offset-sm-6">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                  <ul class="pagination pagination-sm" style="float: right">
                  <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
';

for ($i=1; $i <= $total_page; $i++) { 
	$output .= '
		<li class="page-item"><span class="page-link" id="'.$i.'">'.$i.'</span></li>
	';
}
$output .= '
	<li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
';
echo $output;
?>