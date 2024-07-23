<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('fk_department')->constrained('departments');
            $table->foreignId('fk_designation')->constrained('designations');
            $table->string('phone_number');
            $table->timestamps();
        });

        // Insert default data
        DB::table('users')->insert([
            ['name' => 'John Doe', 'fk_department' => 1, 'fk_designation' => 1, 'phone_number' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jane Smith', 'fk_department' => 2, 'fk_designation' => 2, 'phone_number' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
