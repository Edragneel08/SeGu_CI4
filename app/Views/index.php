<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>

  <link href="img/favicon.png" rel="icon">

  <!-- CSS Stylesheets -->
  <link href="<?php echo base_url('css/style1.css'); ?>" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

  <style>
    /* Flash message box */
    #messageBox {
      background-color: #d4edda;
      color: #155724;
      padding: 20px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
      /* display: none; */
    }

    #messageBox.error {
      background-color: #f8d7da;
      color: #721c24;
      border-color: #f5c6cb;
    }

    #messageBox.success {
      background-color: #d4edda;
      color: #155724;
      border-color: #c3e6cb;
    }

    /* Select dropdown customization */
    .select-wrapper {
      position: relative;
      width: 100%;
      margin: 8px 0;
    }

    select.form-control {
      width: 100%;
      padding: 12px 15px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 20px;
      background-color: #eee;
      font-size: 16px;
      color: #333;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="24" stroke="%23333" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="6 9 12 15 18 9"/></svg>');
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 16px 16px;
    }

    select.form-control:focus {
      border-color: #FF4B2B;
      box-shadow: 0 0 5px rgba(255, 75, 43, 0.5);
      outline: none;
    }

    .select-wrapper::after {
      content: '';
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      pointer-events: none;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      font-size: 14px;
      color: #333;
    }

    /* Adjusted styles for text fields */
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 20px;
      background-color: #eee;
      font-size: 16px;
      color: #333;
      transition: border-color 0.3s ease;
      box-sizing: border-box;
      position: relative;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #FF4B2B;
      box-shadow: 0 0 5px rgba(255, 75, 43, 0.5);
      outline: none;
    }

    i {
      position: absolute;
      top: 69.8%;
      transform: translateY(-50%);
      transform: translateX(560%);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>Security Guard Management System (SeGuMaS)</h1>

  <!-- Check for Flashdata and display it -->
  <?php if (session()->getFlashdata('msg')): ?>
    <div id="messageBox" class="error" style="display: block;">
      <?php echo session()->getFlashdata('msg'); ?>
    </div>
  <?php endif; ?>

  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form action="<?= base_url('Home/validation'); ?>" method="POST">
        <h1>Login</h1>
        <!-- <label for="roleSelection">Role</label>
        <div class="select-wrapper" id="roleSelection">
          <select class="form-control" name="role" id="role">
            <option value="Admin">Admin</option>
            <option value="staff">Staff</option>
            <option value="manager">Manager</option>
          </select>
        </div> -->
        <input type="text" placeholder="Username" name="username" required />
        <input type="password" placeholder="Password" name="password" id="password" required />
        <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
        <button type="submit">LOGIN</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h2>Hello, Welcome Back to SeGuMaS!</h2>
          <a class="segu" href="#SEGUMAS">
            <img src="<?php echo base_url('img/logo_1.png'); ?>" alt="SeGuMaS Logo" width="100%" height="90%">
          </a>

        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>Created with Love by Muhammad Irman Syakir Bin Ismail</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url('/js/hiddenField.js'); ?>"></script>
</body>

</html>