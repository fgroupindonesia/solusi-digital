$('.add-to-cart').on('click', function (e) {
    e.preventDefault(); // hindari aksi default tombol

    // Cek apakah user sudah login berdasarkan elemen #login-link
    let el = $('#login-link');

    if (el.length > 0) {
        // Jika belum login, tampilkan SweetAlert
        Swal.fire({
            title: 'Belum Login!',
            text: 'Untuk belanja produk ini, kamu harus daftar atau login dulu. Gratis kok!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Daftar/Login Sekarang',
            cancelButtonText: 'Nanti Saja'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman login
                window.location.href = el.attr('href'); // ambil href dari #login-link
            }
        });
    } else {
        // User sudah login, lanjut proses tambahkan ke keranjang
        let productId = $(this).data('product-id'); // contoh ambil ID produk dari data attribute

        // Contoh request ke backend (ubah sesuai implementasi kamu)
        $.post('/cart/add', { id: productId }, function (response) {
            // tampilkan pesan sukses
            Swal.fire({
                title: 'Berhasil!',
                text: 'Produk berhasil ditambahkan ke keranjang.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });

            // update tampilan keranjang kalau perlu
            $('#total_cart_items').text(response.total_items);
        });
    }
});
