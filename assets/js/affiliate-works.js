const URL_DELETE_AFFILIATE_PRODUCT = "/delete-affiliate-product";
const URL_ADD_NEW_AFFILIATE_PRODUCT = "/add-new-affiliate-product";
const URL_ADD_NEW_AFFILIATE_PRODUCT_CATEGORY = "/add-new-affiliate-product-category";
const URL_ADD_NEW_AFFILIATE_PRODUCT_IMAGE = "/add-new-affiliate-product-image";
const URL_EDIT_AFFILIATE_PRODUCT = "/edit-affiliate-product";
const URL_UPDATE_AFFILIATE_PRODUCT_IMAGE = "/update-affiliate-product-image";
const URL_REQUEST_AFFILIATE_PRODUCT_IMAGE = "/request-affiliate-product-image";
const URL_DELETE_AFFILIATE_PRODUCT_IMAGE = "/delete-affiliate-product-image";

$(document).ready(function() {
	const productAffiliateForm = $('#product-affiliate-form');
    const $productCategorySelect = $('#product-category');
    const $newCategoryInputGroup = $('#new-category-input-group');
    const $newCategoryNameInput = $('#new-category-name');
    const $addCategoryButton = $('#add-category-btn');
    const $newCategoryError = $('#new-category-error');
    const $productAffiliateFormModal = $('#product-affiliate-form-modal');
    const loadingSpinner = $productAffiliateFormModal.find('.modal-loading');
    const saveButton = $productAffiliateFormModal.find('.btn-save');

    // Event listener saat dropdown kategori berubah
    $productCategorySelect.on('change', function() {
        if ($(this).val() === 'add_new_category') {
            $newCategoryInputGroup.css('display', 'flex'); // Tampilkan input field
            $newCategoryNameInput.focus(); // Berikan fokus ke input baru
        } else {
            $newCategoryInputGroup.hide(); // Sembunyikan input field
            $newCategoryNameInput.val(''); // Kosongkan nilainya
            $newCategoryError.hide(); // Sembunyikan pesan error
        }
    });

    // Fungsi untuk menambah kategori baru
    function addNewCategory() {
        const categoryName = $newCategoryNameInput.val().trim();

        if (categoryName === '') {
            $newCategoryError.show(); // Tampilkan pesan error
            return;
        } else {
            $newCategoryError.hide(); // Sembunyikan pesan error
        }

        // Dummy Ajax POST Request
        console.log('Sending Ajax POST request for new category:', categoryName);
        console.log('ke URL ' + URL_ADD_NEW_AFFILIATE_PRODUCT_CATEGORY);

        let datana = { category_name: categoryName };

        // Simulasikan Ajax request menggunakan jQuery.ajax
        $.ajax({
            url: URL_ADD_NEW_AFFILIATE_PRODUCT_CATEGORY, // Ganti dengan endpoint API Anda
            type: 'POST',
            data: datana,
            beforeSend: function() {
                // Optional: Tampilkan indikator loading atau disable tombol
                $addCategoryButton.prop('disabled', true);
            },
            success: function(data) {
                console.log('Ajax response:', data);
                // Anggap kategori berhasil ditambahkan dan server mengembalikan data kategori baru

                // 1. Tambahkan kategori baru ke dropdown
                const newOption = `<option value="${categoryName}" selected>${categoryName}</option>`;
                // Sisipkan opsi baru sebelum opsi '-- Add New Category --'
                $productCategorySelect.find('option[value="add_new_category"]').before(newOption);

                // 2. Sembunyikan kembali input field
                $newCategoryInputGroup.hide();
                $newCategoryNameInput.val(''); // Kosongkan input

                // Optional: Beri tahu user bahwa kategori berhasil ditambahkan
                // alert(`Kategori '${categoryName}' berhasil ditambahkan!`);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error adding new category:', textStatus, errorThrown, jqXHR);
                // Tangani error, misal tampilkan pesan ke user
                // alert('Gagal menambahkan kategori. Silakan coba lagi.');
            },
            complete: function() {
                // Optional: Sembunyikan indikator loading atau enable tombol kembali
                $addCategoryButton.prop('disabled', false);
            }
        });
    }

    // event untuk cinema photo image gallery
    productImageGalleryCinemas();

    // Event listener untuk tombol 'Add'
    $addCategoryButton.on('click', addNewCategory);

    // Event listener untuk menekan 'Enter' di textbox kategori baru
    $newCategoryNameInput.on('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Mencegah form submit
            addNewCategory();
        }
    });

    // Reset modal state saat modal ditutup (menggunakan event Bootstrap modal)
    $productAffiliateFormModal.on('hidden.bs.modal', function () {
        $('#product-affiliate-form')[0].reset(); // Reset semua input form
        $('#new-category-input-group').hide(); // Sembunyikan input kategori baru
        $('#new-category-name').val(''); // Kosongkan nilai input kategori baru
        $('#new-category-error').hide(); // Sembunyikan pesan error kategori baru
        $('#product-affiliate-hidden-id').val(''); // Pastikan ID tersembunyi kosong
        $('#product-category').val(''); 
    });


    // untuk editing form affiliate only
    $('body').on('click', '.link-edit', function(e){

        e.preventDefault();

         var idCollected = [];
         $('input[type="checkbox"]:checked').each(function(){
            var number = $(this).data('id');
            idCollected.push(number);
         }); 

        let el = idCollected[0];
        let dataNa = {id : el};

        console.log('terdata ' + dataNa);
        requestDataAffiliate(dataNa);

    });

     // untuk deleting affiliate only
    $('body').on('click', '.link-delete', function(e){

        e.preventDefault();

         var idCollected = [];
         $('input[type="checkbox"]:checked').each(function(){
            var number = $(this).data('id');
            idCollected.push(number);
         }); 

        let el = idCollected[0];
        let dataNa = {id : el};

        console.log('terdata ' + dataNa);
        deleteDataAffiliate(dataNa);

    });

    // event untuk add image saat product
    addNewImageProduct();

    // event untuk form saat submit
     productAffiliateForm.on('submit', function(e) {
        e.preventDefault(); // Mencegah submit form secara default (refresh halaman)

        const form = $(this);
        const actionUrl = form.attr('action'); // Ambil URL dari atribut 'action' form
        const formData = form.serialize();
        let works = false;

        if(actionUrl == URL_ADD_NEW_AFFILIATE_PRODUCT){
            works = true;


        // Tampilkan loading spinner dan nonaktifkan tombol save
        loadingSpinner.show();
        saveButton.prop('disabled', true);

        $.ajax({
            url: actionUrl,
            type: 'POST', // Metode HTTP sesuai dengan form
            data: formData,
            success: function(response) {

                let json = JSON.parse(response);
                loadingSpinner.hide();
                saveButton.prop('disabled', false);

                if (json.status === 'success') {
                    // Jika sukses, tampilkan pesan dan tutup modal
                    alert(response.message);
                    $('#product-affiliate-form-modal').modal('hide');
                    // Opsional: Lakukan refresh halaman atau perbarui data di tabel
                    location.reload();
                } else {
                    // Jika ada error (misalnya validasi gagal)
                    let errorMessage = response.message || 'Terjadi kesalahan tidak dikenal.';
                    if (response.errors) {
                        // Tampilkan detail error validasi jika ada
                        errorMessage += '\n\nDetail Error:';
                        for (const key in response.errors) {
                            if (response.errors.hasOwnProperty(key)) {
                                errorMessage += `\n- ${response.errors[key]}`;
                            }
                        }
                    }
                    alert(errorMessage);
                }
            },
            error: function(xhr, status, error) {
                // Tangani error jika terjadi masalah komunikasi dengan server
                loadingSpinner.hide();
                saveButton.prop('disabled', false);
                alert('Terjadi kesalahan saat berkomunikasi dengan server. Silakan coba lagi. \n' + xhr.responseText);
                console.error('AJAX Error:', status, error, xhr.responseText);
            }
        });

        }

    });


});

