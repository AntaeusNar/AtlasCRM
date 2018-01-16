<?php

//namesspaces are on the file level and are not inheritable....
use App\Config;
use App\Menu;

//new upper menu
$ClientMenu = new Menu("flex-row", "nav-hort", Config::getArray('ClientMenu'));
echo $ClientMenu->display();

?>
<!-- Index of Contacts-->
<div>
		<h1>Current Contacts</h1>
		
</div>

<?php

	$html = '<div>';
	$html.= '<table style="width:100%">';
	$html .='<tr><th>First Name</th><th>Last Name</th><th>Company Name</th></tr>';
	foreach ($data as $row)
	{
		$html .='<tr>';
		foreach ($row as $key=>$item)
		{
			$html .="<td>$item</td>";
		}
		$html .='</tr>';
	}
	$html .= '</table>';
	$html .= '</div>';
	echo $html;
?>