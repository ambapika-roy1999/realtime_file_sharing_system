<html>
    <head>
        <title>
             login page
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body>
        <form  action="/login" method="post">
                @csrf
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlPasword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlPasword1" placeholder="pasword" name="password">
                </div>
                <input type="submit" name="submit_user1"/>

        </form>
    </body>
    <script src="{{ asset('js/app.js') }}"></script> 
    <script>
            Echo.private('private_channel')
            .listen('private_channel_test_event', (e) => {
                console.log('event',e);
            });
    </script>
</html>