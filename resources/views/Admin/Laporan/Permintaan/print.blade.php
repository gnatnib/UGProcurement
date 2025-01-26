<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="{{ $web->web_deskripsi }}">
   <meta name="author" content="{{ $web->web_nama }}">
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   @if ($web->web_logo == '' || $web->web_logo == 'default.png')
       <link rel="shortcut icon" href="{{ url('/assets/default/web/default.png') }}" />
   @else
       <link rel="shortcut icon" href="{{ asset('storage/web/' . $web->web_logo) }}" />
   @endif

   <title>{{ $title }}</title>

   <style>
       * {
           font-family: Arial, Helvetica, sans-serif;
       }
       #table1 {
           border-collapse: collapse;
           width: 100%;
           margin-top: 32px;
       }
       #table1 td, #table1 th {
           border: 1px solid #ddd;
           padding: 8px;
       }
       #table1 th {
           padding-top: 12px;
           padding-bottom: 12px;
           color: black;
           font-size: 12px;
       }
       #table1 td {
           font-size: 11px;
       }
       .font-medium {
           font-weight: 500;
       }
   </style>
</head>

<body onload="window.print()">
   <center>
       @if ($web->web_logo == '' || $web->web_logo == 'default.png')
           <img src="{{ url('/assets/default/web/default.png') }}" width="80px" alt="">
       @else
           <img src="{{ url('/assets/default/web/default.png') }}" width="80px" alt="">
       @endif
   </center>

   <center>
       <h1 class="font-medium">Laporan Permintaan</h1>
       @if ($tglawal == '')
           <h4 class="font-medium">Semua Tanggal</h4>
       @else
           <h4 class="font-medium">{{ Carbon::parse($tglawal)->translatedFormat('d F Y') }} -
               {{ Carbon::parse($tglakhir)->translatedFormat('d F Y') }}</h4>
       @endif
   </center>

   <table border="1" id="table1">
       <thead>
           <tr>
               <th align="center" width="1%">NO</th>
               <th>TANGGAL REQUEST</th>
               <th>REQUEST ID</th>
               <th>DEPARTEMEN</th>
               <th>TOTAL BARANG</th>
           </tr>
       </thead>
       <tbody>
           @php $no=1; @endphp
           @foreach ($data as $d)
               <tr>
                   <td align="center">{{ $no++ }}</td>
                   <td>{{ Carbon::parse($d->request_tanggal)->translatedFormat('d F Y') }}</td>
                   <td>{{ $d->request_id }}</td>
                   <td>{{ $d->departemen }}</td>
                   <td align="center">{{ $d->total_barang }}</td>
               </tr>
           @endforeach
       </tbody>
   </table>
</body>
</html>