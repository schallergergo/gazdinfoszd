<?php


function dateDifferencePercentage(string $startString, string $endString){

	$start = strtotime($startString);
	$end = strtotime($endString);
	$current = strtotime(now());
	$fullDiff = $end-$start;
	$untilNow = $current-$start;
	if ($fullDiff==0) return 0;
	return intval($untilNow/$fullDiff*100);

}