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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            font-size: 11px;
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
    </style>
</head>

<body>
    <div class="header" style="position: relative; font-size: 10px;">
        <!-- Add logo -->
        <div style="position: absolute; top: 0; right: 0;">
            <img src="{{ public_path('assets/images/logoug.png') }}" style="width: 150px; height: auto;">
        </div>
    
        <h2 style="margin-bottom: 5px;">PT. USAHA GEDUNG MANDIRI</h2>
        <p style="margin: 2px 0;">WISMA MANDIRI Lantai XII</p>
        <p style="margin: 2px 0;">Jl. M.H Tamrin no. 5</p>
        <p style="margin: 2px 0;">Jakarta 10340</p>
        <p style="margin: 2px 0;">Phone: (021) 2300 8000, 390 2020</p>
        <p style="margin: 2px 0;">Fax: (021) 230 2752</p>
    </div>


    <h1>Tanda Terima</h1>

    <div class="document-info">
        <p><strong>Request ID:</strong> {{ $request->request_id }}</p>
        <p><strong>Tanggal:</strong> {{ Carbon\Carbon::parse($request->request_tanggal)->translatedFormat('d F Y') }}
        </p>
        <p><strong>Divisi:</strong> {{ $request->divisi }}</p>
        <p><strong>Departemen:</strong> {{ $request->departemen }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="12%">Kode Barang</th>
                <th width="25%">Nama Barang</th>
                <th width="15%">Merk</th> <!-- Add Merk column -->
                <th width="15%">Jenis Barang</th> <!-- Add Jenis Barang column -->
                <th width="15%">Jumlah Satuan</th> <!-- Change to Jumlah Satuan -->
                <th width="15%">Harga</th>
                <th width="10%">Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php 
                            $total = 0;
$no = 1;
            @endphp
            @foreach($data as $d)
                @if($d->tracking_status == 'Diterima')
                    @php $total += $d->harga * $d->bm_jumlah; @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->barang_kode }}</td>
                        <td>{{ $d->barang_nama }}</td>
                        <td>{{ $d->merk_nama }}</td> <!-- Display Merk name -->
                        <td>{{ $d->jenisbarang_nama }}</td> <!-- Display Jenis Barang name -->
                        <td>{{ $d->jumlah_satuan }}</td> <!-- Display Jumlah Satuan -->
                        <td>Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                        <td>{{ $d->tracking_status }}</td>
                        <td>{{ $d->keterangan }}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="6" align="right"><strong>Total (Barang Diterima)</strong></td>
                <td colspan="3"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="signatures" style="font-size: 10px;">
        <div class="signature-cell">
            <p>Disetujui oleh,</p>
            @if(isset($signatures['GM']) && !empty($signatures['GM']->signature_base64))
                <img src="{{ $signatures['GM']->signature_base64 }}" alt="Tanda Tangan GM">
            @endif
            <div class="signature-line"></div>
            <p>{{ isset($signatures['GM']) ? $signatures['GM']->user_nmlengkap : '________________' }}</p>
        </div>

        <div class="signature-cell">
            <p>Penerima Barang,</p>
            @if(isset($signatures['User']) && !empty($signatures['User']->signature_base64))
                <img src="{{ $signatures['User']->signature_base64 }}" alt="Tanda Tangan Penerima">
            @endif
            <div class="signature-line"></div>
            <p>{{ isset($signatures['User']) ? $signatures['User']->user_nmlengkap : '________________' }}</p>
        </div>

        <div class="signature-cell">
            <p>Permohonan Barang,</p>
            @if(isset($signatures['GMHCGA']) && !empty($signatures['GMHCGA']->signature_base64))
                <img src="{{ $signatures['GMHCGA']->signature_base64 }}" alt="Tanda Tangan GMHCGA">
            @endif
            <div class="signature-line"></div>
            <p>{{ isset($signatures['GMHCGA']) ? $signatures['GMHCGA']->user_nmlengkap : '________________' }}</p>
        </div>
    </div>
</body>

</html>