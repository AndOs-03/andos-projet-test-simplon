<div class="modal fade" id="addModal1" tabindex="-1" aria-labelledby="addModal1Label"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModal1Label">Ajout d'un participant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formAddData" name="formAddData" action="" method="POST">
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
                         name="nom" id="nom" required>
                </div>
                <div class="mb-3">
                  <small id="nomHelp" class="text-danger invisible"></small>
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
                         name="prenoms" id="prenoms" required>
                </div>
                <div class="mb-3">
                  <small id="prenomsHelp" class="text-danger invisible"></small>
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
                         name="numero" id="numero" required>
                </div>
                <div class="mb-3">
                  <small id="numeroHelp" class="text-danger invisible"></small>
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
                         name="email" id="email">
                </div>
                <div class="mb-3">
                  <small id="emailHelp" class="text-danger invisible"></small>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary right btn_add" name="btn_add">
              Enregistrer
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
