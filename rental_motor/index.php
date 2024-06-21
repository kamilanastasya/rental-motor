<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Motor</title>
  <style>
* {
  margin: 0;
  padding: 0;
}

body {
  background-color: ;
}

h1{
  margin-top: 25px;
}

input{
  margin-top: 20px;
  margin-right: 5px;
  padding: 2px;
}

select {
  padding: 3px;
  margin-bottom: 20px;
}

button {
  padding: 3px;
  margin-left: 5px;
}

.lemon{
  padding: 20px;
  margin: 50px auto;
  max-width: 790px;
  padding: 30px;
  background-color: #e2e2e2;
  border-radius: 5px;
}

  </style>
</head>

<body>
  <center>
    <div class="lemon">
      <div class="tree">
        <div class="grass">
          <div class="flower">
            <h1>Rental Motor</h1>
          </div>
      <div class="sun">
        <form id="rentalMotor" action="" method="post">
          <input name="namaPelanggan" type="namaPelanggan" id="namaPelanggan" class="time" placeholder="Silahkan isi nama" required>
          <input type="number" name="waktuRental" id="waktuRental" class="time" placeholder="Lama Waktu Rental (per-hari)" required>
          <select class="time" name="jenisMotor" id="jenisMotor" required>
            <option value="">Jenis Motor</option>
            <option value="Aerox">Aerox</option>
            <option value="Vesmet">Vesmet</option>
            <option value="ADV">ADV</option>
            <option value="Scooter">Scooter</option>
          </select>
          <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
        </form>
      </div>
      <div class="Motor">
        <?php
        class RentalMotor
        {
          public $NamaPelanggan,
          $LamaWaktuRental,
          $JenisMotor;
          private $member = ["Arya", "Alya", "Habib", "Kamila"],
          $hargaMotor = [
            "Aerox" => 120000,
            "Vesmet" => 100000,
            "ADV" => 80000,
            "Scooter" => 20000
          ];
          
          protected $pajak = 10000;
          public function __construct($nama, $waktuRental, $JenisMotor)
          {
            $this->namaPelanggan = $nama;
            $this->waktuRental = $waktuRental;
            $this->JenisMotor = $JenisMotor;
          }
          
          public function getHarga() {
            return $this->hargaMotor;
          }
          
          public function getMember() {
            return $this->member;
          }
          
        }
        
        class TotalHargaRental extends RentalMotor {
          public function hitungHargaRental()
          {
            $JenisMotor = $this->JenisMotor;
            $hargaPerhari = $this->getHarga()[$this->JenisMotor];
            $totalHarga = $hargaPerhari * $this->waktuRental + $this->pajak;
            
            if (in_array($this->namaPelanggan, $this->getMember())) {
              $totalHarga = ($hargaPerhari * $this->waktuRental) - ($hargaPerhari * 5/100) + $this->pajak;
              $statusPelanggan = $this->namaPelanggan .  " berstatus sebagai Member mendapatkan diskon sebesar" .  " 5%";
            } else {
              $statusPelanggan = $this->namaPelanggan .  " tidak berstatus sebagai Member ";
            }
            return [$statusPelanggan, $totalHarga];
          }
          
          public function cetakPembayaran() {
            list($statusPelanggan, $totalHarga) = $this->hitungHargaRental();
            echo $statusPelanggan . "<br>" . 
            " Jenis motor yang dirental adalah " .  $this->JenisMotor. 
            " selama " .  $this->waktuRental . " hari " . "<br>" .  
            " Harga rental per-harinya: " .  $this->getHarga()[$this->JenisMotor] .  "<br>" . 
            " Besar yang harus dibayarkan adalah " .  " Rp " . number_format($totalHarga, 2, ",", ".");
          }
          
        }
        
        if (isset($_POST['submit'])) {
          $namaPelanggan = $_POST['namaPelanggan'];
          $waktuRental = $_POST['waktuRental'];
          $JenisMotor = $_POST['jenisMotor'];
          
          $rentalMotor = new TotalHargaRental($namaPelanggan, $waktuRental, $JenisMotor);
          $rentalMotor->cetakPembayaran();
        }
        ?>
      </div>
    </div>
  </div>
</div>
</body>
</center>
</html>