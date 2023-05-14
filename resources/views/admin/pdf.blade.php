<!DOCTYPE html>
<html lang="en" dir="ltr">

  <link rel="stylesheet" href="home/style.css">
  <head>
    <meta charset="utf-8">
    <title>PakExpress</title>
  </head>
  <body>
    <div style="margin-top: 50px;">
      <h3 style="display: inline; font-size: 30px; margin-left: 350px;">PakExpress</h3>
      <h3 style="display: inline; font-size: 30px; padding-left: 450px;">PakExpress</h3>
    </div>

    <section id="cart-add" class="section-p1">
        <div id="subtotal">
          <h3>To</h3>
          <table>
            <tr>
              <td>Full Name</td>
              <td>{{$order->name}}</td>
            </tr>
            <tr>
              <td>Contact Number</td>
              <td>{{$order->phone}}</td>
            </tr>
            <tr>
              <td>city</td>
              <td>{{$order->city}}</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>{{$order->address}}</td>
            </tr>
          </table>

          <h3>From</h3>
          <table>
            <tr>
              <td>Full Name</td>
              <td>{{$order->name}}</td>
            </tr>
            <tr>
              <td>Contact Number</td>
              <td>{{$order->phone}}</td>
            </tr>
            <tr>
              <td>city</td>
              <td>{{$order->city}}</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>{{$order->address}}</td>
            </tr>
          </table>
        </div>

        <div id="subtotal">
          <h3>To</h3>
          <table>
            <tr>
              <td>Full Name</td>
              <td>{{$order->name}}</td>
            </tr>
            <tr>
              <td>Contact Number</td>
              <td>{{$order->phone}}</td>
            </tr>
            <tr>
              <td>city</td>
              <td>{{$order->city}}</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>{{$order->address}}</td>
            </tr>
          </table>

          <h3>From</h3>
          <table>
            <tr>
              <td>Full Name</td>
              <td>{{$order->name}}</td>
            </tr>
            <tr>
              <td>Contact Number</td>
              <td>{{$order->phone}}</td>
            </tr>
            <tr>
              <td>city</td>
              <td>{{$order->city}}</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>{{$order->address}}</td>
            </tr>
          </table>
        </div>
      </section>
  </body>
</html>
