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

      <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  <th>Amount Type</th>
                  <th>Expiry Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td class="center">{{ $coupon->id }}</td>
                  <td class="center">{{ $coupon->coupon_code }}</td>
                  <td class="center">{{ $coupon->amount }}</td>
                  <td class="center">{{ $coupon->type }}</td>
                  <td class="center">{{ $coupon->expiry_date }}</td>
                  <td class="center">@if($coupon->status==1) Active @else Inactive @endif</td>
                  <td class="center"> 
                    <a href="{{ url('/edit_coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a onlick="return delCoupon();" href="{{ url('/delete_coupon/'.$coupon->id) }}"<?php // rel="{{ $coupon->id }}" rel1="delete-coupon" href="javascript:"?> class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        function delCoupon(){
          if(confirm('Are you sure you want to delete this coupon?')){
            return true;
          }
          return false;
        }

    </script>




@endsection