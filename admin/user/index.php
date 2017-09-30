<!-- header -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php' ?>
<!-- end header -->
<!-- Link Bar -->
<div class="breadcrumb-holder">   
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/">Trang chủ</a></li>
      <li class="breadcrumb-item active">Quản lý người dùng</li>
    </ul>
  </div>
</div>
<!-- cotent -->
<section class="forms">
  <div class="container-fluid">
    <header> 
      <h1 class="h3">Quản lý người dùng</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-block">
            <div class="row align-items-center">
              <div class="col-lg-6" style="margin-bottom: 0px">
                <div class="form-group">
                  <a href="" class="btn btn-primary btn-sm">Thêm</a>
                </div>
              </div>
              <div class="col-lg-6" style="margin-bottom: 0px">
                <form class="form-inline" style="float: right;" >
                  <div class="form-group">
                    <label for="inlineFormInputGroup" class="sr-only">Username</label>
                    <input id="inlineFormInputGroup" type="text" placeholder="Nhập từ khóa cần tìm..." class="mx-sm-3 form-control form-control-sm" style="width: 300px">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Tìm kiếm" class="btn btn-warning btn-sm">
                  </div>
                </form>
              </div>
            </div>  
            
            <!-- table -->
            <div id="showUser">

            </div>
            
          </div>
        </div>
      </div>
      <!-- end table -->
      <script>
        $(document).ready(function() {
          load_data();
          function load_data(page) {
            $.ajax({
              url:"show.php",
              method:"POST",
              data:{page:page},
              success:function(data) {
                $('#showUser').html(data);
              } 
            })
          }
          $(document).on('click','.page-item',function() {
            var page = $(this).attr("id");
          })
        });

      </script>
    </div>
  </div>
</section>

<!-- footer -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php' ?>
<!-- end footer