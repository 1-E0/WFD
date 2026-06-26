<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi SIMRUANG</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Halo, {{ $peminjaman->user->name }}</h2>
    <p>Pengajuan peminjaman ruangan Anda telah ditinjau oleh Administrator.</p>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px; margin-bottom: 20px;">
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; width: 30%;">Ruangan</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $peminjaman->ruangan->nama_ruang }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Tanggal</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $peminjaman->tanggal_pinjam }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Waktu</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Status</td>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; color: {{ $peminjaman->status == 'Approved' ? 'green' : 'red' }};">
                {{ strtoupper($peminjaman->status) }}
            </td>
        </tr>
    </table>

    @if($peminjaman->status == 'Approved')
        <p>Silakan gunakan ruangan sesuai jadwal. Jaga kebersihan dan fasilitas yang ada.</p>
    @else
        <p>Mohon maaf, pengajuan Anda tidak dapat disetujui untuk saat ini.</p>
    @endif

    <p>Terima kasih,<br>Tim Admin SIMRUANG</p>
</body>
</html>