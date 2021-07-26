@php $counter = 0; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>Invoice - MRE</title>


<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="{{asset('pdf/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('pdf/all.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('pdf/stylesheet.css')}}"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="{{asset('images/logo.png')}}" width="100" />
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      <h4 class="text-7 mb-0">Invoice</h4>
    </div>
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> {{$sale->sell_date}}</div>
    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> {{$sale->id}}</div>
	  
  </div>
  <hr>
  <div class="row">
 
    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
      <address>
      {{$sale->customer_id == 01 ? 'Counter':$sale->customer->name}}
      </address>
    </div>
  </div>
	
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table mb-0">
		<thead class="card-header">
          <tr>
            <td class="col-1 border-0"><strong>#</strong></td>
			<td class="col-4 border-0"><strong>Product</strong></td>
            <td class="col-2 text-center border-0"><strong>Qty</strong></td>
			<td class="col-2 text-center border-0"><strong>Unit Price</strong></td>
            <td class="col-2 text-right border-0"><strong>Amount</strong></td>
          </tr>
        </thead>
          <tbody>
          @foreach($sale->sell_details as $sell)
            <tr>
              <td class="col-3 border-0">{{++$counter}}</td>
              <td class="col-4 text-1 border-0">{{$sell->product->name}}</td>
              <td class="col-1 text-center border-0">{{$sell->qty}}</td>
              <td class="col-2 text-center border-0">{{($sell->sell_price)/($sell->qty)}}</td>
			       <td class="col-2 text-right border-0">{{$sell->sell_price}}</td>
            </tr>
           @endforeach
          </tbody>
		  <tfoot class="card-footer">
		
		       	<tr>
              <td colspan="4" class="text-right"><strong>Total:</strong></td>
              <td class="text-right">{{$sale->getTotal()}}.00</td>
            </tr>
		  </tfoot>
        </table>
      </div>
    </div>
  </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>
  </footer>
</div>
</body>
</html>