@extends('layouts.app')
<div class="sidebar" data-color="green">

    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            Daila
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{ url('/home') }}">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="purchaseorder">
                    <i class="material-icons">add</i>
                    <p>Purchase order form</p>
                </a>
            </li>
            <li>
                <a href="payment">
                    <i class="material-icons">input</i>
                    <p>Payment received</p>
                </a>
            </li>
            <li>
                <a href="salesinvoice">
                    <i class="material-icons">note_add</i>
                    <p>Generate sales invoice</p>
                </a>
            </li>
            <li>
                <a href="delivery">
                    <i class="material-icons">content_paste</i>
                    <p>Delivery Receipt</p>
                </a>
            </li>
          </ul>
      <ul class="nav">
        <li>
            <a href="joborder">
                <i class="material-icons">add</i>
                <p>Job order form</p>
            </a>
        </li>
        <li class="active">
            <a href="inventory">
                <i class="material-icons">dvr</i>
                <p>View Inventory</p>
            </a>
        </li>
      </ul>
        <ul class="nav">
          <li>
              <a href="orderstatus">
                  <i class="material-icons">border_color</i>
                  <p>Purchase order status</p>
              </a>
          </li>
          <li>
              <a href="salesreport">
                  <i class="material-icons">equalizer</i>
                  <p>Sales report</p>
              </a>
          </li>
        </ul>
    </div>
</div>


<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){

        var table = $('#table_id').DataTable({
            // columnDefs: [
            // 	//{ targets: [0, 1], visible: true},
            // 	{ targets: '_all', visible: true }
            // ]
        });

        $('#table_id tbody').on('click', '#btn_view', function(){
            alert('hello');
            var data = table.row($(this).parents('tr')).data();
            window.location.href='/invoices/testshow/'+data[0];
        });
    });
</script>

@section('content')


      <!-- <div>
          <h1 style="text-align: center">INVENTORY</h1>
          <div style="text-align: center">

          </div>
      </div>

<table class="inlineTable">
<tr>
<th>Product Name</th>
</tr>

@foreach ($products as $product)
<tr>
  <td style="width: 60px">{{$product->name}}</td>
<tr>
@endforeach



</table> -->

<!-- <table class="inlineTable" id="table_id">
<tr>
<th>Inventory Count</th>
</tr> -->


<!-- @foreach ($inventories as $inventory)
<tr>
  <td style="width: 10px">{{$inventory->product_count}}</td>
</tr>
@endforeach -->
<!-- </table> -->

<div class="col-md-8 col-md-offset-3">
<h1><i class="ti-receipt"></i> Inventory <small></small> </h1>
    <hr>
    <table id="table_id" class="table table-hover">
        <thead>

            <tr>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Product Count</strong></th>
            </tr>

        </thead>
        <tbody>

        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</id>

        </tr>
        @endforeach

        @foreach($inventories as $inventory)
        <tr>
            <td>{{$inventory->product_count}}</td>
        </tr>
        @endforeach

        </tbody>

    </table>
</div>






@endsection
