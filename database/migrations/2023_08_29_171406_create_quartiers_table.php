<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\models\Quartier;
use App\models\Ville;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quartiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->timestamps();
        });
        $villes = DB::table('villes')->get();

        foreach ($villes as $ville) {
            $quartiers = $this->getQuartiersForVille($ville->nom);

            foreach ($quartiers as $quartier) {
                Quartier::create([
                    'nom' => $quartier,
                    'ville_id' => $ville->id,
                ]);
            }
        }
    }

    protected function getQuartiersForVille($villeNom)
    {
        $quartiersParVille = [        
            
            
            
            
            "Abidjan" => ["Attécoubé","Koumassi","Yopougon", "Cocody", "Treichville", "Adjamé", "Port-Bouët", "Abobo","Plateau"],  

            "Bouaké" => ["Samapleu", "Nord", "Centre", "Sicogi"],

            "Bouaflé" => ["Bouaflé Centre","Bouaflé Nord","Bouaflé Sud","Dépotoir"],
            
            "Yamoussoukro" => ["Riviera", "Centre-Ville", "Attiécoubé"],

            "Daloa" => ["Daloa Centre", "Daloa Nord", "Daloa Sud", "Bagohouo"],

            "San Pedro" => ["Plage", "Port", "Riviera", "Croix Rouge"],

            "Korhogo" => ["Korhogo Centre", "Korhogo Nord", "Korhogo Sud", "Karakoro"],

            "Man" => ["Man Centre", "Man Nord", "Man Sud", "Man Ouest"],

            "Gagnoa" => ["Centre-ville", "Résidence", "Plateau 1", "Plateau 2"],

            "Abengourou" => ["Centre-ville", "Résidentiel", "Marché", "Gare routière"],

            "Anyama" => ["Centre-ville", "Zone industrielle", "Quartier des fonctionnaires", "Résidentiel"],

            "Agboville" => ["Centre-ville", "Quartier administratif", "Quartier dortoir", "Marché central"],

            "Séguéla" => ["Centre-ville", "Quartier peulh", "Quartier bobo", "Quartier de la gare"],
        ];
    
        return $quartiersParVille[$villeNom] ?? [];
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quartiers');
    }
};
