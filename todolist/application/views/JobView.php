<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png');?>">
  <link rel="icon" type="image/png" href="<?=  base_url('assets/img/favicon.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Todolist Web by SGU
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="<?= base_url('assets/css/material-dashboard.css?v=2.1.2');?>" rel="stylesheet" />
  <link href="<?= base_url('assets/demo/demo.css');?>" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>
<body class="">
  <div class="wrapper ">
          <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Todolist Website</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="padding-top: 70px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Used Space1</p>
                  <h3 class="card-title">49/50
                    <small>GB</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Revenue</p>
                  <h3 class="card-title">$34,245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Fixed Issues</p>
                  <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Followers</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Public Tasks</h4>
                  <p class="card-category">Task for all Users</p>
                  <div class="btn btn-round btn-fill btn-info" 
                  style="height: 38px;
                        float: right;
                        margin-left: 1%;" id = "newTaskbtnPublic">
                      Thêm thẻ mới</div>
                  <input type="text" class="form-control" 
                  style="width: 200px;
                          float: right;
                          color: white;"
                  placeholder="Nhập tên thẻ" id = "newTasktxtPublic">
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile" style="overflow-y:scroll; height: 280px;">
                      <table class="table">
                        <tbody>
                          <!-- o day -->
                          <?php
                            foreach ($jobList as $row)
                            {
                            if($row['job_type'] == 1)  
                            {     
                            ?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input cbTaskPublic" type="checkbox" value="" anlong="<?= $row['job_id'] ?>" 
                                  <?php 
                                    if($row['job_status'] == 0)
                                    {
                                      echo "unchecked";
                                    } else {
                                      echo "checked";
                                    }
                                  ?> >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td class="endDateformatPublic">
                              <?php 
                                $controller::formatEnddate($row['job_enddate'],$row['job_status']);
                                ?>
                            </td>

                            <td>
                              <?= $row['job_name'] ?>
                            </td>

                            <td>
                              <?= $row['nv_firstname'].' '.$row['nv_lastname']?>
                            </td>

                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm editBtnPublic" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm deleteBtnPublic" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          
                          <?php }} ?>   
                          <!--ket thuc day  -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                        <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Employees Stats</h4>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          <!-- o day private -->
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>  
                           <!-- ket huc private -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>             
          </div>
      </div>

<!-- Modal Edit -->
<div class="modal fade editModalPublic" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Tiêu đề Hộp thoại</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                Trình bày các thành phần của Hộp thoại ở đây
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu lại</button>
            </div>
            
        </div>
    </div>
</div>
<!-- End of Modal edit -->
  <?php include (APPPATH.'controllers/AjaxController.php') ?>
</body>

</html>