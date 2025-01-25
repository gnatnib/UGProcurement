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

        .logo {
            max-width: 150px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 50px;
            width: 100%;
        }

        .signatures {
            width: 100%;
            display: table;
            margin-top: 50px;
        }

        .signature-cell {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            padding: 10px;
        }

        .signature-line {
            margin-top: 50px;
            border-bottom: 1px solid black;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>PT. USAHA GEDUNG MANDIRI</h2>
        <p>WISMA MANDIRI Lantai XII</p>
        <p>Jl. M.H Tamrin no. 5</p>
        <p>Jakarta 10340</p>
        <p>Phone: (021) 2300 8000, 390 2020</p>
        <p>Fax: (0210 230 2752)</p>
    </div>

    <h1 style="text-align: center;">PERMINTAAN BARANG (PB)</h1>
    <div style="right: 20px; font-weight: bold;">
        Request ID: {{ $request->request_id }}
    </div>
    <p>Tanggal: {{ Carbon\Carbon::parse($request->request_tanggal)->translatedFormat('d F Y') }}</p>
    <p>Divisi: {{ $request->departemen }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($data as $key => $d)
                @php $total += $d->harga * $d->bm_jumlah; @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->barang_kode }}</td>
                    <td>{{ $d->barang_nama }}</td>
                    <td>{{ $d->bm_jumlah }}</td>
                    <td>Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                    <td>{{ $d->tracking_status }}</td>
                    <td>{{ $d->keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right"><strong>Total</strong></td>
                <td colspan="3"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

<div class="signatures">
    <div class="signature-cell">
        <p>Disetujui oleh,</p>
        @if(isset($signatures['GM']) && $signatures['GM']->signature)
            <img src="{{ asset('storage/signatures/' . $signatures['GM']->signature) }}" alt="Signature GM"
                style="width: 150px; height: auto;">
        @endif
        <div class="signature-line"></div>
        <p><i>nama jelas & tanggal</i></p>
    </div>
    <div class="signature-cell">
        <p>Penerima Barang,</p>
        <div class="signature-line"></div>
        <p><i>nama jelas & tanggal</i></p>
    </div>
    <div class="signature-cell">
        <p>Permohonan Barang,</p>
        @if(isset($signatures['GMHCGA']) && $signatures['GMHCGA']->signature)
            <img src="{{ asset('storage/signatures/' . $signatures['GMHCGA']->signature) }}" alt="Signature GMHCGA"
                style="width: 150px; height: auto;">
        @endif
        <div class="signature-line"></div>
        <p><i>nama jelas</i></p>
    </div>
</div>

</body>

</html>