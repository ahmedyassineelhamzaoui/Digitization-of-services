@extends('layouts.app')
@section('title')
   formulaire
@endsection
@section('content')
<div class="steper-content container">
    <div class="steper-componnet">
        <div class="progress-empty">
            <div class="progress-full"></div>
        </div>
        <div class="cercles-steper">
            <span class="cercle">
                <i class="fa-solid fa-user"></i>
                <p class="first-info">Informations</p>
            </span>
            <span class="cercle">
                <i class="fa-solid fa-upload"></i>
                <p class="second-info">Upload</p>
            </span>
            <span class="cercle">
                <i class="fa-solid fa-credit-card"></i>
                <p class="third-info">Paiement</p>
            </span>
            <span class="cercle">
                <i class="fa-solid fa-circle-check"></i>
                <p class="fourth-info">Fin</p>
            </span>
        </div>
    </div>
    <form action="" method="post" class="mb-3">
        @csrf
        <div class="step persone-infos">
            <h3 class="mt-5">Les informations personnelles </h3>
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Matricule</label>
                    <input type="text" class="form-control" name="input-matricule" id="input-matricule">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="input-nom" id="input-nom">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="input-prenom" id="input-prenom">
                </div>
                <div class="col-md-2">
                    <label for="input-sexe" class="form-label">Sexe</label>
                    <select id="input-sexe" name="form-select" class="form-select">
                        <option selected>Choose...</option>
                        <option value="masculin">masculin</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Date naissance</label>
                    <input type="date" class="form-control" name="input-nom" id="input-nom">
                </div>
                <div class="col-md-4">
                    <label for="input-naissance" class="form-label">Lieu de naissance</label>
                    <select id="input-naissance" name="input-naissance" class="form-select">
                        <option value="abengourou">Abengourou</option>
                        <option value="abidjan">Abidjan</option>
                        <option value="aboisso">Aboisso</option>
                        <option value="adzope">Adzopé</option>
                        <option value="agboville">Agboville</option>
                        <option value="akoupe">Akoupé</option>
                        <option value="anyama">Anyama</option>
                        <option value="bangolo">Bangolo</option>
                        <option value="beoumi">Béoumi</option>
                        <option value="biankouma">Biankouma</option>
                        <option value="bingerville">Bingerville</option>
                        <option value="bondoukou">Bondoukou</option>
                        <option value="bongouanou">Bongouanou</option>
                        <option value="bouafle">Bouaflé</option>
                        <option value="bouake">Bouaké</option>
                        <option value="boundiali">Boundiali</option>
                        <option value="dabakala">Dabakala</option>
                        <option value="dabou">Dabou</option>
                        <option value="daloa">Daloa</option>
                        <option value="danane">Danané</option>
                        <option value="daoukro">Daoukro</option>
                        <option value="dimbokro">Dimbokro</option>
                        <option value="divo">Divo</option>
                        <option value="duekoue">Duékoué</option>
                        <option value="gagnoa">Gagnoa</option>
                        <option value="grand_bassam">Grand Bassam</option>
                        <option value="guiglo">Guiglo</option>
                        <option value="issia">Issia</option>
                        <option value="jacqueville">Jacqueville</option>
                        <option value="katiola">Katiola</option>
                        <option value="korhogo">Korhogo</option>
                        <option value="lakota">Lakota</option>
                        <option value="man">Man</option>
                        <option value="mankono">Mankono</option>
                        <option value="minignan">Minignan</option>
                        <option value="nassian">Nassian</option>
                        <option value="odienné">Odienné</option>
                        <option value="ouangolodougou">Ouangolodougou</option>
                        <option value="oume">Oumé</option>
                        <option value="prikro">Prikro</option>
                        <option value="sassandra">Sassandra</option>
                        <option value="seguela">Séguéla</option>
                        <option value="sinfra">Sinfra</option>
                        <option value="soubre">Soubré</option>
                        <option value="tabou">Tabou</option>
                        <option value="tanda">Tanda</option>
                        <option value="tiassale">Tiassalé</option>
                        <option value="touba">Touba</option>
                        <option value="toulepleu">Toulepleu</option>
                        <option value="yamoussoukro">Yamoussoukro</option>
                        <option value="zouan_hounien">Zouan-Hounien</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="input-email" id="input-email" placeholder="example@gmail.com">
                </div>
                <div class="col-md-2">
                    <label for="input-telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" name="input-telephone" id="input-telephone" placeholder="n° Téléphone">
                </div>
                <div class="col-md-4">
                    <label for="input-adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="input-adresse" id="input-adresse">
                </div>
                <div class="col-md-6">
                    <label for="input-typepiece" class="form-label">Type de pièce</label>
                    <select id="input-typepiece" name="input-typepiece" class="form-select">
                        <option value="carte">Carte nationale d'identité</option>
                        <option value="passeport">Passeport</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="input-numeropiece" class="form-label">Numéro de la pièce</label>
                    <input type="text" class="form-control" name="input-numeropiece" id="input-numeropiece" placeholder="N° de la pièce d'identité">
                </div>
                <div class="col-md-4">
                    <label for="input-region" class="form-label">Région</label>
                    <select id="input-region" name="input-region" class="form-select">
                        <option value="Agnéby">Agnéby</option>
                        <option value="Bafing">Bafing</option>
                        <option value="Bas-Sassandra">Bas-Sassandra</option>
                        <option value="Denguélé">Denguélé</option>
                        <option value="Dix-Huit Montagnes">Dix-Huit Montagnes</option>
                        <option value="Fromager">Fromager</option>
                        <option value="Haut-Sassandra">Haut-Sassandra</option>
                        <option value="Lacs">Lacs</option>
                        <option value="Lagunes">Lagunes</option>
                        <option value="Marahoué">Marahoué</option>
                        <option value="Moyen-Cavally">Moyen-Cavally</option>
                        <option value="Moyen-Comoé">Moyen-Comoé</option>
                        <option value="N'zi-Comoé">N'zi-Comoé</option>
                        <option value="Savanes">Savanes</option>
                        <option value="Sud-Bandama">Sud-Bandama</option>
                        <option value="Sud-Comoé">Sud-Comoé</option>
                        <option value="Vallée du Bandama">Vallée du Bandama</option>
                        <option value="Woroba">Woroba</option>
                        <option value="Zanzan">Zanzan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-localite" class="form-label">Localité</label>
                    <select id="input-localite" name="input-localite" class="form-select">
                        <option value="abengourou">Abengourou</option>
                        <option value="abidjan">Abidjan</option>
                        <option value="aboisso">Aboisso</option>
                        <option value="adzope">Adzopé</option>
                        <option value="agboville">Agboville</option>
                        <option value="akoupe">Akoupé</option>
                        <option value="anyama">Anyama</option>
                        <option value="bangolo">Bangolo</option>
                        <option value="beoumi">Béoumi</option>
                        <option value="biankouma">Biankouma</option>
                        <option value="bingerville">Bingerville</option>
                        <option value="bondoukou">Bondoukou</option>
                        <option value="bongouanou">Bongouanou</option>
                        <option value="bouafle">Bouaflé</option>
                        <option value="bouake">Bouaké</option>
                        <option value="boundiali">Boundiali</option>
                        <option value="dabakala">Dabakala</option>
                        <option value="dabou">Dabou</option>
                        <option value="daloa">Daloa</option>
                        <option value="danane">Danané</option>
                        <option value="daoukro">Daoukro</option>
                        <option value="dimbokro">Dimbokro</option>
                        <option value="divo">Divo</option>
                        <option value="duekoue">Duékoué</option>
                        <option value="gagnoa">Gagnoa</option>
                        <option value="grand_bassam">Grand Bassam</option>
                        <option value="guiglo">Guiglo</option>
                        <option value="issia">Issia</option>
                        <option value="jacqueville">Jacqueville</option>
                        <option value="katiola">Katiola</option>
                        <option value="korhogo">Korhogo</option>
                        <option value="lakota">Lakota</option>
                        <option value="man">Man</option>
                        <option value="mankono">Mankono</option>
                        <option value="minignan">Minignan</option>
                        <option value="nassian">Nassian</option>
                        <option value="odienné">Odienné</option>
                        <option value="ouangolodougou">Ouangolodougou</option>
                        <option value="oume">Oumé</option>
                        <option value="prikro">Prikro</option>
                        <option value="sassandra">Sassandra</option>
                        <option value="seguela">Séguéla</option>
                        <option value="sinfra">Sinfra</option>
                        <option value="soubre">Soubré</option>
                        <option value="tabou">Tabou</option>
                        <option value="tanda">Tanda</option>
                        <option value="tiassale">Tiassalé</option>
                        <option value="touba">Touba</option>
                        <option value="toulepleu">Toulepleu</option>
                        <option value="yamoussoukro">Yamoussoukro</option>
                        <option value="zouan_hounien">Zouan-Hounien</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-corsauntirieur" class="form-label">Corps Antérieur</label>
                    <select id="input-corsauntirieur" name="input-corsauntirieur" class="form-select">
                        <option selected>Aucun Corps</option>
                        <option value="Avocat(e)">Avocat(e)</option>
                        <option value="Architecte">Architecte</option>
                        <option value="Artiste">Artiste</option>
                        <option value="Agriculteur(rice)">Agriculteur(rice)</option>
                        <option value="Banquier(ière)">Banquier(ière)</option>
                        <option value="Bibliothécaire">Bibliothécaire</option>
                        <option value="Boucher(ère)">Boucher(ère)</option>
                        <option value="Boulanger(ère)">Boulanger(ère)</option>
                        <option value="Chirurgien(ne)">Chirurgien(ne)</option>
                        <option value="Chercheur(euse)">Chercheur(euse)</option>
                        <option value="Comptable">Comptable</option>
                        <option value="Consultant(e)">Consultant(e)</option>
                        <option value="Cuisinier(ère)">Cuisinier(ère)</option>
                        <option value="Dentiste">Dentiste</option>
                        <option value="Designer">Designer</option>
                        <option value="Développeur(euse) web">Développeur(euse) web</option>
                        <option value="Écrivain(e)">Écrivain(e)</option>
                        <option value="Électricien(ne)">Électricien(ne)</option>
                        <option value="Enseignant(e)">Enseignant(e)</option>
                        <option value="Entrepreneur(euse)">Entrepreneur(euse)</option>
                        <option value="Étudiant(e)">Étudiant(e)</option>
                        <option value="Facteur(trice)">Facteur(trice)</option>
                        <option value="Gestionnaire">Gestionnaire</option>
                        <option value="Graphiste">Graphiste</option>
                        <option value="Ingénieur(e)">Ingénieur(e)</option>
                        <option value="Infirmier(ère)">Infirmier(ère)</option>
                        <option value="Journaliste">Journaliste</option>
                        <option value="Juge">Juge</option>
                        <option value="Kinésithérapeute">Kinésithérapeute</option>
                        <option value="Maçon(ne)">Maçon(ne)</option>
                        <option value="Mécanicien(ne)">Mécanicien(ne)</option>
                        <option value="Médecin">Médecin</option>
                        <option value="Musicien(ne)">Musicien(ne)</option>
                        <option value="Notaire">Notaire</option>
                        <option value="Opticien(ne)">Opticien(ne)</option>
                        <option value="Pharmacien(ne)">Pharmacien(ne)</option>
                        <option value="Photographe">Photographe</option>
                        <option value="Plombier(ère)">Plombier(ère)</option>
                        <option value="Policier(ère)">Policier(ère)</option>
                        <option value="Professeur(e)">Professeur(e)</option>
                        <option value="Psychologue">Psychologue</option>
                        <option value="Réalisateur(trice)">Réalisateur(trice)</option>
                        <option value="Scientifique">Scientifique</option>
                        <option value="Secrétaire">Secrétaire</option>
                        <option value="Soudeur(euse)">Soudeur(euse)</option>
                        <option value="Technicien(ne)">Technicien(ne)</option>
                        <option value="Traducteur(trice)">Traducteur(trice)</option>
                        <option value="Vendeur(euse)">Vendeur(euse)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-region" class="form-label">Corps</label>
                    <select id="input-region" name="input-region" class="form-select">
                        <option value="Avocat(e)">Avocat(e)</option>
                        <option value="Architecte">Architecte</option>
                        <option value="Artiste">Artiste</option>
                        <option value="Agriculteur(rice)">Agriculteur(rice)</option>
                        <option value="Banquier(ière)">Banquier(ière)</option>
                        <option value="Bibliothécaire">Bibliothécaire</option>
                        <option value="Boucher(ère)">Boucher(ère)</option>
                        <option value="Boulanger(ère)">Boulanger(ère)</option>
                        <option value="Chirurgien(ne)">Chirurgien(ne)</option>
                        <option value="Chercheur(euse)">Chercheur(euse)</option>
                        <option value="Comptable">Comptable</option>
                        <option value="Consultant(e)">Consultant(e)</option>
                        <option value="Cuisinier(ère)">Cuisinier(ère)</option>
                        <option value="Dentiste">Dentiste</option>
                        <option value="Designer">Designer</option>
                        <option value="Développeur(euse) web">Développeur(euse) web</option>
                        <option value="Écrivain(e)">Écrivain(e)</option>
                        <option value="Électricien(ne)">Électricien(ne)</option>
                        <option value="Enseignant(e)">Enseignant(e)</option>
                        <option value="Entrepreneur(euse)">Entrepreneur(euse)</option>
                        <option value="Étudiant(e)">Étudiant(e)</option>
                        <option value="Facteur(trice)">Facteur(trice)</option>
                        <option value="Gestionnaire">Gestionnaire</option>
                        <option value="Graphiste">Graphiste</option>
                        <option value="Ingénieur(e)">Ingénieur(e)</option>
                        <option value="Infirmier(ère)">Infirmier(ère)</option>
                        <option value="Journaliste">Journaliste</option>
                        <option value="Juge">Juge</option>
                        <option value="Kinésithérapeute">Kinésithérapeute</option>
                        <option value="Maçon(ne)">Maçon(ne)</option>
                        <option value="Mécanicien(ne)">Mécanicien(ne)</option>
                        <option value="Médecin">Médecin</option>
                        <option value="Musicien(ne)">Musicien(ne)</option>
                        <option value="Notaire">Notaire</option>
                        <option value="Opticien(ne)">Opticien(ne)</option>
                        <option value="Pharmacien(ne)">Pharmacien(ne)</option>
                        <option value="Photographe">Photographe</option>
                        <option value="Plombier(ère)">Plombier(ère)</option>
                        <option value="Policier(ère)">Policier(ère)</option>
                        <option value="Professeur(e)">Professeur(e)</option>
                        <option value="Psychologue">Psychologue</option>
                        <option value="Réalisateur(trice)">Réalisateur(trice)</option>
                        <option value="Scientifique">Scientifique</option>
                        <option value="Secrétaire">Secrétaire</option>
                        <option value="Soudeur(euse)">Soudeur(euse)</option>
                        <option value="Technicien(ne)">Technicien(ne)</option>
                        <option value="Traducteur(trice)">Traducteur(trice)</option>
                        <option value="Vendeur(euse)">Vendeur(euse)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-localite" class="form-label">Ministère Antérieur</label>
                    <select id="input-localite" name="input-localite" class="form-select">
                        <option value="ministere_de_la_communication_et_des_medias">Ministère de la Communication et des Médias</option>
                        <option value="ministere_de_l_economie_et_des_finances">Ministère de l'Économie et des Finances</option>
                        <option value="ministere_de_l_education_nationale_de_l_enseignement_technique_et_de_la_formation_professionnelle">Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle</option>
                        <option value="ministere_de_l_emploi_et_de_la_protection_sociale">Ministère de l'Emploi et de la Protection Sociale</option>
                        <option value="ministere_de_l_environnement_et_du_developpement_durable">Ministère de l'Environnement et du Développement Durable</option>
                        <option value="ministere_de_l_integration_africaine_et_des_ivoiriens_de_l_exterieur">Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                        <option value="ministere_de_l_interieur_et_de_la_securite">Ministère de l'Intérieur et de la Sécurité</option>
                        <option value="ministere_de_la_construction_du_logement_de_l_assainissement_et_de_l_urbanisme">Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                        <option value="ministere_de_la_culture_et_de_la_francophonie">Ministère de la Culture et de la Francophonie</option>
                        <option value="ministere_de_la_defense">Ministère de la Défense</option>
                        <option value="ministere_de_la_femme_de_la_famille_et_de_l_enfant">Ministère de la Femme, de la Famille et de l'Enfant</option>
                        <option value="ministere_de_la_fonction_publique_du_travail_et_des_relations_avec_les_institutions">Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions</option>
                        <option value="ministere_de_la_justice_et_des_droits_de_l_homme">Ministère de la Justice et des Droits de l'Homme</option>
                        <option value="ministere_de_la_promotion_de_la_jeunesse_et_de_l_emploi_des_jeunes">Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                        <option value="ministere_de_la_promotion_de_la_riziculture_et_de_la_mecanisation_agricole">Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                        <option value="ministere_de_la_promotion_des_pme">Ministère de la Promotion des PME</option>
                        <option value="ministere_de_la_reconstruction_et_de_la_reinsertion">Ministère de la Reconstruction et de la Réinsertion</option>
                        <option value="ministere_de_la_sante_et_de_l_hygiene_publique">Ministère de la Santé et de l'Hygiène Publique</option>
                        <option value="ministere_de_la_solidarite_de_la_cohesion_sociale_et_de_la_lutte_contre_la_pauvrete">Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté</option>
                        <option value="ministere_de_la_ville">Ministère de la Ville</option>
                        <option value="ministere_des_affaires_etrangeres">Ministère des Affaires Étrangères</option>
                        <option value="ministere_des_eaux_et_forets">Ministère des Eaux et Forêts</option>
                        <option value="ministere_des_mines_et_de_la_geologie">Ministère des Mines et de la Géologie</option>
                        <option value="ministere_des_petites_et_moyennes_entreprises_et_de_la_promotion_de_l_emploi">Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                        <option value="ministere_des_sports">Ministère des Sports</option>
                        <option value="ministere_du_commerce_de_l_industrie_et_de_la_promotion_des_pme">Ministère du Commerce, de l'Industrie et de la Promotion des PME</option>
                        <option value="ministere_du_petrole_de_l_energie_et_des_energies_renouvelables">Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                        <option value="ministere_du_plan_et_du_developpement">Ministère du Plan et du Développement</option>
                        <option value="ministere_du_tourisme_et_des_loisirs">Ministère du Tourisme et des Loisirs</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-corsauntirieur" class="form-label">Ministère</label>
                    <select id="input-corsauntirieur" name="input-corsauntirieur" class="form-select">
                        <option value="ministere_de_la_communication_et_des_medias">Ministère de la Communication et des Médias</option>
                        <option value="ministere_de_l_economie_et_des_finances">Ministère de l'Économie et des Finances</option>
                        <option value="ministere_de_l_education_nationale_de_l_enseignement_technique_et_de_la_formation_professionnelle">Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle</option>
                        <option value="ministere_de_l_emploi_et_de_la_protection_sociale">Ministère de l'Emploi et de la Protection Sociale</option>
                        <option value="ministere_de_l_environnement_et_du_developpement_durable">Ministère de l'Environnement et du Développement Durable</option>
                        <option value="ministere_de_l_integration_africaine_et_des_ivoiriens_de_l_exterieur">Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                        <option value="ministere_de_l_interieur_et_de_la_securite">Ministère de l'Intérieur et de la Sécurité</option>
                        <option value="ministere_de_la_construction_du_logement_de_l_assainissement_et_de_l_urbanisme">Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                        <option value="ministere_de_la_culture_et_de_la_francophonie">Ministère de la Culture et de la Francophonie</option>
                        <option value="ministere_de_la_defense">Ministère de la Défense</option>
                        <option value="ministere_de_la_femme_de_la_famille_et_de_l_enfant">Ministère de la Femme, de la Famille et de l'Enfant</option>
                        <option value="ministere_de_la_fonction_publique_du_travail_et_des_relations_avec_les_institutions">Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions</option>
                        <option value="ministere_de_la_justice_et_des_droits_de_l_homme">Ministère de la Justice et des Droits de l'Homme</option>
                        <option value="ministere_de_la_promotion_de_la_jeunesse_et_de_l_emploi_des_jeunes">Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                        <option value="ministere_de_la_promotion_de_la_riziculture_et_de_la_mecanisation_agricole">Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                        <option value="ministere_de_la_promotion_des_pme">Ministère de la Promotion des PME</option>
                        <option value="ministere_de_la_reconstruction_et_de_la_reinsertion">Ministère de la Reconstruction et de la Réinsertion</option>
                        <option value="ministere_de_la_sante_et_de_l_hygiene_publique">Ministère de la Santé et de l'Hygiène Publique</option>
                        <option value="ministere_de_la_solidarite_de_la_cohesion_sociale_et_de_la_lutte_contre_la_pauvrete">Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté</option>
                        <option value="ministere_de_la_ville">Ministère de la Ville</option>
                        <option value="ministere_des_affaires_etrangeres">Ministère des Affaires Étrangères</option>
                        <option value="ministere_des_eaux_et_forets">Ministère des Eaux et Forêts</option>
                        <option value="ministere_des_mines_et_de_la_geologie">Ministère des Mines et de la Géologie</option>
                        <option value="ministere_des_petites_et_moyennes_entreprises_et_de_la_promotion_de_l_emploi">Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                        <option value="ministere_des_sports">Ministère des Sports</option>
                        <option value="ministere_du_commerce_de_l_industrie_et_de_la_promotion_des_pme">Ministère du Commerce, de l'Industrie et de la Promotion des PME</option>
                        <option value="ministere_du_petrole_de_l_energie_et_des_energies_renouvelables">Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                        <option value="ministere_du_plan_et_du_developpement">Ministère du Plan et du Développement</option>
                        <option value="ministere_du_tourisme_et_des_loisirs">Ministère du Tourisme et des Loisirs</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="input-infoFonctionAnterieur" class="form-label">Fonction Antérieur</label>
                    <input type="text" class="form-control" id="input-infoFonctionAnterieur" name="input-infoFonctionAnterieur">
                </div>
                <div class="col-md-4">
                    <label for="input-infoFonction" class="form-label">Fonction</label>
                    <input type="text" class="form-control" id="input-infoFonction" name="input-infoFonction">
                </div>
                <div class="col-md-4">
                    <label for="input-service" class="form-label">Service / Etablissement</label>
                    <input type="text" class="form-control" id="input-service" name="input-service">
                </div>
                <div class="col-md-6">
                    <label for="input-arret" class="form-label">Décret/Arret</label>
                    <input type="text" id="input-arret" name="input-arret" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="input-nomination" class="form-label">Date nommination</label>
                    <input type="date" class="form-control" name="input-nomination" id="input-nomination">
                </div>
                <div class="col-md-4">
                    <label for="input-effet" class="form-label">Date d'effet</label>
                    <input type="date" class="form-control" id="input-effet" name="input-effet">
                </div>
                <div class="col-md-4">
                    <label for="input-fin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="input-fin" name="input-fin">
                </div>
                <div class="col-md-4">
                    <label for="input-matrimoniale" class="form-label">Situation matrimoniale</label>
                    <select id="input-matrimoniale" name="input-matrimoniale" class="form-select">
                        <option value="marie">Marié.e</option>
                        <option value="celibataire">Célibataire</option>
                    </select>
                </div>
                <h3 class="mt-5">Informations conjoint.e</h3>
                <div class="col-md-4">
                    <label for="input-nomprenom" class="form-label"> Nom & Prénom</label>
                    <input type="text" class="form-control" name="input-nomprenom" id="input-nomprenom">
                </div>
                <div class="col-md-4">
                    <label for="input-fonction" class="form-label">Fonction</label>
                    <input type="text" class="form-control" name="input-fonction" id="input-fonction">
                </div>
                <div class="col-md-4">
                    <label for="input-matricule" class="form-label">Matricule</label>
                    <input type="text" class="form-control" name="input-matricule" id="input-matricule">
                </div>
                <div class="col-md-4">
                    <label for="input-serviceempolyeur" class="form-label"> Service employeur</label>
                    <input type="text" class="form-control" name="input-serviceempolyeur" id="input-serviceempolyeur">
                </div>
                <div class="col-md-4">
                    <label for="input-dateembauche" class="form-label">Date d'embauche</label>
                    <input type="date" class="form-control" name="input-dateembauche" id="input-dateembauche">
                </div>
                <div class="col-md-4">
                    <label for="input-adressconjoint" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="input-adressconjoint" id="input-adressconjoint">
                </div>
                <div class="col-md-6">
                    <label for="input-regime" class="form-label">Régime</label>
                    <input type="text" id="input-regime" name="input-regime" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="input-indemnite" class="form-label">Taux d'indemnité</label>
                    <input type="text" class="form-control" name="input-indemnite" id="input-indemnite">
                </div>
                <h3>Habitation précédante</h3>
                <div class="col-md-3">
                    <label for="input-villeprece" class="form-label">Ville</label>
                    <input type="text" id="input-villeprece" name="input-villeprece" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="input-quartierprec" class="form-label">Quartier</label>
                    <input type="text" class="form-control" name="input-quartierprec" id="input-quartierprec">
                </div>
                <div class="col-md-3">
                    <label for="input-lotprec" class="form-label">Lot n°</label>
                    <input type="text" id="input-lotprec" name="input-lotprec" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="input-liberation" class="form-label">Date libération</label>
                    <input type="date" class="form-control" name="input-liberation" id="input-liberation">
                </div>
                <h3>Habitation actuelle</h3>
                <div class="col-md-3">
                    <label for="input-villeactuell" class="form-label">Ville</label>
                    <input type="text" id="input-villeactuell" name="input-villeactuell" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="input-quartieractuell" class="form-label">Quartier</label>
                    <input type="text" class="form-control" name="input-quartieractuell" id="input-quartieractuell">
                </div>
                <div class="col-md-3">
                    <label for="input-lotactuell" class="form-label">Lot n°</label>
                    <input type="text" id="input-lotactuell" name="input-lotactuell" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="input-occupation" class="form-label">Date d'occupation</label>
                    <input type="date" class="form-control" name="input-occupation" id="input-occupation">
                </div>
                <div class="col-md-4">
                    <label for="input- heberge" class="form-label">Etes-vous hébergé par un parent ou un ami ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="response-oui" value="oui" >
                        <label class="form-check-label" for="response-oui">
                        Oui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="response-non" value="non" >
                        <label class="form-check-label" for="response-non">
                        Non
                        </label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="input-nomparentami" class="form-label">Nom de ce parent ou ami</label>
                    <input type="text" class="form-control" name="input-nomparentami" id="input-nomparentami">
                </div>
            </div>
        </div>
        <div class="step join-file">
            <h3>Joindre des fichiers</h3>
            <div class="row g-3">
                <div class="mb-3 col-md-6">
                    <label for="form-decisionnomination" class="form-label">Décision de nommination</label>
                    <input class="form-control" type="file" name="form-decisionnomination" id="form-decisionnomination">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-decisionaffectation" class="form-label">Décision d'affectation ou page fonctionnaire</label>
                    <input class="form-control" type="file" name="form-decisionaffectation" id="form-decisionaffectation">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-certificatpriseservice" class="form-label">Certificat de 1ère prise de service</label>
                    <input class="form-control" type="file" name="form-certificatpriseservice" id="form-certificatpriseservice">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-Bulletinsoldeavant" class="form-label">Bulletin de solde avant nomination</label>
                    <input class="form-control" type="file" name="form-Bulletinsoldeavant" id="form-Bulletinsoldeavant">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-Bulletinsoldeapres" class="form-label">Bulletin de solde après nommination</label>
                    <input class="form-control" type="file" name="form-Bulletinsoldeapres" id="form-Bulletinsoldeapres">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-certifcatnomhebergement" class="form-label">Certificat de non hébergement</label>
                    <input class="form-control" type="file" name="form-certifcatnomhebergement" id="form-certifcatnomhebergement">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-attestationhonneurlegalise" class="form-label">Attestation sur l'honneur légalisée</label>
                    <input class="form-control" type="file" name="form-attestationhonneurlegalise" id="form-attestationhonneurlegalise">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-certificatresidence" class="form-label">certificat de résidence</label>
                    <input class="form-control" type="file" name="form-certificatresidence" id="form-certificatresidence">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-pieceidentite" class="form-label">Pièce d'identité</label>
                    <input class="form-control" type="file" name="form-pieceidentite" id="form-pieceidentite">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="form-actemariage" class="form-label">Acte de mariage</label>
                    <input class="form-control" type="file" name="form-actemariage" id="form-actemariage">
                </div>
            </div>
        </div>
        <div class="step paiement ">
            <div class="finmargin d-flex justify-content-center">
                <div class="col-md-8">
                    <h3 class="mt-4">paiement</h3>
                    <div class="mt-4 mb-4">
                        <div class="">
                            <label for="input-phonepaiment" class="form-label">N° de téléphone</label>
                            <input type="text" class="form-control" name="input-phonepaiment" id="input-phonepaiment">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <div class="">
                            <label for="input-refrencepaiment" class="form-label">Reférence du paiement</label>
                            <input type="text" class="form-control" name="input-refrencepaiment" id="input-refrencepaiment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="step fin">
            <h3 class="mt-4">Votre demande d'ANL a été validée avec succès </h3>
            <p>Un e-mail de confirmation vous a été envoyé avec vos identifiants de connexion pour le suivi de votre dossier !</p>
            <div class="d-flex justify-content-center text-center mt-5">
                <div>
                    <div class="mb-3">
                        <button type="submit" name="print-info" class="btn download-pdf">Imprimer votre fichier d'inscription</button>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="print-payment"  class="btn download-pdf">Imprimer votre reçu de paiement</button>
                    </div>
                </div>
            </div>
                
        </div>
    </form>
    <div class="d-flex justify-content-end mb-3">
        <button id="click-next" class="btn btn-warning fs-5 px-3">Suivant</button>
    </div>
</div>
@endsection
