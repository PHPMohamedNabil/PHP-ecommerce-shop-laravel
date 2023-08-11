

<?php $__env->startSection('content'); ?>

 <div class="container">
  <div class="row">
  	<div class="col-md-6">
  		<table id="cart" class="table table-hover">
 		<thead>
 			<tr>
 				<th scope="col">#</th>
 				<th scope="col">Image</th>
 				<th scope="col">Product</th>
 				<th scope="col">Price</th>
 				<th scope="col">Quantity</th>
 			</tr>
 		</thead>
 		<tbody>
 		 <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 			<tr>
 				<td>#</td>
 				<td><img src="<?php echo e(Storage::url($product['image'])); ?>" width="100" /></td>
 				<td><?php echo e($product['name']); ?></td>
 				<td><?php echo e($product['price']); ?></td>
 				<td><?php echo e($product['quantity']); ?></td>
 			</tr>
 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 		</tbody>
 	</table>
 	<hr>
 	<div class="card-footer">
 		<span style="margin-left:300px;">Total Price : <?php echo e($cart->total_price); ?></span>
 	</div>
  	</div>
  	<div class="col-md-6">
  		<div class="card">
  			<div class="card-header">CheckOut</div>
  			<div class="card-body">
     <form  action="<?php echo e(route('charge')); ?>" method="post" id="payment-form">
   	  <?php echo csrf_field(); ?>
   	 <div class="form-group">
   	 	<label>Name</label>
   	 	<input type="text" name="name" id="name" class="form-control" required="">
   	 </div>
   	 <div class="form-group">
   	 	<label>Address</label>
   	 	<input type="text" name="address" id="address" class="form-control" required="">
   	 </div>
   	 <div class="form-group">
   	 	<label>City</label>
   	 	<input type="text" name="city" id="city" class="form-control" required="">
   	 </div>
   	 <div class="form-group">
   	 	<label>State</label>
   	 	<input type="text" name="state" id="state" class="form-control" required="" />
   	 </div>
   	 <div class="form-group">
   	 	<label>Postol code</label>
   	 	<input type="text" name="postolcode" id="postalcode" class="form-control" required="" />
   	 </div>
   	 <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
   	<div class="form-group">
      <div class="form-group">
        Cash:<input type="radio" onclick="return hide();" name="payment" value="cash" />
      </div>
      <div class="form-group">
        Master/Visa:<input onclick="return display();" type="radio" name="payment" value="card" />
      </div>
      <div class="form-group" id="visa" style="display:none;">
        <input type="text" name="card_method" placeholder="Credit Card / Debit Card .." maxlength="19"><input type="text" name="expiredate" maxlength="3" placeholder="expiry date.." /><input type="text" name="cvv" maxlength="3" placeholder="Cvv.." />
      </div>
    <!--<label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element" class="form-control">
    </div>

    <div id="card-errors" role="alert"></div>
  </div>-->

  <button class="btn btn-primary mt-3">Submit Payment</button>
   </form>
    </div>
  	</div>
  </div>
 </div>
</div>
<script type="application/javascript" src="https://js.stripe.com/v3/"></script>
<script type="application/javascript">
window.onload= function()
{
	var stripe = Stripe('pk_test_51ErqJACeBi5LbAJb78k0XFPjd8xQhcj3t6WkwmC0gEJWVajKe02P61220sZ08NYSETa0MKfzDZYGVpNEn0skZiCA00UX4JhWP0');
    var elements = stripe.elements();
		// Custom styling can be passed to options when creating an Element.
 var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
 var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
 card.mount('#card-element');

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options ={
  	 name:document.getElementById('name').value,
  	 address_line1:document.getElementById('address').value,
  	 address_city:document.getElementById('city').value,
  	 address_state:document.getElementById('state').value,
  	 address_zip:document.getElementById('postalcode').value
  }

  stripe.createToken(card,options).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});


function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


}

function display()
{
  document.getElementById('visa').style.display="block";
}

function hide()
{
  document.getElementById('visa').style.display="none";
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel_projects\laptops\resources\views/checkout.blade.php ENDPATH**/ ?>