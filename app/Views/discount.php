<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Diskon</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            text-align: right;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[readonly] {
            background-color: #f3f3f3;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Aplikasi Perhitungan Diskon</h2>
        <form>
            <label for="harga">Harga Asli</label>
            <input type="text" id="harga" oninput="hitungDiskon()">
            
            <label for="diskon">Diskon (%)</label>
            <input type="text" id="diskon" oninput="hitungDiskon()">
            
            <label for="hasil">Harga Setelah Diskon</label>
            <input type="text" id="hasil" readonly>
            <p id="error" class="error"></p>
        </form>
    </div>
    
    <script>
        function formatNumber(num) {
            return num.toLocaleString("id-ID");
        }

        function hitungDiskon() {
            let hargaInput = document.getElementById("harga").value.replace(/[^0-9]/g, '');
            let diskonInput = document.getElementById("diskon").value.replace(/[^0-9.]/g, '');
            let errorText = document.getElementById("error");
            
            let harga = parseFloat(hargaInput) || 0;
            let diskon = parseFloat(diskonInput) || 0;
            
            if (diskon > 100) {
                diskon = 100;
                document.getElementById("diskon").value = 100;
            }
            
            if (harga < 0) {
                errorText.textContent = "Woi! gak boleh minus....";
                document.getElementById("hasil").value = "";
                return;
            } else {
                errorText.textContent = "";
            }
            
            let hargaSetelahDiskon = harga - (harga * (diskon / 100));
            document.getElementById("harga").value = formatNumber(harga);
            document.getElementById("diskon").value = diskon;
            document.getElementById("hasil").value = formatNumber(hargaSetelahDiskon);
        }
    </script>
</body>
</html>
