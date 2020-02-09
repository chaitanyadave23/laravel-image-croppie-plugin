<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhnoToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {\
                    
            $table->string('phno')->after('email_verified_at')->nullable();
            $table->string('address')->after('phno')->nullable();
            $table->string('city')->after('address');
            $table->string('state')->after('city');
            $table->string('zip')->after('state');

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
            $table->dropcolumn('phno');
            $table->dropcolumn('address');
            $table->dropcolumn('city');
            $table->dropcolumn('state');
            $table->dropcolumn('zip');

        });
    }
}
