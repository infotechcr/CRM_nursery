<?php include_once 'header.php'; include_once 'db.php'; ?>

<?php 

	$advance_payment_view_query = "SELECT * from advance_payment JOIN quotation_user ON advance_payment.q_bill_no_user_id=quotation_user.u_id JOIN quotation_order ON advance_payment.q_bill_no = quotation_order.bill_no GROUP BY q_bill_no";
	$advance_payement_data = mysqli_query($con,$advance_payment_view_query);

 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Name</th>
                      <th>Contact No</th>
                      <th>Paid Amount</th>
                      <th>Bill Date</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
               
                  	<?php $id=1; while($pay_data = mysqli_fetch_assoc($advance_payement_data)) { ?>

                  		<tr>
                  			<td><?php echo $id; ?></td>
                  			<td><?php echo $pay_data["name"]; ?></td>
                  			<td><?php echo $pay_data["contact_no"]; ?></td>
                  			<td><?php echo $pay_data["a_payment"]; ?></td>
                  			<td><?php echo $pay_data["b_date"]; ?></td>
                  			<td><a href="print_cash_receipt.php?p_id=<?php echo $pay_data['q_bill_no']; ?>&u_id=<?php echo $pay_data['q_bill_no_user_id']; ?>">Print slip</a></td>

                          <td><a href="view_payment.php?billid=<?php echo $pay_data['q_pay_id']; ?>">Delete</a></td>
                  		</tr>

                  	<?php $id++; } ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

                    <style>
  .dt-buttons{
    justify-content:center
  }
  .dt-buttons button{
    margin:3px;
    border-radius:0px;
  }
</style>


<?php include_once 'footer.php'; ?>