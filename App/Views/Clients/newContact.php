<?php

//namesspaces are on the file level and are not inheritable....
use App\Config;
use App\Menu;

//new upper menu
$ClientMenu = new Menu("flex-row", "nav-hort", Config::getArray('ClientMenu'));
echo $ClientMenu->display();

?>
<script>
function showhide(a)
{
	//window.alert("is this working");
    if(a==1) {
    document.getElementById("person").style.display="none";
	document.getElementById("corp").style.display="block";
    } else {
		
    document.getElementById("person").style.display="block";
	document.getElementById("corp").style.display="none";
	}
}
</script>
<h2>Add a Contact</h2>

<div>
	<button name="form_choice" value="corp" onclick="showhide(1)"> New Company</button>
	<button name="form_choice" value="person" onclick="showhide(2)"> New Person</button>
</div>

<form id="contact" method="post">

	<fieldset>
		<legend>Personal Information</legend>
			<div>
				<label for="first_name">Full Name</label>
				<input type="text" name="first_name" id="first_name" placeholder="first name">
				<input type="text" name="last_name" id="last_name" placeholder="last name">
			</div>
			<div>
				<label for="email">Email Address</label>
				<input type="text" name="email" id="email">
			</div>
			<div>
				<label for="phone">Phone Number</label>
				<input type="text" name="phone" id="phone">
			</div>
			<div>
				<label for="mobile">Mobile Number</label>
				<input type="text" name="mobile" id="mobile">
			</div>
			<div>
				<label for="fax">Fax Number</label>
				<input type="text" name="fax" id="fax">
			</div>
		<div id="person" style="display: none;">
		<fieldset>
			<legend>Personal Address</legend>
				<div>
					<label for="street">Street</label>
					<input type="text" name="p_street" id="street">
				</div>
				<div>
					<label for="city">City</label>
					<input type="text" name="p_city" id="city">
				</div>
				<div>
					<label for="zip">Zip Code</label>
					<input type="text" name="p_zip" id="zip">
				</div>
				<div>
					<label for="state_adrv">State</label>
					<input type="text" name="p_state_adrv" id="state_adrv">
				</div>
			</fieldset>
		</div>
	</fieldset>	
	
	<div id="corp">
	<fieldset>
		<legend>Company Information</legend>
			<div>
				<label for="company_name">Company Name</label>
				<input type="text" name="company_name" id="company_name">
				<label for="DBA">DBA</label>
				<input type="text" name="DBA" id="DBA">
			</div>
			<div>
				<label for="corp_phone">Main Office Phone</label>
				<input type="text" name="corp_phone" id="corp_phone">
			</div>
			<div>
				<label for="corp_fax">Main Office Fax</label>
				<input type="text" name="corp_fax" id="corp_fax">
			</div>
			<div>
				<label for="corp_website">Company Website</label>
				<input type="text" name="corp_website" id="corp_website">
			</div>
			
			<fieldset>
				<legend>Company Address</legend>
					<div>
						<label for="street">Street</label>
						<input type="text" name="street" id="street">
					</div>
					<div>
						<label for="city">City</label>
						<input type="text" name="city" id="city">
					</div>
					<div>
						<label for="zip">Zip Code</label>
						<input type="text" name="zip" id="zip">
					</div>
					<div>
						<label for="state_adrv">State</label>
						<input type="text" name="state_adrv" id="state_adrv">
					</div>
				
			</fieldset>
			
	</fieldset>
	</div>
	
	
	<input type="submit" name="submit" value="Submit">

</form>