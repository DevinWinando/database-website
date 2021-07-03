<?php  

class Produk{
	public $judul = "judul",
		   $penulis = "penulis",
		   $penerbit = "penerbit",
		   $harga = "harga";

	public function __construct($judul, $penulis, $penerbit, $harga){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
	}
}

class cetakInfo{
	public function cetak( Produk $produk ){
		$str = "{$produk->penulis}, {$produk->judul},  {$produk->penerbit}, Rp. {$produk->harga} ";
		return $str;
	}
}

$produk1 = new Produk("Pergi", "Tere Liye", "Gramedia", 65000);
$produk2 = new Produk("Pulang", "Tere Liye", "Gramedia", 65000);

$infoProduk1 = new cetakInfo();
echo $infoProduk1->cetak($produk1);