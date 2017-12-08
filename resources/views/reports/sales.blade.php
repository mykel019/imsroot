<style>

    table{
        font-size: 10px;
        padding:5x 4px 10px 4px;
    }

    th{
        /*border-top: 1px solid #000;*/
        /*border-bottom: 1px solid #000;*/
        text-align:center;
        font-size:  7px;
        background-color: #C0504E;
        color: white;
        /*border-right: 1px solid black;*/
        border: 1px solid black;
    }
    td{
    font-size: 7px;
    background-color: #DDDDDD;
    }

    .bottom-border{
        border-bottom:1px solid #000;
        border-spacing:6px 12px;
        border: 1px solid black;
    }
    .line{
        /*border: 1px solid black;*/
        background-color: black;
        border-bottom: 1px solid #000;
        line-height: -10px;
        border-right: 2px solid white;
    }
    .red{
        color:red;
        text-align: center;
    }
    .amount{
        font-size: 10px;
        text-align: center;
    }
    .gray{
        background-color: #a59d9d;
        border: 1px solid black;
        line-height: -8px;
    }
    .white{
        background-color: white;
    }
</style>
<table width="100%">
    <tr>
        <td class="white" colspan="25" style="text-align:center">
            <h1>Daily Sales Report</h1>
            <h4><b>Date: {{$data['date']}}</b></h4>
        </td>
        <td class="white" colspan="5" style="text-align:right">
        <h2></h2>
            <h4>Print Date: {{ date('m/d/Y') }}</h4>
            <h4>Time: {{ date('H:i:s') }}</h4>
        </td>
    </tr>
</table>
<br>
<label>Store/Branch</label>
<h1>{{$data['company']}}<h1>
<br>

<table>
    <tr>
        <th style="border-left: 1px solid black;">No</th>
        <th>Invoice No.</th>
        <th>QTY</th>
        <th>Product Code</th>
        <th>Product Description</th>
        <th>SRP</th>
        <th>Cash</th>
        <th>Card</th>
        <th>GC/Sodexo</th>
        <th>Unit</th>
        <th>Consign</th>
        <th>Bank Term</th>
        <th>Promo/Discount</th>
        <th>Remarks</th>
        <th>Seller</th>
        <th>Brand</th>
        <th>Category</th>
        <th style="border-right: 1px solid black;">Status</th>
    </tr>
    <tbody>
    <tr>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
        <td class="line"></td>
    </tr>

<!-- **************************************************** ROW FOR ALL DATA ******************************************************************** -->
<?php $counter = 1; ?>
<?php foreach ($data['pos_transactions'] as $key => $value): ?>
    <?php foreach ($value->InvoiceDetails as $key1 => $invoice_detail): ?>

        <tr>
            <td class="bottom-border">{{$counter++}}</td>

            <!--****************************** COLUMN FOR OR_NUMBER **********************************************-->
            <td class="bottom-border">{{@$value->or_number}}</td>
            
            <!--****************************** COLUMN FOR QUANTITY ***********************************************-->
            <td class="bottom-border">{{number_format(@$invoice_detail->qty)}}</td>
            
            <!--***************************** COLUMN FOR BARCODE ************************************************-->
            <td class="bottom-border">{{@$invoice_detail->product->barcode}}</td>

            <!--**************************** COLUMN FOR PRODUCTNAME ********************************************-->
            <?php if ($invoice_detail->required_fields != null): ?>
                <td class="bottom-border">{{@$invoice_detail->product->name}}
                    <?php foreach (json_decode($invoice_detail->required_fields) as $requiredfields): ?>
                        <br>{{@$requiredfields->FieldValue}}
                    <?php endforeach ?>
                </td>
            <?php else: ?>
                <td class="bottom-border">{{@$invoice_detail->product->name}}</td>
            <?php endif ?>
           
            <!--*************************** COLUMN FOR PRICE ***************************************************-->
            <td class="bottom-border">{{number_format(@$invoice_detail->product->price_default)}}</td>


        
            <!--*************************** COLUMN FOR CASH ****************************************************--> 
               <td class="bottom-border">
                 @foreach ($value->PaymentDetails as  $payment_detail)
                    @if(@$payment_detail->payment_type == 'CASH')
                        {{number_format(@$payment_detail->amount)}}
                    @endif
                @endforeach
             </td>
               
            <!-- ************************ COLUMN FOR CREDIT CARD **********************************************-->
            <td class="bottom-border">
                 @foreach ($value->PaymentDetails as  $payment_detail)
                    @if(@$payment_detail->payment_type == 'CREDIT CARD')
                        {{number_format(@$payment_detail->amount)}}
                    @endif
                @endforeach
            </td>

            <!--************************* COLUMN FOR GC/SODEXO *************************************************-->
            <td class="bottom-border"></td>


            <!--************************* COLUMN FOR UNIT *****************************************************-->
            <td class="bottom-border">{{number_format(@$value->total_tender)}}</td>

            <!--************************* COLUMN FOR CONSIGN **************************************************-->
            <td class="bottom-border"></td>


            <!--************************* COLUMN FOR BACK_TERM ************************************************-->
                <?php if ($payment_detail->payment_field == null): ?>
                    <td class="bottom-border"></td>
                <?php else: ?>
                    <td class="bottom-border">
                    <?php foreach ($value->PaymentDetails as $payment_detail): ?>
                        <?php foreach (json_decode($payment_detail->payment_field) as $bank_term): ?>
                            {{$bank_term->FieldValue}}
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endif ?>
                    </td>

            <!--************************ COLUMN FOR PROMO/DISCOUNT ********************************************-->
            <?php if ($value->discount_id == null): ?>
                <td class="bottom-border"></td>
            <?php else: ?>
                <td class="bottom-border">{{$value->PosDiscountTypes['name']}}</td>
            <?php endif ?>

            <!--*********************** COLUMN FOR REMARKS ****************************************************-->
            <td class="bottom-border">{{$value->remarks}}</td>

            <!--*********************** COLUMN FOR SELLER *****************************************************-->
            <td class="bottom-border">{{$value->PosUsers['firstname']}},{{$value->PosUsers['lastname']}}</td>

            <!--********************** COLUMN FOR BRAND *********************************************************-->
            <td class="bottom-border">{{$invoice_detail->product['brand']['description']}}</td>

            <!--********************** COLUMN FOR CATEGORY ******************************************************-->
            <td class="bottom-border">{{$invoice_detail->product['category']['name']}}</td>

            <!--z********************* COLUMN FOR STATUS ********************************************************-->
            <td class="bottom-border">Active</td>
        </tr>
           
    <?php endforeach ?>
