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
                          <p class="category">table</p>
                      </div>
                      <div class="card-content table-responsive">
                          <table class="table">
                              <thead class="text-primary">
                                  <th>Name</th>
                                  <th>Country</th>
                                  <th>City</th>
                                  <th>Salary</th>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Dakota Rice</td>
                                      <td>Niger</td>
                                      <td>Oud-Turnhout</td>
                                      <td class="text-primary">$36,738</td>
                                  </tr>
                                  <tr>
                                      <td>Minerva Hooper</td>
                                      <td>Curaçao</td>
                                      <td>Sinaai-Waas</td>
                                      <td class="text-primary">$23,789</td>
                                  </tr>
                                  <tr>
                                      <td>Sage Rodriguez</td>
                                      <td>Netherlands</td>
                                      <td>Baileux</td>
                                      <td class="text-primary">$56,142</td>
                                  </tr>
                                  <tr>
                                      <td>Philip Chaney</td>
                                      <td>Korea, South</td>
                                      <td>Overland Park</td>
                                      <td class="text-primary">$38,735</td>
                                  </tr>
                                  <tr>
                                      <td>Doris Greene</td>
                                      <td>Malawi</td>
                                      <td>Feldkirchen in Kärnten</td>
                                      <td class="text-primary">$63,542</td>
                                  </tr>
                                  <tr>
                                      <td>Mason Porter</td>
                                      <td>Chile</td>
                                      <td>Gloucester</td>
                                      <td class="text-primary">$78,615</td>
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
