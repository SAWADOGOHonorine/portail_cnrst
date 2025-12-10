<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            if (!Schema::hasColumn('cv', 'nom')) {
                $table->string('nom')->after('user_id');
            }
            if (!Schema::hasColumn('cv', 'prenom')) {
                $table->string('prenom')->after('nom');
            }
            if (!Schema::hasColumn('cv', 'email')) {
                $table->string('email')->after('prenom');
            }
            if (!Schema::hasColumn('cv', 'telephone')) {
                $table->string('telephone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('cv', 'whatsapp')) {
                $table->string('whatsapp')->nullable()->after('telephone');
            }
            if (!Schema::hasColumn('cv', 'adresse')) {
                $table->string('adresse')->nullable()->after('whatsapp');
            }
            if (!Schema::hasColumn('cv', 'ville')) {
                $table->string('ville')->nullable()->after('adresse');
            }
            if (!Schema::hasColumn('cv', 'pays')) {
                $table->string('pays')->nullable()->after('ville');
            }
            if (!Schema::hasColumn('cv', 'institut')) {
                $table->string('institut')->nullable()->after('pays');
            }
            if (!Schema::hasColumn('cv', 'departement')) {
                $table->string('departement')->nullable()->after('institut');
            }
            if (!Schema::hasColumn('cv', 'specialite')) {
                $table->string('specialite')->nullable()->after('departement');
            }
            if (!Schema::hasColumn('cv', 'domaine')) {
                $table->string('domaine')->nullable()->after('specialite');
            }
            if (!Schema::hasColumn('cv', 'mot_cle')) {
                $table->string('mot_cle')->nullable()->after('domaine');
            }
            if (!Schema::hasColumn('cv', 'date_naissance')) {
                $table->date('date_naissance')->nullable()->after('mot_cle');
            }
            if (!Schema::hasColumn('cv', 'lieu_naissance')) {
                $table->string('lieu_naissance')->nullable()->after('date_naissance');
            }
            if (!Schema::hasColumn('cv', 'detaille_scientifique')) {
                $table->text('detaille_scientifique')->nullable()->after('lieu_naissance');
            }
            if (!Schema::hasColumn('cv', 'projet_recherche')) {
                $table->text('projet_recherche')->nullable()->after('detaille_scientifique');
            }
            if (!Schema::hasColumn('cv', 'genre')) {
                $table->enum('genre', ['homme','femme','autre'])->nullable()->after('projet_recherche');
            }
            if (!Schema::hasColumn('cv', 'thematique_recherche')) {
                $table->string('thematique_recherche')->nullable()->after('genre');
            }
            if (!Schema::hasColumn('cv', 'cv_path')) {
                $table->string('cv_path')->nullable()->after('thematique_recherche');
            }
        });
    }

    public function down(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            $columns = [
                'nom', 'prenom', 'email', 'telephone', 'whatsapp', 'adresse', 'ville', 'pays',
                'institut', 'departement', 'specialite', 'domaine', 'mot_cle', 'date_naissance',
                'lieu_naissance', 'detaille_scientifique', 'projet_recherche', 'genre',
                'thematique_recherche', 'cv_path'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('cv', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
