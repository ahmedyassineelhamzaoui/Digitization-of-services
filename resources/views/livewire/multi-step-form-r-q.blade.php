<div>
    <div class="steper-componnet">
        <div class="progress-empty">
            <div
                class="progress-full  @if ($curentStep == 2) secondtwidth @endif @if ($curentStep == 3) thirdwidth @endif">
            </div>
        </div>
        <div class="cercles-steper">
            <span
                class="cercle @if ($curentStep == 1) currentSt @endif @if ($curentStep == 2 || $curentStep == 3) beforStp @endif">
                @if ($curentStep == 1)
                    <i class="fa-solid fa-user"></i>
                @endif
                <p class="first-info">Informations</p>
            </span>
            <span
                class="cercle @if ($curentStep == 2) currentSt @endif @if ($curentStep == 3) beforStp @endif">
                @if ($curentStep != 3)
                    <i class="fa-solid fa-upload"></i>
                @endif
                <p class="second-info">Upload</p>
            </span>
            <span class="cercle @if ($curentStep == 3) currentSt @endif">
                <i class="fa-solid fa-credit-card"></i>
                <p class="third-info">Paiement</p>
            </span>

        </div>
    </div>
    @if ($curentStep == 1)
        <div class="step person-infos">
            <h3 class="mt-5">Les informations personnelles </h3>
            <div class="row g-3">
                <div  class="col-md-6 form-check"> <input class="form-check-input" wire:model="radio" name="radio" type="radio" value="physique" id="physicalPerson"> <label class="form-check-label" for="physicalPerson"> Personne Physique </label> </div>
                <div class="col-md-6 form-check"> <input class="form-check-input" wire:model="radio"  name="radio" type="radio" value="moral" id="moralPerson"> <label class="form-check-label" for="moralPerson"> Personne Morale </label> </div> 
                @if($radio=="moral")
                <div  class="col-md-3 form-check "> <input class="form-check-input" wire:model="statut" name="statut" type="radio" value="privé" id="privé"> <label class="form-check-label" for="privé"> Privé</label> </div>
                <div class="col-md-3 form-check"> <input class="form-check-input" wire:model="statut"  name="statut" type="radio" value="public" id="public"> <label class="form-check-label" for="public"> Public </label> </div> 
                <div class="col-md-6">
                    <label for="registration-number" class="form-label">Secteur d'acctivité</label>
                    <input type="text" class="form-control" style="text-transform: uppercase" name="secteur_ac􀆟vite"
                        id="secteur_ac􀆟vite" wire:model="secteur_ac􀆟vite">
                    @error('secteur_ac􀆟vite')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="person-ministry" class="form-label">Ministère</label>
                    <select id="person-ministry" name="person_ministry" wire:model="person_ministry"
                        class="form-select">
                        <option value="Ministère de la Communication et des Médias">Ministère de la Communication et
                            des Médias</option>
                        <option value="Ministère de l'Économie et des Finances">Ministère de l'Économie et des Finances
                        </option>
                        <option
                            value="Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle">
                            Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation
                            Professionnelle</option>
                        <option value="Ministère de l'Emploi et de la Protection Sociale">Ministère de l'Emploi et de
                            la Protection Sociale</option>
                        <option value="Ministère de l'Environnement et du Développement Durable">Ministère de
                            l'Environnement et du Développement Durable</option>
                        <option value="Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur">Ministère
                            de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                        <option value="Ministère de l'Intérieur et de la Sécurité">Ministère de l'Intérieur et de la
                            Sécurité</option>
                        <option
                            value="Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme">
                            Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                        <option value="Ministère de la Culture et de la Francophonie">Ministère de la Culture et de la
                            Francophonie</option>
                        <option value="Ministère de la Défense">Ministère de la Défense</option>
                        <option value="Ministère de la Femme, de la Famille et de l'Enfant">Ministère de la Femme, de
                            la Famille et de l'Enfant</option>
                        <option
                            value="Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions">
                            Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions
                        </option>
                        <option value="Ministère de la Justice et des Droits de l'Homme">Ministère de la Justice et des
                            Droits de l'Homme</option>
                        <option value="Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes">Ministère de
                            la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                        <option value="Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole">
                            Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                        <option value="Ministère de la Promotion des PME">Ministère de la Promotion des PME</option>
                        <option value="Ministère de la Reconstruction et de la Réinsertion">Ministère de la
                            Reconstruction et de la Réinsertion</option>
                        <option value="Ministère de la Santé et de l'Hygiène Publique">Ministère de la Santé et de
                            l'Hygiène Publique</option>
                        <option
                            value="Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté">
                            Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté
                        </option>
                        <option value="Ministère de la Ville">Ministère de la Ville</option>
                        <option value="Ministère des Affaires Étrangères">Ministère des Affaires Étrangères</option>
                        <option value="Ministère des Eaux et Forêt">Ministère des Eaux et Forêts</option>
                        <option value="Ministère des Mines et de la Géologie">Ministère des Mines et de la Géologie
                        </option>
                        <option value="Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi">
                            Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                        <option value="Ministère des Sports">Ministère des Sports</option>
                        <option value="Ministère du Commerce, de l'Industrie et de la Promotion des PME">Ministère du
                            Commerce, de l'Industrie et de la Promotion des PME</option>
                        <option value="Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables">Ministère du
                            Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                        <option value="Ministère du Plan et du Développement">Ministère du Plan et du Développement
                        </option>
                        <option value="Ministère du Tourisme et des Loisirs">Ministère du Tourisme et des Loisirs
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="person-service" class="form-label">Service / Direc􀆟on</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Service_Etablissement" wire:model="Service_Etablissement" name="Service_Etablissement"
                        required>
                    @error('Service')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="raison_sociale" class="form-label">Raison Sociale</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="raison_sociale" wire:model="raison_sociale" name="raison_sociale"
                        required>
                    @error('raison_sociale')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Sigle" class="form-label">Sigle</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Sigle" wire:model="Sigle" name="Sigle"
                        required>
                    @error('Sigle')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Contact" class="form-label">Contact (Tel/Cel)</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Contact" wire:model="Contact" name="Contact"
                        required>
                    @error('Contact')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Adresse" class="form-label">Adresse</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Adresse" wire:model="Adresse" name="Adresse"
                        required>
                    @error('Adresse')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Mail" class="form-label">Mail</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Mail" wire:model="Mail" name="Mail"
                        required>
                    @error('Mail')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Ville" class="form-label">Ville</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Ville" wire:model="Ville" name="Ville"
                        required>
                    @error('Ville')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Quartier" class="form-label">Quartier</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Quartier" wire:model="Quartier" name="Quartier"
                        required>
                    @error('Quartier')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="type_batiment" class="form-label">Type de batimment</label>
                    <select id="type_batiment" name="type_batiment" wire:model="type_batiment" class="form-select">
                        <option value="Immeuble">Immeuble</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Villabasse">Villabasse</option>
                        <option value="Maison en bande">Maison en bande</option>
                        <option value="Magasin">Magasin</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Standing" class="form-label">Standing</label>
                    <select id="Standing" name="Standing" wire:model="Standing" class="form-select">
                        <option value="Haut">Haut</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Modéré">Modéré</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="ILot" class="form-label">ILot</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="ILot" wire:model="ILot" name="ILot"
                        required>
                    @error('ILot')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="Lot" class="form-label">Lot</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Lot" wire:model="Lot" name="Lot"
                        required>
                    @error('Lot')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="Usage" class="form-label">Usage</label>
                    <select id="Usage" name="Usage" wire:model="Usage" class="form-select">
                        <option value="Bureau">Bureau</option>
                        <option value="Habita􀆟on">Habita􀆟on</option>
                        <option value="Autres">Autres</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date_occupation" class="form-label">Date d’occupa􀆟on</label>
                    <input type="date" class="form-control" id="date_occupation" wire:model="date_occupation"
                        name="date_occupation" required>
                    @error('date_occupation')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
               
                @endif
                @if($radio=="physique")
                <div  class="col-md-6 form-check "> <input class="form-check-input" wire:model="statut" name="statut" type="radio" value="privé" id="privé"> <label class="form-check-label" for="privé"> Privé</label> </div>
                <div class="col-md-6 form-check"> <input class="form-check-input" wire:model="statut"  name="statut" type="radio" value="public" id="public"> <label class="form-check-label" for="public"> Public </label> </div> 
                <div class="col-md-6">
                    <label for="Fonctionaire" class="form-label">Fonctionaire</label>
                    <input type="text" style="text-transform: uppercase" class="form-control" placeholder="oui/non"
                        id="Fonctionaire" wire:model="Fonctionaire" name="Fonctionaire"
                        required>
                    @error('Fonctionaire')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Matricule" class="form-label">Matricule</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Matricule" wire:model="Matricule" name="Matricule"
                        required>
                    @error('Matricule')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="person-ministry" class="form-label">Ministère</label>
                    <select id="person-ministry" name="person_ministry" wire:model="person_ministry"
                        class="form-select">
                        <option value="Ministère de la Communication et des Médias">Ministère de la Communication et
                            des Médias</option>
                        <option value="Ministère de l'Économie et des Finances">Ministère de l'Économie et des Finances
                        </option>
                        <option
                            value="Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation Professionnelle">
                            Ministère de l'Éducation Nationale, de l'Enseignement Technique et de la Formation
                            Professionnelle</option>
                        <option value="Ministère de l'Emploi et de la Protection Sociale">Ministère de l'Emploi et de
                            la Protection Sociale</option>
                        <option value="Ministère de l'Environnement et du Développement Durable">Ministère de
                            l'Environnement et du Développement Durable</option>
                        <option value="Ministère de l'Intégration Africaine et des Ivoiriens de l'Extérieur">Ministère
                            de l'Intégration Africaine et des Ivoiriens de l'Extérieur</option>
                        <option value="Ministère de l'Intérieur et de la Sécurité">Ministère de l'Intérieur et de la
                            Sécurité</option>
                        <option
                            value="Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme">
                            Ministère de la Construction, du Logement, de l'Assainissement et de l'Urbanisme</option>
                        <option value="Ministère de la Culture et de la Francophonie">Ministère de la Culture et de la
                            Francophonie</option>
                        <option value="Ministère de la Défense">Ministère de la Défense</option>
                        <option value="Ministère de la Femme, de la Famille et de l'Enfant">Ministère de la Femme, de
                            la Famille et de l'Enfant</option>
                        <option
                            value="Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions">
                            Ministère de la Fonction Publique, du Travail et des Relations avec les Institutions
                        </option>
                        <option value="Ministère de la Justice et des Droits de l'Homme">Ministère de la Justice et des
                            Droits de l'Homme</option>
                        <option value="Ministère de la Promotion de la Jeunesse et de l'Emploi des Jeunes">Ministère de
                            la Promotion de la Jeunesse et de l'Emploi des Jeunes</option>
                        <option value="Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole">
                            Ministère de la Promotion de la Riziculture et de la Mécanisation Agricole</option>
                        <option value="Ministère de la Promotion des PME">Ministère de la Promotion des PME</option>
                        <option value="Ministère de la Reconstruction et de la Réinsertion">Ministère de la
                            Reconstruction et de la Réinsertion</option>
                        <option value="Ministère de la Santé et de l'Hygiène Publique">Ministère de la Santé et de
                            l'Hygiène Publique</option>
                        <option
                            value="Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté">
                            Ministère de la Solidarité, de la Cohésion Sociale et de la Lutte contre la Pauvreté
                        </option>
                        <option value="Ministère de la Ville">Ministère de la Ville</option>
                        <option value="Ministère des Affaires Étrangères">Ministère des Affaires Étrangères</option>
                        <option value="Ministère des Eaux et Forêt">Ministère des Eaux et Forêts</option>
                        <option value="Ministère des Mines et de la Géologie">Ministère des Mines et de la Géologie
                        </option>
                        <option value="Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi">
                            Ministère des Petites et Moyennes Entreprises et de la Promotion de l'Emploi</option>
                        <option value="Ministère des Sports">Ministère des Sports</option>
                        <option value="Ministère du Commerce, de l'Industrie et de la Promotion des PME">Ministère du
                            Commerce, de l'Industrie et de la Promotion des PME</option>
                        <option value="Ministère du Pétrole, de l'Énergie et des Énergies Renouvelables">Ministère du
                            Pétrole, de l'Énergie et des Énergies Renouvelables</option>
                        <option value="Ministère du Plan et du Développement">Ministère du Plan et du Développement
                        </option>
                        <option value="Ministère du Tourisme et des Loisirs">Ministère du Tourisme et des Loisirs
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="person-service" class="form-label">Service / Direc􀆟on</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Service_Etablissement" wire:model="Service_Etablissement" name="Service_Etablissement"
                        required>
                    @error('Service')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Secteur_activite" class="form-label">Secteur d’activité</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Secteur_activite" wire:model="Secteur_activite" name="Secteur_activite"
                        required>
                    @error('Secteur_activite')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Adresse" class="form-label">Adresse</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Adresse" wire:model="Adresse" name="Adresse"
                        required>
                    @error('Adresse')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Mail" class="form-label">Mail</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Mail" wire:model="Mail" name="Mail"
                        required>
                    @error('Mail')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Ville" class="form-label">Ville</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Ville" wire:model="Ville" name="Ville"
                        required>
                    @error('Ville')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Quartier" class="form-label">Quartier</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Quartier" wire:model="Quartier" name="Quartier"
                        required>
                    @error('Quartier')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="type_batiment" class="form-label">Type de batimment</label>
                    <select id="type_batiment" name="type_batiment" wire:model="type_batiment" class="form-select">
                        <option value="Immeuble">Immeuble</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Villabasse">Villabasse</option>
                        <option value="Maison en bande">Maison en bande</option>
                        <option value="Magasin">Magasin</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="Standing" class="form-label">Standing</label>
                    <select id="Standing" name="Standing" wire:model="Standing" class="form-select">
                        <option value="Haut">Haut</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Modéré">Modéré</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="ILot" class="form-label">ILot</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="ILot" wire:model="ILot" name="ILot"
                        required>
                    @error('ILot')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Lot" class="form-label">Lot</label>
                    <input type="text" style="text-transform: uppercase" class="form-control"
                        id="Lot" wire:model="Lot" name="Lot"
                        required>
                    @error('Lot')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Usage" class="form-label">Usage</label>
                    <select id="Usage" name="Usage" wire:model="Usage" class="form-select">
                        <option value="Bureau">Bureau</option>
                        <option value="Habita􀆟on">Habita􀆟on</option>
                        <option value="Autres">Autres</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="date_occupation" class="form-label">Date d’occupa􀆟on</label>
                    <input type="date" class="form-control" id="date_occupation" wire:model="date_occupation"
                        name="date_occupation" required>
                    @error('date_occupation')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
               
                @endif
                
            </div> 
        </div>
    @endif
    @if ($curentStep == 2)
        <div class="step join-file">
            <h3>Joindre des fichiers</h3>
            <input type="hidden" name="personel_id" id="personel-id">
            <div class="row g-3">
                <div class="mb-3 col-md-6">
                    <label for="appointment-decision" class="form-label">Décision de nomination</label>
                    <input class="form-control" type="file" name="Décision_de_nomination"
                        wire:model="Décision_de_nomination" id="Décision_de_nomination"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Décision_de_nomination')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="assignment-decision" class="form-label">Décision d'affectation ou page
                        fonctionnaire</label>
                    <input class="form-control" type="file" name="Décision_affectation"
                        wire:model="Décision_affectation" id="Décision_affectation"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Décision_affectation')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="service-certificate" class="form-label">Certificat de 1ère prise de service</label>
                    <input class="form-control" type="file" name="Certificat_de_1ère_prise_de_service"
                        wire:model="Certificat_de_1ère_prise_de_service" id="Certificat_de_1ère_prise_de_service"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Certificat_de_1ère_prise_de_service')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="before-appointment" class="form-label">Bulletin de solde avant nomination</label>
                    <input class="form-control" type="file" name="Bulletin_de_solde_avant_nomination"
                        wire:model="Bulletin_de_solde_avant_nomination" id="Bulletin_de_solde_avant_nomination"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Bulletin_de_solde_avant_nomination')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="after-appointment" class="form-label">Bulletin de solde après nommination</label>
                    <input class="form-control" type="file" name="Bulletin_de_solde_après_nommination"
                        wire:model="Bulletin_de_solde_après_nommination" id="Bulletin_de_solde_après_nommination"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Bulletin_de_solde_après_nommination')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nonaccommodation-certificate" class="form-label">Certificat de non hébergement</label>
                    <input class="form-control" type="file" name="Certificat_de_non_hébergement"
                        wire:model="Certificat_de_non_hébergement" id="Certificat_de_non_hébergement"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Certificat_de_non_hébergement')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="sworn-statement" class="form-label">Attestation sur l'honneur légalisée</label>
                    <input class="form-control" type="file" name="Attestation_sur_honneur_légalisée"
                        wire:model="Attestation_sur_honneur_légalisée" id="Attestation_sur_honneur_légalisée"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Attestation_sur_honneur_légalisée')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="residence-certificate" class="form-label">certificat de résidence</label>
                    <input class="form-control" type="file" name="certificat_de_résidence"
                        id="certificat_de_résidence" wire:model="certificat_de_résidence"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('certificat_de_résidence')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="identity-document" class="form-label">Pièce d'identité</label>
                    <input class="form-control" type="file" name="Pièce_identité" id="Pièce_identité"
                        wire:model="Pièce_identité" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Pièce_identité')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="marriage-certificate" class="form-label">Acte de mariage</label>
                    <input class="form-control" type="file" name="Acte_de_mariage" id="Acte_de_mariage"
                        wire:model="Acte_de_mariage" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" required>
                    @error('Acte_de_mariage')
                        <span class="text-danger fs-7">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif
    @if ($displayerrors)
        <div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errormessage }} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($curentStep == 3)
        <div class="step paiement">
            <div class="finmargin d-flex justify-content-center">
                <input type="hidden" name="personel_id" id="personel-Id">
                <div class="row g-3">
                    <h3 class="mt-4">paiement</h3>
                    <input type="hidden" name="personel_id" id="personel-idpaiment">
                    <div class="mt-3 mb-3 col-md-6">
                        <div class="">
                            <label for="nom_paiment" class="form-label">Votre Nom</label>
                            <input type="text" class="form-control" name="nom_paiment" wire:model="nom_paiment"
                                id="nom_paiment" required>
                            @error('nom_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 mb-3 col-md-6">
                        <div class="">
                            <label for="prenom_paiment" class="form-label">Votre Prénom</label>
                            <input type="text" class="form-control" name="prenom_paiment"
                                wire:model="prenom_paiment" id="prenom_paiment" required>
                            @error('prenom_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <div class="">
                            <label for="telephone_paiment" class="form-label">N° de téléphone</label>
                            <input type="text" class="form-control" name="telephone_paiment"
                                wire:model="telephone_paiment" id="telephone_paiment" required>
                            @error('telephone_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <div class="">
                            <label for="credential_paiment" class="form-label">ID d'identification</label>
                            <input type="text" class="form-control" name="credential_paiment"
                                wire:model="credential_paiment" id="credential_paiment" required>
                            @error('credential_paiment')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <div class="">
                            <label for="nature_paiment" class="form-label">Nature de recette</label>
                            <input type="text" class="form-control" name="nature_recette"
                                wire:model="nature_recette" id="nature_recette" required>
                            @error('nature_recette')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <div class="">
                            <label for="numéro_avis_de_recette" class="form-label">Le numéro de l’avis de
                                recette</label>
                            <input type="text" class="form-control" name="numéro_avis_de_recette"
                                wire:model="numéro_avis_de_recette" id="numéro_avis_de_recette" required>
                            @error('numéro_avis_de_recette')
                                <span class="text-danger fs-7">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <div class="">
                            <label for="payment_total" class="form-label">Le montant total</label>
                            <input type="number" class="form-control" name="montant_total"
                                wire:model="montant_total" id="montant_total" required>
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
        @if ($curentStep == 1)
            <div></div>
        @endif
        @if ($curentStep == 2 || $curentStep == 3)
            <button style="background-color:rgb(231,123,32);color:white" class="btn" type="button"
                wire:click="decreseStep()">Précédent</button>
        @endif
        @if ($curentStep == 1 || $curentStep == 2)
            <button style="background-color:green;color:white" class="btn" type="buttton"
                wire:click="increseStep()">Suivant</button>
        @endif
        @if ($curentStep == 3)
            <button style="background-color:green;color:white" type="button" class="btn"
                wire:click="storeInfo()">
                <div class="d-flex justify-content-center items-center  align-items-center">
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
