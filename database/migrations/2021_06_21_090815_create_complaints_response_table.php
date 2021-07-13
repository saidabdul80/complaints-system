<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints_response', function (Blueprint $table) {
            $table->id();
            $table->string('complaints_ID');            
            $table->string('response');
            $table->string('date_time');            
            $table->enum('is_user', ['1', '0'])->default('0');                        
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
        Schema::dropIfExists('complaints_response');
    }
}
