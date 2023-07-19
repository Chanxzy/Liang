<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pemesanan Kamar Hotel</title>
</head>
<body>
    <h1>Konfirmasi Pemesanan Kamar Hotel</h1>
    <p>Dear {{ $pesanan->name }},</p>
    
    <p>Terima kasih telah memesan kamar hotel kami. Berikut adalah rincian pemesanan Anda:</p>
    
    <table>
        <tr>
            <th>Nama Villa</th>
            <td>Villa Liang Ubud</td>
        </tr>
        <tr>
            <th>Tanggal Check-in</th>
            <td>{{ $pesanan->checkin }}</td>
        </tr>
        <tr>
            <th>Tanggal Check-out</th>
            <td>{{ $pesanan->checkout }}</td>
        </tr>
        <tr>
            <th>Jumlah Tamu</th>
            <td>{{ $pesanan->jumlah }} person</td>
        </tr>
        <tr>
            <th>Jenis Kamar</th>
            <td>{{ $pesanan->nama_katagori }}</td>
        </tr>
    </table>
    
    <p>Mohon pastikan Anda membawa dokumen identitas yang valid saat check-in. Jika ada pertanyaan atau perubahan yang perlu dibuat terkait pemesanan Anda, silakan hubungi layanan pelanggan kami.</p>
    
    <p>Terima kasih atas kepercayaan Anda dalam menggunakan layanan kami. Kami berharap Anda memiliki pengalaman menginap yang menyenangkan.</p>
    
    <p>Salam hangat,</p>
    <p>Tim Pemesanan Hotel</p>
</body>
</html>
