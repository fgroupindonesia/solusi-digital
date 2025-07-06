
const URL_UPDATE_VIRTUALVISITORS = "/update-data-virtualvisitors";
const URL_DELETE_VIRTUALVISITORS = "/delete-data-virtualvisitors";
const URL_PREVIEW_VIRTUALVISITORS = "/preview-virtualvisitors";

// main web link is from modal works.js
const URL_LINK_DEFAULT_VIRTUALVISITORS = _URL_ENTRY_MAIN_WEB + "assets/virtualvisitors/themes/default.css";
const URL_LINK_JS_VIRTUALVISITORS = _URL_ENTRY_MAIN_WEB +  "client/gvs?code=";

$(document).ready(function() {

    // testing virtualvisitors
    $('body').on('click', '#link-test-virtualvisitors', function(){

        let el = $(this);
        let statusna = el.attr('status');

        if(statusna == 'active'){
            stopVirtualVisitors();

            el.attr('status', 'disactive');
            el.text('Start Test');
            el.css('background-image', 'url("/assets/images/play.png")')

        }else {

             let codena = $('#vvisitors-order-client-reff').val();
             let datana = {code : codena};

              $.ajax({
                url: URL_PREVIEW_VIRTUALVISITORS, 
                type: 'POST',
                data: datana,
                success: function(response) {
                    
                    let json = JSON.parse(response);

                    if(json.status=='success')
                    renderToManagement(json.data, json.extra);
                    el.attr('status', 'active');
                    el.text('Stop Test');
                    el.css('background-image', 'url("/assets/images/pause.png")')
                    
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan saat mengirim data:', error);
                    console.log(xhr.responseText);
                    // Tambahkan logika penanganan error (misal: pesan error ke user)
                }
            });

        }


    });

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

    // saat modal code vvisitors muncul
     $('#code-virtualvisitors-form-modal').on('shown.bs.modal', function () {

        let asCSS = '<link rel="stylesheet" href="' + URL_LINK_DEFAULT_VIRTUALVISITORS + '">';
        $('#code-css-virtualvisitors').text(asCSS);


        let code = $('#vvisitors-order-client-reff').val();
        let linkJSVirtualVisitors = URL_LINK_JS_VIRTUALVISITORS + code;

        let asJS = '<script src="' + linkJSVirtualVisitors + '"></script>';
        $('#code-js-virtualvisitors').text(asJS);

     });

    // untuk copy code dari virtual visitors
     $('.btn-copy-icon').on('click', function() {
        const targetTextareaId = $(this).data('target-textarea');
        const targetTextarea = $('#' + targetTextareaId);

        if (targetTextarea.length) { // Pastikan textarea ditemukan
            targetTextarea.select();
            targetTextarea[0].setSelectionRange(0, 99999); // Untuk perangkat seluler

            try {
                document.execCommand('copy');

                // Tampilkan notifikasi
                $('#copy-notification').removeClass('d-none').fadeIn(300); // Fade in notifikasi

                // Sembunyikan notifikasi setelah 2 detik
                setTimeout(function() {
                    $('#copy-notification').fadeOut(500, function() { // Fade out notifikasi
                        $(this).addClass('d-none'); // Sembunyikan sepenuhnya setelah fade out
                    });
                }, 2000); // Notifikasi terlihat selama 2 detik
            } catch (err) {
                console.error('Gagal menyalin teks: ', err);
                alert('Gagal menyalin teks. Silakan salin manual.');
            }
        }
    });

   

    // copy virtual visitors code done!

    $('body').on('click', '#link-clear-all-virtualvisitors', function(){

        let idna = $('#vvisitors-order-id').val();
        let datana = {order_id : idna};

        $.ajax({
            url: URL_DELETE_VIRTUALVISITORS, 
            type: 'POST',
            data: datana,
            success: function(response) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil di-clear.',
                    showConfirmButton: false, // Sembunyikan tombol OK
                    timer: 2000 // Tampil selama 2 detik
                }).then(() => {
                    // Setelah SweetAlert hilang (atau 2 detik berlalu), reload halaman
                    location.reload();
                });
                
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengirim data:', error);
                console.log(xhr.responseText);
                // Tambahkan logika penanganan error (misal: pesan error ke user)
            }
        });


    });

    // Fungsi untuk mengambil data dari semua textarea dan mengirimkannya via AJAX
    function sendDataViaAjax() {
        // Ambil nilai dari masing-masing textarea
        let namaClient = $('#vvisitors_name_clients').val();
        let namaProduk = $('#vvisitors_name_products').val();
        let linkProduk = $('#vvisitors_link_products').val();

        let userna = $('#nav-username').val();
        let orderna = $('#vvisitors-order-id').val();

        // Buat objek data untuk dikirim
        let postData = {
            order_id: orderna,
            username: userna,
            nama_client: namaClient,
            nama_produk: namaProduk,
            link_produk: linkProduk
        };

        // Kirim data menggunakan AJAX
        $.ajax({
            url: URL_UPDATE_VIRTUALVISITORS, // Ganti dengan URL endpoint AJAX Anda
            type: 'POST',
            data: postData,
            success: function(response) {
                console.log('Data berhasil dikirim:', response);
                
                $('#link-clear-all-virtualvisitors').removeClass('d-none');
                $('#link-test-virtualvisitors').removeClass('d-none');

            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengirim data:', error);
                console.log(xhr.responseText);
                // Tambahkan logika penanganan error (misal: pesan error ke user)
            }
        });
    }

    // Hanya tangani event 'blur' (lost focus) pada semua textarea
    $('textarea.form-control').on('blur', function() {
        sendDataViaAjax();
    });
});

let currentIndex = 0; // Untuk melacak indeks data yang sedang ditampilkan
let notificationDisplayTimer; // Timer untuk mengontrol durasi tampil
let notificationCycleTimer; // Timer untuk mengontrol jeda antar notifikasi

let namaPelanggan = null;
let namaProduk = null;
let linkProduk = null;
let formatPesan = null;

function renderToManagement(dataCome, pesan){

    $('#wa-contact-container').hide();

    let n_client = [];
    let n_product = [];
    let l_product = [];

    let banyak = dataCome.length;
    formatPesan = pesan;

    for(i=0; i<banyak; i++){
        n_client.push(dataCome[i].client_name);
        n_product.push(dataCome[i].product_bought);
        l_product.push(dataCome[i].product_url);
    }
  
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

             namaPelanggan = n_client;
             namaProduk = n_product;
             linkProduk = l_product;

           

            

            // Mulai menampilkan notifikasi saat dokumen siap
            showVirtualVisitorNotification();


}

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

            function stopVirtualVisitors() {
                // 1. Hentikan semua timer
                clearTimeout(notificationDisplayTimer);
                clearTimeout(notificationCycleTimer);

                // 2. Hentikan antrean animasi jQuery dan segera sembunyikan notifikasi
                // .stop(true, true) menghentikan animasi yang sedang berjalan dan menghapus antrean,
                // lalu melompat ke akhir animasi saat ini. .hide() memastikan notifikasi disembunyikan.
                $('#virtualvisitors-box').stop(true, true).hide();

                console.log("Virtual Visitors functionality stopped.");
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
                let pesan = formatPesan;
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

