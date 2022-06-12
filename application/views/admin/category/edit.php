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
              <li class="breadcrumb-item"><a href="<?php echo base_url().'index.php/admin/category/index'?>">Category</a></li>
              <li class="breadcrumb-item active">Edit</li>  
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
            <div class="card card-primary" >
              <div class="card-header ">
                  <div class="card-title ">
                      Edit  Category <?php //echo $category['name'];?>
                  </div>
                </div>
                <form action="<?php echo base_url().'index.php/admin/category/edit/'.$category['id'].'' ?>" method="post" name="categoryForm" id="categoryForm">
                
                  <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $category['name'];?>" class="form-control" <?php echo (form_error('name') != "" ) ? 'is-invalid':''; ?> />  
                        <?php echo form_error('name'); ?>
                      </div> 
                      <div class="form-group">
                        <label>Image</label><br>
                        <input type="file" name="image" id="image" value="<?php echo $category['image']; ?>"/><br><br>
                        <?php// echo(!empty($error_image))? $error_image :"" ?>
                        <?php if($category['image']!='' && file_exists('./public/uploads/category/'.$category['image'])){?>
                          <img src="<?php echo base_url().'public/uploads/category/'.$category['image']?>" />
                       <?php } else{?>
                        
                        <img src="<?php echo base_url().'public/uploads/category/default-avatar.png'?>" width="`100px" height="100px" align="center"/>
                        
                       <?php }
                        ?>
                        
                      </div>
                      <?php if($category['status']=='1'){?> 
                      <div class="custom-control custom-radio float-left ">
                          <input class="custom-control-input" value="1" type="radio" id="active" name="status" checked>
                          <label for="active" class="custom-control-label">Active</label>
                        </div>
                        <div class="custom-control custom-radio float-left ">
                          <input class="custom-control-input" value="0" type="radio" id="active" name="status" >
                          <label for="block" class="custom-control-label">Block</label>
                        </div>
                        
                        <?php } else {?>
                          <div class="custom-control custom-radio float-left ">
                          <input class="custom-control-input" value="1" type="radio" id="active" name="status" >
                          <label for="active" class="custom-control-label">Active</label>
                        </div>
                      <div class="custom-control custom-radio float-left ml-3">
                      <?php  ?>
                          <input class="custom-control-input" value="1" type="radio" id="block" name="status" checked>
                          <label for="block" class="custom-control-label">Block</label>
                          <?php } ?>
                      </div>
                      
                   
                    <div class="card-footer">
                      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                      <a href="<?php echo base_url().'index.php/admin/category/index'?>" class="btn btn-secondary">Back</a>
                    </div>
                    </div>
                </from>
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
</body>
</html>
