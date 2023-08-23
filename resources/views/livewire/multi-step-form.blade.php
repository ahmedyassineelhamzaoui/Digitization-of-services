
<div >
    <div class="steper-componnet">
        <div class="progress-empty">
            <div class="progress-full  @if($curentStep == 2) secondtwidth @endif @if($curentStep == 3) thirdwidth @endif"  ></div>
        </div>
        <div class="cercles-steper">
            <span class="cercle @if($curentStep == 1) currentSt @endif @if($curentStep == 2 || $curentStep == 3) beforStp @endif">
                @if($curentStep == 1)  
                <i class="fa-solid fa-user"></i>
                @endif
                <p class="first-info">Informations</p>
            </span>
            <span class="cercle @if($curentStep == 2) currentSt @endif @if($curentStep == 3) beforStp @endif">
                @if($curentStep != 3)  
                <i class="fa-solid fa-upload"></i>
                @endif
                <p class="second-info">Upload</p>
            </span>
            <span class="cercle @if($curentStep == 3) currentSt @endif">
                <i class="fa-solid fa-credit-card"></i>
                <p class="third-info">Paiement</p>
            </span>
            
        </div>
    </div>
    @if($curentStep == 1)
    <div class="step person-infos" >
        <h3 class="mt-5">Les informations personnelles </h3>
        <div class="row g-3">
            <div class="col-md-2">
                <label for="registration-number" class="form-label">Matricule</label>
                <input type="text" class="form-control" style="text-transform: uppercase" name="Matricule" id="Matricule" wire:model="Matricule" >
                @error('Matricule')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
                <div id="registration-number-error" class="text-danger fs-7"></div>
            </div>
            <div class="col-md-6">
                <label for="first-name" class="form-label">Nom</label>
                <input type="text" style="text-transform: uppercase" wire:model="Nom" class="form-control" name="Nom" id="Nom" required>
                @error('Nom')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="last-name" class="form-label">Prénom</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="Prenom" name="Prenom" id="Prenom" required>
                @error('Prenom')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="person-sexe" class="form-label">Sexe</label>
                <select id="person-sexe" name="person_sexe" wire:model="person_sexe" class="form-select" >
                    <option value="femme">femme</option>
                    <option value="homme">homme</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="birth-date" class="form-label">Date naissance</label>
                <input type="date" class="form-control" wire:model="date_de_naissance" name="date_de_naissance" id="date_de_naissance" required>
                @error('date_de_naissance')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="place-birth" class="form-label">Lieu de naissance</label>
                <select id="place-birth" name="place_birth" wire:model="place_birth" class="form-select">
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
                <input type="email" style="text-transform: uppercase" class="form-control" wire:model="email" name="email" id="email" placeholder="example@gmail.com" required>
                @error('email')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="person-telephone" class="form-label">Téléphone</label>
                <input type="text" style="text-transform: uppercase" class="form-control" name="télephone" wire:model="télephone" id="télephone" placeholder="n° Téléphone" required>
                @error('télephone')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="person-adresse" class="form-label">Adresse</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="adresse" name="adresse" id="adresse" required>
                @error('adresse')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="document-type" class="form-label">Type de pièce</label>
                <select id="document-type" name="document_type" wire:model="document_type" class="form-select">
                    <option value="carte">Carte nationale d'identité</option>
                    <option value="passeport">Passeport</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="document-number" class="form-label">Numéro de la pièce</label>
                <input type="text" style="text-transform: uppercase" wire:model="Numéro_du_pièce" class="form-control" name="Numéro_du_pièce" id="Numéro_du_pièce" placeholder="N° de la pièce d'identité"  required>
                @error('Numéro_du_pièce')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="person-region" class="form-label">Région</label>
                <select id="person-region" name="person_region" wire:model="person_region" class="form-select">
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
                <select id="person-locality" name="person_locality" wire:model="person_locality" class="form-select" >
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
                <select id="anterior-body" name="anterior_body" wire:model="anterior_body" class="form-select">
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
                <select id="person-body" name="person_body" wire:model="person_body" class="form-select">
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
                <select id="previous-ministry" name="previous_ministry" wire:model="previous_ministry" class="form-select">
                    <option value="Ministère de la Communication et des Médias">Ministère de la Communication et des Médias</option>
                    <option value="Ministère de l'Économie et des Finances">Ministère de l'Économie et des Finances</option>
                    <option value="Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle">Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle</option>
                    <option value="Ministère de l'Emploi et de la Protection Sociale">Ministère de l'Emploi et de la Protection Sociale</option>
                    <option value="Ministère de l'Environnement et du Développement Durable">Ministère de l'Environnement et du Développement Durable</option>
                    <option value="Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur">Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                    <option value="Ministère de l'Intérieur et de la Sécurité">Ministère de l'Intérieur et de la Sécurité</option>
                    <option value="Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme">Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                    <option value="Ministère de la Culture et de la Francophonie">Ministère de la Culture et de la Francophonie</option>
                    <option value="Ministère de la Défense">Ministère de la Défense</option>
                    <option value="Ministère de la Femme, de la Famille et de l'Enfant">Ministère de la Femme, de la Famille et de l'Enfant</option>
                    <option value="Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions">Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions</option>
                    <option value="Ministère de la Justice et des Droits de l'Homme">Ministère de la Justice et des Droits de l'Homme</option>
                    <option value="Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes">Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                    <option value="Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole">Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                    <option value="Ministère de la Promotion des PME">Ministère de la Promotion des PME</option>
                    <option value="Ministère de la Reconstruction et de la Réinsertion">Ministère de la Reconstruction et de la Réinsertion</option>
                    <option value="Ministère de la Santé et de l'Hygiène Publique">Ministère de la Santé et de l'Hygiène Publique</option>
                    <option value="Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté">Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté</option>
                    <option value="Ministère de la Ville">Ministère de la Ville</option>
                    <option value="Ministère des Affaires Étrangères">Ministère des Affaires Étrangères</option>
                    <option value="Ministère des Eaux et Forêt">Ministère des Eaux et Forêts</option>
                    <option value="Ministère des Mines et de la Géologie">Ministère des Mines et de la Géologie</option>
                    <option value="Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi">Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                    <option value="Ministère des Sports">Ministère des Sports</option>
                    <option value="Ministère du Commerce, de l'Industrie et de la Promotion des PME">Ministère du Commerce, de l'Industrie et de la Promotion des PME</option>
                    <option value="Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables">Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                    <option value="Ministère du Plan et du Développement">Ministère du Plan et du Développement</option>
                    <option value="Ministère du Tourisme et des Loisirs">Ministère du Tourisme et des Loisirs</option>
                
                </select>
            </div>
            <div class="col-md-4">
                <label for="person-ministry" class="form-label">Ministère</label>
                <select id="person-ministry" name="person_ministry" wire:model="person_ministry" class="form-select">
                    <option value="Ministère de la Communication et des Médias">Ministère de la Communication et des Médias</option>
                    <option value="Ministère de l'Économie et des Finances">Ministère de l'Économie et des Finances</option>
                    <option value="Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle">Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle</option>
                    <option value="Ministère de l'Emploi et de la Protection Sociale">Ministère de l'Emploi et de la Protection Sociale</option>
                    <option value="Ministère de l'Environnement et du Développement Durable">Ministère de l'Environnement et du Développement Durable</option>
                    <option value="Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur">Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                    <option value="Ministère de l'Intérieur et de la Sécurité">Ministère de l'Intérieur et de la Sécurité</option>
                    <option value="Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme">Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                    <option value="Ministère de la Culture et de la Francophonie">Ministère de la Culture et de la Francophonie</option>
                    <option value="Ministère de la Défense">Ministère de la Défense</option>
                    <option value="Ministère de la Femme, de la Famille et de l'Enfant">Ministère de la Femme, de la Famille et de l'Enfant</option>
                    <option value="Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions">Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions</option>
                    <option value="Ministère de la Justice et des Droits de l'Homme">Ministère de la Justice et des Droits de l'Homme</option>
                    <option value="Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes">Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                    <option value="Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole">Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                    <option value="Ministère de la Promotion des PME">Ministère de la Promotion des PME</option>
                    <option value="Ministère de la Reconstruction et de la Réinsertion">Ministère de la Reconstruction et de la Réinsertion</option>
                    <option value="Ministère de la Santé et de l'Hygiène Publique">Ministère de la Santé et de l'Hygiène Publique</option>
                    <option value="Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté">Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté</option>
                    <option value="Ministère de la Ville">Ministère de la Ville</option>
                    <option value="Ministère des Affaires Étrangères">Ministère des Affaires Étrangères</option>
                    <option value="Ministère des Eaux et Forêt">Ministère des Eaux et Forêts</option>
                    <option value="Ministère des Mines et de la Géologie">Ministère des Mines et de la Géologie</option>
                    <option value="Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi">Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                    <option value="Ministère des Sports">Ministère des Sports</option>
                    <option value="Ministère du Commerce, de l'Industrie et de la Promotion des PME">Ministère du Commerce, de l'Industrie et de la Promotion des PME</option>
                    <option value="Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables">Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                    <option value="Ministère du Plan et du Développement">Ministère du Plan et du Développement</option>
                    <option value="Ministère du Tourisme et des Loisirs">Ministère du Tourisme et des Loisirs</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="previous-job" class="form-label">Fonction Antérieur</label>
                <input type="text" style="text-transform: uppercase" class="form-control" id="Fonction_Antérieur" name="Fonction_Antérieur" wire:model="Fonction_Antérieur" required>
                @error('Fonction_Antérieur')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="person-job" class="form-label">Fonction</label>
                <input type="text" style="text-transform: uppercase" class="form-control" id="Fonction" name="Fonction" wire:model="Fonction" required>
                @error('Fonction')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="person-service" class="form-label">Service / Etablissement</label>
                <input type="text" style="text-transform: uppercase" class="form-control" id="Service_Etablissement" wire:model="Service_Etablissement" name="Service_Etablissement" required>
                @error('Service_Etablissement')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="person-judgment" class="form-label">Décret/Arret</label>
                <input type="text" id="Arret" style="text-transform: uppercase" name="Arret" wire:model="Arret" class="form-control" required >
                @error('Arret')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="person-nomination" class="form-label">Date nommination</label>
                <input type="date" style="text-transform: uppercase" class="form-control" name="Date_nomination" wire:model="Date_nomination" id="Date_nomination" required>
                @error('Date_nomination')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="effective-date" class="form-label">Date d'effet</label>
                <input type="date" class="form-control" id="Date_effet" name="Date_effet" wire:model="Date_effet" required>
                @error('Date_effet')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="end-date" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="Numéro_du_pièce" wire:model="Date_fin" name="Date_fin" required>
                @error('Date_fin')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="marital-status" class="form-label">Situation matrimoniale</label>
                <select id="marital-status" name="marital_status" wire:model="marital_status" class="form-select">
                    <option value="Marié.e">Marié.e</option>
                    <option value="Célibataire">Célibataire</option>
                    <option value="veuve">veuve</option>
                    <option value="veuf">veuf</option>
                    <option value="divorcé.e">divorcé.e</option>
                </select>
            </div>
            <h3 class="mt-5">Informations conjoint.e</h3>
            <div class="col-md-4">
                <label for="full-name" class="form-label"> Nom & Prénom</label>
                <input type="text" style="text-transform: uppercase" wire:model="Nom_Prénom" class="form-control" name="Nom_Prénom" id="Nom_Prénom" required>
                @error('Nom_Prénom')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="spouse-job" class="form-label">Fonction</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="Conjoint_Fonction" name="Conjoint_Fonction" id="Conjoint_Fonction" required>
                @error('Conjoint_Fonction')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="spouse-registrationNumber" class="form-label">Matricule</label>
                <input type="text" style="text-transform: uppercase" class="form-control" name="Conjoint_Matricule" wire:model="Conjoint_Matricule" id="Conjoint_Matricule" required>
                @error('Conjoint_Matricule')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="employer-department" class="form-label"> Service employeur</label>
                <input type="text" style="text-transform: uppercase" class="form-control" name="Service_employeur" wire:model="Service_employeur" id="Service_employeur" required>
                @error('Service_employeur')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="hire-date" class="form-label">Date d'embauche</label>
                <input type="date" class="form-control" name="Date_embauche" wire:model="Date_embauche" id="Date_embauche" required>
                @error('Date_embauche')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="spouse-job" class="form-label">Adresse</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="Conjoint_adresse" name="Conjoint_adresse" id="Conjoint_adresse" required>
                @error('Conjoint_adresse')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="spouse-regime" class="form-label">Régime</label>
                <input type="text" style="text-transform: uppercase" wire:model="Conjoint_régime" id="Conjoint_régime" name="Conjoint_régime" class="form-control" required>
                @error('Conjoint_régime')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="compensation-rate" class="form-label">Taux d'indemnité</label>
                <input type="text" style="text-transform: uppercase" class="form-control" name="Taux_indemnité" wire:model="Taux_indemnité" id="Taux_indemnité"  required>
                @error('Taux_indemnité')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <h3>Habitation précédante</h3>
            <div class="col-md-3">
                <label for="previous-city" class="form-label">Ville</label>
                <input type="text" style="text-transform: uppercase" id="ville_précédant" wire:model="ville_précédant" name="ville_précédant" class="form-control" required>
                @error('ville_précédant')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="previous-neighborhood" class="form-label">Quartier</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="quartier_précédant" name="quartier_précédant" id="quartier_précédant" required>
                @error('quartier_précédant')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="previous-batch" class="form-label">Lot n°</label>
                <input type="text" style="text-transform: uppercase" id="lot_n°_précédant" wire:model="lot_n°_précédant" name="lot_n°_précédant" class="form-control" required>
                @error('lot_n°_précédant')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="release-date" class="form-label">Date libération</label>
                <input type="date"  class="form-control" name="Date_libération" wire:model="Date_libération" id="Date_libération" required>
                @error('Date_libération')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <h3>Habitation actuelle</h3>
            <div class="col-md-3">
                <label for="current-city" class="form-label">Ville</label>
                <input type="text" style="text-transform: uppercase" id="ville_actuelle" wire:model="ville_actuelle" name="ville_actuelle" class="form-control" required>
                @error('ville_actuelle')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="current-neighborhood" class="form-label">Quartier</label>
                <input type="text" style="text-transform: uppercase" class="form-control" wire:model="quartier_actuelle" name="quartier_actuelle" id="quartier_actuelle" required >
                @error('quartier_actuelle')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="current-batch" class="form-label">Lot n°</label>
                <input type="text" style="text-transform: uppercase" id="lot_n°_actuelle" wire:model="lot_n°_actuelle" name="lot_n°_actuelle" class="form-control" required >
                @error('lot_n°_actuelle')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="occupancy-date" class="form-label">Date d'occupation</label>
                <input type="date" class="form-control" name="Date_occupation" wire:model="Date_occupation" id="Date_occupation" required>
                @error('Date_occupation')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Etes-vous hébergé par un parent ou un ami ?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" wire:model="hébergement" id="response-oui" value="oui"  required >
                    <label class="form-check-label" for="response-oui">
                    Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" wire:model="hébergement" id="response-non" value="non" required >
                    <label class="form-check-label" for="response-non">
                    Non
                    </label>
                </div>
            </div>
            <div class="col-md-8">
                <label for="parent-name" class="form-label">Nom de ce parent ou ami</label>
                <input type="text" style="text-transform: uppercase"  class="form-control" name="parent_name" wire:model="parent_name"  id="parent_name" required @if ($hébergement == 'non')  disabled  @endif>
                <span class="text-danger fs-7" id="error-parentname"></span>
            </div>
        </div>
    </div>
    @endif
    @if($curentStep == 2)
    <div class="step join-file" >
        <h3>Joindre des fichiers</h3>
        <input type="hidden" name="personel_id" id="personel-id">
        <div class="row g-3">
            <div class="mb-3 col-md-6">
                <label for="appointment-decision" class="form-label">Décision de nomination</label>
                <input class="form-control" type="file" name="Décision_de_nomination" wire:model="Décision_de_nomination" id="Décision_de_nomination" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Décision_de_nomination')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="assignment-decision" class="form-label">Décision d'affectation ou page fonctionnaire</label>
                <input class="form-control" type="file" name="Décision_affectation" wire:model="Décision_affectation" id="Décision_affectation" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required >
                @error('Décision_affectation')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="service-certificate" class="form-label">Certificat de 1ère prise de service</label>
                <input class="form-control" type="file" name="Certificat_de_1ère_prise_de_service" wire:model="Certificat_de_1ère_prise_de_service" id="Certificat_de_1ère_prise_de_service" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Certificat_de_1ère_prise_de_service')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="before-appointment" class="form-label">Bulletin de solde avant nomination</label>
                <input class="form-control" type="file" name="Bulletin_de_solde_avant_nomination" wire:model="Bulletin_de_solde_avant_nomination" id="Bulletin_de_solde_avant_nomination" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required >
                @error('Bulletin_de_solde_avant_nomination')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="after-appointment" class="form-label">Bulletin de solde après nommination</label>
                <input class="form-control" type="file" name="Bulletin_de_solde_après_nommination" wire:model="Bulletin_de_solde_après_nommination" id="Bulletin_de_solde_après_nommination" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Bulletin_de_solde_après_nommination')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="nonaccommodation-certificate" class="form-label">Certificat de non hébergement</label>
                <input class="form-control" type="file" name="Certificat_de_non_hébergement" wire:model="Certificat_de_non_hébergement" id="Certificat_de_non_hébergement" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Certificat_de_non_hébergement')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="sworn-statement" class="form-label">Attestation sur l'honneur légalisée</label>
                <input class="form-control" type="file" name="Attestation_sur_honneur_légalisée" wire:model="Attestation_sur_honneur_légalisée"  id="Attestation_sur_honneur_légalisée" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Attestation_sur_honneur_légalisée')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="residence-certificate" class="form-label">certificat de résidence</label>
                <input class="form-control" type="file" name="certificat_de_résidence" id="certificat_de_résidence" wire:model="certificat_de_résidence" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('certificat_de_résidence')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="identity-document" class="form-label">Pièce d'identité</label>
                <input class="form-control" type="file" name="Pièce_identité" id="Pièce_identité" wire:model="Pièce_identité" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Pièce_identité')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="marriage-certificate" class="form-label">Acte de mariage</label>
                <input class="form-control" type="file" name="Acte_de_mariage" id="Acte_de_mariage" wire:model="Acte_de_mariage" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                @error('Acte_de_mariage')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
        </div>            
    </div>
    @endif
    @if($displayerrors)
    <div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{$errormessage}}  </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    @if($curentStep == 3)
    <div class="step paiement" >
        <div class="finmargin d-flex justify-content-center">
            <input type="hidden" name="personel_id" id="personel-Id">
            <div class="row g-3">
                <h3 class="mt-4">paiement</h3>
                <input type="hidden" name="personel_id" id="personel-idpaiment">
                <div class="mt-3 mb-3 col-md-6">
                    <div class="">
                        <label for="nom_paiment" class="form-label">Votre Nom</label>
                        <input type="text" class="form-control" name="nom_paiment" wire:model="nom_paiment" id="nom_paiment" required>
                        @error('nom_paiment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3 mb-3 col-md-6">
                    <div class="">
                        <label for="prenom_paiment" class="form-label">Votre Prénom</label>
                        <input type="text" class="form-control" name="prenom_paiment"  wire:model="prenom_paiment" id="prenom_paiment" required>
                        @error('prenom_paiment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2 mb-3 col-md-6">
                    <div class="">
                        <label for="telephone_paiment" class="form-label">N° de téléphone</label>
                        <input type="text" class="form-control" name="telephone_paiment" wire:model="telephone_paiment" id="telephone_paiment" required>
                        @error('telephone_paiment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2 mb-3 col-md-6">
                    <div class="">
                        <label for="credential_paiment" class="form-label">ID d'identification</label>
                        <input type="text" class="form-control" name="credential_paiment" wire:model="credential_paiment" id="credential_paiment" required>
                        @error('credential_paiment')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2 mb-3 col-md-6">
                    <div class="">
                        <label for="nature_paiment" class="form-label">Nature de recette</label>
                        <input type="text" class="form-control" name="nature_recette" wire:model="nature_recette" id="nature_recette" required>
                        @error('nature_recette')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2 mb-3 col-md-6">
                    <div class="">
                        <label for="numéro_avis_de_recette" class="form-label">Le numéro de l’avis de recette</label>
                        <input type="text" class="form-control" name="numéro_avis_de_recette" wire:model="numéro_avis_de_recette" id="numéro_avis_de_recette" required>
                        @error('numéro_avis_de_recette')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-2 mb-3 col-md-6">
                    <div class="">
                        <label for="payment_total" class="form-label">Le montant total</label>
                        <input type="number" class="form-control" name="montant_total" wire:model="montant_total"  id="montant_total" required>
                        @error('montant_total')
                        <span class="text-danger fs-7">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <div class="d-flex justify-content-between bg-white pt-2 pb-2">
        @if($curentStep == 1)
        <div></div>
        @endif
        @if($curentStep == 2 || $curentStep == 3)
        <button style="background-color:rgb(231,123,32);color:white" class="btn"  type="button" wire:click="decreseStep()" >Précédent</button>
        @endif
        @if($curentStep == 1 || $curentStep == 2)
        <button style="background-color:green;color:white"  class="btn" type="buttton" wire:click="increseStep()" >Suivant</button>
        @endif
        @if($curentStep == 3)
        <button style="background-color:green;color:white"  type="button" class="btn" wire:click="storeInfo()">
            <div  class="d-flex justify-content-center items-center  align-items-center">
                <div wire:loading class="spinner-border text-white" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="ms-1">
                    Enregistrer
                </div>
            </div>
           
        </button>
        @endif
    </div>
</div>