<?php endforeach ?>
        <tr>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
            <td class="gray"></td>
        </tr>

            <!--*************************** TOTAL FOR THE ABOVE COLUMN  *******************************************-->
        <tr>
            <td class="bottom-border"></td>
            <td class="bottom-border"></td>
            <?php foreach ($data['totalqty'] as $key => $value): ?>
                <td class="bottom-border">{{number_format($value['total'])}}</td>
            <?php endforeach ?>

            <td class="bottom-border" colspan="3"></td>

            <?php foreach ($data['pos_transactions'] as $key => $value): ?>
                <?php foreach ($value->PaymentDetails as $key2 => $payment_detail): ?>
                    <?php if ($payment_detail == 'CASH'): ?> 
                        <td class="bottom-border">{{number_format(sum($payment_detail->amount))}}</td>
                    <?php endif ?>   
                <?php endforeach ?>
            <?php endforeach ?>
                
            <!-- ************************* TOTALCASHSALES **************************************-->
            <?php foreach ($data['cashsales'] as $key => $value): ?> 
                <td class="bottom-border">{{number_format($value['totalcash'])}}</td>   
            <?php endforeach ?>
            <!-- ******************************************************************************* -->

            <!--************************ TOTALCARDSALES *************************************-->
            <?php foreach ($data['cardsales'] as $key => $value): ?> 
                <td class="bottom-border">{{number_format($value['totalcard'])}}</td>
            <?php endforeach ?>
            <!-- ********************************************************************* -->

            <td class="bottom-border"></td>

            <!-- ***********************  TOTAL UNIT ******************************** -->
            <?php foreach ($data['totalunit'] as $key => $value): ?>
                <td class="bottom-border">{{number_format($value['totalunit'])}}</td>
            <?php endforeach ?>
            <!-- ******************************************************************** -->

            <td class="bottom-border">Total Consign</td>
        </tr>

        <!-- *********************************************************************************** -->


        <tr>
            <td class="white"></td>
            <td class="white"></td>
        </tr>
      
    </tbody>
</table>

<div id="cashsales">
    <table>
        <tr>
            <td >Cash Sales</td>
            <?php foreach ($data['cashsales'] as $key => $value): ?>
                <td class="amount">{{number_format($value['totalcash'])}}<hr></td>
            <?php endforeach ?>
            <td></td>
            <td colspan="1.5"></td>
            <td>Amount</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Card Sales</td>
            <?php foreach ($data['cardsales'] as $key => $value): ?>
                <td class="amount">{{number_format($value['totalcard'])}}<hr></td>
            <?php endforeach ?>
            <td></td>
            <td>Accs Sales:</td>
            <td class="amount"><hr></td>
        </tr>
        <tr>
            <td >GC/Sodexo/Check</td>
            <td class="amount"><hr></td>
            <td></td>
            <td>Units Sales:</td>
            <?php foreach ($data['totalunit'] as $key => $value): ?>
                <td class="amount">{{number_format($value['totalunit'])}}<hr></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td>CRF</td>
            <td class="red"><hr></td>
            <td></td>
            <td>Consign Sales:</td> 
            <td class="amount"><hr></td>
        </tr>
        <tr>
            <td>Total Sales:</td>
            <td class="red"><hr></td>
        </tr>
        <tr>
            <td>Cash Deposited</td>
                 <?php foreach ($data['cashsales'] as $key => $value): ?> 
                <td class="amount">{{number_format($value['totalcash'])}}<hr></td>   
            <?php endforeach ?>
            <td></td>
            <td>Prepared by:</td>
            <td>Checked by:</td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><hr>Cashier signature over printed name</td>
            <td><hr>Store Head/AM signature over printed name</td>
        </tr
    </table>
</div>