function productImageGalleryCinemas(){

    const $fullScreenImageViewerModal = $('#full-screen-image-viewer-modal');
    const $fullScreenImage = $('#full-screen-image');
    const $fullScreenImageTitle = $('#full-screen-image-title');
    const $fullScreenImageDescription = $('#full-screen-image-description');

     $('body').on('click', '.open-full-screen-image', function(e) {
        e.preventDefault(); // Prevent default link behavior

        const fullImageUrl = $(this).data('full-image-url');
        const imageTitle = $(this).data('image-title');
        const imageDescription = $(this).data('image-description');

        // Hide the main gallery modal
        $('#product-image-gallery-modal').modal('hide');

        // Populate and show the full-screen viewer modal after a brief delay
        setTimeout(() => {
            $fullScreenImage.attr('src', fullImageUrl);
            $fullScreenImage.attr('alt', imageTitle);
            $fullScreenImageTitle.text(imageTitle);
            $fullScreenImageDescription.text(imageDescription); // Set description

            $fullScreenImageViewerModal.modal('show');
        }, 100); // Small delay to ensure gallery modal starts hiding
    });

    $fullScreenImageViewerModal.on('hide.bs.modal', function () {
        // This event fires when the modal is *about to be hidden*.
        // We only want to show the gallery modal if this modal is closing normally.
        // Avoid showing if another modal is being opened immediately after this one hides.

        // Show the main gallery modal after a brief delay to ensure the full-screen one is fully hidden
        setTimeout(() => {
            $('#product-image-gallery-modal').modal('show');
        }, 100);
    });

    // Remove the previous problematic click handler for full-screen modal content.
    // The Bootstrap 'hide.bs.modal' event handles backdrop clicks automatically (if not static).
    // If you still want to explicitly close on image click, you can keep a simplified version:
    $('body').on('click', '#full-screen-image', function() {
        $fullScreenImageViewerModal.modal('hide');
    });

}

