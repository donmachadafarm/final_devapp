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
        <li>
            <a href="inventory">
                <i class="material-icons">dvr</i>
                <p>View Inventory</p>
            </a>
        </li>
      </ul>
        <ul class="nav">
          <li class="active">
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
@section('content')


<div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 col-md-offset-3">
                  <div class="card">
                      <div class="card-header" data-background-color="green">
                          <h4 class="title">Purchase Order Status</h4>
                          <p class="category">form</p>
                      </div>

              <table id="table_id"  class="table table-hover table-bordered">
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
                    <td><a href="/final_devapp/public/purchaseorderstatus/{{$pending->id}}">{{$pending->customer_name}}</a></td>
                    <td>{{$pending->customer_contactNo}}</td>
                    <td>{{$pending->issued_date}}</td>
                    <td>{{$pending->accessed_date}}</td>
                    <td>{{$pending->trackID}}</td>
                    <td>{{$pending->status}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
