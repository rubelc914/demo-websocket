<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <div>
        <h1>Trade: </h1> <span id="trade-id"></span>
    </div>
   </div>
   <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        Echo.channel('trades1').listen('TradeEvent', (data)=>{
            document.getElementById('trade-id').innerHTML = data.trade;
             console.log(data.trade);
        })
        Echo.private('private-message').listen('PrivateChannelEvent', (data)=>{
            // document.getElementById('trade-id').innerHTML = data.trade;
             console.log(data);
        })
    </script>
  </body>
</html>
