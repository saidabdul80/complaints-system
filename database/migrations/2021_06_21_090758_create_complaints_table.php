<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaints_ID')->unique();
            $table->string('email');
            $table->string('fname');
            $table->string('matric_number');
            $table->string('title');
            $table->string('complaints',1000);
            $table->string('date_time');            
            $table->enum('is_read', ['1', '0'])->default('0');
            $table->enum('is_resolved', ['1', '0'])->default('0');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