function requestDataAffiliate(datana){

     $.ajax({
            url: URL_EDIT_AFFILIATE_PRODUCT,
            type: 'POST', // Metode HTTP sesuai dengan form
            data: datana,
            success: function(response) {
                console.log('tadi kirim ' + JSON.stringify(datana) + ' ke ' + URL_EDIT_AFFILIATE_PRODUCT);

                let json = JSON.parse(response);

                if (json.status === 'success') {
                   renderDataAffiliateProduct(response);
                } else {
                    alert(response);
                }

                
            },
            error: function(xhr, status, error) {
                
                alert('Terjadi kesalahan saat berkomunikasi dengan server. Silakan coba lagi. \n' + xhr.responseText);
                console.error('AJAX Error:', status, error, xhr.responseText);
            }
        });


}

function deleteDataAffiliate(datana){

     $.ajax({
            url: URL_DELETE_AFFILIATE_PRODUCT,
            type: 'POST', 
            data: datana,
            success: function(response) {
                console.log('tadi kirim ' + JSON.stringify(datana) + ' ke ' + URL_EDIT_AFFILIATE_PRODUCT);

                let json = JSON.parse(response);

                if (json.status === 'success') {
                   location.reload();
                } else {
                    alert(response);
                }

                
            },
            error: function(xhr, status, error) {
                
                alert('Terjadi kesalahan saat berkomunikasi dengan server. Silakan coba lagi. \n' + xhr.responseText);
                console.error('AJAX Error:', status, error, xhr.responseText);
            }
        });


}

