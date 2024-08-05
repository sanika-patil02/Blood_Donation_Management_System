<!-- search functionality on search.php -->
<!-- Here we use Ajax(entire page not refresh each time) & jquery,as we search and results are displayed on same page--> 
<?php

//include header file
include('include/header.php');

?>
<style>
	.size {
		min-height: 0px;
		padding: 60px 0 40px 0;

	}

	.loader {
		display: none;
		width: 69px;
		height: 89px;
		position: absolute;
		top: 25%;
		left: 50%;
		padding: 2px;
		z-index: 1;
	}

	.loader .fa {
		color: #e74c3c;
		font-size: 52px !important;
	}

	.form-group {
		text-align: left;
	}

	h1 {
		color: white;
	}

	h3 {
		color: #e74c3c;
		text-align: center;
	}

	.red-bar {
		width: 25%;
	}

	span {
		display: block;
	}

	.name {
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}

	.donors_data {
		background-color: white;
		border-radius: 5px;
		margin: 25px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		padding: 20px 10px 20px 30px;
	}
</style>

<div class="container-fluid red-background size">
	<div class="row">
		<div class="ccol-md-6 offset-md-3">
			<h1 class="text-center">Search Donors</h1>
			<hr class="white-bar">
			<br>
			<div class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
				<div class="form-group text-center center-aligned">
					<select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
						<option value="">-- Select --</option>

						<optgroup title="Kolhapur" label="&raquo; Kolhapur"></optgroup>
						<option value="Panhala">Panhala</option>
						<option value="Kodoli">Kodoli</option>
						<option value="Kagal">Kagal</option>
						<option value="Radhanagari">Radhanagari</option>
						<option value="Shahuwadi">Shahuwadi</option>
						<option value="Gadhinglaj">Gadhinglaj</option>
						<option value="Chandgad">Chandgad</option>
						<option value="Ajra">Ajra</option>
						<option value="Ichalkaranji">Ichalkaranji</option>
						<option value="Gargoti">Gargoti</option>Peth Vadgaon
						<option value="Peth Vadgaon">Peth Vadgaon</option>

						<optgroup title="Sangli" label="&raquo; Sangli"></optgroup>
						<option value="Shirala">Shirala</option>
						<option value="Palus">Palus</option>
						<option value="Tasgaon">Tasgaon</option>
						<option value="Islampur">Islampur </option>
						<option value="Manerajuri">Manerajuri</option>
						<option value="Mangale">Mangale</option>
						
						<optgroup title="Satara" label="&raquo; Satara"></optgroup>
						<option value="Karad">Karad</option>
						<option value="Koregaon">Koregaon</option>
						<option value="Patan">Patan</option>
						<option value="Phaltan">Phaltan</option>
						<option value="Jaoli">Jaoli</option>
						<option value="Khatav">Khatav</option>

						<optgroup title="Pune" label="&raquo; Pune"></optgroup>
						<option value="Hinjawadi">Hinjawadi</option>
						<option value="Wakad">Wakad</option>
						<option value="Nigdi">Nigdi</option>
						<option value="Pimpri">Pimpri</option>
						<option value="Chinchwad">Chinchwad</option>
						<option value="Dehu">Dehu</option>
						<option value="Saswad ">Saswad </option>
						<option value="Warje">Warje</option>
						<option value="Chakan">Chakan</option>
						<option value="Hadapsar">Hadapsar</option>
						<option value="Katraj">Katraj</option>
						<option value="Vishrantwadi">Vishrantwadi</option>
						<option value="Tathawade">Tathawade </option>
						<option value="Dhankawadi">Dhankawadi </option>
						<option value="Alandi">Alandi</option>
						<option value="Aundh">Aundh </option>
						<option value="Talegaon">Talegaon </option>
						<option value="Kalewadi">Kalewadi </option>

						<optgroup title="Mumbai" label="&raquo; Mumbai"></optgroup>
						<option value="Borivali">Borivali</option>
						<option value="Goregaon">Goregaon </option>
						<option value="	Bandra">Bandra</option>
						<option value="Juhu">Juhu</option>
						<option value="Vileparle">Vileparle</option>
						<option value="Chembur"> Chembur</option>
						<option value="Kanheri">Kanheri</option>
						
					</select>
				</div>
				<div class="form-group center-aligned">
					<select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">

						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>

					</select>
				</div>
				<div class="form-group center-aligned">
					<button type="button" class="btn btn-lg btn-default" id="search">Search</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container" style="padding: 60px 0 60px 0;">
	<div class="row " id="data">

		<!-- Display The Search Result -->
		 <!-- After clicking on search button on home page its directed on this page -->
		<?php
		if(isset($_GET['city']) && !empty($_GET['city']) && isset($_GET['blood_group']) && !empty($_GET['blood_group'])){

			$city=$_GET['city'];
			$blood_group=$_GET['blood_group'];

			$sql = "SELECT * FROM donor WHERE city='$city' or blood_group='$blood_group'";
		    $result = mysqli_query($connection , $sql);

		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				if($row['save_life_date'] == '0'){
					echo '
					<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
					<span class="name">'.$row['name'].'</span>
					<span>'.$row['city'].'</span>
					<span>'.$row['blood_group'].'</span>
					<span>'.$row['gender'].'</span>  
					<span>'.$row['email'].'</span>  
					<span>'.$row['contact_no'].'</span>  

					</div>
					';


				}else{
					echo '
					<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
					<span class="name">'.$row['name'].'</span>
					<span>'.$row['city'].'</span>
					<span>'.$row['blood_group'].'</span>
					<span>'.$row['gender'].'</span>  
					<h4 class="name text-center">Donated</h4>
					</div>
					';

				}
			}

		}else{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data not found.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';

		}
		
		}
		?>
		


	</div>
</div>
<div class="loader" id="wait">
	<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>
<?php

//include footer file
include('include/footer.php');

?>

<script type="text/javascript">
	$(function(){
		// search-id of btn
		$("#search").on('click',function(){
			var city = $("#city").val();
			var blood_group = $("#blood_group").val();

			// ajax request send
			$.ajax({
				// get request or post request
				type: 'GET',
				//page on which request goes
				url: 'ajaxsearch.php',
				// index:variable_name
				data: {city:city,blood_group:blood_group},
				// on executing request successfully this function actives & we receives data in that
				success:function(data){
					if(!data.error){
						// The one(container)whoes id is data-in that this received data display
						$("#data").html(data);
					}
				}
			});

		});

	});

</script>