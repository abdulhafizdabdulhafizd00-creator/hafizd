<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Rata-rata Nilai Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .grade-A { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .grade-B { background-color: #cce5ff; color: #004085; border: 1px solid #99d6ff; }
        .grade-C { background-color: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
        .grade-D { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .grade-E { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎓 Hitung Rata-rata Nilai Ujian</h1>
        
        <form method="POST">
            <div class="form-group">
                <label for="nilai1">Nilai Ujian ke-1:</label>
                <input type="number" id="nilai1" name="nilai1" min="0" max="100" step="0.1" 
                       value="<?php echo isset($_POST['nilai1']) ? $_POST['nilai1'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nilai2">Nilai Ujian ke-2:</label>
                <input type="number" id="nilai2" name="nilai2" min="0" max="100" step="0.1" 
                       value="<?php echo isset($_POST['nilai2']) ? $_POST['nilai2'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nilai3">Nilai Ujian ke-3:</label>
                <input type="number" id="nilai3" name="nilai3" min="0" max="100" step="0.1" 
                       value="<?php echo isset($_POST['nilai3']) ? $_POST['nilai3'] : ''; ?>" required>
            </div>
            
            <input type="submit" value="Hitung Rata-rata">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nilai1 = (float)$_POST['nilai1'];
            $nilai2 = (float)$_POST['nilai2'];
            $nilai3 = (float)$_POST['nilai3'];
            
            if ($nilai1 >= 0 && $nilai1 <= 100 && 
                $nilai2 >= 0 && $nilai2 <= 100 && 
                $nilai3 >= 0 && $nilai3 <= 100) {
                
                $rata_rata = ($nilai1 + $nilai2 + $nilai3) / 3;
                
                if ($rata_rata >= 85) {
                    $grade = "A";
                    $keterangan = "Sangat Baik";
                    $css_class = "grade-A";
                } elseif ($rata_rata >= 75) {
                    $grade = "B";
                    $keterangan = "Baik";
                    $css_class = "grade-B";
                } elseif ($rata_rata >= 65) {
                    $grade = "C";
                    $keterangan = "Cukup";
                    $css_class = "grade-C";
                } elseif ($rata_rata >= 55) {
                    $grade = "D";
                    $keterangan = "Kurang";
                    $css_class = "grade-D";
                } else {
                    $grade = "E";
                    $keterangan = "Gagal";
                    $css_class = "grade-E";
                }
                
                echo "<div class='result $css_class'>";
                echo "<h2>📊 Hasil Perhitungan</h2>";
                echo "<p><strong>Nilai Ujian 1:</strong> $nilai1</p>";
                echo "<p><strong>Nilai Ujian 2:</strong> $nilai2</p>";
                echo "<p><strong>Nilai Ujian 3:</strong> $nilai3</p>";
                echo "<hr>";
                echo "<p><strong>Jumlah:</strong> " . ($nilai1 + $nilai2 + $nilai3) . "</p>";
                echo "<p><strong>Rata-rata:</strong> " . number_format($rata_rata, 2) . "</p>";
                echo "<h3>Grade: $grade ($keterangan)</h3>";
                echo "</div>";
                
            } else {
                echo "<div class='result grade-E'>";
                echo "<p>Nilai harus antara 0 dan 100!</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>