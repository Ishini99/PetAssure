<form method="POST" action="">
  <label for="phone">Phone Number:</label>
  <input type="text" id="phone" name="phone" placeholder="(123) 456-7890">
  <div id="phoneError" class="error"></div>

  <label for="price">Price:</label>
  <input type="text" id="price" name="price" placeholder="$100">
  <div id="priceError" class="error"></div>

  <button type="submit" name="submit">Submit</button>
</form>

<script>
  const form = document.querySelector('form');
  const phoneInput = document.getElementById('phone');
  const priceInput = document.getElementById('price');
  const phoneError = document.getElementById('phoneError');
  const priceError = document.getElementById('priceError');

  form.addEventListener('submit', (e) => {
    let isValid = true;

    // Validate phone number
    const phoneRegex = /^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$/;
    if (!phoneRegex.test(phoneInput.value)) {
      phoneError.textContent = 'Invalid phone number format';
      isValid = false;
    } else {
      phoneError.textContent = '';
    }

    // Validate price
    const priceRegex = /^\$[0-9]+$/;
    if (!priceRegex.test(priceInput.value)) {
      priceError.textContent = 'Invalid price format';
      isValid = false;
    } else {
      priceError.textContent = '';
    }

    if (!isValid) {
      e.preventDefault(); // Prevent form submission if validation fails
    }
  });
</script>
 