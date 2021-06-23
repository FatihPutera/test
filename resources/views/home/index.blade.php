<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          
          <div class="card-body">
            
            <div class="row">
              <div class="col-12 text-right">
               <button><a href="/showadd">tambah</a></button> 
              </div>
            </div>
            <div class="table-responsive">
              <table class="table" border="1">
                <thead class=" text-custom">
                  <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Kode Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                  <tr>
                </thead>
                <tbody>
                @foreach ($data as $item)  
                  <tr>
                  <td>{{$item->Id}}</td>
                  <td>{{$item->Nama_barang}}</td>
                  <td>{{$item->Kode_barang}}</td>
                  <td>{{$item->Tanggal}}</td>
                  <td>{{$item->Jumlah_barang}}</td>
                  <td> <button><a href="">ubah</a></button> </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="float-right">
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
