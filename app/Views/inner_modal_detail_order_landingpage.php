<section id="detail-order-landing-page">
  <h3><i class="fas fa-file-alt me-2"></i>Landing Page Order Detail</h3>

  <!-- Package -->
  <div class="form-group row">
    <label for="detail-order-landing-page-package" class="col-4 col-form-label">
      <i class="fas fa-box-open me-1"></i>Package
    </label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-cubes"></i>
          </div>
        </div>
        <input readonly id="detail-order-landing-page-package" name="package" type="text" class="form-control" placeholder="Enter package name">
      </div>
    </div>
  </div>

  <!-- Integrasi -->
  <div class="form-group row">
    <label for="detail-order-landing-page-integrasi" class="col-4 col-form-label">
      <i class="fas fa-plug me-1"></i>Integrasi
    </label>
    <div class="col-8">
      <select readonly id="detail-order-landing-page-integrasi" name="integrasi" class="form-control">
        <option value="">-- Select --</option>
        <option value="ya">ya</option>
        <option value="tidak">tidak</option>
      </select>
    </div>
  </div>

  <!-- Platform Integrasi -->
  <div class="form-group row">
    <label for="detail-order-landing-page-platform" class="col-4 col-form-label">
      <i class="fas fa-network-wired me-1"></i>Platform Integrasi
    </label>
    <div class="col-8">
      <input readonly id="detail-order-landing-page-platform" name="platform_integrasi" type="text" class="form-control" placeholder="">
    </div>
  </div>
</section>
