<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sukses</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f7fa; line-height: 1.6;">
    <!-- Email Container -->
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f5f7fa;">
        <tr>
            <td style="padding: 40px 20px;">
                <!-- Main Email Content -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 30px; text-align: center;">
                            <div style="background-color: rgba(255, 255, 255, 0.2); width: 80px; height: 80px; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                                <div style="width: 40px; height: 40px; background-color: #ffffff; border-radius: 50%; position: relative;">
                                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 16px; height: 12px; border: 3px solid #10b981; border-top: none; border-right: none; transform: translate(-50%, -60%) rotate(-45deg);"></div>
                                </div>
                            </div>
                            <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: 700; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                Pembayaran Berhasil!
                            </h1>
                            <p style="color: rgba(255, 255, 255, 0.9); margin: 10px 0 0; font-size: 16px;">
                                Transaksi Anda telah diproses
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <!-- Greeting -->
                            <div style="margin-bottom: 30px;">
                                <h2 style="color: #1f2937; margin: 0 0 15px; font-size: 24px; font-weight: 600;">
                                    Hai {{ $userName }},
                                </h2>
                                <p style="color: #6b7280; margin: 0; font-size: 16px;">
                                    Selamat! Pembayaran Anda telah berhasil diproses. Berikut adalah detail transaksi Anda:
                                </p>
                            </div>
                            
                            <!-- Service Details Card -->
                            <div style="background-color: #f8fafc; border: 2px solid #e5e7eb; border-radius: 12px; padding: 30px; margin: 30px 0;">
                                <h3 style="color: #1f2937; margin: 0 0 20px; font-size: 20px; font-weight: 600; display: flex; align-items: center;">
                                    <span style="background-color: #3b82f6; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; margin-right: 12px;">📋</span>
                                    Detail Jasa
                                </h3>
                                
                                <!-- Service Details List -->
                                <div style="space-y: 16px;">
                                    <!-- Service Name -->
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
                                        <span style="color: #6b7280; font-weight: 500;">Nama Jasa:</span>
                                        <span style="color: #1f2937; font-weight: 600; text-align: right;">{{ $jasaNama }}</span>
                                    </div>
                                    
                                    <!-- Price -->
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
                                        <span style="color: #6b7280; font-weight: 500;">Harga Total:</span>
                                        <span style="color: #1f2937; font-weight: 600; font-size: 18px;">Rp{{ number_format($jasaHarga, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <!-- DP Paid -->
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
                                        <span style="color: #6b7280; font-weight: 500;">DP Dibayar:</span>
                                        <span style="color: #10b981; font-weight: 700; font-size: 18px;">Rp{{ number_format($jasaDp, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <!-- Services -->
                                    <div style="padding: 12px 0;">
                                        <span style="color: #6b7280; font-weight: 500; display: block; margin-bottom: 12px;">Fitur/Layanan:</span>
                                        <div style="background-color: #ffffff; border: 1px solid #d1d5db; border-radius: 8px; padding: 16px;">
                                            @php
                                                $layananList = explode('|', $jasaLayanan);
                                            @endphp
                                            
                                            @foreach($layananList as $index => $layanan)
                                                <div style="display: flex; align-items: flex-start; margin-bottom: {{ $loop->last ? '0' : '8px' }};">
                                                    <span style="color: #3b82f6; font-weight: bold; margin-right: 8px; font-size: 14px;">•</span>
                                                    <span style="color: #1f2937; font-weight: 500; flex: 1;">{{ trim($layanan) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Status Badge -->
                            <div style="text-align: center; margin: 30px 0;">
                                <span style="background-color: #dcfce7; color: #166534; padding: 12px 24px; border-radius: 25px; font-weight: 600; font-size: 14px; display: inline-block;">
                                    ✅ Status: Pembayaran Berhasil
                                </span>
                            </div>
                            
                            <!-- Thank You Message -->
                            <div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 12px; padding: 25px; text-align: center; margin: 30px 0;">
                                <h3 style="color: #1f2937; margin: 0 0 10px; font-size: 18px; font-weight: 600;">
                                    Terima Kasih! 🙏
                                </h3>
                                <p style="color: #6b7280; margin: 0; font-size: 16px;">
                                    Kami sangat menghargai kepercayaan Anda menggunakan layanan kami. Tim kami akan segera memproses pesanan Anda.
                                </p>
                            </div>
                            
                            <!-- Next Steps -->
                            <div style="background-color: #fffbeb; border-left: 4px solid #f59e0b; padding: 20px; margin: 30px 0; border-radius: 0 8px 8px 0;">
                                <h4 style="color: #92400e; margin: 0 0 10px; font-size: 16px; font-weight: 600;">
                                    Langkah Selanjutnya:
                                </h4>
                                <p style="color: #b45309; margin: 0; font-size: 14px;">
                                    Tim kami akan menghubungi Anda dalam 1x24 jam untuk memulai proses pengerjaan. Pastikan nomor telepon dan email Anda aktif.
                                </p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f9fafb; padding: 30px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="color: #6b7280; margin: 0 0 15px; font-size: 14px;">
                                Butuh bantuan? Hubungi tim support kami
                            </p>
                            <div style="margin: 20px 0;">
                                <a href="mailto:riobadrun1721@gmail.com" style="background-color: #3b82f6; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; font-size: 14px; display: inline-block; margin: 0 10px;">
                                    📧 Email Support
                                </a>
                                <a href="https://wa.me/6285752181103?text=Halo%2C%20saya%20sudah%20melakukan%20pembayaran.%20Mohon%20bantuannya%20untuk%20verifikasi."
                                style="background-color: #10b981; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; font-size: 14px; display: inline-block; margin: 0 10px;">
                                    💬 WhatsApp
                                </a>

                            </div>
                            <div style="border-top: 1px solid #e5e7eb; padding-top: 20px; margin-top: 20px;">
                                <p style="color: #9ca3af; margin: 0; font-size: 12px;">
                                    © {{ date('Y') }} Cahaya Musik. Semua hak dilindungi.
                                </p>
                                <p style="color: #9ca3af; margin: 5px 0 0; font-size: 12px;">
                                    Email ini dikirim secara otomatis, mohon tidak membalas email ini.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>