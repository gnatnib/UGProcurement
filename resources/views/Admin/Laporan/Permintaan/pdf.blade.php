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
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signatures {
            width: 100%;
            display: table;
            margin-top: 70px; /* Increased top margin */
            margin-bottom: 30px; /* Added bottom margin */
        }
        .signature-cell {
            display: table-cell;
            width: 50%;
            text-align: center;
            padding: 20px; /* Increased padding */
        }
        .signature-line {
            margin-top: 70px; /* Increased space above signature line */
            border-bottom: 1px solid black;
            width: 200px; /* Increased width of signature line */
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px; /* Added space below signature line */
        }
        /* Added styles for signature image */
        .signature-image {
            max-width: 200px; /* Match signature line width */
            height: auto;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header section remains the same -->
    <div class="header">
        <h2>PT. USAHA GEDUNG MANDIRI</h2>
        <p>WISMA MANDIRI Lantai XII</p>
        <p>Jl. M.H Tamrin no. 5</p>
        <p>Jakarta 10340</p>
        <p>Phone: (021) 2300 8000, 390 2020</p>
        <p>Fax: (0210 230 2752)</p>
    </div>

    <h1 style="text-align: center;">PERMINTAAN BARANG</h1>
    <div style="right: 20px; font-weight: bold;">
        Request ID: {{ $request->request_id }}
    </div>
    <p>Tanggal: {{ Carbon\Carbon::parse($request->request_tanggal)->translatedFormat('d F Y') }}</p>
    <p>Divisi: {{ $request->divisi }}</p>
    <p>Departemen: {{ $request->departemen }}</p>

    <!-- Table section remains the same -->
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

    <!-- Updated signature section -->
    <div class="signatures">
        <div class="signature-cell">
            <p>Disetujui oleh,</p>
            @if(isset($signatures['USER']) && $signatures['USER']->signature)
                <img src="{{ asset('storage/signatures/' . $signatures['USER']->signature) }}" 
                     alt="User Signature" class="signature-image">
            @endif
            <div class="signature-line"></div>
            <p><i>nama jelas & tanggal</i></p>
        </div>
    </div>
</body>
</html>