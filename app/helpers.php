<?php

function dateDifferencePercent(string $startString, string $endString){

	$start = strtotime($startString);
	$end = strtotime($endString);
	$current = strtotime(now());
	$fullDiff = $end-$start;
	$untilNow = $current-$start;
	if ($fullDiff==0) return 0;
	return intval($untilNow/$fullDiff*100);

}

function getIncomeTypes(){
	return ["lesson","breeding","boarding","other"];
}
function getExpenseTypes(){
	return ["treatment","breeding","assets","other"];
}

function getUserRoles(){
  return ['admin', 'owner', 'groom', 'rider'];
}
function getChartColors(){
return [
"color" => [
    "#1f77b4",
  "#ff7f0e",
  "#2ca02c",
  "#d62728",
  "#9467bd",
  "#8c564b",
  "#e377c2",
  "#7f7f7f",
  "#bcbd22",
  "#17becf",
  "#aec7e8",
  "#ffbb78",
  "#98df8a",
  "#ff9896",
  "#c5b0d5",
  "#c49c94",
  "#f7b6d2",
  "#c7c7c7",
  "#dbdb8d",
  "#9edae5",
  "#1f77b4",
  "#ff7f0e",
  "#2ca02c",
  "#d62728",
  "#9467bd",
  "#8c564b",
  "#e377c2",
  "#7f7f7f",
  "#bcbd22",
  "#17becf"
],

"hover" => [
  "#195f9f",
  "#e7680b",
  "#249326",
  "#b92121",
  "#825ca9",
  "#754a40",
  "#cf5daa",
  "#6f6f6f",
  "#a5a536",
  "#159baf",
  "#9db5d1",
  "#ff9e67",
  "#87cc7e",
  "#e56c6a",
  "#b0a0ca",
  "#a1877f",
  "#ec9fc7",
  "#a7a7a7",
  "#c5c58a",
  "#82c7d0",
  "#195f9f",
  "#e7680b",
  "#249326",
  "#b92121",
  "#825ca9",
  "#754a40",
  "#cf5daa",
  "#6f6f6f",
  "#a5a536",
  "#159baf"
]
];
}
