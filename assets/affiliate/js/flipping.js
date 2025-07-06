 $(document).ready(function () {
            // Script untuk mengontrol efek flipping
            $('.toggle-form-link').on('click', function (e) {
                e.preventDefault(); // Mencegah link meloncat
                $('.card').toggleClass('flipped'); // Tambah/hapus class 'flipped' pada elemen card
            });

            $('#agreeBtn').on('click', function(e){

                e.preventDefault();

                $('#checkbox2').prop('checked', true);

            });

        });