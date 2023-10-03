<?php 

include_once 'db.php';

if(!isset($_SESSION['Login_id']))
{
    header('location:index.php');
}

/* Dashboard query */

if($_SESSION['role']==1 || $_SESSION['role']==2)
{
	/* View Staff Data And Count Total Staff*/

		$user_count_query = "select * from admin where status=1 and role=2 or role=3";
		$data = mysqli_query($con,$user_count_query);
		$total_staff = mysqli_num_rows($data);

		$user_count_query = "select * from admin where role=2 or role=3";
		$data = mysqli_query($con,$user_count_query);
		
	/* End View Staff And Count Staff */

	/* show category data */
		$category_data_query = "select * from category";
		$category_data = mysqli_query($con,$category_data_query);	

	/* show category data */
		$today_date = date("Y-m-d");

		$today_order_query = "SELECT product_order.* , user.*, category.cat_name FROM `product_order` JOIN user on user.u_id=product_order.user_id join category on product_order.cat_id=category.cat_id where product_order.order_status=0 and  product_order.order_date='$today_date' GROUP BY product_order.bill_no";
		$total_order_data = mysqli_query($con,$today_order_query);

		$count_today_order_data = mysqli_num_rows($total_order_data);

}

//  Call Ajax insert category data
if(isset($_POST['cat_name']))
{
	$cat_name = $_POST['cat_name'];

	$query_insert = "insert into category(cat_name)values('$cat_name')";
	mysqli_query($con,$query_insert);
	$insert_category_id = mysqli_insert_id($con); 

	$stock_data = array('B1-K1','B1-K2','B1-K3','B1-K4');

	foreach ($stock_data as $key => $value) {

		$stock_insert = "insert into stock(cat_id,sub_cat_name) VALUES ('$insert_category_id','$value')";
		mysqli_query($con,$stock_insert);

		$query_sub_cat_insert = "insert into sub_category(cat_id,sub_cat_name,sub_cat_price)values('$insert_category_id','$value','sub_cat_price')";
		mysqli_query($con,$query_sub_cat_insert);
	}

	$query_select = "select * from category";
	$cat_data = mysqli_query($con,$query_select);
}

// call ajax for insert sub category
if(isset($_POST['sub_cat_price']))
{
	$cat_id = $_POST['cat_id'];
	$sub_category = $_POST['sub_category'];
	$sub_cat_price = $_POST['sub_cat_price'];

	$update_data = "update sub_category set sub_cat_price=$sub_cat_price where cat_id=$cat_id and sub_cat_name='$sub_category'";
	mysqli_query($con,$update_data);

	$select_sub_cat = "select * from sub_category where cat_id='$cat_id'";
	$sub_cat_data = mysqli_query($con,$select_sub_cat);
}

if(isset($_POST['cat_id']))
{
	$cat_id = $_POST['cat_id'];
	$select_sub_cat = "select * from sub_category where cat_id='$cat_id'";
	$sub_cat_data = mysqli_query($con,$select_sub_cat);
}

/* Dashboard Data */

$category_select = "select * from category";
$cat_data = mysqli_query($con,$category_select);
$total_category = mysqli_num_rows($cat_data) * 4;

/* select Stock */

if(isset($_POST['sub_cat_stock']))
{
	$cat_id = $_POST['category_id'];
	$sub_cat_name = $_POST['sub_category'];
	$sub_stock = $_POST['sub_cat_stock'];

	$check_stock = "select * from stock where cat_id=$cat_id and sub_cat_name='$sub_cat_name'";
	$stock_data = mysqli_query($con,$check_stock);
	$cnt = mysqli_num_rows($stock_data);

	if($cnt==0)
	{
		$stock_insert = "insert into stock(cat_id,sub_cat_name,quantity)values('$cat_id','$sub_cat_name','$sub_stock')";
		mysqli_query($con,$stock_insert);
	}
	else
	{
		$row = mysqli_fetch_assoc($stock_data);
		$total_stock = $row['quantity'] + $sub_stock;
		$id = $row['s_id'];

		$update_stock = "update stock set quantity=$total_stock where s_id=$id";
		mysqli_query($con,$update_stock);
	}
	

	$stock_select = "select category.cat_name , stock.* from stock join category on category.cat_id=stock.cat_id where stock.cat_id=$cat_id";
	$stock_data = mysqli_query($con,$stock_select);
}

