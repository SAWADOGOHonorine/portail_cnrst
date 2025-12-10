<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {

            $columns = DB::select("SHOW COLUMNS FROM `fiches`");
            $nullableColumns = collect($columns)
                ->filter(fn($col) => $col->Null === 'NO') // Non nullable
                ->pluck('Field')
                ->toArray();

            $columnsToMakeNullable = [
                'record_type',
                'titre',
                'resume',
                'auteurs',
                'annee',
                'discipline',
                'thematique',
                'mots_cles',
                'source',
                'url',
                'content',
            ];

            foreach ($columnsToMakeNullable as $col) {
                if (in_array($col, $nullableColumns)) {
                    $table->string($col)->nullable()->change(); // pour text -> text()
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $columns = DB::select("SHOW COLUMNS FROM `fiches`");
            $nullableColumns = collect($columns)
                ->filter(fn($col) => $col->Null === 'YES') // nullable
                ->pluck('Field')
                ->toArray();

            $columnsToMakeNotNullable = [
                'record_type',
                'titre',
                'resume',
                'auteurs',
                'annee',
                'discipline',
                'thematique',
                'mots_cles',
                'source',
                'url',
                'content',
            ];

            foreach ($columnsToMakeNotNullable as $col) {
                if (in_array($col, $nullableColumns)) {
                    $table->string($col)->nullable(false)->change();
                }
            }
        });
    }
};
