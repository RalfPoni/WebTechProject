<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remove Product</title>
  <style>
    /* CSS Styles */
    body {
      font-family: Lucida Console;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 480px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 20px;
      background-color: #FF0000;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #CC0000;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Remove Product</h1>
    <form>
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Price:</label>
        <input type="text" id="productPrice" name="productPrice" required>
      </div>
      <button type="submit">Remove Product</button>
    </form>
  </div>
</body>

</html>
