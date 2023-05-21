@extends('layouts.app')
@section('title', 'Formulaire')
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

        <div class="step person-infos">
            <form id="step-1-form" action="{{route('send.Information')}}" method="post" class="mb-3">
                
                <h3 class="mt-5">Les informations personnelles </h3>
                <div class="row g-3">
                    @csrf
                    <div class="col-md-2">
                        <label for="registration-number" class="form-label">Matricule</label>
                        <input type="text" class="form-control" name="registration_number" id="registration_number" >
                        @error('registration_number')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                        <div id="registration-number-error" class="text-danger fs-7"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" >
                        @error('first_name')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="last-name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" >
                        @error('last_name')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="person-sexe" class="form-label">Sexe</label>
                        <select id="person-sexe" name="person_sexe" class="form-select">
                            <option value="femme">femme</option>
                            <option value="homme">homme</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="birth-date" class="form-label">Date naissance</label>
                        <input type="date" class="form-control" name="birth_date" id="birth_date" >
                        @error('birth_date')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="place-birth" class="form-label">Lieu de naissance</label>
                        <select id="place-birth" name="place_birth" class="form-select">
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
                        <label for="person-email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="person_email" id="person_email" placeholder="example@gmail.com" >
                        @error('person_email')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="person-telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="person_telephone" id="person_telephone" placeholder="n° Téléphone" >
                        @error('person_telephone')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="person-adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="person_adresse" id="person_adresse" >
                        @error('person_adresse')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="document-type" class="form-label">Type de pièce</label>
                        <select id="document-type" name="document_type" class="form-select">
                            <option value="carte">Carte nationale d'identité</option>
                            <option value="passeport">Passeport</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="document-number" class="form-label">Numéro de la pièce</label>
                        <input type="text" class="form-control" name="document_number" id="document_number" placeholder="N° de la pièce d'identité" >
                        @error('document_number')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="person-region" class="form-label">Région</label>
                        <select id="person-region" name="person_region" class="form-select">
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
                        <label for="person-locality" class="form-label">Localité</label>
                        <select id="person-locality" name="person_locality" class="form-select" >
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
                        <label for="anterior-body" class="form-label">Corps Antérieur</label>
                        <select id="anterior-body" name="anterior_body" class="form-select">
                            <option value="Aucun Corps" selected>Aucun Corps</option>
                            <option value="Avocat">Avocat(e)</option>
                            <option value="Architecte">Architecte</option>
                            <option value="Artiste">Artiste</option>
                            <option value="Agriculteur">Agriculteur(rice)</option>
                            <option value="Banquier">Banquier(ière)</option>
                            <option value="Bibliothécaire">Bibliothécaire</option>
                            <option value="Boucher">Boucher(ère)</option>
                            <option value="Boulanger">Boulanger(ère)</option>
                            <option value="Chirurgien">Chirurgien(ne)</option>
                            <option value="Chercheur">Chercheur(euse)</option>
                            <option value="Comptable">Comptable</option>
                            <option value="Consultant">Consultant(e)</option>
                            <option value="Cuisinier">Cuisinier(ère)</option>
                            <option value="Dentiste">Dentiste</option>
                            <option value="Designer">Designer</option>
                            <option value="Développeur web">Développeur(euse) web</option>
                            <option value="Écrivain">Écrivain(e)</option>
                            <option value="Électricien">Électricien(ne)</option>
                            <option value="Enseignant">Enseignant(e)</option>
                            <option value="Entrepreneur">Entrepreneur(euse)</option>
                            <option value="Étudiant">Étudiant(e)</option>
                            <option value="Facteur">Facteur(trice)</option>
                            <option value="Gestionnaire">Gestionnaire</option>
                            <option value="Graphiste">Graphiste</option>
                            <option value="Ingénieur">Ingénieur(e)</option>
                            <option value="Infirmier">Infirmier(ère)</option>
                            <option value="Journaliste">Journaliste</option>
                            <option value="Juge">Juge</option>
                            <option value="Kinésithérapeute">Kinésithérapeute</option>
                            <option value="Maçon">Maçon(ne)</option>
                            <option value="Mécanicien">Mécanicien(ne)</option>
                            <option value="Médecin">Médecin</option>
                            <option value="Musicien">Musicien(ne)</option>
                            <option value="Notaire">Notaire</option>
                            <option value="Opticien">Opticien(ne)</option>
                            <option value="Pharmacien">Pharmacien(ne)</option>
                            <option value="Photographe">Photographe</option>
                            <option value="Plombier">Plombier(ère)</option>
                            <option value="Policier">Policier(ère)</option>
                            <option value="Professeur">Professeur(e)</option>
                            <option value="Psychologue">Psychologue</option>
                            <option value="Réalisateur">Réalisateur(trice)</option>
                            <option value="Scientifique">Scientifique</option>
                            <option value="Secrétaire">Secrétaire</option>
                            <option value="Soudeur">Soudeur(euse)</option>
                            <option value="Technicien">Technicien(ne)</option>
                            <option value="Traducteur">Traducteur(trice)</option>
                            <option value="Vendeur">Vendeur(euse)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="person-body" class="form-label">Corps</label>
                        <select id="person-body" name="person_body" class="form-select">
                            <option value="Aucun Corps" >Aucun Corps</option>
                            <option value="Avocat">Avocat(e)</option>
                            <option value="Architecte">Architecte</option>
                            <option value="Artiste">Artiste</option>
                            <option value="Agriculteur">Agriculteur(rice)</option>
                            <option value="Banquier">Banquier(ière)</option>
                            <option value="Bibliothécaire">Bibliothécaire</option>
                            <option value="Boucher">Boucher(ère)</option>
                            <option value="Boulanger">Boulanger(ère)</option>
                            <option value="Chirurgien">Chirurgien(ne)</option>
                            <option value="Chercheur">Chercheur(euse)</option>
                            <option value="Comptable">Comptable</option>
                            <option value="Consultant">Consultant(e)</option>
                            <option value="Cuisinier">Cuisinier(ère)</option>
                            <option value="Dentiste">Dentiste</option>
                            <option value="Designer">Designer</option>
                            <option value="Développeur web">Développeur(euse) web</option>
                            <option value="Écrivain">Écrivain(e)</option>
                            <option value="Électricien">Électricien(ne)</option>
                            <option value="Enseignant">Enseignant(e)</option>
                            <option value="Entrepreneur">Entrepreneur(euse)</option>
                            <option value="Étudiant">Étudiant(e)</option>
                            <option value="Facteur">Facteur(trice)</option>
                            <option value="Gestionnaire">Gestionnaire</option>
                            <option value="Graphiste">Graphiste</option>
                            <option value="Ingénieur">Ingénieur(e)</option>
                            <option value="Infirmier">Infirmier(ère)</option>
                            <option value="Journaliste">Journaliste</option>
                            <option value="Juge">Juge</option>
                            <option value="Kinésithérapeute">Kinésithérapeute</option>
                            <option value="Maçon">Maçon(ne)</option>
                            <option value="Mécanicien">Mécanicien(ne)</option>
                            <option value="Médecin">Médecin</option>
                            <option value="Musicien">Musicien(ne)</option>
                            <option value="Notaire">Notaire</option>
                            <option value="Opticien">Opticien(ne)</option>
                            <option value="Pharmacien">Pharmacien(ne)</option>
                            <option value="Photographe">Photographe</option>
                            <option value="Plombier">Plombier(ère)</option>
                            <option value="Policier">Policier(ère)</option>
                            <option value="Professeur">Professeur(e)</option>
                            <option value="Psychologue">Psychologue</option>
                            <option value="Réalisateur">Réalisateur(trice)</option>
                            <option value="Scientifique">Scientifique</option>
                            <option value="Secrétaire">Secrétaire</option>
                            <option value="Soudeur">Soudeur(euse)</option>
                            <option value="Technicien">Technicien(ne)</option>
                            <option value="Traducteur">Traducteur(trice)</option>
                            <option value="Vendeur">Vendeur(euse)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="previous-ministry" class="form-label">Ministère Antérieur</label>
                        <select id="previous-ministry" name="previous_ministry" class="form-select">
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
                        <label for="person-ministry" class="form-label">Ministère</label>
                        <select id="person-ministry" name="person_ministry" class="form-select">
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
                        <label for="previous-job" class="form-label">Fonction Antérieur</label>
                        <input type="text" class="form-control" id="previous_job" name="previous_job" >
                        @error('previous_job')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="person-job" class="form-label">Fonction</label>
                        <input type="text" class="form-control" id="person_job" name="person_job" >
                        @error('person_job')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="person-service" class="form-label">Service / Etablissement</label>
                        <input type="text" class="form-control" id="person_service" name="person_service" >
                        @error('person_service')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="person-judgment" class="form-label">Décret/Arret</label>
                        <input type="text" id="person_judgment" name="person_judgment" class="form-control" >
                        @error('person_judgment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="person-nomination" class="form-label">Date nommination</label>
                        <input type="date" class="form-control" name="person_nomination" id="person_nomination" >
                        @error('person_nomination')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="effective-date" class="form-label">Date d'effet</label>
                        <input type="date" class="form-control" id="effective_date" name="effective_date" >
                        @error('effective_date')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="end-date" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" >
                        @error('end_date')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="marital-status" class="form-label">Situation matrimoniale</label>
                        <select id="marital-status" name="marital_status" class="form-select">
                            <option value="marie">Marié.e</option>
                            <option value="celibataire">Célibataire</option>
                        </select>
                    </div>
                    <h3 class="mt-5">Informations conjoint.e</h3>
                    <div class="col-md-4">
                        <label for="full-name" class="form-label"> Nom & Prénom</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" >
                        @error('full_name')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="spouse-job" class="form-label">Fonction</label>
                        <input type="text" class="form-control" name="spouse_job" id="spouse_job" >
                        @error('spouse_job')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="spouse-registrationNumber" class="form-label">Matricule</label>
                        <input type="text" class="form-control" name="spouse_registrationNumber" id="spouse_registrationNumber" >
                        @error('spouse_registrationNumber')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="employer-department" class="form-label"> Service employeur</label>
                        <input type="text" class="form-control" name="employer_department" id="employer-department">
                        @error('employer_department')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="hire-date" class="form-label">Date d'embauche</label>
                        <input type="date" class="form-control" name="hire_date" id="hire_date" >
                        @error('hire_date')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="spouse-job" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="spouse_job" id="spouse_job" >
                        @error('spouse_job')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="spouse-regime" class="form-label">Régime</label>
                        <input type="text" id="spouse_regime" name="spouse_regime" class="form-control" >
                        @error('spouse_regime')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="compensation-rate" class="form-label">Taux d'indemnité</label>
                        <input type="text" class="form-control" name="compensation_rate" id="compensation_rate" >
                        @error('compensation_rate')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <h3>Habitation précédante</h3>
                    <div class="col-md-3">
                        <label for="previous-city" class="form-label">Ville</label>
                        <input type="text" id="previous_city" name="previous_city" class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <label for="previous-neighborhood" class="form-label">Quartier</label>
                        <input type="text" class="form-control" name="previous_neighborhood" id="previous_neighborhood" >
                    </div>
                    <div class="col-md-3">
                        <label for="previous-batch" class="form-label">Lot n°</label>
                        <input type="text" id="previous_batch" name="previous_batch" class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <label for="release-date" class="form-label">Date libération</label>
                        <input type="date" class="form-control" name="release_date" id="release_date" >
                    </div>
                    <h3>Habitation actuelle</h3>
                    <div class="col-md-3">
                        <label for="current-city" class="form-label">Ville</label>
                        <input type="text" id="current_city" name="current_city" class="form-control" >
                        @error('current_city')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="current-neighborhood" class="form-label">Quartier</label>
                        <input type="text" class="form-control" name="current_neighborhood" id="current_neighborhood" >
                        @error('current_neighborhood')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="current-batch" class="form-label">Lot n°</label>
                        <input type="text" id="curent_batch" name="curent_batch" class="form-control" >
                        @error('curent_batch')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="occupancy-date" class="form-label">Date d'occupation</label>
                        <input type="date" class="form-control" name="occupancy_date" id="occupancy_date" >
                        @error('occupancy_date')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Etes-vous hébergé par un parent ou un ami ?</label>
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
                        <label for="parent-name" class="form-label">Nom de ce parent ou ami</label>
                        <input type="text" class="form-control" name="parent_name" disabled id="parent_name">
                        <span class="text-danger fs-7" id="error-parentname"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-warning">Suivant</button>
                </div>
            </form>
        </div>
       
        <div class="step join-file">
            <form id="step-2-form" action="{{route('send.Information')}}" method="post" class="mb-3" enctype="multipart/form-data">
                <h3>Joindre des fichiers</h3>
                @csrf
                <input type="hidden" name="personel_id" id="personel-id">
                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label for="appointment-decision" class="form-label">Décision de nomination</label>
                        <input class="form-control" type="file" name="appointment_decision" id="appointment_decision" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('appointment_decision')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="assignment-decision" class="form-label">Décision d'affectation ou page fonctionnaire</label>
                        <input class="form-control" type="file" name="assignment_decision" id="assignment_decision" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" >
                        @error('assignment_decision')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="service-certificate" class="form-label">Certificat de 1ère prise de service</label>
                        <input class="form-control" type="file" name="service_certificate" id="service_certificate" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('service_certificate')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="before-appointment" class="form-label">Bulletin de solde avant nomination</label>
                        <input class="form-control" type="file" name="before_appointment" id="before_appointment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" >
                        @error('before_appointment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="after-appointment" class="form-label">Bulletin de solde après nommination</label>
                        <input class="form-control" type="file" name="after_appointment" id="after_appointment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('after_appointment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nonaccommodation-certificate" class="form-label">Certificat de non hébergement</label>
                        <input class="form-control" type="file" name="nonaccommodation_certificate" id="nonaccommodation_certificate" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('nonaccommodation_certificate')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="sworn-statement" class="form-label">Attestation sur l'honneur légalisée</label>
                        <input class="form-control" type="file" name="sworn_statement" id="sworn_statement" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('sworn_statement')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="residence-certificate" class="form-label">certificat de résidence</label>
                        <input class="form-control" type="file" name="residence_certificate" id="residence_certificate" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('residence_certificate')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="identity-document" class="form-label">Pièce d'identité</label>
                        <input class="form-control" type="file" name="identity_document" id="identity_document" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('identity_document')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="marriage-certificate" class="form-label">Acte de mariage</label>
                        <input class="form-control" type="file" name="marriage_certificate" id="marriage_certificate" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        @error('marriage_certificate')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div> 
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-warning">Suivant</button>
                </div>
            </form>
        </div>
     
        <div class="step paiement ">
            <form id="step-3-form" action="{{route('send.Information')}}" method="post" class="mb-3">
                <div class="finmargin d-flex justify-content-center">
                    @csrf
                    <div class="col-md-8">
                        <h3 class="mt-4">paiement</h3>
                        <input type="hidden" name="personel_id" id="personel-idpaiment">
                        <div class="mt-4 mb-4">
                            <div class="">
                                <label for="input-phonepaiment" class="form-label">N° de téléphone</label>
                                <input type="text" class="form-control" name="phone_paiment" id="phone_paiment" >
                                @error('phone_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 mb-4">
                            <div class="">
                                <label for="input-refrencepaiment" class="form-label">Reférence du paiement</label>
                                <input type="text" class="form-control" name="refrence_paiment" id="refrence_paiment" >
                                @error('refrence_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-warning">Suivant</button>
                </div>
            </form>
        
        </div>
        <div class="step fin">
            <h3 class="mt-4">Votre demande d'ANL a été validée avec succès </h3>
            <p>Un e-mail de confirmation vous a été envoyé avec vos identifiants de connexion pour le suivi de votre dossier !</p>
            <div class="d-flex justify-content-center text-center mt-5">
                <div>
                    <div class="mb-3">
                        <form  action="{{route('send.Information')}}" method="post" class="mb-3">
                            @csrf
                            <input type="hidden" name="personel_id" id="personel-idinscription">
                            <button type="submit" name="print_info" class="btn download-pdf"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger votre fichier d'inscription</button>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form  action="{{route('send.Information')}}" method="post" class="mb-3">
                            @csrf
                            <input type="hidden" name="personel_id" id="personel-idreçupaiment">
                            <button type="submit" name="print_payment"  class="btn download-pdf"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span>Télécharger votre reçu de paiement</button>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    
</div>
@endsection
