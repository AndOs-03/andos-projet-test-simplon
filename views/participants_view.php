<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'views/includes/head.php' ?>
        <title>Participants - <?= WEBSITE_NAME ?></title>
    </head>
    <body>
      <div class="loader"></div>
      <div id="bloc">
        <?php include_once 'views/includes/header.php' ?>
        <div class="row mb-2">
            <?php include('views/includes/_flash.php'); ?>
        </div>

        <!-- definir le background image du top-panel dans chap page -->
        <div class="top-panel" style="background-image: url(assets/images/team_kaeloo.jpg)">
          <div class="top-panel-hover"></div>
          <div class="top-panel-header">
              <h1 class="top-panel-title">PARTICIPANTS</h1>
          </div>
        </div>

        <section>
          <div class="container mt-3 mb-3">
              <div class="row">
                  <div class="col-md-12 mt-5">
                    <div class="table-responsive">
                      <table class="table caption-top">
                        <caption style="caption-side: top">
                          <span style="width: 50%; display: inline-block">Liste des participants</span>
                          <span style="width: 45%; text-align: right; display:
                          inline-block"><a href="#" class="link-add-button">Ajouter un participant</a></span>
                        </caption>
                        <thead>
                        <tr class="entete-tableau">
                          <th scope="col">#</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prénom</th>
                          <th scope="col">Numéro</th>
                          <th scope="col">Adresse email</th>
                          <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody class="table-data-body">
                        <?php
                          for ($j = 0; $j < count($participants); $j++) {
                        ?>
                          <tr>
                            <td><?= ($j + 1); ?></td>
                            <td><?= $participants[$j]['nom']; ?></td>
                            <td><?= $participants[$j]['prenom']; ?></td>
                            <td><?= $participants[$j]['numero']; ?></td>
                            <td><?= $participants[$j]['adresse_email']; ?></td>
                            <td style="padding-left: 0">
                              <ul class="actions-ul" style="padding-left: 0">
                                <li class="dropdown d-none d-sm-inline-block">
                                  <a class="nav-link" data-toggle="dropdown" href="#" style="font-size: 9px">⚫⚫⚫</a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item link-update-button" data-bs-toggle="tooltip"
                                       href="#" data-ligne-id="<?= $participants[$j]['id'] ?>">
                                      <i class="fas fa-edit mr-2"></i> Modifier
                                    </a>
                                    <a class="dropdown-item link-delete-button" data-bs-toggle="tooltip"
                                       href="#" data-ligne-id="<?= $participants[$j]['id'] ?>">
                                      <i class="fas fa-trash mr-2"></i> Supprimer
                                    </a>
                                  </div>
                                </li>
                              </ul>
                            </td>
                          </tr>
                        <?php
                          }
                        ?>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </section>
                
        <?php include_once 'views/includes/footer.php' ?>
      </div>

      <?php
        include_once("views/modals/add_participant.php");
        include_once("views/modals/update_participant.php");
        include_once("views/modals/delete_participant.php");
      ?>

      <script type="text/javascript">
        $(window).on('load', function () {
          $('.loader').fadeOut('slow', function () {
            $(this).remove();
          });
        });

        function initializeFlash() {
          if ($('.flash').hasClass('alert-success')) {
            $('.flash').removeClass('alert-success');
          } else if ($('.flash').hasClass('alert-danger')) {
            $('.flash').removeClass('alert-danger');
          } else if ($('.flash').hasClass('alert-warning')) {
            $('.flash').removeClass('alert-warning');
          } else if ($('.flash').hasClass('alert-info')) {
            $('.flash').removeClass('alert-info');
          }
        }

        $(".link-add-button").on("click", function (e) {
          e.preventDefault();
          $("#addModal1").modal('toggle');
        });

        $(".btn_add").on("click", function (e) {
          e.preventDefault();
          var form = $('#formAddData');
          $.ajax({
            method: "POST",
            data: form.serialize() + "&btn_add=" + true,
            url: "controllers/participants_controller.php",
            success: function(result) {
              donnee = JSON.parse(result);
              if (donnee['success'] === 'true') {
                $('#nom').val("");
                $('#prenoms').val("");
                $('#numero').val("");
                $('#email').val("");
                $('#nomHelp').html("").addClass('invisible');
                $('#prenomsHelp').html("").addClass('invisible');
                $('#emailHelp').html("").addClass('invisible');
                $('#numeroHelp').html("").addClass('invisible');

                initializeFlash();
                $('.flash').addClass('alert-success');
                $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);

                // Ajout de la ligne ajoutée
                $.ajax({
                  type: "GET",
                  data: "idLast=" + true,
                  url: "controllers/participants_controller.php",
                  success: function (result) {
                    donnee = JSON.parse(result);
                    if (donnee['participant'] !== 'null') {
                      const participant = donnee['participant'];
                      const total = donnee['total'];
                      let newLine =
                          '<tr>' +
                          '<td>' + total + '</td>' +
                          '<td>' + participant['nom'] + '</td>' +
                          '<td>' + participant['prenom'] + '</td>' +
                          '<td>' + participant['numero'] + '</td>' +
                          '<td>' + participant['adresse_email'] + '</td>' +

                          '<td style="padding-left: 0"><ul class="actions-ul" style="padding-left: 0">' +
                          '<li class="dropdown d-none d-sm-inline-block">' +
                          '<a class="nav-link" data-toggle="dropdown" href="#" style="font-size: 9px">⚫⚫⚫</a>' +
                          '<div class="dropdown-menu dropdown-menu dropdown-menu-right">' +
                          '<a class="dropdown-item link-update-button" data-bs-toggle="tooltip" href="#" data-ligne-id="'+participant['id']+'">' +
                          '<i class="fas fa-edit mr-2"></i> Modifier</a>' +
                          '<a class="dropdown-item link-update-button" data-bs-toggle="tooltip" href="#" data-ligne-id="'+participant['id']+'">' +
                          '<i class="fas fa-trash mr-2"></i> Supprimer</a></div></li></ul></td></tr>';
                      $(".table-data-body").append(newLine);
                    }
                  }
                });
              }

              if (donnee['success'] === 'non') {
                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
              }
              if (donnee['success'] === 'false') {
                $('#nomHelp').html(donnee['nom']).removeClass('invisible');
                $('#prenomsHelp').html(donnee['prenom']).removeClass('invisible');
                $('#numeroHelp').html(donnee['numero']).removeClass('invisible');
                $('#emailHelp').html(donnee['email']).removeClass('invisible');

                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                .fadeIn(300).delay(2500).fadeOut(300);
              }
            }
          });
        });

        let currentLine = undefined;
        $(".table-data-body").on("click", ".link-update-button",  function (e) {
          e.preventDefault();
          currentLine = $(this).parent().parent().parent().parent().parent();
          console.log(currentLine);
          var id = $(this).data('ligne-id');
          $.ajax({
            method: "GET",
            data: "idDetail=" + id,
            url: "controllers/participants_controller.php",
            success: function(result) {
              donnees = JSON.parse(result);
              participant  = donnees['participant'];

              if (participant !== 'null') {
                $('#nomUpdate').val(participant['nom']);
                $('#prenomsUpdate').val(participant['prenom']);
                $('#numeroUpdate').val(participant['numero']);
                $('#emailUpdate').val(participant['adresse_email']);
                $('#idModif').val(participant['id']);
              }
            }
          });

          $("#updateModal1").modal('toggle');
        });

        $('.btn_update').on('click', function (e) {
          e.preventDefault();
          initializeFlash();
          $('.flash').addClass('alert-info');
          $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

          var form = $('#formUpdateData');

          $.ajax({
            type: "POST",
            data: form.serialize() + "&btn_update=" + true,
            url: "controllers/participants_controller.php",
            success: function (result) {
              donnee = JSON.parse(result);
              if (donnee['success'] === 'true') {
                $("#updateModal1").modal('toggle');
                initializeFlash();
                $('.flash').addClass('alert-success');
                $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);

                // Mise à jour de la ligne ajoutée
                const id = $('#idModif').val();
                $.ajax({
                  type: "GET",
                  data: "idDetail=" + id,
                  url: "controllers/participants_controller.php",
                  success: function (result) {
                    donnee = JSON.parse(result);
                    if (donnee['participant'] !== 'null') {
                      const participant = donnee['participant'];
                      const num = currentLine.children().first().text();
                      $(currentLine).fadeIn("fast", function () {
                        $(currentLine).remove();
                        currentLine =
                            '<tr>' +
                            '<td>' + num + '</td>' +
                            '<td>' + participant['nom'] + '</td>' +
                            '<td>' + participant['prenom'] + '</td>' +
                            '<td>' + participant['numero'] + '</td>' +
                            '<td>' + participant['adresse_email'] + '</td>' +
                            '<td style="padding-left: 0"><ul class="actions-ul" style="padding-left: 0">' +
                            '<li class="dropdown d-none d-sm-inline-block">' +
                            '<a class="nav-link" data-toggle="dropdown" href="#" style="font-size: 9px">⚫⚫⚫</a>' +
                            '<div class="dropdown-menu dropdown-menu dropdown-menu-right">' +
                            '<a class="dropdown-item link-update-button" data-bs-toggle="tooltip" href="#" data-ligne-id="'+participant['id']+'">' +
                            '<i class="fas fa-edit mr-2"></i> Modifier</a>' +
                            '<a class="dropdown-item link-update-button" data-bs-toggle="tooltip" href="#" data-ligne-id="'+participant['id']+'">' +
                            '<i class="fas fa-trash mr-2"></i> Supprimer</a></div></li></ul></td></tr>';
                        $(".table-data-body").append(currentLine);
                      });
                    }
                  }
                });
              }
              if (donnee['success'] === 'non') {
                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
              }
              if (donnee['success'] === 'false') {
                $('#nomHelp').html(donnee['nom']).removeClass('invisible');
                $('#prenomsHelp').html(donnee['prenom']).removeClass('invisible');
                $('#numeroHelp').html(donnee['numero']).removeClass('invisible');
                $('#emailHelp').html(donnee['email']).removeClass('invisible');

                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                .fadeIn(300).delay(2500).fadeOut(300);
              }
            }
          });
        });

        $(".table-data-body").on("click", ".link-delete-button",  function (e) {
          e.preventDefault();
          currentLine = $(this).parent().parent().parent().parent().parent();
          var id = $(this).data('ligne-id');
          $(".delecte-msg-body").html("Etes-vous sur de vouloir supprimer cette ligne ?");
          $(".link-modal-delete-ligne").attr("href", id);
          $("#deleteModal1").modal('toggle');
        });

        $(".link-modal-delete-ligne").click(function (e) {
          e.preventDefault();
          initializeFlash();

          $("#deleteModal1").modal('toggle');
          var id = $(".link-modal-delete-ligne").attr("href");

          $('.flash').addClass('alert-info');
          $('.flash').html('<i class="fas fa-cog fa-spin"></i> Suppression...').fadeIn(300);

          $.ajax({
            type: "GET",
            data: "idSuppr=" + id,
            url: "controllers/participants_controller.php",
            success: function (result) {
              donnee = JSON.parse(result);
              if (donnee['success'] === 'oui') {
                $(currentLine).fadeOut("fast", function (){
                  $(currentLine).remove();
                });
                initializeFlash();
                $('.flash').addClass('alert-success');
                $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
              }
              else if (donnee['success'] === 'non') {
                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['erreur'])
                .fadeIn(300).delay(2500).fadeOut(300);
              }
              else {
                initializeFlash();
                $('.flash').addClass('alert-danger');
                $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
                .fadeIn(300).delay(2500).fadeOut(300);
              }
            }
          })
        });
      </script>
    </body>
</html>