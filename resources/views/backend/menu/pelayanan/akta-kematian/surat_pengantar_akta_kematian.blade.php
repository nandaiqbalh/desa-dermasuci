<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0;
        }

        body {
        margin: 20mm;
        font-family: "Times New Roman", serif;
        font-size: 12pt;
    }

        table {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: left; /* Align tabel ke kiri */
        }

        td {
            text-align: left; /* Align konten sel ke kiri */
            padding: 5px;
        }

        .logo {
            width: 100px;
            float: left;
            margin-right: 10px;
        }

        .header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;

        }

        .content {
            margin-bottom: 20px;
        }

        .signature {
            text-align: right;
            margin-top: 40px;
        }

        .address-line {
            position: relative;
        }

        .address-line::after {
            content: "";
            display: block;
            border-bottom: 1px solid black;
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
        }

        .content-label {
            width: 250px;
            vertical-align: top;
        }

        .content-value {
            display: inline-block;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="logo">
                <img style="width: 70px;" src="data:image/jpeg;base64,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" alt="Logo">
            </td>
            <td class="header">
                <div class="header-text">
                    <div>PEMERINTAH KABUPATEN TEGAL</div>
                    <div>KECAMATAN PANGKAH</div>
                    <div>KANTOR KEPALA DESA DERMASUCI</div>
                </div>
            </td>
        </tr>
    </table>
    <p class="content address-line" style="text-align: center; font-size: 12px">Jalan Dukuh Duren No.21 Rt.06 Rw.04 Dermasuci –
        Pangkah
        KodePos
        52471</p>
        <hr>

    <p class="content" style="text-align: center; "><u>SURAT PENGANTAR PEMBUATAN AKTA KEMATIAN</u></p>

    <p class="content" style="text-align: center;">Nomor : {{$data -> no_surat}}</p>

    <p class="content">Yang bertandatangan di bawah ini atas nama pemerintahan Desa:</p>

    <table class="content">
        <tr>
            <td class="content-label">Nama</td>
            <td class="content-value">: Mulyanto</td>
        </tr>
        <tr>
            <td class="content-label">NIK</td>
            <td class="content-value">: 3328090907760006 </td>
        </tr>
        <tr>
            <td class="content-label">Alamat Kantor Kepala Desa</td>
            <td class="content-value">: Desa Dermasuci Rt.06 Rw.04 Kec. Pangkah Kabupaten Tegal</td>
        </tr>

    </table>

    <p class="content">Dengan mengingat sumpah jabatan menerangkan:</p>
    <table class="content">
        <tr>
            <td class="content-label">Nama</td>
            <td class="content-value">: {{$data -> nama}}</td>
        </tr>
        <tr>
            <td class="content-label">NIK</td>
            <td class="content-value">: {{$data -> nik}}</td>
        </tr>
        <tr>
            <td class="content-label">Tempat / Tgl Lahir</td>
            <td class="content-value">: {{$data -> tempat_tanggal_lahir}}</td>
        </tr>
        <tr>
            <td class="content-label">Alamat</td>
            <td class="content-value">: {{$data -> alamat}}</td>
        </tr>
        <tr>
            <td class="content-label">Kewarganegaraan</td>
            <td class="content-value">: Indonesia</td>
        </tr>
        <tr>
            <td class="content-label">Keperluan</td>
            <td class="content-value">: Surat Pengantar Pembuatan Akta Kematian</td>
        </tr>

    </table>

    <p class="content">Sesuai dengan keterangan yang bersangkutan, bahwa memang benar telah meninggal dengan tenang warga kami sebagai berikut.</p>

    <table class="content">
        <tr>
            <td class="content-label">Nama</td>
            <td class="content-value">: {{$data -> nama_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">Bin/Binti</td>
            <td class="content-value">: {{$data -> bin_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">NIK</td>
            <td class="content-value">: {{$data -> nik_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">Tempat Tanggal Lahir</td>
            <td class="content-value">: {{$data -> ttl_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">Jenis Kelamin</td>
            <td class="content-value">: {{$data -> jenis_kelamin_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">Agama</td>
            <td class="content-value">: {{$data -> agama_termohon}}</td>
        </tr>

        <tr>
            <td class="content-label">Tanggal Meninggal</td>
            <td class="content-value">: {{$data -> tanggal_meninggal}}</td>
        </tr>

        <tr>
            <td class="content-label">Waktu</td>
            <td class="content-value">: {{$data -> jam_meninggal}}</td>
        </tr>

        <tr>
            <td class="content-label">Tempat</td>
            <td class="content-value">: {{$data -> tempat_meninggal}}</td>
        </tr>

        <tr>
            <td class="content-label">Keterangan Lain</td>
            <td class="content-value">Surat Pengantar Pembuatan Akta Kematian Desa Dermasuci</td>
        </tr>
    </table>
    <p class="content">Demikian Surat Pengantar Pembuatan Akta Kematian ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>

    <div class="signature">
        <p>Dermasuci, {{ date('d F Y', strtotime($data->updated_at)) }}</p>
        <p>Pemerintahan Desa Dermasuci</p>
        <br>
        <p>………………………….</p>
    </div>
</body>

</html>
