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
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        $cities = [
            "Abidjan",
            "Bouaké",
            "Yamoussoukro",
            "Daloa",
            "San Pedro",
            "Korhogo",
            "Man",
            "Divo",
            "Gagnoa",
            "Abengourou",
            "Anyama",
            "Agboville",
            "Séguéla",
            "Odienné",
            "Toumodi",
            "Ferkessédougou",
            "Issia",
            "Sassandra",
            "Boundiali",
            "Grand-Bassam",
            "Dabou",
            "Dimbokro",
            "Aboisso",
            "Bingerville",
            "Duekoué",
            "Adzopé",
            "Guiglo",
            "Touba",
            "Sinfra",
            "Tengrela",
            "Vavoua",
            "Katiola",
            "Tiassalé",
            "Akoupé",
            "Daoukro",
            "Sakassou",
            "Bouaflé",
            "Sinématiali",
            "Jacqueville",
            "Bouna",
            "Oumé",
            "Bongouanou",
            "Séguélon",
            "Taabo",
            "Bonoua",
            "Bangolo",
            "Tanda",
            "Biankouma",
            "Zuénoula",
            "Lakota",
            "Fresco",
            "Ayamé",
            "Issia",
            "Mankono",
            "Soubre",
            "Tabou",
            "Bondoukou",
            "Agnibilékrou",
            "Jacqueville",
            "Akoupé",
            "Béoumi",
            "Béoumi",
            "Duekoué",
            "Tengrela",
            "Bouaké",
            "Toumodi",
            "Korhogo",
            "Man",
            "Divo",
            "Gagnoa",
            "San Pedro",
            "Bouna",
            "Zuénoula",
            "Ferkessédougou",
            "Boundiali",
            "Odienné",
            "Katiola",
            "Grand-Bassam",
            "Sassandra",
            "Dabou",
            "Dimbokro",
            "Aboisso",
            "Bingerville",
            "Adzopé",
            "Séguéla",
            "Touba",
            "Guiglo",
            "Sinfra",
            "Tanda",
            "Vavoua",
            "Bouaflé",
            "Sinématiali",
            "Taabo",
            "Bongouanou",
            "Bonoua",
            "Oumé",
            "Sakassou",
            "Bangolo",
            "Biankouma",
            "Zuénoula",
            "Lakota",
            "Fresco",
            "Ayamé",
            "Issia",
            "Mankono",
            "Soubre",
            "Tabou",
            "Bondoukou",
            "Agnibilékrou"
        ];
    
        foreach ($cities as $city) {
            DB::table('villes')->insert([
                'nom' => $city,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
};
