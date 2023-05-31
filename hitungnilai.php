<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HITUNG NILAI !!! </title>
</head>
<body>
    <img src="https://media.tenor.com/-Y2YOay3_JoAAAAM/its-friday-dancing.gif" alt="">
    <h1>Masukan Nilai Anda</h1> 
    <form action="" method="post">
        <input type="number" name="matematika" placeholder="MATEMATIKA"><br>
        <input type="number" name="pipas" placeholder="PIPAS"><br>
        <input type="number" name="sejarah" placeholder="SEJARAH"><br>
        <input type="number" name="produktif" placeholder="PRODUKTIF"><br>
        <input type="number" name="bahasaindonesia" placeholder="BAHASA INDONESIA"><br>
        <input type="number" name="bahasainggris" placeholder="BAHASA INGGRIS"><br>
        <input type="number" name="nis" placeholder="NIS"><br>
        <input type="submit" name="submit"><hr>   
    </form>
    
    <br>
    <a href="tampil.php">Tampilkan</a><br>

<?php
class GradeCalculator {
    private $matematika;
    public $pipas;
    protected $sejarah;
    private $produktif;
    public $bahasaindonesia;
    private $bahasainggris;
    protected $nis;

    public function __construct($matematika, $pipas, $sejarah, $produktif, $bahasaindonesia, $bahasainggris, $nis) {
        $this->matematika = $matematika;
        $this->pipas = $pipas;
        $this->sejarah = $sejarah;
        $this->produktif = $produktif;
        $this->bahasaindonesia = $bahasaindonesia;
        $this->bahasainggris = $bahasainggris;
        $this->nis = $nis;
    }

    public function calculateTotal() {
        $grades = [$this->matematika, $this->pipas, $this->sejarah, $this->produktif, $this->bahasaindonesia, $this->bahasainggris];
        return array_sum($grades);
    }

    public function calculateAverage() {
        $total = $this->calculateTotal();
        return $total / 6;
    }

    public function getMaximumGrade() {
        $grades = [$this->matematika, $this->pipas, $this->sejarah, $this->produktif, $this->bahasaindonesia, $this->bahasainggris];
        return max($grades);
    }

    public function getMinimumGrade() {
        $grades = [$this->matematika, $this->pipas, $this->sejarah, $this->produktif, $this->bahasaindonesia, $this->bahasainggris];
        return min($grades);
    }

    public function calculateGrade() {
        $total = $this->calculateTotal();
        if ($total >= 540) {
            return 'A';
        } elseif ($total >= 480) {
            return 'B';
        } elseif ($total >= 420) {
            return 'C';
        } else {
            return 'D';
        }
    }
}

if (isset($_POST['submit'])) {
    include "koneksi.php";

    $matematika = $_POST['matematika'];
    $pipas = $_POST['pipas'];
    $sejarah = $_POST['sejarah'];
    $produktif = $_POST['produktif'];
    $bahasaindonesia = $_POST['bahasaindonesia'];
    $bahasainggris = $_POST['bahasainggris'];
    $nis = $_POST['nis'];

    if ($_POST["nis"] == null) {
        echo "Isi Dulu Datanya Mas!";
        die;
    }

    $gradeCalculator = new GradeCalculator($matematika, $pipas, $sejarah, $produktif, $bahasaindonesia, $bahasainggris, $nis);
    
    $sql = "INSERT INTO `kalkulator_nilai`(`matematika`, `pipas`, `sejarah`, `produktif`, `bahasaindonesia`, `bahasainggris`, `nis`) VALUES ('$matematika', '$pipas', '$sejarah', '$produktif', '$bahasaindonesia', '$bahasainggris', '$nis')";
    $apakah = mysqli_query($server, $sql);
    echo "<br>";
    if ($apakah) {
        echo "Done !! ";
    }

    echo "<br>";
    echo "Jumlah Nilai: " . $gradeCalculator->calculateTotal();
    echo "<br>";
    echo "Rata - Rata Nilai: " . $gradeCalculator->calculateAverage();
    echo "<br>";
    echo "Nilai Maximal: " . $gradeCalculator->getMaximumGrade();
    echo "<br>";
    echo "Nilai Minimal: " . $gradeCalculator->getMinimumGrade();
    echo "<br>";
    echo "Grade Nilai Kamu Adalah: " . $gradeCalculator->calculateGrade();
}
?>

</body>
</html>