<?php

//namesspaces are on the file level and are not inheritable....
use App\Config;
use App\Menu;

//new upper menu
$ClientMenu = new Menu("flex-row", "nav-hort", Config::getArray('ClientMenu'));
echo $ClientMenu->display();

?>

<h2>Add a Contact</h2>

<form method="post">
<ul>
	<fieldset>
		<legend>Personal Information</legend>
			<li>
				<label for="first_name">Full Name</label>
				<input type="text" name="first_name" id="first_name" placeholder="first name">
				<input type="text" name="last_name" id="last_name" placeholder="last name">
			</li>
			<li>
				<label for="email">Email Address</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="phone">Phone Number</label>
				<input type="text" name="phone" id="phone">
			</li>
			<li>
				<label for="mobile">Mobile Number</label>
				<input type="text" name="mobile" id="mobile">
			</li>
			<li>
				<label for="fax">Fax Number</label>
				<input type="text" name="fax" id="fax">
			</li>
	</fieldset>	
	
	<fieldset>
		<legend>Company Information</legend>
			<li>
				<label for="company_name">Company Name</label>
				<input type="text" name="company_name" id="company_name">
				<label for="DBA">DBA</label>
				<input type="text" name="DBA" id="DBA">
			</li>
			<li>
				<label for="corp_phone">Main Office Phone</label>
				<input type="text" name="corp_phone" id="corp_phone">
			</li>
			<li>
				<label for="corp_fax">Main Office Fax</label>
				<input type="text" name="corp_fax" id="corp_fax">
			</li>
			<li>
				<label for="corp_website">Company Website</label>
				<input type="text" name="corp_website" id="corp_website">
			</li>
			
			<fieldset>
				<legend>Company Address</legend>
					<li>
						<label for="street">Street</label>
						<input type="text" name="street" id="street">
					</li>
					<li>
						<label for="city">City</label>
						<input type="text" name="city" id="city">
					</li>
					<li>
						<label for="zip">Zip Code</label>
						<input type="text" name="zip" id="zip">
					</li>
					<li>
						<label for="state_adrv">State</label>
						<input type="text" name="state_adrv" id="state_adrv">
					</li>
				
			</fieldset>
			
	</fieldset>
	
	
	<input type="submit" name="submit" value="Submit">
</ul>
</form>