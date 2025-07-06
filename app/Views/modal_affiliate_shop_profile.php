<div class="modal fade" id="shopProfileModal" tabindex="-1" aria-labelledby="shopProfileModalLabel" aria-hidden="true">
  <form id="shop-profile-form" action="/update-affiliate-shop-profile" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shopProfileModalLabel">Pengaturan Profil Toko</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <input type="hidden" id="shopProfile-hidden-shop-id" name="id" value="<?= $shop_profile_id ?? '' ?>" >
          <input type="hidden" id="shopProfile-hidden-user-id" name="user_id" value="<?= $user_id ?? '' ?>" >

          <div class="mb-3">
            <label for="shopTitle" class="form-label">Judul Toko</label>
            <input name="shop_title" type="text" value="<?= $shop_profile_title ?? '' ?>" class="form-control" id="shopTitle" placeholder="Masukkan judul toko Anda">
          </div>
          <div class="mb-3">
    <label for="banner1Upload" class="form-label">Unggah Banner 1</label>
    <input name="shop_banner_file_1" class="form-control" type="file" id="banner1Upload">
    <small class="form-text text-muted">Rekomendasi ukuran: 1920x400 px</small>
    <?php if (!empty($shop_banner_1)): ?>
        <p class="mt-2 mb-0">
            <a href="<?= $shop_banner_1; ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Banner Saat Ini</a>
            <button type="button" class="btn btn-sm btn-danger btn-delete-banner"
                    data-banner="1"
                    data-nama-file="<?= $shop_banner_file_1 ?? '' ?>"
                    data-shop="<?= $shop_profile_id ?? '' ?>">
                Hapus
            </button>
        </p>
    <?php endif; ?>
</div>
<div class="mb-3">
    <label for="banner2Upload" class="form-label">Unggah Banner 2</label>
    <input name="shop_banner_file_2" class="form-control" type="file" id="banner2Upload">
    <small class="form-text text-muted">Rekomendasi ukuran: 1920x400 px</small>
    <?php if (!empty($shop_banner_2)): ?>
        <p class="mt-2 mb-0">
            <a href="<?= $shop_banner_2; ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Banner Saat Ini</a>
            <button type="button" class="btn btn-sm btn-danger btn-delete-banner"
                    data-banner="2"
                    data-nama-file="<?= $shop_banner_file_2 ?? '' ?>"
                    data-shop="<?= $shop_profile_id ?? '' ?>">
                Hapus
            </button>
        </p>
    <?php endif; ?>
</div>
<div class="mb-3">
    <label for="banner3Upload" class="form-label">Unggah Banner 3</label>
    <input name="shop_banner_file_3" class="form-control" type="file" id="banner3Upload">
    <small class="form-text text-muted">Rekomendasi ukuran: 1920x400 px</small>
    <?php if (!empty($shop_banner_3)): ?>
        <p class="mt-2 mb-0">
            <a href="<?= $shop_banner_3; ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Banner Saat Ini</a>
            <button type="button" class="btn btn-sm btn-danger btn-delete-banner"
                    data-banner="3"
                    data-nama-file="<?= $shop_banner_file_3 ?? '' ?>"
                    data-shop="<?= $shop_profile_id ?? '' ?>">
                Hapus
            </button>
        </p>
    <?php endif; ?>
</div>
        
      </div>
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
      
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
  </form>
</div>

