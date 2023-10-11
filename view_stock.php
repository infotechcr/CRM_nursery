<?php 

include_once 'header.php'; include_once 'query.php';

?>
 <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        </div>
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Stock</h3>
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
                    <?php $id=1; $index=0; $q_index=0; while($cate_rows = mysqli_fetch_assoc($sel_cat_data)){ $cate_id = $cate_rows['cat_id']; $category_name = $cate_rows['cat_name']; ?>
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
                                      <td width="50" align="center"><?php echo $stock_data['quantity']; ?> </td>
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
                              <input type="text" class="form-control" name="total" value="<?php echo @$e_total_payment; ?>" id="total" readonly placeholder="Total Amount" required>
                            </td>
                            <td align="right">
                              <input type="submit" class="btn btn-primary form-control" name="place_order" id="submit_btn" value="Place Order" <?php if(!isset($_GET['edit_bill_no'])) { ?> disabled <?php } ?> >
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