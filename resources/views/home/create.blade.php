<h1>tambah barang</h1>

<form action="{{url('add')}}" method="post">
@csrf
@method('post')
  <label for="fname">Nama barang:</label><br>
  <input type="text" id="fname" name="nama"><br>
  <label for="lname">Kode Barang:</label><br>
  <input type="text" id="lname" name="kode"><br>
  <label for="lname">Jumlah:</label><br>
  <input type="number" id="lname" name="jumlah"><br>
  <label for="lname">Tanggal:</label><br>
  <input type="date" id="lname" name="tanggal"><br><br>
  <input type="submit" value="Submit">
</form> 
