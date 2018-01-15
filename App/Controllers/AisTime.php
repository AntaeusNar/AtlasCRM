<?php

namespace App\Controllers;

use \Core\View;

class AisTime extends \Core\Controller
{
	
	//renders index.php
	public function indexAction()
	{
		View::render('AisTime/index.php');
		
	}
	
	//loads a kml file
	public function loadKMLAction($file)
	{
		//checks to see if it can find the file
		if(is_readable($file)) {
			$xml=simplexml_load_file($file);
			
			//is file loaded xml
			if ($xml === false) {
				//error will robenson
				echo 'Failed loading xml data';
				//show each error
				foreach(libxml_get_errors() as $error) {
					echo '<br>' .$error->message;
				}
			} else {
				//no errors on loading xml, moving on
				
				//check to see if this xml doc is a edited and ready file
				if ($xml->Document->status == 'ready') {
					//shit is ready yo
					echo "<br><p> file is ready </p>";
				} else {
					//need to initaliz the doc
					$this->intalizXML($xml);
					
				}
			}
			
		} else {
			//file not found error
			echo $file . " Not found";
		}
	}
	
	private function intalizXML($xml)
	{
		//add a few peices of information to the xml->document
	
		$xml->Document->addChild('TotalTime');
		$xml->Document->addChild('DisTotal');
		$xml->Document->addChild('StartDate');
		$xml->Document->addChild('EndDate');
		//Start the Placemark Column
		//$html = '<div class="flex-column" id="placemarks">' .'<!--Start Placemark Column-->' ."\n";
			
		foreach ($xml->Document->Placemark as $Placemarks){
				
			//Change meters to miles and rounds to 0.00
			$Placemarks->ExtendedData->Data[2]->value = round($Placemarks->ExtendedData->Data[2]->value / 1609.34, 1);
			//getting ready to add miles to total miles
			$CurrentDis = (float)$Placemarks->ExtendedData->Data[2]->value;
			$CurTotDis = (float)$xml->Document->DisTotal;
				
			//Change moving to driving
			if ($Placemarks->name == "Moving"){
				$Placemarks->name = "Driving";
			}
				
			//Change catagory to personal
			$Placemarks->ExtendedData->Data[1]->value = "Personal";
				
			//Change times
			$startTimeUTC = new DateTime($Placemarks->TimeSpan->begin, new DateTimeZone('UTC'));
			$endTimeUTC = new DateTime($Placemarks->TimeSpan->end, new DateTimeZone('UTC'));
				
			//convert start and end times into PST from UTC
			$startTimeALA = $startTimeUTC;
			$startTimeALA->setTimeZone(new DateTimeZone('America/Los_Angeles'));
			$endTimeALA = $endTimeUTC;
			$endTimeALA->setTimeZone(new DateTimeZone('America/Los_Angeles'));
				
			//check dates
			$startdate = $startTimeALA->format("Y-m-d");
			$enddate = $endTimeALA->format("Y-m-d");
			$Placemarks->TimeSpan->addChild('date', $startdate);
			if ($startdate == $enddate){
				$Placemarks->TimeSpan->begin = $startTimeALA->format("H:i");
				$Placemarks->TimeSpan->end = $endTimeALA->format("H:i");
					
			}else{
			$Placemarks->TimeSpan->begin = $startTimeALA->format("Y-m-d H:i");
			$Placemarks->TimeSpan->end = $endTimeALA->format("Y-m-d H:i");
			}
				
			//calculate the interval or time duration
			$interval = date_diff($startTimeUTC, $endTimeUTC);
			$Placemarks->addChild('interval', $interval->format("P%dDT%HH%iM"));
				
			//check if this is a personal or business placemark
			if ($Placemarks->ExtendedData->Data[1]->value == "Business"){
				$test = $xml->Document->TotalTime;
				//Add the Milage
				$NewTotDis = $CurrentDis + $CurTotDis;
				$xml->Document->DisTotal = $NewTotDis;
					
				//add interval to xml->document->totaltime
				if ($test == ''){
					$xml->Document->TotalTime = $interval->format("P%dDT%HH%iM");
				} else {
					$CurrentIntervalTotal = new DateInterval($xml->Document->TotalTime);
					if ($CurrentIntervalTotal == false){
						echo "Error creating datetime on line 148ish in loadkml<br>";
					}else{
						$CurrentIntervalTotal = IntervalAdd($CurrentIntervalTotal, $interval);
						$xml->Document->TotalTime = $CurrentIntervalTotal->format("P%dDT%HH%iM");
					}
				}
			}
				
				//Call the Placemark display function
				//$html .= displayPlacemark($Placemarks) ."\n";
				
		}
		//$html .= '</div>' .'<!--End Placemark Column-->'. "\n\n";
		//show main details in next column
		//$html .= TotalsDisplay($xml);
		
		
		//need to setup some kind of return the information back to the load kml doc, which will then need to be displayed
	}
	
}
?>