<?php
class produk{
  public $namaBarang, 
         $merk;
protected $diskon;
private $harga;

  public function getCetak(){
    return "$this->namaBarang $this->merk  (Rp $this->harga)";
  }
  public function __construct($namaBarang="nama barang", $merk="merk", $harga=0, $ukuranNomor="ukuran nomor", $size="size"){
    $this->namaBarang = $namaBarang;
    $this->merk=$merk;
    $this->harga=$harga;
    $this->ukuranNomor=$ukuranNomor;
    $this->size=$size;
  }

    public function cetakInfo(){
        $str="{$this->namaBarang}, {$this->getCetak()}";
        return $str;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class baju extends produk{
    public $ukuranLayar;
    public function __construct($namaBarang, $merk, $harga, $size){
        parent::__construct($namaBarang, $merk, $harga);
        $this->size=$size;
    }
    public function cetakInfo(){
        $str="Baju : ".parent::getCetak()." | size: {$this->size}";
        return $str;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }
}

class sepatu extends produk{
    public $kapasitas;
    public function __construct($namaBarang, $merk, $harga, $ukuranNomor){
        parent::__construct($namaBarang, $merk, $harga);
        $this->ukuranNomor=$ukuranNomor;
    }
    public function cetakInfo(){
        $str="Aksesoris:  ".parent::getCetak()." | Ukuran Nomor : {$this->ukuranNomor}";
        return $str;
    }

     public function setDiskon($diskon){
        $this->diskon = $diskon;
    }
}

$produk1 = new baju("Kaos","Ummaya",42000,"L");
$produk2 = new sepatu("Flat Shoes","Donatello",125000,"40");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";

echo "<hr>";
$produk1->setDiskon(25);
echo $produk1->getHarga();

echo "<hr>";
$produk2->setDiskon(50);
echo $produk2->getHarga();
?>