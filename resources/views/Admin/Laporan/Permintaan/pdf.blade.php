<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        @page {
            size: landscape;
            margin: 2cm;
        }
        
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: start;
        }

        .company-info {
            flex: 1;
        }

        .logo {
            max-width: 100px;
            height: auto;
        }

        table.content-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .content-table th, .content-table td {
            border: 1px solid black;
            padding: 6px 8px;
            font-size: 11px;
            text-align: justify;
        }
        
        .content-table td {
            vertical-align: top;
        }
        
        .content-table th {
            text-align: center;
            vertical-align: middle;
            background-color: #f2f2f2;
            font-weight: bold;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .signatures {
            width: 100%;
            display: table;
            margin-top: 30px;
        }

        .signature-cell {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            padding: 10px;
            vertical-align: top;
            border: none;
        }

        .signature-line {
            margin-top: 10px;
            border-bottom: 1px solid black;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .signature-cell img {
            max-width: 150px;
            max-height: 60px;
            object-fit: contain;
            margin: 5px auto;
            display: block;
        }

        .document-info {
            margin: 10px 0;
        }

        .document-info p {
            margin: 3px 0;
            font-size: 11px;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            margin: 10px 0;
        }

        h2 {
            font-size: 16px;
            margin: 5px 0;
        }

        p {
            margin: 3px 0;
        }

        .amount-column {
            text-align: right;
        }
        
        .signature-wrapper {
            float: right;
            width: 250px;
            text-align: center;
            margin-top: 30px;
            margin-right: 20px;
        }

        .signature-line {
            width: 180px;
            margin: 20px auto 5px auto;
            border-bottom: 1px solid black;
        }

        .italic-text {
            font-style: italic;
        }

        .italic-text2 {
            font-style: normal;
        }
    </style>
</head>
<body>
    <div style="width: 100%; margin-bottom: 20px;">
        <table style="width: 100%; border: none;">
            <tr style="border: none;">
                <td style="width: 70%; border: none; vertical-align: top;">
                    <h2 style="margin: 0; font-size: 14pt;">PT. USAHA GEDUNG MANDIRI</h2>
                    <p style="margin: 2px 0; font-size: 10pt;">WISMA MANDIRI Lantai XII</p>
                    <p style="margin: 2px 0; font-size: 10pt;">Jl. M.H Tamrin no. 5</p>
                    <p style="margin: 2px 0; font-size: 10pt;">Jakarta 10340</p>
                    <p style="margin: 2px 0; font-size: 10pt;">Phone: (021) 2300 8000, 390 2020</p>
                    <p style="margin: 2px 0; font-size: 10pt;">Fax: (021) 230 2752</p>
                </td>
                <td style="width: 30%; border: none; text-align: right; vertical-align: top;">
                    <img src="{{ public_path('assets/images/logoug.png') }}" style="width: 200px; height: auto;">
                </td>
            </tr>
        </table>
    </div>

    <h1>PERMINTAAN BARANG</h1>

    <div class="document-info">
        <p><strong>Request ID:</strong> {{ $request->request_id }}</p>
        <p><strong>Tanggal:</strong> {{ Carbon\Carbon::parse($request->request_tanggal)->translatedFormat('d F Y') }}</p>
        <p><strong>Divisi:</strong> {{ $request->divisi }}</p>
        <p><strong>Departemen:</strong> {{ $request->departemen }}</p>
    </div>

    <table class="content-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Jenis Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($data as $key => $d)
                @php 
                    $itemTotal = $d->barang_harga * $d->bm_jumlah;
                    $total += $itemTotal;
                    $keterangan = str_replace('Rejected by (GM):', '', $d->keterangan);
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->barang_kode }}</td>
                    <td>{{ $d->barang_nama }}</td>
                    <td>{{ $d->merk_nama }}</td>
                    <td>{{ $d->jenisbarang_nama }}</td>
                    <td class="amount-column">{{ $d->bm_jumlah }} Pcs</td>
                    <td class="amount-column">Rp {{ number_format($d->barang_harga, 0, ',', '.') }}</td>
                    <td class="amount-column">Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                    <td>{{ $keterangan }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7" align="right"><strong>Total Keseluruhan</strong></td>
                <td class="amount-column"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="signature-wrapper">
        <p>Disetujui oleh,</p>
        <div class="signature-line"></div>
        <p class="italic-text2">{{ $gm ? $gm->user_nmlengkap : 'nama jelas & tanggal' }}</p>
    </div>
</body>
</html>