@extends('layouts.frontend.app')
@section('title','Cart')

@section('content')

@php
$articles = [
['label'=>'jhjhhjh','qty'=>5,'price'=>5000],['label'=>'uiu','qty'=>5,'price'=>5000],['label'=>'ses','qty'=>5,'price'=>5000],
];
@endphp

<div class="page-title-area title-bg-three">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="title-content">
					<h2>Cart</h2>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><span>Cart</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="wishlist-area ptb-100">
	<div class="container">
		<div class="wishlist-item">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Trash</th>
						<th scope="col">Image</th>
						<th scope="col">Product Name</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>
				  @foreach($articles as $article)
					<tr>
						<td><a class="trash" href="#"><i class='bx bx-trash'></i></a></td>
						<td><img src="{{asset('frontend/images/shop/7.png')}}" alt="Product"></td>
						<td>{{$article['label']}}</td>
						<td><input type="number" name="qty[]" value="{{$article['qty']}}"></td>
						<td>{{$article['price']}} XAF</td>
						<td>{{$article['qty']*$article['price']}} XAF</td>
					</tr>
				  @endforeach

					<tr>
						<td colspan="5">Total</td>
						<td >50000 XAF</td>
						{{--<td>
							<a class="common-btn"  style = "padding: 7px 10px;" href="cart.html" type="submit">
								<span class="one"></span>
								<span class="two"></span>
								Validate
							</a>
						</td>--}}
					</tr>
				</tbody>
			</table>
		</div>
		<div class="checkout-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<form action="{{mob_route('billing')}}" method="post">
							@csrf
							<div class="billing">
								<h3>Billing Details</h3>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" name="first_name">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Last Name*</label>
											<input type="text" class="form-control" name="last_name" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone*</label>
											<input type="text" class="form-control" name="phone" required>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Address*</label>
											<input type="text" class="form-control" name="address" required>
										</div>
									</div>
									<div class="col-lg-12">
										<button type="submit" class="common-btn">
											<span class="one"></span>
											<span class="two"></span>
											Validate
										</button>
									</div>
								</div>
							</div>
							<input type="hidden" value="qty[]">
						</form>
					</div>
					<div class="col-lg-4">
						<div class="summery">
							<h3>Checkout Summary</h3>
							<ul>
								<li>
									Subtotal:
									<span>$280.00</span>
								</li>
								<li>
									Total:
									<span>$330.00</span>
								</li>
								<li>
									Payable Total:
									<span>$330.00</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
