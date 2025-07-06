<div id="copy-notification" class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3 d-none" role="alert" style="z-index: 1060;">
    Copied to clipboard!
</div>

<div class="modal fade" id="code-virtualvisitors-form-modal" tabindex="-1">
    <form id="code-virtualvisitors-form" action="/update-settings" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Virtual Visitors Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-3">
                        <label class="col-form-label">File CSS :</label>
                        <div class="input-group">
                            <textarea id="code-css-virtualvisitors" class="form-control" rows="3" readonly></textarea>
                            <span class="input-group-text btn-copy-icon" data-target-textarea="code-css-virtualvisitors" title="Copy HTML Code">
                                <i class="fas fa-copy fa-sm"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-form-label">File Javascript :</label>
                        <div class="input-group">
                            <textarea id="code-js-virtualvisitors" class="form-control" rows="3" readonly></textarea>
                            <span class="input-group-text btn-copy-icon" data-target-textarea="code-js-virtualvisitors" title="Copy Direct Link">
                                <i class="fas fa-copy fa-sm"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span>Segera Copy & Paste script ini ke dalam halaman website mu agar Popup Sales Notification berfungsi dengan baik! <i class="far fa-lightbulb"></i></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <img class="modal-loading" src="/assets/plugins/images/loading.gif">
                    <button type="button" class="btn btn-secondary btn-close-custom" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>