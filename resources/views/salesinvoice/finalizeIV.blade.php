@extends('layouts.app')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">Sales Invoice</h4>
                            <p class="category">Confirmation</p>
                        </div>
                        {!!Form::open(array('url'=>'finalizeSIV','class'=>'form','method'=>'post'))!!}
                        <div class="card-content">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating ">
                                          <label name="prod">Product Name:</label><br>
                                          <input type="text" class="form-control" name="prodname" value="{{$d['name']}}" readonly>
                                          <label name="prodid">Product ID:</label><br>
                                          <input type="text" class="form-control" name="prodid" value="{{$d['id']}}" readonly>
                                          <label name="prodprice">Product Price:</label><br>
                                          <input type="number" class="form-control" name="prodprice" value="{{$d['productPrice']}}" readonly>
                                          <label name="quantity">Product Quantity:</label><br>
                                          <input type="number" class="form-control" name="prodquantity" value="{{$d['productQuantity']}}" readonly>
                                          <label name="payment">Product Total Price:</label><br>
                                          <input type="text" class="form-control" name="payment" value="{{$d['payment']}}" readonly>
                                          <label name="status">Product Status:</label><br>
                                          <input type="text" class="form-control" name="status" value=" {{$d['stat']}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                @if ($d['stat']=='Paid')
                                  <button type="submit" name="button" class="btn btn-primary pull-left">Confirm</button>
                                  {{-- {{Form::submit('Confirm Payment',['class'=>'btn btn-primary pull-left'])}} --}}
                                @else
                                  {{-- <button type="submit" name="button" class="btn btn-primary pull-left">Confirm Payment</button> --}}
                                  {{-- {{Form::submit('submit',['class'=>'btn btn-primary pull-left'])}} --}}
                                  <a href="salesinvoice">
                                    <p>Go back</p>
                                  </a>
                                @endif
                                <div class="clearfix"></div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
