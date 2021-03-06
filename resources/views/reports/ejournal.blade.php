<style>
	table{
		font-size: 10px;
		padding:10px 4px 10px 4px;
	}

	th{
		border-top: 2px solid #000;
		border-bottom: 2px solid #000;
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
			<h4>E-Journal Report</h4>
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
        <th style="width:50px">#</th>
        <th>Invoice No.</th>
        <th>VATSales</th>
        <th>VAT Exempt</th>
        <th>VAT Zero</th>
        <th>VAT</th>
        <th>Discount</th>
        <th>Amount</th>
    </tr>
    <tbody>
        <?php $counter = 1; ?>
        <?php foreach ($trans as $key => $value): ?>            
        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{ $value->or_number }}</td>
            <td class="bottom-border">{{ number_format($value->vat_sale, 2, ".", ",") }}</td>
            <td class="bottom-border">{{ number_format($value->vat_exempt, 2, ".", ",") }}</td>
            <td class="bottom-border">{{ number_format($value->zero_rated_sale, 2, ".", ",") }}</td>
            <td class="bottom-border">{{ number_format($value->vat, 2, ".", ",") }}</td>
            <td class="bottom-border">{{ number_format($value->discount_amount, 2, ".", ",") }}</td>
            <td class="bottom-border">{{ number_format($value->total_due, 2, ".", ",") }}</td>
        </tr>
        	<?php if ($value->PaymentDetails): ?>
        		
	        	<?php foreach (@$value->PaymentDetails as $paymentdetail): ?>
		        <tr >
		        	<td colspan="3" ></td>
					<td class="bottom-border">{{ @$paymentdetail->payment_type }}</td>
		        	<td class="bottom-border">{{ @$paymentdetail->payment_type }}</td>
		        	<td class="bottom-border">1</td>
		        	<td class="bottom-border">{{ @number_format($paymentdetail->amount,2,'.', ',') }}</td>
		        	<td class="bottom-border">{{ @number_format($paymentdetail->amount,2,'.', ',') }}</td>
		        	<!-- <td colspan="2" class="bottom-border"></td> -->
		        </tr>
	        	<?php endforeach ?>
        	<?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>