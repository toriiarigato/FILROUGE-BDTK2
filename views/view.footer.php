
<?php 
    if ($action == 'bibli'or $action == 'emprunt'or $action == 'retour'or $action == 'nouvelAd'or $action == 'gestionAd' or $action == 'rechercheAd'or $action =='afficheListUser'){?>


<!--------------------------------------------------------------------- BIBLIOTHECAIRE --------------------------------------------------------------------------------->
<!------------------------------------------ Il prend cette partie + les balises fermantes body et html à la fin  ------------------------------------------------------>
<!--Div d'aperçu-->
<div id="colonne3"
    class="d-flex flex-column align-items-center justify-content-evenly border border-3 rounded rounded-3 shadow p-3 bg-body rounded m-2 column">
    <h2 class="text-decoration-underline">Aperçu</h2>
    <div id="apercu" class="align-items-center">

    </div>
    <input type="button" value="Sélectionner cet adhérent" id="select" class="d-none">
    <p>
        <input type="button" value="Confirmer choix BD" class="d-none" id="selectBD">
    </p>
    <p>
        <input type="button" value="Retour" class="d-none" id="retour">
    </p>
    <p>
        <input type="button" value="Retour choix Adhérent" class="d-none" id="erreurBD">
    </p>


</div>
</div>
<script src="../data/users.js"></script>
<script src="../data/albums.js"></script>
<script src="../data/series.js"></script>
<script src="../data/auteurs.js"></script>
<script src="../ASSETS/JS/bibliothecaire.js"></script>

<?php } ?>

<?php 
        if ($action == 'adherent'){?>
<!------------------------------------------------------------------------ ADHERENT ------------------------------------------------------------------------------------>
<!------------------------------------------ Il prend cette partie + les balises fermantes body et html à la fin  ------------------------------------------------------>

<div id="colonne3" class=" flex-column border border-3 rounded rounded-3 shadow p-3 bg-body rounded">
    <h2>Filtres:</h2>
    <div>
        <p>
        <div class="d-grid gap-2 bg-dark" id="blockbtn">
            <a class="btn btn-primary bg-dark " data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">Séries:
            </a>
        </div>

        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div id="listeSeries">
                </div>
            </div>
        </div>
    </div>
    <div>
        <p>
        <div class="d-grid gap-2 bg-dark" id="blockbtn">
            <a class="btn btn-primary bg-dark " data-toggle="collapse" href="#collapseExample2" role="button"
                aria-expanded="false" aria-controls="collapseExample">Auteur :
            </a>
        </div>

        </p>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <div id="listeAuteurs">
                </div>
            </div>
        </div>
    </div>
    <div>
        <p>
        <div class="d-grid gap-2 bg-dark" id="blockbtn">
            <a class="btn btn-primary bg-dark " data-toggle="collapse" href="#collapseExample3" role="button"
                aria-expanded="false" aria-controls="collapseExample">Albums :
            </a>
        </div>

        </p>
        <div class="collapse" id="collapseExample3">
            <div class="card card-body">
                <div id="listeAlbums">
                </div>
            </div>
        </div>
    </div>
    <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
</div>
</div>


<?php } ?>
<!------------------------------------------------------------ Balises communes à toutes les pages  ----------------------------------------------------------->
<!-- <script src="../data/albums.js"></script>
<script src="../data/auteurs.js"></script>
<script src="../data/series.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- <script src="../ASSETS/JS/monCompte.js"></script> -->


</body>

</html>