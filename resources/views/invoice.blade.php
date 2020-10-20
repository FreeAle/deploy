@extends('layouts.master')
@section('content')
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
#main{
    background-color: white;
}
</style>

<div class="container-fluid animated bounceInRight" id="main">

<div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>{{$data[0]->salonName}}</h2><h3 class="pull-right">Order # {{$data[0]->appoiment_no}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Salon Address :</strong><br>
                    {{$data[0]->salonAddress}}<br>
    					
    					{{$data[0]->salonCity}}, {{$data[0]->salonState}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Client Name:</strong><br>
					{{$data[0]->user_name}}<br>
    				
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$data[0]->payment_method}}<br>
    					{{$data[0]->payment_token}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				{{-- <address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address> --}}
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Service</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Discount</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                @foreach ($data[0]['data'] as $item)
                                <tr>
                                        <td>{{$item->serviceName}}</td>
                                        <td class="text-center">${{$item->subTotal}}</td>
                                        <td class="text-center">${{$item->discount}}</td>
                                        <td class="text-right">${{$item->total}}</td>
                                    </tr>     
                                @endforeach
    							
    							
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">${{$data[0]->subTotal}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount</strong></td>
    								<td class="no-line text-right">${{$data[0]->grandDiscount}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">${{$data[0]->grandTotal}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
