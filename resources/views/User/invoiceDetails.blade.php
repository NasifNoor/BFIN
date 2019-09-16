
</!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://js.stripe.com/v3/"></script>
	<style type="text/css">
		/**
		 * The CSS shown here will not be introduced in the Quickstart guide, but shows
		 * how you can use CSS to style your Element's container.
		 */
		.StripeElement {
		  box-sizing: border-box;

		  height: 40px;
		  width: 400px;

		  padding: 10px 12px;

		  border: 1px solid transparent;
		  border-radius: 4px;
		  background-color: white;

		  box-shadow: 0 1px 3px 0 #e6ebf1;
		  -webkit-transition: box-shadow 150ms ease;
		  transition: box-shadow 150ms ease;
		}

		.StripeElement--focus {
		  box-shadow: 0 1px 3px 0 #1b3b5c;
		}

		.StripeElement--invalid {
		  border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
		  background-color: #fefde5 !important;
		}
	</style>
</head>
<body>
	<a href="/viewInvoice" style="">Back</a>
	<h1> Invoice</h1>
	<hr>
	<table >
		<tr class="text-left">
			<td>Date: </td>
			<td>{{$inv['date']}}</td>
		</tr>
		<tr class="text-left">
			<td>Email: </td>
			<td>{{$inv['customeremail']}}</td>
		</tr>
		<tr class="text-left">
			<td>Invoice Id: </td>
			<td>{{$inv['id']}}</td>
		</tr>
	</table><br><br>



	<table >
		<tr class="text-center">
			<td><b>Product Id </b></td>
			<td><b>Quantity</b></td>
			<td><b>Unit Price </b></td>
			<td><b>Discount </b></td>
			<td><b>Total </b></td>
		</tr>
		<tr class="text-center">
			<td>{{$inv['productid']}}</td>
			<td>each {{$inv['quantity']}}</td>
			<td>{{$inv['unitprice']}}</td>
			<td>{{$inv['discount']}}%</td>
			<td>{{$inv['amount']}}</td>
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
			<td></td>
			<td></td>
			<td></td>
			<td>Shipping</td>
			<td>0.00</td>
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
		</tr>
		<tr class="text-center">
			<td></td>
			<td></td>
			<td></td>
			<td>Total Ammount = </td>
			<td>{{$inv['amount']}}</td>
		</tr>
	</table>

<br>
<br>
<br>
	<form  method="post" id="payment-form">
	  <div class="form-row">
	    <label for="card-element">
	     <b> Enter card info to make payment:</b> (use <i>4242 4242 4242 4242</i> as card number)<br><br>
	    </label>
	    <div id="card-element">
	      <!-- A Stripe Element will be inserted here. -->
	    </div>

	    <!-- Used to display Element errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button>Submit Payment</button>
	</form>

	<script type="text/javascript">
			// Create a Stripe client.
		var stripe = Stripe('pk_test_g5ByXPWv3BbAohbkbtrCGap200hWUWNpwc');

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
			 base: {
			    // Add your base input styles here. For example:
			    fontSize: '16px',
			    color: "#32325d",
			  }
			};

			// Create an instance of the card Element.
			var card = elements.create('card', {style: style});

			// Add an instance of the card Element into the `card-element` <div>.
			card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.addEventListener('change', function(event) {
		  var displayError = document.getElementById('card-errors');
		  if (event.error) {
		    displayError.textContent = event.error.message;
		  } else {
		    displayError.textContent = '';
		  }
		});

		// Create a token or display an error when the form is submitted.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
		  event.preventDefault();

		  stripe.createToken(card).then(function(result) {
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

		// Submit the form with the token ID.
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
	</script>
</body>
</html>
