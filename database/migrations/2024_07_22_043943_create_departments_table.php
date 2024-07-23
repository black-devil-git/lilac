<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert default data
        DB::table('departments')->insert([
            ['name' => 'HR', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
