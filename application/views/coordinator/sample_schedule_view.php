<?php
	echo 'Monday Start';
	$start = $time_mo[0]['START_TIME'];
	$end = '';
	for($i=0; $i<sizeof($time_mo);$i++)
	{	
		if($i+1 < sizeof($time_mo))
		{
			if($time_mo[$i+1]['TIME_ID'] - $time_mo[$i]['TIME_ID'] != 1)
			{
				$end = $time_mo[$i]['END_TIME'];
				echo $start.' - '.$end.'<br>';
				$start = $time_mo[$i+1]['START_TIME'];
			}
		}
		if($i+1 == sizeof($time_mo))
		{
			$end = $time_mo[$i]['END_TIME'];
			echo $start.' - '.$end.'<br>';
		}
	}
	echo 'Monday End';
	echo 'Wednesday Start';
	$start = $time_we[0]['START_TIME'];
	$end = '';
	for($i=0; $i<sizeof($time_we);$i++)
	{	
		if($i+1 < sizeof($time_we))
		{
			if($time_we[$i+1]['TIME_ID'] - $time_we[$i]['TIME_ID'] != 1)
			{
				$end = $time_we[$i]['END_TIME'];
				echo $start.' - '.$end.'<br>';
				$start = $time_we[$i+1]['START_TIME'];
			}
		}
		if($i+1 == sizeof($time_we))
		{
			$end = $time_we[$i]['END_TIME'];
			echo $start.' - '.$end.'<br>';
		}
	}
	echo 'Wednesday End';
?>