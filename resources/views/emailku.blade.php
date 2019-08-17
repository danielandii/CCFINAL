<!DOCTYPE html>
<html>
<head>
   <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<div class ="jumbotron text-center">
<h1><p>Resepsimu.Id - Order berhasil dilakukan</h1></p>
</div>
<h3>Terimakasih telah memesan layanan wedding organization kami.</h3>
<h3>Silahkan lengkapi pembayaran, dan gunakan Kode untuk melihat status pembayaran.</h3>

<table>
  <tr>
    <th>Informasi</th>
    <th>Data</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>{{$name}}</td>
  </tr>
  <tr>
    <td>Plan</td>
    <td>{{$plan_name}}</td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>{{$price}}</td>
  </tr>
  <tr>
    <td>Kode</td>
    <td>{{$code}}</td>
  </tr>
  <tr>
    <td>Status</td>
    <td><b>Belum Terverifikasi</td>
</table>

{{-- <div style="text-align: center"> --}}
<p>Cek Resi di <a href="{{Route('customer.viewcode')}}">di sini</a></p>
<p>Cek Format undangan <a href="{{$_SERVER['SERVER_NAME']}}/customer/undangan?id={{$id}}">di sini</a></p>
<h4>Lengkapi pembayaran, Hubungi 082136336432</h4>
<img src="https://www.resepsimu.id/frontend/img/logo.png" style="height: 60px;margin-top: -10px;">
{{-- </div> --}}

</body>
</html>
