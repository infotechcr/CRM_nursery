<?php include_once 'header.php'; include_once 'query.php'; 

$today_date = date("Y-m-d");

$today_order_query = "SELECT product_order.* , user.* FROM `product_order` JOIN user on user.u_id=product_order.user_id GROUP BY product_order.bill_no";
$total_order = mysqli_query($con,$selected_order_query);

$today_collection_query = "SELECT * FROM `paid_amount` WHERE date = '$today_date'";
$today_payment_data = mysqli_query($con,$today_collection_query);


$today_payment=0;
$cash=0;
$online=0;

while($payment_row = mysqli_fetch_assoc($today_payment_data))
{
    $today_payment += $payment_row['amount'];

    if($payment_row['payment_mode']==4)
    {
        $cash += $payment_row['amount'];
    }

    if($payment_row['payment_mode']!=4)
    {
        $online += $payment_row['amount'];
    }
}



  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if($_SESSION['role']==1) { ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dasboard.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo @$count_today_order_data; ?></h3>

                <p>Today Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="view_order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                Today Collection:
                <hr>
                <h6> Cash : <?php echo @$cash; ?></h6>
                <hr>
                <h6> Online : <?php echo @$online; ?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo @$total_staff; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="view_staff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php }else{ ?>

<section class="content">
      <div class="container-fluid">
        <div class="row pt-4">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Customer info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name: <a href=""></a></label>
                                    <input type="text" class="form-control" name="p_name" placeholder="Full name" required id="c_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact_no:</label>
                                    <input type="text" class="form-control" name="p_contact_no" id="Contact_no" max="10" placeholder="Contact No" required>
                            </div>
                        </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address:</label>
                                    <input type="text" class="form-control" name="p_address" placeholder="Addresss" required id="c_address">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bill Date:</label>
                                    <input type="date" class="form-control" name="p_date" required id="todayDate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Wise Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th scope="col">NO</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">B-1 K-1</th>
                        <th scope="col">B-1 K-2</th>
                        <th scope="col">B-1 K-3</th>
                        <th scope="col">B-1 K-4</th>

                     </tr>
                  </thead>
                  <tbody class="text-left">
                    <?php $id=1; $index=0; while($cate_rows = mysqli_fetch_assoc($cat_data)){ $cate_id = $cate_rows['cat_id']; $category_name = $cate_rows['cat_name']; ?>
                     <tr>
                        <td><b><?php echo $id; ?></b></td>
                        <td><b><?php echo $cate_rows['cat_name']; ?></b></td>

                        <?php $sub_cat = "select * from sub_category where cat_id=$cate_id";
                              $sub_cat_data = mysqli_query($con,$sub_cat);
                              
                              while($sub_cat_row = mysqli_fetch_assoc($sub_cat_data)) { $sub_cat_name = $sub_cat_row['sub_cat_name'];

                                  $stock_query = "select * from stock where cat_id=$cate_id and sub_cat_name='$sub_cat_name'"; 
                                  $stock_select = mysqli_query($con,$stock_query);
                                  $stock_data = mysqli_fetch_assoc($stock_select);

                                  if($stock_data['quantity']<=10)
                                  {
                                    $style = "background-color: #ffebe6";
                                  }
                                  else
                                  {
                                    $style = "";
                                  }

                                  if($sub_cat_row['sub_cat_price']==0 || $stock_data['quantity']==0)
                                  {
                                      $status = "disabled";
                                  }else{
                                    $status = "";
                                  }
                              ?>

                                <td style="<?php echo @$style; ?> ">
                                  <table width="100%">
                                    <tr>
                                      <input type="hidden" name="category[]" value="" class="category_name">
                                      <input type="hidden" name="price[]" value="" class="category_price">

                                      <td width="20" align="center"><input type="checkbox" <?php echo @$status; ?>  onchange="change_data(<?php echo $index; ?> , <?php echo $cate_id; ?>)" name="items[]" value="<?php echo $sub_cat_row['sub_cat_name']; ?>" class="form-check-input"></td>

                                      <td width="60" align="center">₹ <?php echo $sub_cat_row['sub_cat_price']; ?></td>
                                      <td width="50" align="center"><?php echo $stock_data['quantity']; ?> Q</td>

                                    </tr>
                                    <tr>
                                      <td colspan="3"><input type="number" name="quntity[]" class="form-control product_check product_quantity" min="0" value="0" product_price="<?php echo $sub_cat_row['sub_cat_price']; ?>" max="<?php echo $stock_data['quantity']; ?>" disabled onchange="calculation(<?php echo $total_category; ?>)"></td>
                                    </tr>
                                  </table>
                                </td>

                              <?php $index++; } ?>
                     </tr>
                    <?php $id++; } ?>
                    <tr>
                      <td colspan="6">
                        <table width="100%" class="border-0">
                          <tr>
                            <td align="left">
                              <input type="text" class="form-control" name="total" id="total" readonly placeholder="Total Amount" required>
                            </td>
                            <td align="right">
                              <input type="submit" class="btn btn-primary form-control" name="place_order" id="submit_btn" value="Place Order" disabled>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </tbody>
               </table>
            </div>
          </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <?php } ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'footer.php'; ?>
  <script type="text/javascript">

        var temp=0;

    function change_data(index,category_name1) {

    
        var x=document.getElementsByClassName('product_check')[index];
    

        if(x.disabled==true)
        {
          document.getElementsByClassName('product_check')[index].disabled = false;
            document.getElementsByClassName('product_check')[index].value = ""
          document.getElementsByClassName('category_name')[index].value = category_name1;
          var price_1 = parseInt(document.getElementsByClassName('product_quantity')[index].getAttribute('product_price'));
          document.getElementsByClassName('category_price')[index].value = price_1; 
          document.getElementById('submit_btn').disabled = false;
          temp++;

        }
        else
        {
          document.getElementsByClassName('product_check')[index].value = 0;
          document.getElementsByClassName('category_name')[index].value = "";
          document.getElementsByClassName('product_check')[index].disabled = true;
          
          temp--;
        }

        if(temp==0)
        {
            document.getElementById('submit_btn').disabled = true;
        }
    }

    function calculation(total_category) {
      
      var total=0;

      for (var i=0;i<total_category;i++) {

        var cat_1 = parseInt(document.getElementsByClassName('product_quantity')[i].value);
        var price_1 = parseInt(document.getElementsByClassName('product_quantity')[i].getAttribute('product_price'));

         total = total + cat_1*price_1;
          
      }

      document.getElementById('total').value = total;
    }
    
  </script>

  <script>
  $(document).ready(function(){

        var typingTimer;                //timer identifier
        var doneTypingInterval = 1000;

    $('#Contact_no').keyup(function(){
      clearTimeout(typingTimer);

      

      if ($('#Contact_no').val) 
      {

        var name = $('#c_name').val();
        var text = $("#Contact_no").val();

          if(name.length==0)
          {
          typingTimer = setTimeout(function(){

            $.ajax({
              type:"POST",
              url:"serach_ajax.php",
              data:{"search_txt":text},
              dataType:"json",
              success:function(data){
                $('#c_name').val(data.name);
                $('#c_address').val(data.address);
              }
            })
          },doneTypingInterval);
        }
      }

    })
  })
</script>

<style>

.table td{
  padding:5px;
}

</style>