/* select sub category */

if(isset($_POST['select_sub']))
{
	$cat_id = $_POST['select_sub'];

	$stock_select = "select category.cat_name , stock.* from stock join category on category.cat_id=stock.cat_id where stock.cat_id=$cat_id";
	$stock_data = mysqli_query($con,$stock_select);
}

/*Place Order*/

if (isset($_POST['place_order'])) {

	$items = $_POST['items']; 
	$quntity  = $_POST['quntity']; 
	$cat_data = $_POST['category'];
	$cat_price = $_POST['price'];


	$name = ucwords($_POST['p_name']);
	$contact_no = $_POST['p_contact_no'];
	$date = $_POST['p_date'];
	$address = $_POST['p_address'];

	$total_price = $_POST['total'];


	$category_data = array();
	$category_price = array();


	$sql_select_bill_no_query = "SELECT * FROM `product_order` ORDER BY `product_order`.`bill_no` DESC limit 0,1";
	$sql_select_bill = mysqli_query($con,$sql_select_bill_no_query);
	$fatch_bill_no = mysqli_fetch_assoc($sql_select_bill);

	$bill_no = $fatch_bill_no['bill_no'];

	$bill_no++;

	$cat_index=0;  foreach ($cat_data as $key => $value) {

		if($value!="")
		{
			$category_data[$cat_index] = $value;
			$cat_index++;
		}
	}

	$price_index=0;  foreach ($cat_price as $key => $value) {

		if($value!="")
		{
			$category_price[$price_index] = $value;
			$price_index++;
		}
	}
	

	$total_purchase_product = count($items);

	$order_data_existing = "select * from user where contact_no=$contact_no";
	$user_data_existing = mysqli_query($con,$order_data_existing);
	$count_record = mysqli_num_rows($user_data_existing);
	$user_data_record = mysqli_fetch_assoc($user_data_existing);
	$user_id = $user_data_record["u_id"];

	if($user_data_record==0)
	{

		$order_info_query = "insert into user(name,contact_no,address,b_date)values('$name','$contact_no','$address','$date')";
		$order_info = mysqli_query($con,$order_info_query);
		$user_id= mysqli_insert_id($con);

		$user_id-1;

	}
	

	for ($i=0; $i<$total_purchase_product; $i++) { 


		$update_quntity_query = "select * from stock where cat_id=$category_data[$i] and sub_cat_name='$items[$i]'";
		$update_quntity_data = mysqli_query($con,$update_quntity_query);
		$quntity_update_row = mysqli_fetch_assoc($update_quntity_data);

		$stock_id = $quntity_update_row['s_id'];
		$total_stock = $quntity_update_row['quantity'] - $quntity[$i];

		$update_stock = "update stock set quantity=$total_stock where s_id=$stock_id";
		mysqli_query($con,$update_stock);
	
		$place_order = "insert into product_order(cat_id,sub_cat_name,quantity,price,user_id,bill_no,order_date)values('$category_data[$i]','$items[$i]','$quntity[$i]',$category_price[$i],'$user_id','$bill_no','$date')";
			mysqli_query($con,$place_order);
	} 

	header('location:view_order.php');
}

if(isset($_GET['bill_no']))
{
	$bill_no = $_GET['bill_no'];

	$select_order = "select category.* , product_order.* , user.* FROM product_order join category on category.cat_id=product_order.cat_id join user on user.u_id=product_order.user_id where product_order.bill_no=$bill_no";

	$order_data = mysqli_query($con,$select_order);
	$order_data1 = mysqli_query($con,$select_order);

	$order_data2 = mysqli_query($con,$select_order);
	$order_user_id = mysqli_fetch_assoc($order_data2);
	$user_id = $order_user_id["user_id"];

	$previous_order_query = "select * from product_order where user_id=$user_id and bill_no<$bill_no";
	$previous_order_data = mysqli_query($con,$previous_order_query);
	$previous_total_price=0;

	while($p_order_data = mysqli_fetch_assoc($previous_order_data)){
		$previous_total_price += $p_order_data['price'] * $p_order_data['quantity'];
	}


}

