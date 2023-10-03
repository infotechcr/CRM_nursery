<?php include_once 'header.php'; include_once 'query.php'; ?>

 <div class="content-wrapper">
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
                                <label for="exampleInputEmail1">Name:</label>
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
         <div class="col-md-12 px-0">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Wise Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
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

                                      <td width="20px" align="center"><input type="checkbox" <?php echo @$status; ?>  onchange="change_data(<?php echo $index; ?> , <?php echo $cate_id; ?>)" name="items[]" value="<?php echo $sub_cat_row['sub_cat_name']; ?>" class="form-check-input"></td>

                                      <td width="50" align="center">₹ <?php echo $sub_cat_row['sub_cat_price']; ?></td>
                                      
                                    </tr>
                                    <tr>
                                      <td colspan="3"><input type="number" name="quntity[]" class="form-control product_check product_quantity" min="0" value="0" product_price="<?php echo $sub_cat_row['sub_cat_price']; ?>" disabled onchange="calculation(<?php echo $total_category; ?>)" on>
                                      </td>
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
                              <input type="submit" class="btn btn-primary form-control" name="quotation_btn" id="quotation_btn" value="Get Quotation" disabled>
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
          document.getElementsByClassName('product_check')[index].value = "";
          document.getElementsByClassName('category_name')[index].value = category_name1;
          var price_1 = parseInt(document.getElementsByClassName('product_quantity')[index].getAttribute('product_price'));
          document.getElementsByClassName('category_price')[index].value = price_1; 
          document.getElementById('quotation_btn').disabled = false;
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
              data:{"quotation_search_txt":text},
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
</div>

<style>

.table td{
  padding:5px;
}

</style>