function renderDataAffiliateProduct(data){

let json = JSON.parse(data);

const product = json.data; // Ambil objek data produk dari respons

            // Isi input tersembunyi ID produk
            $('#product-affiliate-hidden-id').val(product.id);

            // Isi input Nama Produk
            $('#product-name').val(product.name);

            // Isi Textarea Deskripsi
            $('#product-description').val(product.description);

            // Isi input Base Price
            $('#product-base-price').val(product.base_price);

            // Set Status (Radio Button)
            if (product.status === 'active') {
                $('#product-status-active').prop('checked', true);
            } else if (product.status === 'inactive') {
                $('#product-status-inactive').prop('checked', true);
            }

            // Isi Admin Commission (jika ada dan elemennya visible/ada di UI)
            // Penting: Pastikan elemen #admin-commission hanya muncul jika role adalah admin
            // seperti di HTML Anda. Anda bisa menambahkan pengecekan elemen di sini.
            const adminCommissionInput = $('#admin-commission');
            if (adminCommissionInput.length && product.admin_commission_rate !== undefined) {
                adminCommissionInput.val(product.admin_commission_rate);
            }

            // Set Kategori (Dropdown)
            const productCategorySelect = $('#product-category');
            const newCategoryInputGroup = $('#new-category-input-group'); // Dapatkan elemen ini
            newCategoryInputGroup.hide(); // Sembunyikan input "Add New Category" secara default

            // Iterasi melalui opsi dropdown untuk menemukan kategori yang cocok
            let categoryFound = false;
            productCategorySelect.find('option').each(function() {
                if ($(this).val() === product.category) { // product.category dari alias 'category' di model
                    $(this).prop('selected', true);
                    categoryFound = true;
                    return false; // Berhenti iterasi setelah menemukan yang cocok
                }
            });

            // Jika kategori tidak ditemukan di opsi yang sudah ada, ini bisa berarti
            // kategori tersebut adalah kategori baru yang belum ada di daftar dropdown statis.
            // Dalam kasus ini, Anda mungkin ingin menanganinya atau memastikan semua kategori
            // selalu dimuat sebelumnya. Untuk saat ini, kita biarkan dropdown tidak terpilih
            // atau kembali ke 'Select a Category' jika tidak ditemukan.
            if (!categoryFound) {
                 productCategorySelect.val(''); // Reset ke 'Select a Category' atau nilai default Anda
                 // Atau Anda bisa menambahkan opsi kategori secara dinamis jika yakin itu kategori valid
                 // const newOption = $('<option>', {
                 //     value: product.category,
                 //     text: product.category,
                 //     selected: true
                 // });
                 // productCategorySelect.append(newOption);
            }


            // Tampilkan modal setelah data diisi
            $('#product-affiliate-form-modal').modal('show');

}

