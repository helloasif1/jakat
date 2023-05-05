<?php
$zakat=" ";
if(isset($_POST['submit'])) {
	$gold = $_POST['gold'];
	$silver = $_POST['silver'];
	$cash = $_POST['cash'];

	$total_wealth = $gold + $silver + $cash;

	$zakat = ($total_wealth >= 85 * 14) ? $total_wealth * 0.025 : 0;

    
}
//header('location:index.html');
?>