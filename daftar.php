<?php

    $nama_lengkap = "";
    $umur = 0;
    $asal_kota = "";
    $error_message = "";
    $is_submitted = isset($_POST['submit']);

    if ($is_submitted) {
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $asal_kota = $_POST['asal_kota'];
        $umur = (int)$_POST['umur']; 
        
        $nama_lengkap = $nama_depan . " " . $nama_belakang;

        if ($umur < 10) {
            $error_message = "Umur minimal 10 tahun!";
        }

    } else {
        $error_message = "Data tidak ditemukan. Silakan isi form registrasi terlebih dahulu.";
    }
?>

<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }

            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }

            .error-box{
                background-color: #f8d7da;
                color: #dc3545;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .error-box h3{
                color: #dc3545;
                font-size: 20px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
            }
            td{
                color: #666;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff; 
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php if (!empty($error_message) && $is_submitted && $umur < 10): ?>
                <div class="error-box">
                    <h3>❌ Error!</h3>
                    <p><?php echo $error_message; ?></p>
                </div>
            
            <?php elseif (!empty($error_message)): ?>
                 <div class="error-box">
                    <h3>❌ Error!</h3>
                    <p><?php echo $error_message; ?></p>
                </div>
                
            <?php elseif ($is_submitted): ?>
                <div class="success-message">
                    Registrasi Berhasil!
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Umur</th>
                            <th>Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            
                            $jumlah_baris_ditampilkan = 0; 
                            $nomor_ganjil = 1; 

                            while ($jumlah_baris_ditampilkan < $umur) {
                                
                                if ($nomor_ganjil == 7 || $nomor_ganjil == 13) {
                                    $nomor_ganjil += 2;
                                    continue; 
                                }

                                echo "<tr>";
                                echo "<td>" . $nomor_ganjil . "</td>";
                                echo "<td>" . htmlspecialchars($nama_lengkap) . "</td>";
                                echo "<td>" . $umur . "</td>";
                                echo "<td>" . htmlspecialchars($asal_kota) . "</td>";
                                echo "</tr>";

                                $jumlah_baris_ditampilkan++;
                                
                                $nomor_ganjil += 2;
                            }
                        ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="back-button">
                <a href="index.html">Kembali ke Form Registrasi</a>
            </div>

        </div>
    </body>
</html>