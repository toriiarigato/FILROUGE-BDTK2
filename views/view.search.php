<div id="colonne2" class="border border-3 rounded rounded-3 shadow p-3 bg-body rounded col-7 w-50 ">
    <div>
        <h2>Faire une recherche</h2>
    </div>
    <div class="d-flex-wrap text justify-content-center">
        <form action="" method="get"></form>
        <div>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Entrez votre recherche ici" id="recherche" required="required">
                <button class="btn btn-secondary my-2 my-sm-0" type="button" id="rechercher">Rechercher</button>
            </form>
        </div>
    </div>
    <div>
        <h2>Résultats</h2>
    </div>
        <div class="d-flex flex-wrap justify-content-center" id="affiche">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">N° ISBN</th>
                        <th scope="col">Série:</th>
                        <th scope="col">Titre:</th>
                        <th scop="col">Auteur:</th>
                        <th scope="col">Prix:</th>
                        <th scope="col">Aperçu:</th>
                    </tr>
                </thead>
                <tbody id="album">

                </tbody>
            </table>
        </div>
</div>