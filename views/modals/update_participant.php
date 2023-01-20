<div class="modal fade" id="updateModal1" tabindex="-1" aria-labelledby="updateModal1Label"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModal1Label">Modification d'un participant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formUpdateData" name="formUpdateData" action="" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nom</label>
                <div class="form-group input-group mb-0">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-ad"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control browser-default"
                         name="nomUpdate" id="nomUpdate" required>
                </div>
                <div class="mb-3">
                  <small id="nomUpdateHelp" class="text-danger invisible"></small>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Prénoms</label>
                <div class="form-group input-group mb-0">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-ad"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control browser-default"
                         name="prenomsUpdate" id="prenomsUpdate" required>
                </div>
                <div class="mb-3">
                  <small id="prenomsUpdateHelp" class="text-danger invisible"></small>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Numéro</label>
                <div class="form-group input-group mb-0">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                  <input type="tel" class="form-control browser-default"
                         name="numeroUpdate" id="numeroUpdate" required>
                </div>
                <div class="mb-3">
                  <small id="numeroUpdateHelp" class="text-danger invisible"></small>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>E-mail</label>
                <div class="form-group input-group mb-0">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-mail-bulk"></span>
                    </div>
                  </div>
                  <input type="email" class="form-control browser-default"
                         name="emailUpdate" id="emailUpdate">
                </div>
                <div class="mb-3">
                  <small id="emailUpdateHelp" class="text-danger invisible"></small>
                </div>
              </div>
            </div>

            <input type="hidden" name="idModif" id="idModif">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary right btn_update" name="btn_update">
              Enregistrer
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
