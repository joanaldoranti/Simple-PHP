<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading System</title>
    <link rel="stylesheet" href="grading.css">
</head>

<body>
    <div class="container input">
        <h1>Grading System</h1><hr>
        <h3>Input Nilai</h3>
        <!-- Input nilai dengan method post -->
        <form action="" method="POST">
            <!-- tabek input -->
            <table>
                <tr>
                    <td>Nilai DDP</td>
                    <!-- input nilai dengan id ddp -->
                    <td><input type="text" name="ddp" id="ddp"></td>
                </tr>
                <tr>
                    <td>Nilai PTI</td>
                    <!-- input nilai dengan id pti -->
                    <td><input type="text" name="pti" id="pti"></td>
                </tr>
                <tr>
                    <td>Nilai ASD</td>
                    <!-- input nilai dengan id asd -->
                    <td><input type="text" name="asd" id="asd"></td>
                </tr>
                <tr>
                    <td>Nilai PBO</td>
                    <!-- input nilai dengan id pbo -->
                    <td><input type="text" name="pbo" id="pbo"></td>
                </tr>
                <tr>
                    <td>Nilai PW</td>
                    <!-- input nilai dengan id pw -->
                    <td><input type="text" name="pw" id="pw"></td>
                </tr>
                <tr>
                    <!-- memberikan tombol submit dengan colspan 2 -->
                    <td colspan="2"><button type="submit" name="submit">Submit</button></td>
                </tr>
            </table>
    </div>

    <?php
    // Memanggil fungsi grade jika tombol submit ditekan
    if (isset($_POST['submit'])) {
        $ddp = $_POST['ddp'];
        $pti = $_POST['pti'];
        $asd = $_POST['asd'];
        $pbo = $_POST['pbo'];
        $pw = $_POST['pw'];

        // Fungsi untuk menghitung grade
        function grade($score)
        {
            if ($score >= 81 && $score <= 100)
                return "A";
            elseif ($score >= 71 && $score <= 80)
                return "B";
            elseif ($score >= 61 && $score <= 70)
                return "C";
            elseif ($score >= 51 && $score <= 60)
                return "D";
            elseif ($score >= 0 && $score <= 50)
                return "E";
            else
                return "-";
        }

        // Memanggil fungsi grade
        $gradeDDP = (is_numeric($ddp) && $ddp >= 0 && $ddp <= 100) ? grade($ddp) : "-";
        $gradePTI = (is_numeric($pti) && $pti >= 0 && $pti <= 100) ? grade($pti) : "-";
        $gradeASD = (is_numeric($asd) && $asd >= 0 && $asd <= 100) ? grade($asd) : "-";
        $gradePBO = (is_numeric($pbo) && $pbo >= 0 && $pbo <= 100) ? grade($pbo) : "-";
        $gradePW = (is_numeric($pw) && $pw >= 0 && $pw <= 100) ? grade($pw) : "-";

        // Jika ada inputan grade "-" maka menampilkan alert inputan salah
        if ($gradeDDP == "-" || $gradePTI == "-" || $gradeASD == "-" || $gradePBO == "-" || $gradePW == "-") {
            echo "<script>alert('Inputan salah!');</script>";
        }

        // Menampilkan grade dengan tabel
        echo "<div class='container grading'>";
        echo "<table>";
        echo "<tr><th>Mata Kuliah</th><th>Grade</th></tr>";
        echo "<tr><td>DDP</td><td>$gradeDDP</td></tr>";
        echo "<tr><td>PTI</td><td>$gradePTI</td></tr>";
        echo "<tr><td>ASD</td><td>$gradeASD</td></tr>";
        echo "<tr><td>PBO</td><td>$gradePBO</td></tr>";
        echo "<tr><td>PW</td><td>$gradePW</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
</body>

</html>
