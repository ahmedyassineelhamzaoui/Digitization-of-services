@extends('layouts.app')
@section('title')
   formulaire
@endsection
@section('content')
  <h3 class="">Les informations personnelles </h3>
    <div class="">
        <div class="">
            <p>Matricule : {{$personelinfo->matricule}}</p>
        </div>
        <div class="">
            <p>Nom : {{$personelinfo-> }}</p>
        </div>
        <div class="">
            <p>Prénom</p>
        </div>
        <div class="">
            <p>Sexe</p>
        </div>
        <div class="">
            <p>Date naissance</p>
        </div>
        <div class="">
            <p>Lieu de naissance</p>

        </div>
        <div class="">
            <p>Email</p>
        </div>
        <div class="">
            <p>Téléphone</p>
        </div>
        <div class="">
            <p>Adresse</p>
        </div>
        <div class="">
            <p>Type de pièce</p>
        </div>
        <div class="">
            <p>Numéro de la pièce</p>
        </div>
        <div class="">
            <p>Région</p>
        </div>
        <div class="">
            <p>Localité</p>
        </div>
        <div class="">
            <p>Corps Antérieur</p>
        </div>
        <div class="">
            <p>Corps</p>
        </div>
        <div class="">
            <p>Ministère Antérieur</p>
        </div>
        <div class="">
            <p>Ministère</p>
        </div>
        <div class="">
            <label for="previous-job" class="form-label">Fonction Antérieur</label>
            <input type="text" class="form-control" id="previous_job" name="previous_job" >
   
        </div>
        <div class="">
            <label for="person-job" class="form-label">Fonction</label>
            <input type="text" class="form-control" id="person_job" name="person_job" >
            
        </div>
        <div class="">
            <label for="person-service" class="form-label">Service / Etablissement</label>
      
        </div>
        <div class="">
            <label for="person-judgment" class="form-label">Décret/Arret</label>
            <input type="text" id="person_judgment" name="person_judgment" class="form-control" >
          
        </div>
        <div class="">
            <label for="person-nomination" class="form-label">Date nommination</label>
            <input type="date" class="form-control" name="person_nomination" id="person_nomination" >
      
        </div>
        <div class="">
            <label for="effective-date" class="form-label">Date d'effet</label>
            <input type="date" class="form-control" id="effective_date" name="effective_date" >
  
        </div>
        <div class="">
            <label for="end-date" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" >
       
        </div>
        <div class="">
            <label for="marital-status" class="form-label">Situation matrimoniale</label>
            <select id="marital-status" name="marital_status" class="form-select">
                <option value="marie">Marié.e</option>
                <option value="celibataire">Célibataire</option>
            </select>
        </div>
        <h3 class="mt-5">Informations conjoint.e</h3>
        <div class="">
            <label for="full-name" class="form-label"> Nom & Prénom</label>
            <input type="text" class="form-control" name="full_name" id="full_name" >

        </div>
        <div class="">
            <label for="spouse-job" class="form-label">Fonction</label>
            <input type="text" class="form-control" name="spouse_job" id="spouse_job" >
 
        </div>
        <div class="">
            <label for="spouse-registrationNumber" class="form-label">Matricule</label>
            <input type="text" class="form-control" name="spouse_registrationNumber" id="spouse_registrationNumber" >

        </div>
        <div class="">
            <label for="employer-department" class="form-label"> Service employeur</label>
            <input type="text" class="form-control" name="employer_department" id="employer-department">

        </div>
        <div class="">
            <label for="hire-date" class="form-label">Date d'embauche</label>
            <input type="date" class="form-control" name="hire_date" id="hire_date" >

        </div>
        <div class="">
            <label for="spouse-job" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="spouse_job" id="spouse_job" >

        </div>
        <div class="">
            <label for="spouse-regime" class="form-label">Régime</label>
            <input type="text" id="spouse_regime" name="spouse_regime" class="form-control" >

        </div>
        <div class="">
            <label for="compensation-rate" class="form-label">Taux d'indemnité</label>
            <input type="text" class="form-control" name="compensation_rate" id="compensation_rate" >

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

        </div>
        <div class="col-md-3">
            <label for="current-neighborhood" class="form-label">Quartier</label>
            <input type="text" class="form-control" name="current_neighborhood" id="current_neighborhood" >
        </div>
        <div class="col-md-3">
            <label for="current-batch" class="form-label">Lot n°</label>
            <input type="text" id="curent_batch" name="curent_batch" class="form-control" >

        </div>
        <div class="col-md-3">
            <label for="occupancy-date" class="form-label">Date d'occupation</label>
            <input type="date" class="form-control" name="occupancy_date" id="occupancy_date" >

        </div>
        <div class="">
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
            <input type="text" class="form-control" name="parent_name" id="parent_name">
        </div>
    </div>
 @endsection