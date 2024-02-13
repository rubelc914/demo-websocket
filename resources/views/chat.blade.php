<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <title>chat</title>
  </head>
  <body>
    <div class="container">
        <div class="row" id="chat-start">
            <div class="col-6">
                <form id="start-chat">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name">
                      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Let's chat</button>
                </form>
            </div>
        </div>
        <div id="chat-part">
            <div class="row">
                <div class="col-6">
                    <form id="chat-form">
                        @csrf
                        <div class="form-group">
                        <label for="name">message</label>
                        <input type="text" class="form-control" id="message" name="message">
                        <input type="hidden" name="username" id="username">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    <div id="mesg-container"></div>
                </div>
            </div>
        </div>

    </div>


    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $('#chat-part').hide();

        $('#start-chat').submit(function(event){
            event.preventDefault();
            $('#username').val($('#name').val());
            $('#chat-start').hide();
            $('#chat-part').show();

        })

        $('#chat-form').submit(function(event){
            event.preventDefault();
            let formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url:"{{route('sendMessage')}}",
                type:'POST',
                data: formData
            });
            $('#message').val('');
        })

        Echo.channel('live-chat')
        
        .listen('ChantEvent',(e)=>{
            let html = `<br>
            <b>`+e.username+`:- </b>
            <span>`+e.message+` </span>`;
            console.log(e);
            $('#mesg-container').append(html);
        })

        // Echo.channel('live-chat').listen('ChantEvent', (data)=>{
        //     // document.getElementById('trade-id').innerHTML = data.trade;
        //      console.log(data);
        // });




    </script>

  </body>
</html>