function deleteImageProduct(imageId) {
    console.log('Dummy AJAX call to delete image with ID:', imageId);

    // This is where you would make your actual AJAX request.
    // Example using URL_DELETE_AFFILIATE_PRODUCT (if applicable for images)
    // Or define a new URL_DELETE_AFFILIATE_PRODUCT_IMAGE if images have their own endpoint.
   
    $.ajax({
        url: URL_DELETE_AFFILIATE_PRODUCT_IMAGE, // Replace with your actual image delete URL
        type: 'POST',
        data: { image_id: imageId },
        success: function(response) {
            let json = JSON.parse(response);
            if (json.status === 'success') {
                $(`button.btn-close-image-overlay[data-image-id="${imageId}"]`).closest('.product-image-item').remove();

                // Check if the gallery is now empty and display the message if so
                const $galleryContentArea = $('#product-images-grid-content');
                if ($galleryContentArea.children().length === 0) {
                    $galleryContentArea.append('<p id="gallery-no-images-message" class="text-center w-100 mt-3">No images to display yet.</p>');
                }
            } else {
                alert('Error deleting image: ' + (json.message || 'Unknown error.'));
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to delete image. Please try again.');
            console.error('AJAX Error:', status, error, xhr.responseText);
        }
    });
   

    // For now, let's just simulate success and reload
    //alert('Simulating image deletion for ID: ' + imageId);
    //location.reload(); // Or dynamically remove the element:
    // $(`button.btn-close-image-overlay[data-image-id="${imageId}"]`).closest('.product-image-item').remove();
    // Also, if you dynamically remove, check if the gallery becomes empty and show "No images" message.
}


function addNewImageProduct(){

     $('body').on('click', '.btn-close-image-overlay', function(e){
        e.stopPropagation(); // Prevent the click from bubbling up to the link/image below
        e.preventDefault(); // Prevent default button behavior (if any)

        const imageIdToDelete = $(this).data('image-id');
        console.log('Attempting to delete image with ID:', imageIdToDelete);

        if (confirm('Are you sure you want to delete this image?')) {
            // Call your dummy AJAX delete function here
            deleteImageProduct(imageIdToDelete);
        }
    });

    $('body').on('click', '#add-new-image-btn', function(){


          $('.modal.show').modal('hide'); 

        let currentProductId = $(this).attr('data-id'); 

        setTimeout(function() {
            // Step 3: Prepare the image management form for a new entry
            $('#product-image-form')[0].reset(); // Reset all form fields
            $('#product-image-id').val(''); // Clear hidden image ID (important for 'add' mode)
            $('#product-image-url').val(''); // Clear URL field
            $('#product-image-file').val(''); // Clear file input
            $('#product-image-title').val(''); // Clear title
            $('#product-image-description').val(''); // Clear description
            $('#product-image-is-thumbnail').prop('checked', false); // Uncheck thumbnail checkbox

            // Step 4: Show the "Manage Product Images" modal
            $('#product-image-modal').modal('show');
        }, 1300);


    });

    $('body').on('click', '.link-image-gallery', function(){

        let idna = $(this).attr('data-id');

        // simpen ke button image gallery
        $('#add-new-image-btn').attr('data-id', idna);

        // simpen juga di form product image form
        $('#product-image-product-id').val(idna);

        let datana = {product_id : idna};
        requestDataImageProductAffiliate(datana);

    });



    $('body').on('submit', '#product-image-form', function(e){

        e.preventDefault();

        const form = $(this);
        const formData = new FormData(form[0]); // Get form data, including files

        // Determine the action URL based on whether you're adding or editing
        // If product-image-id has a value, it's an edit; otherwise, it's an add.
        const imageId = $('#product-image-id').val();
        const actionUrl = imageId ? URL_UPDATE_AFFILIATE_PRODUCT_IMAGE : URL_ADD_NEW_AFFILIATE_PRODUCT_IMAGE;

        let $productImageModal = $('#product-image-modal');
        let $loadingSpinnerImage = $('#product-image-modal').find('.modal-loading');
        let $saveImageButton = $('#product-image-modal').find('.btn-save');

        // Display loading spinner and disable save button
        $loadingSpinnerImage.show();
        $saveImageButton.prop('disabled', true);

        // Perform the AJAX request
        $.ajax({
            url: actionUrl,
            type: 'POST', // Use POST for both add and edit (common for FormData)
            data: formData,
            processData: false, // Important: Tell jQuery not to process the data
            contentType: false, // Important: Tell jQuery not to set the Content-Type header
            success: function(response) {
                $loadingSpinnerImage.hide();
                $saveImageButton.prop('disabled', false);

                // Assuming your server returns JSON response with status and message
                let jsonResponse;
                try {
                    jsonResponse = JSON.parse(response);
                } catch (err) {
                    console.error('Failed to parse JSON response:', response);
                    alert('Terjadi kesalahan saat memproses respons server.');
                    return;
                }

                if (jsonResponse.status === 'success') {
                    alert(jsonResponse.message);
                    $productImageModal.modal('hide'); // Close the image management modal
                    
                    
                    // after some times
                    // back to image gallery
                   const currentProductId = $('#product-image-product-id').val();
                    if (currentProductId) {
                        setTimeout(() => {
                            // Ensure the main gallery modal is shown before requesting new data
                            $('#product-image-gallery-modal').modal('show');
                            // Then, request and populate the images for the current product
                            requestDataImageProductAffiliate({product_id: currentProductId});
                        }, 200); // Give a slight delay for the previous modal to fully hide
                    } else {
                        console.warn('Product ID not found. Cannot refresh image gallery.');
                        // If product ID is not available, a page reload might be the only option
                        // Or, guide the user back to the product list.
                        location.reload();
                    }

                } else {
                    let errorMessage = jsonResponse.message || 'Terjadi kesalahan tidak dikenal.';
                    if (jsonResponse.errors) {
                        // Display validation errors if provided by the server
                        errorMessage += '\n\nDetail Error:';
                        for (const key in jsonResponse.errors) {
                            if (jsonResponse.errors.hasOwnProperty(key)) {
                                errorMessage += `\n- ${jsonResponse.errors[key]}`;
                            }
                        }
                    }
                    alert(errorMessage);
                }
            },
            error: function(xhr, status, error) {
                $loadingSpinnerImage.hide();
                $saveImageButton.prop('disabled', false);
                alert('Terjadi kesalahan saat berkomunikasi dengan server. Silakan coba lagi. \n' + xhr.responseText);
                console.error('AJAX Error:', status, error, xhr.responseText);
            }
        });


    });


}

function requestDataImageProductAffiliate(datana){

    const $imageCardTemplate = $('#image-card-template');
  
    const $galleryContentArea = $('#product-images-grid-content'); // A new element to hold dynamic content


    // Clear previous content *before* making the AJAX request
    // This also removes the static "No images to display yet." if it's there
    $galleryContentArea.empty();
    // Optional: Show a temporary loading message if desired
    $galleryContentArea.append('<p class="text-center w-100 mt-3" id="loading-images-message">Loading images...</p>');


     $.ajax({
        url: URL_REQUEST_AFFILIATE_PRODUCT_IMAGE,
        type: 'POST',
        data: datana,
        success: function(response) {
            // Remove any loading message
            $('#loading-images-message').remove();

            let json = JSON.parse(response);

            if (json.status === 'success' && json.data && json.data.length > 0) {
                json.data.forEach(image => {
                    const $newImageCard = $imageCardTemplate.contents().clone();

                    const imageUrl = image.image_url;
                    const imageTitle = image.image_title || 'Product Image';
                    const imageDescription = image.image_description || '';
                    const isThumbnailText = image.is_thumbnail == 1 ? ' (Thumbnail)' : '';

                     $newImageCard.find('.btn-close-image-overlay').attr('data-image-id', image.id);


                    $newImageCard.find('a').attr({
                        'href': '#',
                        'data-full-image-url': imageUrl,
                        'data-image-title': imageTitle,
                        'data-image-description': imageDescription,
                        'class': 'open-full-screen-image'
                    });

                    $newImageCard.find('img').attr({
                        'src': imageUrl,
                        'alt': imageTitle
                    });

                    $newImageCard.find('.edit-image-btn').attr({
                        'data-image-id': image.id,
                        'data-product-id': image.product_id
                    });
                    $newImageCard.find('.delete-image-btn').attr('data-image-id', image.id);

                    $newImageCard.find('.image-info-overlay').html(`${imageTitle} ${isThumbnailText}`);

                    // Append to the specific content area
                    $galleryContentArea.append($newImageCard);
                });

            } else {
                console.log(json.message || 'No images found or an error occurred.');
                // Add the "No images" message to the specific content area
                $galleryContentArea.append('<p id="gallery-no-images-message" class="text-center w-100 mt-3">No images to display yet.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error, xhr.responseText);
            $('#loading-images-message').remove(); // Remove loading message on error
            $galleryContentArea.empty(); // Clear content area on error
            $galleryContentArea.append('<p id="gallery-no-images-message" class="text-center w-100 mt-3 text-danger">Failed to load images. Please try again.</p>');
        }
    });
}

