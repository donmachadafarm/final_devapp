@extends('layouts.app')
<div class="sidebar" data-color="green" data-image="#">
    <div class="logo">
        <a href="{{ URL::route('home')}}" class="simple-text">
            Daila Herbal
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="createjoborder">
                    <i class="material-icons">border_color</i>
                    <p>Create Job Order</p>
                </a>
            </li>
            <li class="">
                <a href="createsalesinvoice">
                    <i class="material-icons">border_color</i>
                    <p>Create Sales Invoice</p>
                </a>
            </li>
            <li>
                <a href="salesreport">
                    <i class="material-icons">insert_chart</i>
                    <p>Sales Report</p>
                </a>
            </li>
            <li>
                <a href="inventory">
                    <i class="material-icons">assignment</i>
                    <p>Inventory</p>
                </a>
            </li>
            <li class="active">
                <a href="purchaseorderstatus">
                    <i class="material-icons">assignment_turned_in</i>
                    <p>Purchase Order Status</p>
                </a>
            </li>
        </ul>
    </div>
</div>
@section('content')
  <div class="container">
    <br>
    <table>
      @foreach($pendingOrder as $P)
        <tr>
          <td>{{$P->stocks_id}}</td>
          <td>{{$P->orders_id}}</td>
          <td>{{$P->inventories_id}}</td>
        </tr>
      @endforeach
    </table>
      <hr>
      {{--  <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Contact No.</th>
            <th>Date Issued</th>
            <th>Handler</th>
            <th>Track ID</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

          @foreach($status as $pending)
            <tr>
              <td><a href="/devapp_final/public/purchaseorderstatus/{{$pending->id}}">{{$pending->customer_name}}</a></td>
              <td>{{$pending->customer_contactNo}}</td>
              <td>{{$pending->issued_date}}</td>
              <td>{{$pending->accessed_date}}</td>
              <td>{{$pending->trackID}}</td>
              <td>{{$pending->status}}</td>
            </tr>

          @endforeach


        </tbody>
      </table>  --}}

  </div>

@endsection
