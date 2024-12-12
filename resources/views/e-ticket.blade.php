<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Body */
        body {
            padding-top: 80px;
            font-family: 'Alegreya', serif;
            font-size: 20px;
            background-color: #F8F9FA;
        }

        /* Container */
        .container-lg {
            background-color: #E1F5FF;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin: 40px auto; /* Mengatur margin atas dan bawah */
            max-width: 800px; /* Mengatur lebar maksimum */
        }

        /* Title */
        h2 {
            color: black;
            padding-top: 0px;
            text-align: center;
            font-weight: bold;
            font-size: 32px;
        }

        /* Data Penumpang */
        .data-penumpang {
            margin-bottom: 20px;
        }

        /* Badge Airline */
        .badge-airline {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Title -->
    <h2>E-Ticket Anda</h2>

    <!-- Data Penumpang -->
    <div class="container-lg">
        <div class="data-penumpang">
            <h4>Data Penumpang</h4>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: John Doe</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: Laki-laki</td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>: 30 Tahun</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: johndoe@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Detail Penerbangan -->
        <div class="ticket-details">
            <h4>Detail Penerbangan</h4>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Maskapai</td>
                        <td>: Garuda Indonesia</td>
                    </tr>
                    <tr>
                        <td>Kode Penerbangan</td>
                        <td>: GA 123</td>
                    </tr>
                    <tr>
                        <td>Booking Code</td> <!-- New row for Booking Code -->
                        <td>: ABC123XYZ</td> <!-- Example Booking Code -->
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: 20 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td>Jam Keberangkatan</td>
                        <td>: 08:30</td>
                    </tr>
                    <tr>
                        <td>Jam Tiba</td>
                        <td>: 10:00</td>
                    </tr>
                    <tr>
                        <td>Bandara Keberangkatan</td>
                        <td>: CGK (Jakarta)</td>
                    </tr>
                    <tr>
                        <td>Bandara Tujuan</td>
                        <td>: SUB (Surabaya)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
