<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login TBD</title>
    <style>
      /** {outline: 1px solid black;}*/
      body {margin:0; padding:0; font-size:16px;max-width: 1024px;margin: 0 auto;}
      .site-title {color:#FFFFFF;font-variant:small-caps;font-family:monospace, sans-serif;font-weight:normal;}
      .container {margin-left:1rem;margin-right:1rem; min-height:100vh;}
      .container-style {background-color:#2196f3;}
      .parent {display:flex; flex-direction:column;justify-content:center;}
      .child {margin-top:1rem;margin-bottom:1rem;}
      .form-item {padding:0;width:100%;height:2.5rem;}
      .btn {background-color:#ff5722;border-color:#FFFFFF;border-style:solid;border-radius:.3rem;border-width:thin;color:#FFFFFF;}
      .form-item-style {border-color:#1976d2;border-style:solid;border-radius:.3rem;}
      .form-item-style:focus {border-color:#f44336;outline-style:none;}
      @media only screen and (min-width: 608px) and (max-width: 767px) {
        .container {margin-left:7rem;margin-right:7rem;}
      }
      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        .container {margin-left:15rem;margin-right:15rem;}
      }
      @media only screen and (min-width: 1024px) and (max-width: 1224px) {
        .container {width:400px;margin-left: auto;margin-right:auto;}
      }
    </style>
  </head>
  <body class="container-style">
    <div class="container parent">
      <h1 class="site-title">Login</h1>
      <form class="parent" method="POST" autocomplete="off" action="/login/in">
        <div class="child">
          <input class="form-item form-item-style" type="text" name="username" placeholder="Your Username">
        </div>
        <div class="child">
          <input class="form-item form-item-style" type="password" name="password" placeholder="Your Password">
        </div>
        <div class="child">
          <input class="form-item btn" type="submit" name="submit">
        </div>
      </form>
    </div>
  </body>
</html>
