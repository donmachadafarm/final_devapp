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
            <li class="active">
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
                          <h4 class="title">Generate Sales Invoice</h4>
                          <p class="category">Sales Invoice</p>
                      </div>
                      {{Form::open(array('url'=>'finalizeIV','class'=>'form'))}}
                      <div class="card-content">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group label-floating">

                                          <select class="form-control" name="product" id="product">
                                            @foreach ($data as $p)

                                                <option value="{{$p['products_id']}}">Order ID: {{$p['id']}} | Track ID: {{$p['trackID']}}</option>

                                            @endforeach
                                          </select>

                                          <select class="form-control" name="order" id="order">
                                            @foreach ($data as $p)

                                                <option value="{{$p['id']}}">Job ID: {{$p['id']}} | Track ID: {{$p['trackID']}}</option>

                                            @endforeach
                                          </select>

                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-left">Generate Sales Invoice</button>
                              <div class="clearfix"></div>
                      </div>
                      {{Form::close()}}
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
