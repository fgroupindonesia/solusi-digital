<!-- Modal -->
<div class="modal fade" id="virtualvisitor-theme-modal" tabindex="-1" aria-labelledby="virtualvisitor-theme-modalLabel" aria-hidden="true">

  <input type="hidden" id="virtualvisitor-hidden-id" name="id" value="" >
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Theme and Icon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-2">
          <span>Change Selected Data to Theme: </span>
          <select class="form-select d-inline w-auto" name="theme">
            <option value="snow">default</option>
            <option value="snowy">snowy</option>
            <option value="summer">summer</option>
            <option value="winter">winter</option>
            <option value="rainy">rainy</option>
            <option value="hotspring">hotspring</option>
          </select>
          |
          <select class="form-select d-inline w-auto" name="iconic">
            <option value="no-icon">no icon</option>
            <option value="gender">gender</option>
            <option value="arrow">arrow</option>
          </select>
          <a class="link-apply-theme ms-2">Apply</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
