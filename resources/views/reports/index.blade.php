@extends('app')

@section('sidemenu')
@endsection

@section('content')
<div class="container body">
    <div class="main_container">
        @include('elements/nav')
        @include('elements/sidemenu')
        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                                    {{$title}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>


                        <div class='x_content'>
                            <div class="sub-panel">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title"> Supplier Inventory</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/supplierinventory') }}" id="supplierinv-form" target="_new" method="GET">
                                                    <div class="form-group">
                                                        <label>Supplier</label>
                                                        <select name="supplier_id" class="supplier form-control">
                                                            <?php foreach ($suppliers as $key => $value): ?>
                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                
                                    
                                                    <div class="form-group">
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <button class="btn btn-success btn-block"><i class="fa fa-file-excel-o"></i> Export to Excel</button>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title"> Sales</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/sales') }}" id="supplierinv-form" target="_new" method="GET">
                                                    <div class="form-group">
                                                        <label><input type="radio" name="date_type" checked class="flat" value="daily"> Daily</label>
                                                        <label><input type="radio" name="date_type" class="flat" value="monthly"> Monthly</label>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" name="date" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-excel-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">Monthly Top Seller</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/topseller') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="month" name="date" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <button class="btn btn-success btn-block"><i class="fa fa-file-excel-o"></i> Export to Excel</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">Itemized Report</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/itemized') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <input type="date" name="date_from" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <input type="date" name="date_to" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">E-Journal Report</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/ejournal') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <input type="date" name="date_from" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <input type="date" name="date_to" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">Charge Sales Report</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/chargesales') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <input type="date" name="date_from" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <input type="date" name="date_to" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">Cash Sales Report</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/cashsales') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <input type="date" name="date_from" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <input type="date" name="date_to" class="form-control">
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="inner-panel">
                                            <div class="ip-title">Hourly Sales Report</div>
                                            <div class="ip-body">
                                                <form action="{{ url('reports/hourlysales') }}" id="supplierinv-form" target="_new" method="GET">

                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="date" name="date_from" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="time" name="time_from" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="date" name="date_to" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="time" name="time_to" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o"></i> View PDF</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <!-- /page content -->

        @include('elements/footer')
    </div>
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function(){
        $(".supplier").selectize();
    })
</script>
@endsection

