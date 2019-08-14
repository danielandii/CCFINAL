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
<h1><p>EverLast - Order berhasil dilakukan</h1></p>
</div>
<p>Silahkan lengkapi pembayaran, dan gunakan Kode untuk melihat status pembayaran</p>

<table>
  <tr>
    <th>Informasi</th>
    <th>Data</th>
  </tr>
  <tr>
    <td>Email</td>
    <td>{{$email}}</td>
  </tr>
  <tr>
    <td>Plan</td>
    <td>{{$plan_id}}</td>
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
      {{-- @if($status == 'Baru') --}}
    <td><b>Belum Terverifikasi</td>
        {{-- @else --}}
    {{-- <td>Sudah Terverifikasi</td> --}}
        {{-- @endif --}}
  </tr>
</table>

<div style="text-align: center">
    <img src='https://seeklogo.com/images/J/Just_married-logo-93BB481001-seeklogo.com.png' alt='everLasting' />
    <span>Cek Resi di <a href="{{Route('customer.viewcode')}}"></a>di sini</span>
    <span>Lengkapi pembayaran, Hubungi 082136336432</span>
</div>

</body>
</html>
