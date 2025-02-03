<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        .header {
            text-align: left;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature-wrapper {
            float: right;
            width: 250px;
            text-align: center;
            margin-top: 20px;
        }
        .signature-wrapper p {
            margin: 5px 0;
        }
        .signature-image {
            max-width: 200px;
            height: auto;
            margin: 10px auto;
            display: block;
        }
        .signature-space {
            height: 50px; /* Space for signature */
        }
        .signature-line {
            width: 180px; /* Fixed width for signature line */
            margin: 0 auto;
            border-bottom: 1px solid black;
        }
        @page {
            margin: 2cm;
            size: A4;
        }
    </style>
</head>
<body>
    <!-- Header section -->
    <div class="header">
        <h2>PT. USAHA GEDUNG MANDIRI</h2>
        <p>WISMA MANDIRI Lantai XII</p>
        <p>Jl. M.H Tamrin no. 5</p>
        <p>Jakarta 10340</p>
        <p>Phone: (021) 2300 8000, 390 2020</p>
        <p>Fax: (0210 230 2752)</p>
    </div>

    <h1 style="text-align: center;">PERMINTAAN BARANG</h1>
    <div style="margin-bottom: 15px;">
        <p style="font-weight: bold;">Request ID: {{ $request->request_id }}</p>
        <p>Tanggal: {{ Carbon\Carbon::parse($request->request_tanggal)->translatedFormat('d F Y') }}</p>
        <p>Divisi: {{ $request->divisi }}</p>
        <p>Departemen: {{ $request->departemen }}</p>
    </div>

    <!-- Table section -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($data as $key => $d)
                @php $total += $d->barang_harga * $d->bm_jumlah; @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->barang_kode }}</td>
                    <td>{{ $d->barang_nama }}</td>
                    <td>{{ $d->bm_jumlah }}</td>
                    <td>Rp {{ number_format($d->barang_harga, 0, ',', '.') }}</td>
                    <td>{{ $d->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Signature section -->
    <div class="signature-wrapper">
        <p>Disetujui oleh,</p>
        @if(isset($signatures['USER']) && $signatures['USER']->signature)
            <img src="{{ asset('storage/signatures/' . $signatures['USER']->signature) }}" 
                 alt="User Signature" class="signature-image">
        @else
            <div class="signature-space"></div>
        @endif
        <div class="signature-line"></div>
        <p><i>nama jelas & tanggal</i></p>
    </div>
</body>
</html>