/* View Order */

$selected_order_query = "SELECT product_order.* , user.* FROM `product_order` JOIN user on user.u_id=product_order.user_id  GROUP BY product_order.bill_no ORDER BY product_order.print_status DESC ";
$total_order = mysqli_query($con,$selected_order_query);

$selected_com_order_query = "SELECT product_order.* , user.* FROM `product_order` JOIN user on user.u_id=product_order.user_id where product_order.print_status=1 GROUP BY product_order.bill_no ";
$total_order_old = mysqli_query($con,$selected_com_order_query);

$selected_pending_order = "SELECT product_order.* , user.*, category.cat_name FROM `product_order` JOIN user on user.u_id=product_order.user_id join category on product_order.cat_id=category.cat_id where product_order.order_status=0 GROUP BY product_order.bill_no";
$pending_order = mysqli_query($con,$selected_pending_order);

$selected_completed_order = "SELECT product_order.* , user.*, category.cat_name FROM `product_order` JOIN user on user.u_id=product_order.user_id join category on product_order.cat_id=category.cat_id where product_order.order_status=1 GROUP BY product_order.bill_no";
$completed_order = mysqli_query($con,$selected_completed_order);

if(isset($_GET['order_bill']))
{
	$billno = $_GET['order_bill']; 
	$update_order_status = "update product_order set order_status=1 where bill_no=$billno";
	mysqli_query($con,$update_order_status);
	header("location:show_order.php");
}


 ?>

 <!-- Payment section -->

<?php 

 $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 


 	if($actual_link=="https://localhost/crm_nursery/payment.php" || $actual_link=="https://shreeharimanage.com/payment.php")
 	{
 		$selected_payment_order = "SELECT product_order.* , user.* FROM `product_order` JOIN user on user.u_id=product_order.user_id GROUP BY user.contact_no";
 		$payment_data = mysqli_query($con,$selected_payment_order);

 	}

 	if (isset($_POST['add_payment'])) {
 		
 		$u_id = $_POST['u_id'];
 		$amount = $_POST['amount'];

 		if(isset($_POST['discount']))
 		{
 			$discount = $_POST['discount'];
 		}
 		else
 		{
 			$discount=0;
 		}
 		
 		$t_date = $_POST['t_date'];
 		$payment_mode = $_POST['payment_mode'];
 		$ex_note = $_POST['note'];

 		$payment_query = "insert into paid_amount(p_u_id,amount,discount_amount,date,payment_mode,extra_note)values('$u_id','$amount','$discount','$t_date','$payment_mode','$ex_note')";
 		mysqli_query($con,$payment_query);

 		header('location:view_payment.php');

 	}


 	if($actual_link=="https://localhost/crm_nursery/view_payment.php" || $actual_link=="https://shreeharimanage.com/view_payment.php")
 	{
 		$pay_amount_details_query = "SELECT paid_amount.* , user.* FROM `paid_amount` JOIN user on user.u_id=paid_amount.p_u_id";
 		$pay_amount_data = mysqli_query($con,$pay_amount_details_query);
 	}

 	if(isset($_GET['p_id']))
 	{
 		$p_id = $_GET['p_id'];
 		$find_slip = "SELECT paid_amount.* , user.* FROM `paid_amount` JOIN user on user.u_id=paid_amount.p_u_id where paid_amount.p_id=$p_id";
 		$pay_slip_data = mysqli_query($con,$find_slip);
 	}
 	

?>

<!-- Place order end -->

<!-- Quotation start  -->

