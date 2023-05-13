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
    <form action="" class="mb-4">
    <div class="persone-infos">
          <h3 class="mt-5">Les informations personnelles </h3>
          <div class="row g-3">
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="input-matricule">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Nom</label>
                <input type="text" class="form-control" id="input-nom">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="input-prenom">
            </div>
            <div class="col-md-2">
                <label for="input-sexe" class="form-label">Sexe</label>
                <select id="input-sexe" class="form-select">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Date naissance</label>
                <input type="date" class="form-control" id="input-nom">
            </div>
            <div class="col-md-4">
                <label for="input-naissance" class="form-label">Lieu de naissance</label>
                <select id="input-naissance" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="input-email">
            </div>
            <div class="col-md-2">
                <label for="input-telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="input-telephone">
              </div>
            <div class="col-md-4">
                <label for="input-adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="input-adresse">
            </div>
            <div class="col-md-6">
              <label for="input-typepiece" class="form-label">Type de pièce</label>
              <select id="input-typepiece" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="input-numeropiece" class="form-label">Numéro de la pièce</label>
              <input type="text" class="form-control" id="input-numeropiece">
            </div>
            <div class="col-md-4">
                <label for="input-region" class="form-label">Région</label>
                <select id="input-region" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="input-localite" class="form-label">Localité</label>
                <select id="input-localite" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="input-corsauntirieur" class="form-label">Corps Antérieur</label>
                <select id="input-corsauntirieur" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="input-region" class="form-label">Corps</label>
                <select id="input-region" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="input-localite" class="form-label">Ministère Antérieur</label>
                <select id="input-localite" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="input-corsauntirieur" class="form-label">Ministère</label>
                <select id="input-corsauntirieur" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="input-service" class="form-label">Service / Etablissement</label>
                <input type="text" class="form-control" id="input-service">
            </div>
            <div class="col-md-6">
                <label for="input-arret" class="form-label">Décret/Arret</label>
                <input type="text" id="input-arret" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="input-nomination" class="form-label">Date nommination</label>
                <input type="date" class="form-control" id="input-nomination">
            </div>
            <div class="col-md-4">
                <label for="input-effet" class="form-label">Date d'effet</label>
                <input type="date" class="form-control" id="input-effet">
            </div>
            <div class="col-md-4">
                <label for="input-fin" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="input-fin">
            </div>
            <div class="col-md-4">
                <label for="input-matrimoniale" class="form-label">Situation matrimoniale</label>
                <select id="input-matrimoniale" class="form-select">
                    <option selected>Choose...</option>
                    <option>Marié.e</option>
                    <option>Célibataire</option>
                </select>
            </div>
            <h3 class="mt-5">Informations conjoint.e</h3>
            <div class="col-md-4">
                <label for="input-nomprenom" class="form-label"> Nom & Prénom</label>
                <input type="text" class="form-control" id="input-nomprenom">
            </div>
            <div class="col-md-4">
                <label for="input-fonction" class="form-label">Fonction</label>
                <input type="text" class="form-control" id="input-fonction">
            </div>
            <div class="col-md-4">
                <label for="input-matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="input-matricule">
            </div>
            <div class="col-md-4">
                <label for="input-serviceempolyeur" class="form-label"> Service employeur</label>
                <input type="text" class="form-control" id="input-serviceempolyeur">
            </div>
            <div class="col-md-4">
                <label for="input-dateembauche" class="form-label">Date d'embauche</label>
                <input type="date" class="form-control" id="input-dateembauche">
            </div>
            <div class="col-md-4">
                <label for="input-adressconjoint" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="input-adressconjoint">
            </div>
            <div class="col-md-6">
                <label for="input-regime" class="form-label">Régime</label>
                <input type="text" id="input-regime" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="input-indemnite" class="form-label">Taux d'indemnité</label>
                <input type="text" class="form-control" id="input-indemnite">
            </div>
            <h3>Habitation précédante</h3>
            <div class="col-md-3">
                <label for="input-villeprece" class="form-label">Ville</label>
                <input type="text" id="input-villeprece" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="input-quartierprec" class="form-label">Quartier</label>
                <input type="text" class="form-control" id="input-quartierprec">
            </div>
            <div class="col-md-3">
                <label for="input-lotprec" class="form-label">Lot n°</label>
                <input type="text" id="input-lotprec" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="input-liberation" class="form-label">Date libération</label>
                <input type="date" class="form-control" id="input-liberation">
            </div>
            <h3>Habitation actuelle</h3>
            <div class="col-md-3">
                <label for="input-villeactuell" class="form-label">Ville</label>
                <input type="text" id="input-villeactuell" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="input-quartieractuell" class="form-label">Quartier</label>
                <input type="text" class="form-control" id="input-quartieractuell">
            </div>
            <div class="col-md-3">
                <label for="input-lotactuell" class="form-label">Lot n°</label>
                <input type="text" id="input-lotactuell" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="input-occupation" class="form-label">Date d'occupation</label>
                <input type="date" class="form-control" id="input-occupation">
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
                <input type="text" class="form-control" id="input-nomparentami">
            </div>
        </div>
    </div>
    <div class="join-file">
        <h3>Joindre des fichiers</h3>
        <div class="row g-3">
            <div class="mb-3 col-md-6">
                <label for="form-decisionnomination" class="form-label">Décision de nommination</label>
                <input class="form-control" type="file" id="form-decisionnomination">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-decisionaffectation" class="form-label">Décision d'affectation ou page fonctionnaire</label>
                <input class="form-control" type="file" id="form-decisionaffectation">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-certificatpriseservice" class="form-label">Certificat de 1ère prise de service</label>
                <input class="form-control" type="file" id="form-certificatpriseservice">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-Bulletinsoldeavant" class="form-label">Bulletin de solde avant nomination</label>
                <input class="form-control" type="file" id="form-Bulletinsoldeavant">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-Bulletinsoldeapres" class="form-label">Bulletin de solde après nommination</label>
                <input class="form-control" type="file" id="form-Bulletinsoldeapres">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-certifcatnomhebergement" class="form-label">Certificat de non hébergement</label>
                <input class="form-control" type="file" id="form-certifcatnomhebergement">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-attestationhonneurlegalise" class="form-label">Attestation sur l'honneur légalisée</label>
                <input class="form-control" type="file" id="form-attestationhonneurlegalise">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-certificatresidence" class="form-label">certificat de résidence</label>
                <input class="form-control" type="file" id="form-certificatresidence">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-pieceidentite" class="form-label">Pièce d'identité</label>
                <input class="form-control" type="file" id="form-pieceidentite">
            </div>
            <div class="mb-3 col-md-6">
                <label for="form-actemariage" class="form-label">Acte de mariage</label>
                <input class="form-control" type="file" id="form-actemariage">
            </div>
        </div>
    </div>
    <div class="paiement">
       <h3>paiement</h3>
       <div class="row g-3">
            <div class="col-md-6">
                <label for="input-phonepaiment">N° de téléphone</label>
                <input type="text" class="form-control" id="input-phonepaiment">
            </div>
            <div class="col-md-6">
                <label for="input-refrencepaiment">Reférence du paiement</label>
                <input type="text" class="form-control" id="input-refrencepaiment">
            </div>
       </div>
    </div>
    <div class="fin">
        <h3>Votre demande d'ANL a été validée avec succès </h3>
        <p>Un e-mail de confirmation vous a été envoyé avec vos identifiants de connexion pour le suivi de votre dossier !</p>
        <div class="d-flex justify-content-center text-center">
            <div>
                <div class="mb-3">
                    <button type="submit" name="" id="" class="btn download-pdf">Imprimer votre fichier d'inscription</button>
                </div>
                <div class="mb-3">
                    <button type="submit" name="" id="" class="btn download-pdf">Imprimer votre reçu de paiement</button>
                </div>
            </div>
        </div>
            
    </div>
    <div class="d-flex justify-content-end mt-2">
          <button class="btn btn-warning px-3">Suivant</button>
    </div>
    </form>
</div>
@endsection
