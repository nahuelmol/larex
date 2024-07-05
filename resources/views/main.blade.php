<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main</title>
        <link rel="stylesheet" href="css/mainstyles.css">
    <head>
    <body>
        <div class='container'>
            <p>Inversor</p>
            <div id="dataset">
                <p id="paragraph"></p>
            </div>
            <button id="graphBtn">Graph</button>
            <button id="checkBtn">Check Data</button>
            <button id="imporBtn">Import</button>
            <button id="calculateBtn">Calculate</button>
            <p id="datashow">Data</p>
            <br>
            <br>
            <label for="depth">Depth:</label>
            <input type="text" id="depthInput" name="depth"></input>
            <label for="nblck">Nblock</label>
            <input type="text" id="nblckInput" name="nblck"></input>
            <label for="width">Width block:</label>
            <input type="text" id="widthInput" name="width"></input>
            <label for="iesp">Initial espesor:</label>
            <input type="text" id="iespInput" name="iesp"></input>
            <label for="icontrast">Initial contrast:</label>
            <input type="text" id="icontrastInput" name="icontrast"></input>
            <br>
            <br>
            <canvas id="yaxis" width="10" height="200"></canvas>
            <canvas id="obspanel" with="400" height="200"></canvas>
            <br>
            <canvas id="origin" width="10" height="10"></canvas>
            <canvas id="xaxis" width="400" height="10"></canvas>
            <br>
            <canvas id="panelprove" with="500" height="500"></canvas>
            <br>
            <canvas id="modpanel" with="500" height="150"></canvas>

            <script src="{{ asset('js/table.js') }}"></script>
            <script src="{{ asset('js/index.js') }}"></script>
            <script src="{{ asset('js/obspanel.js') }}"></script>
            <script src="{{ asset('js/graphs.js') }}"></script>
            <script src="{{ asset('js/takeparameters.js') }}"></script>
        </div>
        <div>
            <dialog id="dialogbox">
                <p>You can drag a file</p>
                <p>You can start an editable table process</p>
                <button id="ediTableBtn">Start table editing</button>
                <button id="closeDlgBtn">Close</button>

                <p id="currentSelection"></p>

                <div id="tableContainer">
                    <button id="addBtn">Add</button>
                    <button id="delBtn">Del</button>
                </div>
            </dialog>
        </div>
    </body>
</html>
