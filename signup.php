
<!DOCTYPE html>
<html>
<head>
  <title>Food Online Delivery - Sign Up</title>
  <style>
    body {
      font-family: Lucida Console;
      background-color: rgb(255,255,255);
      color: #fff;
    }
    
    .container {
      
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgb(255, 165, 0);
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    
    h2 {
      margin-bottom: 20px;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    
    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }
    
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form>
      <input type="text" placeholder="Full Name" required>
      <input type="text" placeholder="Phone number" required>
      <input type="text" placeholder="Addres" required>
       
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <input type="password" placeholder="Confirm Password" required>
      <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href='signin.html'>Sign in here</a></p>
  </div>
</body>
</html>

