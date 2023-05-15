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
<div class="step join-file">
    <h3>Joindre des fichiers</h3>
    <form id="join-files" action="{{route('send.Join')}}" method="post" class="mb-3" ></form>
        <div class="row g-3">
            @csrf
            <div class="mb-3 col-md-6">
                <label for="yassine" class="form-label">Décision de nomination</label>
                <input class="form-control" type="file" name="yassine" name="yassine" required>
                @error('yassine')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="appointment-decision" class="form-label">Décision de nomination</label>
                <input class="form-control" type="file" name="appointment_decision" id="appointment-decision" required>
                @error('appointment_decision')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="assignment-decision" class="form-label">Décision d'affectation ou page fonctionnaire</label>
                <input class="form-control" type="file" name="assignment_decision" id="assignment-decision" required>
                @error('assignment_decision')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="service-certificate" class="form-label">Certificat de 1ère prise de service</label>
                <input class="form-control" type="file" name="service_certificate" id="service-certificate" required>
                @error('service_certificate')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="before-appointment" class="form-label">Bulletin de solde avant nomination</label>
                <input class="form-control" type="file" name="before_appointment" id="before-appointment" required>
                @error('before_appointment')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="after-appointment" class="form-label">Bulletin de solde après nommination</label>
                <input class="form-control" type="file" name="after_appointment" id="after-appointment" required>
                @error('after_appointment')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="nonaccommodation-certificate" class="form-label">Certificat de non hébergement</label>
                <input class="form-control" type="file" name="nonaccommodation_certificate" id="nonaccommodation-certificate" required>
                @error('nonaccommodation_certificate')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="sworn-statement" class="form-label">Attestation sur l'honneur légalisée</label>
                <input class="form-control" type="file" name="sworn_statement" id="sworn-statement" required>
                @error('sworn_statement')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="residence-certificate" class="form-label">certificat de résidence</label>
                <input class="form-control" type="file" name="residence_certificate" id="residence-certificate" required>
                @error('residence_certificate')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="identity-document" class="form-label">Pièce d'identité</label>
                <input class="form-control" type="file" name="identity_document" id="identity-document" required>
                @error('identity_document')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="marriage-certificate" class="form-label">Acte de mariage</label>
                <input class="form-control" type="file" name="marriage_certificate" id="marriage-certificate" required>
                @error('marriage_certificate')
                <span class="text-danger fs-7">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit"  class="btn btn-warning fs-5 px-3">next</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection