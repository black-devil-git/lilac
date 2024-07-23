<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDesignationsTable extends Migration
{
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert default data
        DB::table('designations')->insert([
            ['name' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analyst', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('designations');
    }
}