<?php 

	if (isset($_POST['quotation_btn'])) {

		$items = $_POST['items']; 
		$quntity  = $_POST['quntity']; 
		$cat_data = $_POST['category'];
		$cat_price = $_POST['price'];


		$name = $_POST['p_name'];
		$contact_no = $_POST['p_contact_no'];
		$date = $_POST['p_date'];
		$address = $_POST['p_address'];

		$total_price = $_POST['total'];


		$category_data = array();
		$category_price = array();


		$sql_select_bill_no_query = "SELECT * FROM `quotation_order` ORDER BY `quotation_order`.`bill_no` DESC limit 0,1";
		$sql_select_bill = mysqli_query($con,$sql_select_bill_no_query);
		$fatch_bill_no = mysqli_fetch_assoc($sql_select_bill);

		$bill_no = $fatch_bill_no['bill_no'];

		$bill_no++;

		$cat_index=0;  foreach ($cat_data as $key => $value) {

			if($value!="")
			{
				$category_data[$cat_index] = $value;
				$cat_index++;
			}
		}

		$price_index=0;  foreach ($cat_price as $key => $value) {

			if($value!="")
			{
				$category_price[$price_index] = $value;
				$price_index++;
			}
		}
		

		$total_purchase_product = count($items);

		$order_data_existing = "select * from quotation_user where contact_no=$contact_no";
		$user_data_existing = mysqli_query($con,$order_data_existing);
		$count_record = mysqli_num_rows($user_data_existing);
		$user_data_record = mysqli_fetch_assoc($user_data_existing);
		$user_id = $user_data_record["u_id"];

		if($user_data_record==0)
		{

			$order_info_query = "insert into quotation_user(name,contact_no,address,b_date)values('$name','$contact_no','$address','$date')";
			$order_info = mysqli_query($con,$order_info_query);
			$user_id= mysqli_insert_id($con);

			$user_id-1;

		}
		

		for ($i=0; $i<$total_purchase_product; $i++) { 


			$update_quntity_query = "select * from stock where cat_id=$category_data[$i] and sub_cat_name='$items[$i]'";
			$update_quntity_data = mysqli_query($con,$update_quntity_query);
			$quntity_update_row = mysqli_fetch_assoc($update_quntity_data);

				$place_order = "insert into quotation_order(cat_id,sub_cat_name,quantity,price,user_id,bill_no)values('$category_data[$i]','$items[$i]','$quntity[$i]',$category_price[$i],'$user_id','$bill_no')";
				mysqli_query($con,$place_order);

		} 

		header('location:view_order.php');
	}

	if(isset($_GET['q_bill_no']))
	{
		$bill_no = $_GET['bill_no'];
		$select_order = "select category.* , quotation_order.* , quotation_user.* FROM quotation_order join category on category.cat_id=quotation_order.cat_id join quotation_user on quotation_user.u_id=quotation_order.user_id where quotation_order.bill_no=$bill_no";
		$order_data = mysqli_query($con,$select_order);
		$order_data1 = mysqli_query($con,$select_order);

		$order_data2 = mysqli_query($con,$select_order);
		$order_user_id = mysqli_fetch_assoc($order_data2);
		$user_id = $order_user_id["user_id"];


		$previous_order_query = "select * from quotation_order where user_id=$user_id and bill_no<$bill_no";
		$previous_order_data = mysqli_query($con,$previous_order_query);
		$previous_total_price=0;
		while($p_order_data = mysqli_fetch_assoc($previous_order_data)){
			$previous_total_price += $p_order_data['price'] * $p_order_data['quantity'];
		}

	}



	/* Edit Order */


	if(isset($_GET['edit_bill_no']))
	{
		$e_bill_no = $_GET['edit_bill_no'];
		$edit_bill_query = "select * from product_order where bill_no=$e_bill_no";
		$edit_bill_data = mysqli_query($con,$edit_bill_query);

		$m_cat_id = "";
		$sub_cat_name="";
		$e_quntity="";

		while($edit_bill_rows = mysqli_fetch_assoc($edit_bill_data))
		{
			if($m_cat_id=="")
			{
				$m_cat_id = $edit_bill_rows['cat_id'];
			}
			else
			{
				$m_cat_id = $m_cat_id.",".$edit_bill_rows['cat_id'];
			}

			if($sub_cat_name=="")
			{
				$sub_cat_name = $edit_bill_rows['sub_cat_name'];
			}
			else
			{
				$sub_cat_name = $sub_cat_name.",".$edit_bill_rows['sub_cat_name'];
			}

			if($e_quntity=="")
			{
				$e_quntity = $edit_bill_rows['quantity'];
			}
			else
			{
				$e_quntity = $e_quntity.",".$edit_bill_rows['quantity'];
			}

		}

		$e_cat_id = explode(",",$m_cat_id);
		$e_sub_cat_name = explode(",",$sub_cat_name);
		$e_quntity = explode(",",$e_quntity);
	}


	/* End Edit */