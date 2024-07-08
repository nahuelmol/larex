<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    <head>
    <body>
        <div class='container'>
            <form action="{{ route('reguser') }}" method='POST'>
                @csrf
                <label>Username:</label><br>
                <input type='text' name='username'>

                <label>Email:</label>
                <input type='text' name='email'>

                <label>Password:</label>
                <input type='password' name='password'>

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
