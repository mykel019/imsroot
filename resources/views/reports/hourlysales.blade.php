<style>
	table{
		font-size: 10px;
		padding:10px 4px 10px 4px;
	}

	th{
		border-top: 2px solid #000;
		border-bottom: 2px solid #000;
	}

	.top-border{
		border-top:1px solid #000;
		border-spacing:6px 12px;
	}

	.bottom-border{
		border-bottom:1px solid #000;
		border-spacing:6px 12px;
	}
</style>
<table>
	<tr>
		<td colspan="10" style="text-align:center">
			<h3>{{ $company }}</h3>
			<h4>Cash Sales Report</h4>
			<h4><b>Date Range: {{ $date_range }}</b></h4>
		</td>
		<td colspan="2" style="text-align:right">
			<h4>Print Date: {{ date('m/d/Y') }}</h4>
			<h4>Time: {{ date('H:i:s') }}</h4>
		</td>
	</tr>
</table>
<br>
<br>
<br>
Cashier: All
<br>
<br>

<table>
    <tr>
        <th>Times</th>
        <th>Transaction Count</th>
        <th>Amount</th>
        <th>Percentage</th>
    </tr>
    <tbody>
    	<?php foreach ($variable as $key => $value): ?>
    		
    	<?php endforeach ?>
    	<tr>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td></td>
    	</tr>
    </tbody>
</table>