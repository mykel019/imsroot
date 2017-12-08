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
        <th>Invoice No.</th>
        <th>Date Time</th>
        <th>Gross Sales</th>
        <th>VAT</th>
        <th>VAT Exempt</th>
        <th>Discount</th>
        <th>Payment</th>
    </tr>
    <tbody>
    	<?php $count = 0; ?>
    	<?php $totalPayment = 0; ?>
        <?php foreach ($trans as $key => $value): ?> 
        <?php $count++; ?>           
    	<?php $totalPayment += $value->total_tender; ?>
        <tr>
            <td>{{ $value->or_number }}</td>
            <td>{{ $value->transaction_date }}</td>
            <td>{{ number_format($value->total_due, 2, ".", ",") }}</td>
            <td>{{ number_format($value->vat, 2, ".", ",") }}</td>
            <td>{{ number_format($value->vat_exempt, 2, ".", ",") }}</td>
            <td>{{ number_format($value->discount_amount, 2, ".", ",") }}</td>
            <td>{{ number_format($value->total_tender, 2, ".", ",") }}</td>
        </tr>
        <?php endforeach ?>
        <tr>
        	<td class="top-border" colspan="6"><b>Total Cash Transactions :  <span>{{ $count  }}</span></b></td>
        	<td class="top-border"><b>{{ number_format($totalPayment, 2, ".", ",") }}</b></td>
        </tr>
    </tbody>
</table>