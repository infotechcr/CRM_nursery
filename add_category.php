<?php include_once 'header.php'; include_once 'query.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="cate_form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name:</label>
                    <input type="text" class="form-control" id="cat_name" placeholder="Enter category name" >
                  </div>
                </div>
                <!-- /.card-body -->
               </form>
                <div class="card-footer">
                  <button class="btn btn-primary" id="add_cat" value="Add">Submit</button>
                </div>
            
            </div>
            <!-- /.card -->
          </div>
        </div>
         <div class="col-md-12 px-0">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Cat Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody id="display_cat_data">
                  <?php while($cat_row = mysqli_fetch_assoc($category_data)){ ?>
                    <tr>
                      <td><?php echo $cat_row['cat_id']; ?></td>
                      <td><?php echo $cat_row['cat_name']; ?></td>
                      <td><a href="#">Edit</a></td>
                      <td><a href="#">update</a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once 'footer.php'; ?>
<script>
	$(document).ready(function(){
    
		$('#add_cat').click(function(){
			
			var cat_data = $('#cat_name').val();

			$.ajax({
				type:"post",
				url:"add_cat_ajax.php",
				data:{"cat_name":cat_data},

				success:function(res){
					$('#display_cat_data').html(res);
          $('#cat_name').val("");

				}
			})
		})
	})
</script>

<style>
  .dt-buttons{
    justify-content:center
  }
  .dt-buttons button{
    margin:3px;
    border-radius:0px;
  }
</style>

