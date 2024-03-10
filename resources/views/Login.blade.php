<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    <head>
    <body>
        <div class='container'>
            <form action='api/auth/login' method='POST'>
                <label for='email'>Name:</label><br>
                <input type='email' name='email'>

                <label for='username'></label>                
                <input type='text' name='username'>

                <input type='submit' value='Submit'>
            </form>
        </div>
        <div>
            <a href='api/oauth/google'>Login with Google</a>
            <a href='api/oauth/facebook'>Login with Facebook</a>
            <a href='api/oauth/twiiter'>Login with Twitter</a>
            <a href='api/oauth/github'>Login with Github</a>
        </div>
    </body>
</html>
