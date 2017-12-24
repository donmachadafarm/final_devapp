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
          <li>
              <a href="orderstatus">
                  <i class="material-icons">border_color</i>
                  <p>Purchase order status</p>
              </a>
          </li>
          <li class="active">
              <a href="salesreport">
                  <i class="material-icons">equalizer</i>
                  <p>Sales report</p>
              </a>
          </li>
        </ul>
    </div>
</div>
@section('content')

  <div class="col-md-4 col-md-offset-3">
      <div class="card">
          <div class="card-header card-chart" data-background-color="green">
              <div class="ct-chart" id="emailsSubscriptionChart"></div>
          </div>
          <div class="card-content">
              <h4 class="title">Email Subscriptions</h4>
              <p class="category">Last Campaign Performance</p>
          </div>
          <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="card">
          <div class="card-header card-chart" data-background-color="green">
              <div class="ct-chart" id="completedTasksChart"></div>
          </div>
          <div class="card-content">
              <h4 class="title">Completed Tasks</h4>
              <p class="category">Last Campaign Performance</p>
          </div>
          <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
          </div>
      </div>
  </div>
  </div>
@endsection
