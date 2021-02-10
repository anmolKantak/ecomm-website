@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Coupon</div>
                    <div class="card-body">
                    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
                        
                        <br />

                        

                        <form method="post" action="{{ url('/edit_coupon/'.$couponDetails->id) }}" accept-charset="UTF-8" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="mb-3">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <input type="text"class="form-control" value="{{ $couponDetails->coupon_code }}" pattern=".{5,15}" required title = "5 to 15 characters required!" name="coupon_code" id="coupon_code"  style="width:750px" autocomplete="off" required >
                            </div>
                            <label for="type" class="form-label">Coupon Type</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="width:658px "id="type" name="type" placeholder="coupon type" required>
                           
                            <option @if($couponDetails->type == 'percentage') selected @endif value="percentage">percentage</option>
                             <option @if($couponDetails->type == "fixed") selected @endif value="fixed">fixed</option>
                             </select>
                             <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" value="{{ $couponDetails->amount }}" class="form-control" id="amount"  name="amount" style="width:750px" required>
                            </div>
                            <div class="mb-3">
                            <label for="expiry_date" class="form-label" required>Expiry Date</label>
                            <input type="text"value="{{ $couponDetails->expiry_date }}" class="form-control" id="expiry_date" name="expiry_date"style="width:750px" autocomplete="off" required>
                            </div>
                            
                            
                            <div class="form-check">
                            <input type="hidden" name="status" value="0" class="form-check-input" >
                            <input class="form-check-input"@if($couponDetails->status == '1')checked @endif type="checkbox" name="status" value="1" id="status">
                            <label class="form-check-label" for="status">
                             Enable
                            </label>
                            </div>
                            <br/><br/>
                            <div class="form-actions">
                <input type="submit" value="Add Coupon" class="btn btn-success">
              </div>

                        

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>




@endsection