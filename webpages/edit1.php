<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
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

    input[type="text"],
    input[type="number"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Edit Product</h1>
    <form>
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Price:</label>
        <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>
      </div>
      <div class="form-group">
        <label for="productImage">Image:</label>
        <input type="file" id="productImage" name="productImage" accept="image/*" required>
      </div>
      <button type="submit">Edit Product</button>
    </form>
  </div>
</body>

</html>
