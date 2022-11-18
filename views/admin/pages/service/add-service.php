<?php  require_once 'views/admin/partials/header.php' ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm dịch vụ</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thêm dịch vụ</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputName">Tên dịch vụ</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Tên dịch vụ" require>
                </div>
                <div class="form-group">
                  <label for="exampleInputType">Loại dịch vụ</label>
                  <input type="text" class="form-control" id="exampleInputType" placeholder="Loại dịch vụ" require>
                </div>
                <div class="form-group">
                  <label for="exampleInputPrice">Giá</label>
                  <input type="number" class="form-control" id="exampleInputPrice" min="0" placeholder="Giá dịch vụ" require>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </section>
</div>
<?php  require_once 'views/admin/partials/footer.php' ?>