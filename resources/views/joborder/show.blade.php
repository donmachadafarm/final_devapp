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
        <li class="active">
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
                       <h4 class="title">Create Job Order</h4>
                      <p class="category">form</p>
                      </div>
  					{{Form::open(array('url'=>'joborder','class'=>'form','method'=>'post'))}}
  						<div class="card-content">
  								<div class="row">
  									<div class="col-md-6">
                      <div class="form-group label-floating">
    										<label class="control-label">Available Products for Restock:</label>
    										<select class="form-control" id="product" name="product">
    											@foreach($data as $p)
    											<option value="{{$p['id']}}">ID: {{$p['id']}} | {{$p['name']}}</option>
    											@endforeach
    										</select>
  									  </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        {{ Form::label('stock', 'Quantity to restock:',['class'=>'control-label']) }}
                        {{ Form::text('stock', '', ['class' => 'form-control'])}}
                      </div>
                    </div>
  								</div>

  								{{Form::submit('submit',['class' => 'btn btn-fill'])}}

                  <div class="clearfix"></div>
  							<div class="row">
  							{!! Form::close() !!}
  							</div>
            </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
