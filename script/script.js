// Ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var searchButton = document.getElementById('search-button');
var table = document.getElementById('table');

// Tambahkan event saat sesuatu diketik
keyword.addEventListener('keyup', function(){

	// object ajax
	var ajax = new XMLHttpRequest();

	// cek ajax
	ajax.onreadystatechange = function(){
		if ( ajax.readyState == 4 && ajax.status == 200 ) {
			table.innerHTML = ajax.responseText;
		}
	}

	// eksekusi ajax
	ajax.open('GET', '../script/ajax/siswa.php?keyword=' + keyword.value, true);
	ajax.send();

});