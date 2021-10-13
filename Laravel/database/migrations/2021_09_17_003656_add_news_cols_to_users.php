<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class AddNewsColsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('fecha_nacimiento');
            $table->string('genero')->default(3);
            
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_post')->default(true);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('genero');
            
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_post');
        });
       
    }
}
