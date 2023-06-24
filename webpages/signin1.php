<!DOCTYPE html>
<html>
<head>
  <title>Food Online Delivery - Sign In</title>
  <style>
    body {
      font-family: Lucida Console;
      background-color: rgb(255, 255, 255);
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
    
    
  </style>
</head>
<body>
  <div class="container">
    <h2>Sign In</h2>
    <form>
      <input type="text" placeholder="Username/Email" required>
      <input type="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
      <p>Forgot your password? Contact support@foo.com </p>
    </form>
    <p>Don't have an account yet? <a href='signup.html'>Sign up here</a></p>
  </div>
</body>
</html>
