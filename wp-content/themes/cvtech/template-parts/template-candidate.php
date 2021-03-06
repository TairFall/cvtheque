<?php
/*
Template Name: Candidat
*/


$errors = array();
$success = false;




if (!empty($_POST['form_finish'])) {
// INFOS PERSO
    $prenom = cleanXss($_POST['prenom']);
    $nom = cleanXss($_POST['nom']);
    $metier = cleanXss($_POST['metier']);
    $email = cleanXss($_POST['email']);
    $address = cleanXss($_POST['address']);
    $phone = cleanXss($_POST['phone']);
    $ville = cleanXss($_POST['ville']);
    $age = cleanXss($_POST['age']);
    $description = cleanXss($_POST['description']);
    $link = cleanXss($_POST['link']);



    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'cv_info_perso',
        array(
            'prenom' => $prenom,
            'nom' => $nom,
            'metier' => $metier,
            'email' => $email,
            'adresse' => $address,
            'ville' => $ville,
            'naissance' => $age,
            'telephone' => $phone,
            'description' => $description,
            'lien' => $link
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
        )
    );
    $success = true;

}

get_header(); ?>

<img src="<?php echo get_template_directory_uri() . '/asset/img/recruteur-img.png'; ?>" alt="" class="recruit">




<div id="cvmaker1" class="container-cvmaker">

    <div class="progress-bar">
        <div class="progress prog1"></div>
        <div class="progress prog2"></div>
        <div class="progress prog3"></div>
        <div class="progress prog4"></div>
        <div class="progress prog5"></div>
    </div>

    <div class="page-cv">
        <div class="form-cv">


            <form id="formulaire-de-cv" action="" method="post">

                <!--                FORMULAIRE NUMERO 1 - INFOS PERSOS-->

                <div class="form-div" id="form_1">

                    <div class="form-group-little">
                        <div class="little-part">
                            <label for="prenom">Pr??nom</label>
                            <input id="prenom" name="prenom" type="text" value="" onkeyup="swicthTxt('prenom', 'Pr??nom')" placeholder="ex: Wati">
                        </div>

                        <div class="little-part">
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" type="text" onkeyup="swicthTxt('nom', 'Nom')" placeholder="ex: Bogoss" value="">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="metier">M??tier</label>
                        <input id="metier" name="metier" type="text" onkeyup="swicthTxt('metier', 'M??tier')" placeholder="ex: Chanteur" value="">
                    </div>

                    <div class="form-group-little">
                        <div class="little-part">
                            <label for="ville">Ville</label>
                            <input id="ville" name="ville" type="text" onkeyup="swicthTxt('ville', 'Ville')" placeholder="ex: Paris" value="">
                        </div>

                        <div class="little-part">

                            <label for="age">Age</label>
                            <input id="age" name="age" type="text" onkeyup="swicthTxt('age', 'Age')" placeholder="ex: 18 ans"
                                   value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input id="address" name="address" type="text" onkeyup="swicthTxt('address', 'Adresse')" placeholder="ex: 36 rue de la Swaggitude" value="">
                    </div>

                    <div class="form-group-little">
                        <div class="little-part">
                            <label for="phone">T??l??phone</label>
                            <input id="phone" name="phone" type="tel"
                                   onkeyup="swicthTxt('phone', 'T??l??phone')" placeholder="ex: 06 01 02 03 04" value="">
                        </div>

                        <div class="little-part">
                            <label for="email">E-mail</label>
                            <input id="email" name="email" type="email" onkeyup="swicthTxt('email', 'E-mail')" placeholder="ex: wati@bogoss.com" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" onkeyup="swicthTxt('description', 'Description')"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">Lien</label>
                        <input id="link" name="link" type="text" onkeyup="swicthTxt('link', '')" placeholder="ex: linkedin.com/watibogoss" value="">
                    </div>

                    <div class="form-group-submit">
                        <button type="button" class="continue-btn-style" id="submitted-form_1">Continuer</button>
                    </div>
                </div>

                <!--                FORMULAIRE NUMERO 2 - EXPERIENCE-->

                <div class="form-div" id="list-experience">


                        <ul id="list-exp">
                            <li>
                                <div class="container-list">

                                    <div class="list-preview">
                                        <span>Votre poste</span>
                                        <p>L'entreprise</p>
                                    </div>

                                    <div class="list-button">
                                        <button type="button"><i class="fas fa-pen"></i></button>
                                        <button type="button"><i class="fas fa-trash"></i></button>
                                    </div>

                                </div>
                            </li>
                        </ul>
                        <div id="btn-exp" class="add-list">
                            <span>Ajouter une nouvelle exp??rience</span>
                        </div>

                        <div class="next-prev">
                            <button type="button" class="prev-btn" id="prev-exp"><i class="fas fa-arrow-circle-left"></i></button>
                            <button type="button" class="next-btn" id="next-exp"><i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                </div>


