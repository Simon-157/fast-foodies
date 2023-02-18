<!DOCTYPE html>
<html>
  <head>
    <title>My Cart</title>
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      h1 {
        text-align: center;
        margin-top: 20px;
      }
      .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px;
      }
      .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 10px;
        width: 300px;
        position: relative;
      }
      .card-content {
        padding: 10px;
      }
      .card h2 {
        margin-top: 0;
        margin-bottom: 10px;
      }
      .card p {
        margin: 5px 0;
      }
      .card .price {
        font-weight: bold;
      }
      .card .quantity {
        font-style: italic;
      }
      .card .delete {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
      }
      .total {
        text-align: right;
        margin: 20px;
      }
      button {
        display: block;
        margin: 0 auto;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        background-color: #ff6600;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      button:hover {
        background-color: #e55d00;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWuUAWi5PARG0gVGYmPNdwdONphMgmLuY&callback=initMap" async defer></script>

  </head>
  <body>
    <h1>My Cart</h1>
    <div class="card-container">
      <div class="card">
        <div class="delete" onclick="deleteItem(this)">X</div>
        <div class="card-content">
          <h2>Chicken Parmesan</h2>
          <p class="price">$12.99</p>
          <p class="quantity">Quantity: 2</p>
          <p class="subtotal">Subtotal: $25.98</p>
        </div>
      </div>
      <div class="card">
        <div class="delete" onclick="deleteItem(this)">X</div>
        <div class="card-content">
          <h2>Caesar Salad</h2>
          <p class="price">$8.99</p>
          <p class="quantity">Quantity: 1</p>
          <p class="subtotal">Subtotal: $8.99</p>
        </div>
      </div>
      <div class="card">
        <div class="delete" onclick="deleteItem(this)">X</div>
        <div class="card-content">
          <h2>Garlic Bread</h2>
          <p class="price">$3.99</p>
          <p class="quantity">Quantity: 3</p>
          <p class="subtotal">Subtotal: $11.97</p>
        </div>
      </div>
    </div>
    <p class="total">Total: $46.94</p>
    <button onclick="clearCart()">Clear Cart</button>
<form id="order-form"><input id="address-input" name ="" /><br><br><button type="" onclick="initMap()">Submit</button></form>

<div id="map"></div>
<!-- Include the Uploadcare script -->
<script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>

<!-- Your HTML code here -->
<div>
  <input type="hidden" role="uploadcare-uploader"
         data-public-key="e2ac7ad8c06a4a0b28b2"
         data-images-only="true">
  <img id="uploaded-image">
</div>

<script type="text/javascript" src="public\scripts\deliveryMap.js"></script>
<!-- Your JavaScript code here -->
<script>
  // Initialize the Uploadcare widget
  var widget = uploadcare.Widget('[role=uploadcare-uploader]');

  // Listen for when a file is uploaded
  widget.onUploadComplete(function(info) {
    console.log('File uploaded:', info.cdnUrl);

    // Display the uploaded image in the img element
    var imgElement = document.getElementById('uploaded-image');
    imgElement.src = info.cdnUrl;
  });
</script>


    <script>
  function deleteItem(element) {
    // Find the card element and remove it
    const card = element.closest(".card");
    card.remove();

    // Update the total
    updateTotal();
  }

  function clearCart() {
    // Find all card elements and remove them
    const cards = document.querySelectorAll(".card");
    cards.forEach((card) => card.remove());

    // Update the total
    updateTotal();
  }

  function updateTotal() {
    // Find all subtotal elements and sum them
    const subtotals = document.querySelectorAll(".subtotal");
    let total = 0;
    subtotals.forEach((subtotal) => {
      const price = parseFloat(subtotal.previousElementSibling.textContent.slice(1));
      const quantity = parseInt(subtotal.previousElementSibling.previousElementSibling.textContent.split(": ")[1]);
      total += price * quantity;
    });

    // Update the total element
    const totalElement = document.querySelector(".total");
    totalElement.textContent = `Total: $${total.toFixed(2)}`;
  }
</script>
  </body>
  </html>
