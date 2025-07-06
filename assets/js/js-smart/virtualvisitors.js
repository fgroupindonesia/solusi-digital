  window.$ = jQuery.noConflict();
  $(document).ready(function() {
            // 1. Membuat elemen div #virtualvisitors-box secara dinamis
            const notificationBoxHtml = `
                <div id="virtualvisitors-box" class="flex flex-col items-center">
                    <p id="format-pesan"></p>
                    <p class="time-ago" id="time-ago-text"></p>
                </div>
            `;

            let vbox = $('#virtualvisitors-box');

            if(vbox.length==0){
            $('body').append(notificationBoxHtml); // Menempelkan elemen ke body
            }

            // Data untuk notifikasi
            /*const namaPelanggan = ["Budi", "Siti", "Agus", "Dewi", "Fauzi", "Linda", "Rudi", "Maya"];
            //const namaProduk = ["Laptop ASUS", "Mouse Logitech", "Keyboard Mekanik", "Monitor Samsung", "Webcam HD", "Speaker Bluetooth", "Router Wi-Fi", "Hard Drive Eksternal"];
            //const linkProduk = [
                "https://example.com/laptop-asus",
                "https://example.com/mouse-logitech",
                "https://example.com/keyboard-mekanik",
                "https://example.com/monitor-samsung",
                "https://example.com/webcam-hd",
                "https://example.com/speaker-bluetooth",
                "https://example.com/router-wifi",
                "https://example.com/hard-drive"
            ];*/

            const namaPelanggan = _identifier_array_nama_client_;
            const namaProduk = _identifier_array_nama_product_;
            const linkProduk = _identifier_array_link_product_;
            const pesanUtama = "_identifier_message_";

            let currentIndex = 0; // Untuk melacak indeks data yang sedang ditampilkan
            let notificationDisplayTimer; // Timer untuk mengontrol durasi tampil
            let notificationCycleTimer; // Timer untuk mengontrol jeda antar notifikasi

            // Fungsi untuk mendapatkan angka acak dalam rentang tertentu
            function getRandomInt(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            // Fungsi untuk melanjutkan ke notifikasi berikutnya
            function advanceToNextNotification() {
                // Pindahkan ke indeks berikutnya
                currentIndex++;
                // Jika sudah mencapai akhir, kembali ke awal
                if (currentIndex >= namaPelanggan.length) {
                    currentIndex = 0;
                }
                // Jadwalkan notifikasi berikutnya setelah jeda acak
                const randomDelay = getRandomInt(3000, 5000); // Jeda acak 3-5 detik
                notificationCycleTimer = setTimeout(showVirtualVisitorNotification, randomDelay);
            }

            // Fungsi untuk menampilkan notifikasi pengunjung virtual
            function showVirtualVisitorNotification() {
                // Pastikan tidak ada animasi atau timer sebelumnya yang tumpang tindih
                $('#virtualvisitors-box').stop(true, true).hide(); // Sembunyikan dan hentikan animasi yang mungkin masih berjalan
                clearTimeout(notificationDisplayTimer);
                clearTimeout(notificationCycleTimer);

                // Ambil data untuk notifikasi saat ini
                const customer = namaPelanggan[currentIndex];
                const product = namaProduk[currentIndex];
                const link = linkProduk[currentIndex];
                const timeAgo = getRandomInt(2, 10); // Waktu acak antara 2 sampai 10 menit lalu

                // Update isi div notifikasi dengan data yang relevan
                let pesan = pesanUtama;
                pesan = pesan.replace('{nama-client}', `<b>${customer}</b>`);
                pesan = pesan.replace('{nama-produk}', `<a href="${link}" target="_blank">${product}</a>`);

                $('#format-pesan').html(pesan);
                //$('#customer-name').html(`<b>${customer}</b>`);
                //$('#product-info').html(`<a href="${link}" target="_blank">${product}</a>`);
                $('#time-ago-text').text(`${timeAgo} menit lalu`);

                // Fade in notifikasi virtual visitors
                $('#virtualvisitors-box').fadeIn(1000, function() { // Durasi fade in 1 detik
                    // Setelah fade in selesai, atur timer untuk fade out
                    notificationDisplayTimer = setTimeout(function() {
                        $('#virtualvisitors-box').fadeOut(1000, function() { // Durasi fade out 1 detik
                            // Setelah fade out selesai, lanjutkan ke notifikasi berikutnya
                            advanceToNextNotification();
                        });
                    }, 3000); // Tampilkan selama 3 detik sebelum fade out
                });
            }

            // Event listener untuk menutup box saat diklik
            $('#virtualvisitors-box').on('click', function() {
                // Hentikan semua timer yang berkaitan dengan notifikasi yang sedang tampil
                clearTimeout(notificationDisplayTimer);
                clearTimeout(notificationCycleTimer);

                // Sembunyikan box saat ini dengan cepat
                $(this).stop(true, true).fadeOut(300);

                // Langsung lanjutkan ke notifikasi berikutnya dalam urutan
                advanceToNextNotification();
            });

            // Mulai menampilkan notifikasi saat dokumen siap
            showVirtualVisitorNotification();
        });