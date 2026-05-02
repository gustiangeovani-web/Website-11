<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; margin: 50px 60px; line-height: 1.6; color: #000; }
    .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 30px; }
    .header h2 { margin: 0; font-size: 20pt; letter-spacing: 1px; }
    .header h3 { margin: 4px 0 0 0; font-size: 14pt; text-decoration: underline; }
    p { font-size: 11pt; text-align: justify; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 11pt; }
    td { padding: 6px 8px; vertical-align: top; }
    td:first-child { width: 200px; font-weight: bold; }
    .footer { text-align: right; margin-top: 50px; font-size: 11pt; }
    .signature { margin-top: 60px; text-align: right; }
    .signature strong { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="header">
    <h2>SMA NEGERI 11 BEKASI</h2>
    <h3><strong>SURAT KETERANGAN KELULUSAN</strong></h3>
  </div>
  <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
  <table>
    <tr><td>NISN</td><td>: {{ $row->nisn }}</td></tr>
    <tr><td>Nama</td><td>: {{ $row->nama }}</td></tr>
    <tr><td>Kelas / Angkatan</td><td>: {{ $row->kelas }}</td></tr>
    <tr><td>Status</td><td>: <strong>{{ $row->status }}</strong></td></tr>
    <tr><td>Tanggal</td><td>: {{ $tanggal }}</td></tr>
  </table>
  <p style="margin-top:25px;">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
  <div class="footer">
    <p>Bekasi, {{ date('d F Y') }}</p>
    <p>Kepala Sekolah</p>
  </div>
  <div class="signature">
    <p><br><br><strong>Drs. H. Juhari, M.Pd</strong></p>
  </div>
</body>
</html>