<!-------------------------------------------------------------------------------- CONNEXION --------------------------------------------------------------------------------->
<br /><br /><br /><br /><br /><br />

    <!-- Grande div qui englobe tout-->
    <div class="container align-self-center">
        <div class="
          rounded rounded-3
          shadow
          p-3
          mb-5
          rounded
          d-flex
          justify-content-center
          align-items-center
          flex-column
          opacity-25
        " id="grdDiv">
            <!-- La div titre-->
            <header>
                <div class="
              border border-3
              rounded rounded-3
              shadow
              p-3
              mb-5
              bg-body
              rounded
              text-center
              d-inline-block
            ">
                    <h1>Bienvenue au centre Culturel des Marmusots</h1>
                </div>
            </header>

            <!--La div qui contient le formulaire central-->
            <div class="
            border border-3
            rounded rounded-3
            shadow
            p-3
            mb-5
            bg-body
            rounded
            text-center
            d-flex
            justify-content-center
            w-50
            col-md-offset-1
          " id="divtitre">
                <form method="GET" action="" id="form">
                    <fieldset>
                        <h2>Connexion</h2>
                        <br /><br />
                        <div class="d-flex justify-content-evenly d-sm-flex flex-wrap">
                            <p>Identifiant :</p>
                            <input type="text" name="identifiant" id="identifiant" required="required" />
                        </div>
                        <br />
                        <div class="d-flex justify-content-evenly d-sm-flex flex-wrap">
                            <p>Mot de passe :</p>
                            <input type="password" name="mdp" id="mdp" required="required" />
                        </div>
                        <br />
                        <p id="nocompte" class="text-danger"></p>

                        <a href="../HTML/oubliMdp.html">Mot de passe oublié ?</a>

                        <br /><br />
                        <input type="submit" value="Se Connecter" id="btnconnect" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<!-------------------------------------------------------------------------------- OUBLI MDP --------------------------------------------------------------------------------->

    <br /><br /><br /><br /><br /><br />

<!-- Grand div qui englobe tout-->
<div class="container align-self-center">
    <div class="
      rounded rounded-3
      shadow
      p-3
      mb-5
      rounded
      d-flex
      justify-content-center
      align-items-center
      flex-column" id="grdDiv">
        <header>

            <!--Div du titre-->
            <div class="
          border border-3
          rounded rounded-3
          shadow
          p-3
          mb-5
          bg-body
          rounded
          text-center
          d-inline-block
        ">
                <h1>Récupération de mot de passe</h1>
            </div>
        </header>

        <!-- Div du formulaire central-->
        <div class="
        border border-3
        rounded rounded-3
        shadow
        p-3
        mb-5
        bg-body
        rounded
        text-center
        d-inline-block
        w-50
        d-sm w-75">
            <form method="GET" action="" id="form">
                <fieldset>
                    <br /><br />
                    <div class="d-flex justify-content-evenly d-sm-flex flex-wrap">
                        <p>Veuillez renseigner votre adresse e-mail :</p>
                        <input type="text" name="identifiant" id="identifiant" required="required" />
                    </div>
                    <br/>
                    <div>
                        <input type="submit" value="Envoyer" id="btnSubmit" />
                    </div>
                </fieldset>
            </form>
            </br>
            <form method="GET" action="../HTML/login.html">
                <input type="submit" value="Retour" />
            </form>
        </div>
    </div>
</div>