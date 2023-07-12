@extends('front.parent')
@section('title' , '| Checkout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">
                    <form action="{{ route('payment.process') }}" method="POST" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="country" id="country" class="form-control">
                                            <option value="France">France</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Hongkong">Hongkong</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cardinformation">Card information</label>
                                    <input type="text" name="cardinformation" class="form-control" placeholder="4242 - 4242 - 2424 - 2424">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input type="text" name="streetaddress" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="expiration">Expiration</label>
                                <input type="text" class="form-control" name="expiration" id="cc-expiration" placeholder="00/00" required="" fdprocessedid="fiin8t">
                                <div class="invalid-feedback">
                                  Expiration date required
                                </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" name="cvv" id="cc-cvv" placeholder="000" required="" fdprocessedid="bkxsd">
                                <div class="invalid-feedback">
                                  Security code required
                                </div>
                              </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expiration_month">expiration_month</label>
                                    <input type="number" name="expiration_month" class="form-control" placeholder="expiration_month">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" name="postcodezip" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" name="emailaddress" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>$20.60</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>$0.00</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount</span>
                                        <span>$3.00</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>$17.60</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" value="direct_bank_transfer" class="mr-2"> Direct Bank Tranfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" value="check_payment" class="mr-2"> Check Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" value="paypal" class="mr-2"> Paypal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="terms_conditions" value="1" class="mr-2"> I have read and accept the terms and conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
     <!-- .section -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });
            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>
@endpush
