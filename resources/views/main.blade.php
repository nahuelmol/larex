<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main</title>
    <head>
    <body>
        <div class='container'>
            <p>Inversor</p>
            <div id="dataset"></div>
            <button id="graphBtn">Graph</button>
            <button id="checkBtn">Check Data</button>
            <p id="datashow">Data</p>
            <br>
            <br>
            <canvas id="obspanel" with="500" height="500"></canvas>
            <br>
            <canvas id="modpanel" with="500" height="500"></canvas>
            <script src="{{ asset('js/index.js') }}"></script>
            <script src="{{ asset('js/obspanel.js') }}"></script>
            <script src="{{ asset('js/graphs.js') }}"></script>
        </div>
        <div>
        </div>
    </body>
</html>
