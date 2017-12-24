@extends('layouts.app')

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
            <li class="active">
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
                       <h4 class="title">Create Purchase Order</h4>
                      <p class="category">form</p>
                      </div>
  					{{Form::open(array('url'=>'purchaseorder','class'=>'form','method'=>'post'))}}

  						<div class="card-content">
  								<div class="row">
      									<div class="col-md-4">
      										<div class="form-group label-floating">
                            {{ Form::label('cusName', 'Customer Name: ', ['class' => 'control-label']) }}
      											{{ Form::text('cusName', '', ['class' => 'form-control border-input'])}}
      										</div>
      									</div>

                        <div class="col-md-4">
  										    <div class="form-group label-floating">
                            {{ Form::label('cusNum', 'Customer Contact Number: ', ['class' => 'control-label']) }}
  										  	  {{ Form::text('cusNum', '', ['class' => 'form-control border-input'])}}
  										    </div>
  									    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">
                                      <label class="form-group label-floating">Customer Type:</label>
                                      <select class="form-control" id="cusType" name="cusType">
                                          @foreach($type as $p)
                                              <option value="{{$p['id']}}">
                                                  {{$p['type']}}
                                              </option>
                                          @endforeach
                                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-group label-floating">Product:</label>
                      <select class="form-control" id="product" name="product">
                        @foreach($data as $p)
                                                  <option value="{{$p['id']}}">
                                                      ID: {{$p['id']}} | {{$p['name']}}
                                                  </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row">


                    <div class="col-md-4">
                      <div class="form-group label-floating">
                        {{ Form::label('productCount', 'Quantity: ', ['class' => 'control-label']) }}
                        {{ Form::text('productCount', '', ['class' => 'form-control border-input'])}}
                      </div>
                    </div>
                  </div>

                    <div class="row">
                      <div class="col-md-2">
                        <div class="clearfix"></div>
                      {{Form::submit('submit',['class' => 'btn btn-fill btn-fill'])}}
                        </div>
                    </div>


  								</div>

  							{!! Form::close() !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