<!--// FOREACH-->
                    <div class="form-div" id="form_2">
                        <div id="container">
                            <div id="content-exp-0">

                                <div class="form-group-little">
                                    <div class="little-part">
                                        <label for="title-exp">Poste/Titre</label>
                                        <input type="text" id="title-exp" name="title-exp" placeholder="ex: D??veloppeur Web">
                                    </div>

                                    <div class="little-part">
                                        <label for="subtitle-exp">Entreprise</label>
                                        <input type="text" id="subtitle-exp" name="subtitle-exp" placeholder="ex: Nom de l'entreprise">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ville-exp">Lieu</label>
                                    <input type="text" id="ville-exp" name="ville-exp" placeholder="ex: Paris">
                                </div>

                                <div class="form-group-little">
                                    <div class="little-part">
                                        <label for="date-begin-exp">D??but</label>
                                        <input type="text" id="date-begin-exp" name="date-begin-exp"
                                               placeholder="ex: Jan - 2010">
                                    </div>

                                    <div class="little-part">
                                        <label for="date-end-exp">Fin</label>
                                        <input type="text" id="date-end-exp" name="date-end-exp"
                                               placeholder="ex: F??v - 2011">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="desc-exp">Description</label>
                                    <textarea name="desc-exp" id="desc-exp" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                            <div class="form-group-submit">
                                <button type="button" class="continue-btn-style" id="submitted-form_2">Continuer</button>
                            </div>

                    </div>


                <!--                FORMULAIRE NUMERO 2 - EXPERIENCE-->

                <div class="form-div" id="list-formation">

                    <ul id="list-dip">
                        <li>
                            <div class="container-list">

                                <div class="list-preview">
                                    <span>Dipl??me</span>
                                    <p>Ecole</p>
                                </div>

                                <div class="list-button">
                                    <button type="button"><i class="fas fa-pen"></i></button>
                                    <button type="button"><i class="fas fa-trash"></i></button>
                                </div>

                            </div>
                        </li>
                    </ul>
                    <div id="btn-dip" class="add-list">
                        <span>Ajouter une nouvelle formation</span>
                    </div>

                    <div class="next-prev">
                        <button type="button" class="prev-btn" id="prev-dip"><i class="fas fa-arrow-circle-left"></i></button>
                        <button type="button" class="next-btn" id="next-dip"><i class="fas fa-arrow-circle-right"></i></button>
                    </div>
                </div>

                <div class="form-div" id="form_3">

                    <div class="form-group-little">
                        <div class="little-part">
                            <label for="diplome">Dipl??me</label>
                            <input type="text" id="diplome" name="diplome" placeholder="ex: Bac ES">
                        </div>

                        <div class="little-part">
                            <label for="etablissement">Etablissement</label>
                            <input type="text" id="etablissement" name="etablissement" placeholder="ex: Lyc??e Maitre GIMS">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ville-dip">Lieu</label>
                        <input type="text" id="ville-dip" name="ville-dip" placeholder="ex: Paris">
                    </div>

                    <div class="form-group-little">
                        <div class="little-part">
                            <label for="date-begin-dip">D??but</label>

                            <input type="text" id="date-begin-dip" name="date-begin-dip"
                                   placeholder="ex: Jan - 2010">

                        </div>

                        <div class="little-part">
                            <label for="date-end-dip">Fin</label>

                            <input type="text" id="date-end-dip" name="date-end-dip"
                                   placeholder="ex: F??v - 2011">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desc-dip">Description</label>
                        <textarea name="desc-dip" id="desc-dip" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group-submit">
                        <button type="button" class="continue-btn-style" id="submitted-form_3">Continuer</button>
                    </div>

                </div>




                  

                <div id="comp-langue">

                    <div class="form-div" id="form_4-comp">

                        <div class="form-group">
                            <label for="competence">Comp??tences</label>
                            <input type="text" id="competence" name="competence" placeholder="ex: Esprit d'??quipe">
                        </div>

                        <div class="form-group-submit">
                            <button type="button" class="continue-btn-style" id="submitted-form_4-comp">Ajouter</button>
                        </div>

                        <div class="container-bubble">
                            <ul id="list-comp"></ul>
                        </div>

                    </div>

                    <div class="form-div" id="form_4-langue">


                        <div class="form-group">
                            <label for="langue">Langues</label>
                            <input type="text" id="langue" name="langue" placeholder="ex: Anglais">
                        </div>

                        <div class="form-group-submit">
                            <button type="button" class="continue-btn-style" id="submitted-form_4-langue">Ajouter</button>
                        </div>

                        <div class="container-bubble">
                            <ul id="list-langue"></ul>
                        </div>

                    </div>

                    <div class="next-prev">
                        <button type="button" class="prev-btn" id="prev-cl"><i class="fas fa-arrow-circle-left"></i></button>
                        <button type="button" class="next-btn" id="form_finish"><i class="fas fa-check-circle"></i></button>
