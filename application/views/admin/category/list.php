<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Codeigniter Web Application</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php $this->load->view('admin/header');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>  
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <?php if($this->session->flashdata('success')!=""){?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php }?>

                <?php if($this->session->flashdata('error')!=""){?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php }?>
            <div class="card" >
              <div class="card-header">
                  <div class="card-title">
                      <form id="searchFrm"  name="searchFrm" mathod="get" action="">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="q" class="form-control float-right" placeholder="Search" value=<?php echo $queryString; ?>>
     
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-tools">
                      <a href="<?php echo base_url().'index.php/admin/category/create'?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Status</th>
                              <th class="text-center">Action</th>
                          </tr>
                           
                          
                          <?php if(!empty($categories)){?>
                            <?php foreach($categories as $categoryRow){ ?>
                            
                            <tr>
                              <td><?php echo $categoryRow['id'] ?></td>
                              <td><?php echo $categoryRow['name'] ?></td>
                              <td><?php if($categoryRow['status'] == 1){?>
                                <span class="badge badge-success">Active</span>
                               <?php }else{?>
                                <span class="badge badge-danger">Inactive</span>
                              <?php } ?></td>
                              <td class="text-center">
                                  <a href="<?php echo base_url().'index.php/admin/category/edit/'.$categoryRow['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
                                  <a href="javascript:viod(0);" onclick="deleteCategory(<?php echo $categoryRow['id']; ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                              </i> Delete</a>  
                              </td>
                          </tr>

                         <?php }
                          } else { 
                           ?>
                              <tr>
                              <td colspan="4">Record is not found</td>
                         </tr>
                           <?php }?>
                         
                      </table>
                  </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>public/admin/dist/js/adminlte.min.js"></script>
<script>
  function deleteCategory(id){
    if(confirm("Are sure you want to delete category?")) {
      window.location.href='<?php echo base_url().'index.php/admin/category/delete/';?>'+id;
      
    }

  }
  </script>
</body>
</html>

