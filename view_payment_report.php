<?php  include_once 'header.php'; include_once 'query.php'; ?>

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

        	<?php $start_year = 2023;	for($y=$start_year;$y<=date('Y');$y++) { $total_income=0; $total_expenses=0;?>      

        								<?php

        		 							for ($m=date('m'); $m>=1 ; $m--) { $dateObj   = DateTime::createFromFormat('!m', $m); $monthName = $dateObj->format('F');

					                  	$total_payment_query1 = "select * from paid_amount where YEAR(date) = $y and MONTH(date)=$m ";
					                  	$total_payment_data1 = mysqli_query($con,$total_payment_query1);

					                  	$total_expenses_query1 = "select * from expenses where YEAR(date) = $y and MONTH(date)=$m ";
					                  	$total_expenses_data1 = mysqli_query($con,$total_expenses_query1);

					                  	while($payment_data_rows1 = mysqli_fetch_assoc($total_payment_data1))
					                  	{
					                  			$total_income += $payment_data_rows1['amount'];
					                  	}

					                  	while($expenses_data_rows1 = mysqli_fetch_assoc($total_expenses_data1))
					                  	{
					                  			$total_expenses += $expenses_data_rows1['amount'];
					                  	}
					        				}
        		 						?>  		

				        	<div class="col-md-6">
					            <div class="card bg-light ">
					              <div class="card-header bg-primary text-center ">
					                <h2 class="card-title text-white font-weight-bold float-none" align="center">Year : <?php echo $y; ?></h2>
					              </div>
					              <!-- /.card-header -->
					              <div class="card-body">
					                <table class="table table-bordered">
					                  <thead>
					                    <tr>
					                      <th>Month</th>
					                      <th>Amount</th>
					                      <th>Expenses</th>
					                      <th>Total</th>
					                    </tr>
					                   
					                  </thead>
					                  <tbody>
					                  	 <tr>
					                    	<td><b>Total Income</b></td>
					                    	<td><?php echo @$total_income; ?></td>
					                    	<td><?php echo @$total_expenses; ?></td>
					                    	<td><?php echo @$total_income-$total_expenses; ?></td>
					                    </tr>
					                  	<?php for ($m=date('m'); $m>=1 ; $m--) { $dateObj   = DateTime::createFromFormat('!m', $m); $monthName = $dateObj->format('F');?>


					                  	<?php 

					                  	$total_payment_query = "select * from paid_amount where YEAR(date) = $y and MONTH(date)=$m ";
					                  	$total_payment_data = mysqli_query($con,$total_payment_query);

					                  	$total_expenses_query = "select * from expenses where YEAR(date) = $y and MONTH(date)=$m ";
					                  	$total_expenses_data = mysqli_query($con,$total_expenses_query);

					                  	$total_month_payment = 0;
					                  	$total_month_expenses = 0;

					                  	while($payment_data_rows = mysqli_fetch_assoc($total_payment_data))
					                  	{
					                  			$total_month_payment += $payment_data_rows['amount'];
					                  	}

					                  	while($expenses_data_rows = mysqli_fetch_assoc($total_expenses_data))
					                  	{
					                  			$total_month_expenses += $expenses_data_rows['amount'];
					                  	}

					                  	?>

						                    <tr>
						                      <td><?php echo $monthName; ?></td>
						                      <td><?php echo $total_month_payment; ?></td>
						                      <td><?php echo $total_month_expenses; ?></td>
						                      <td><?php echo $total_month_payment-$total_month_expenses; ?></td>
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