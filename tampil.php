<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h2>HASIL DATA</h2>
    <table>
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>Matematika</th>
            <th>Pipas</th>
            <th>Sejarah</th>
            <th>Produktif</th>
            <th>Bahasa Indonesia</th>
            <th>Bahasa Inggris</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $no = 1;
        $sambil = mysqli_query($server, "SELECT * FROM kalkulator_nilai");
        while ($data = mysqli_fetch_array($sambil)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['matematika']; ?></td>
                <td><?php echo $data['pipas']; ?></td>
                <td><?php echo $data['sejarah']; ?></td>
                <td><?php echo $data['produktif']; ?></td>
                <td><?php echo $data['bahasaindonesia'] ?></td>
                <td><?php echo $data['bahasainggris'] ?></td>
                <td>
                    <a href="hapus.php?nis=<?php echo $data['nis']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <a href="hitungnilai.php">Kembali</a>
    </div>
</body>
</html>
