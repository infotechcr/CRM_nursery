<?php  include_once 'header.php'; include_once 'query.php'; ?>

<?php 








?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <a href="" class="btn btn-primary">Payment Report</a> -->
            <h3>Payment Report</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

        	<?php $start_year = 2023;	for($y=$start_year;$y<=date('Y');$y++) { ?>        		

				        	<div class="col-md-6">
					            <div class="card">
					              <div class="card-header">
					                <h3 class="card-title" align="center"><?php echo $y; ?></h3>
					              </div>
					              <!-- /.card-header -->
					              <div class="card-body">
					                <table class="table table-bordered">
					                  <thead>
					                    <tr>
					                      <th>Month</th>
					                      <th>Amount</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                  	<?php for ($m=1; $m <=date('m') ; $m++) { $dateObj   = DateTime::createFromFormat('!m', $m); $monthName = $dateObj->format('F');?>


					                  	<?php 

					                  	$total_payment_query = "select * from paid_amount where YEAR(date) = $y and MONTH(date)=$m ";
					                  	$total_payment_data = mysqli_query($con,$total_payment_query);

					                  	$total_month_payment = 0;

					                  	while($payment_data_rows = mysqli_fetch_assoc($total_payment_data))
					                  	{
					                  			$total_month_payment += $payment_data_rows['amount'];
					                  	}

					                  	?>

						                    <tr>
						                      <td><?php echo $monthName; ?></td>
						                      <td><?php echo @$total_month_payment; ?></td>
						                    </tr>
					                	<?php } ?>    
					                  </tbody>
					                </table>
					              </div>
					            </div>
				          	</div>
			<?php } ?>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php include_once 'footer.php' ?>