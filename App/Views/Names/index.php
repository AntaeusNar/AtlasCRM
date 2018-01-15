<!-- Index of Names -->
<div>
		<h1>Welcome</h1>
		<p>Hello from the view@ Names Index!!!!</p>
		
		<?php
		
		$html = '<div>';
		foreach ($data as $row)
		{
			foreach ($row as $key=>$item)
			{
				$html .= "$key: $item ";
			}
			$html .= '<br>';
		}
		
		$html .= '</div>';
		echo $html;
		?>
		

		
		
		
</div>