<!--                        <input type="submit" name="form_finish" class="next-btn" id="form_finish" value="Valider">-->
                    </div>

                </div>




            </form>
        </div>

<!--FAIRE UNE FONCTION POUR CHOISIR LA TEMPLATE DU BON CV DANS LA SOURCE IFRAME-->
        <div class="template-cv">
            <div class="custom-iframe">
                <div class="color-iframe c1">

                        <label for="color-choose-top">Couleur 1</label>
                        <select name="color-choose-top" id="color-choose-top" onchange="verifSelect('color-choose-top')">
                            <option value=""> - - </option>
                            <option id="red-top" class="color-bg-iframe" value="red"></option>
                            <option id="blue-top" class="color-bg-iframe" value="blue"></option>
                            <option id="black-top" class="color-bg-iframe" value="black"></option>
                            <option id="yellow-top" class="color-bg-iframe" value="yellow"></option>
                            <option id="green-top" class="color-bg-iframe" value="green"></option>
                            <option id="purple-top" class="color-bg-iframe" value="purple"></option>
                        </select>

                </div>

                <div class="color-iframe c2">

                    <label for="color-choose-top">Couleur 2</label>
                    <select name="color-choose-text" id="color-choose-text" onchange="verifSelect2('color-choose-text')">
                        <option value=""> - - </option>
                        <option id="red-text" class="color-bg-iframe" value="red"></option>
                        <option id="blue-text" class="color-bg-iframe" value="blue"></option>
                        <option id="black-text" class="color-bg-iframe" value="black"></option>
                        <option id="yellow-text" class="color-bg-iframe" value="yellow"></option>
                        <option id="green-text" class="color-bg-iframe" value="green"></option>
                        <option id="purple-text" class="color-bg-iframe" value="purple"></option>
                    </select>

                </div>
            </div>

            <iframe id="myIframeCv"
                    src="<?php echo get_template_directory_uri() . '/inc/cv-template/cv-first/index.html'; ?>"></iframe>
    </div>

        <div id="page-succes" style="display: none;">
            <h1>Votre CV a bien ??t?? cr???? !</h1>
            <button type="button" id="btn-continue">- Continuer -</button>
        </div>

</div>


<?php get_footer();
