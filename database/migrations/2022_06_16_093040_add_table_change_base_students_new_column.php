<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableChangeBaseStudentsNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base_students', function (Blueprint $table) {
            $table->string('citizenship')->nullable()->after('group');
            $table->string('PNFL')->nullable()->after('citizenship');
            $table->string('INN')->nullable()->after('PNFL');
            $table->date('birthday')->nullable()->after('INN');
            $table->string('place_birthday')->nullable()->after('birthday');
            $table->string('year_start')->nullable()->after('place_birthday');
            $table->string('year_finish')->nullable()->after('year_start');
            $table->string('n_contract')->nullable()->after('year_finish');
            $table->char('sex')->nullable()->after('n_contract');
            $table->string('family_status')->nullable()->after('sex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base_students', function (Blueprint $table) {
            $table->dropColumn('citizenship');
            $table->dropColumn('PNFL');
            $table->dropColumn('INN');
            $table->dropColumn('birthday');
            $table->dropColumn('place_birthday');
            $table->dropColumn('year_start');
            $table->dropColumn('year_finish');
            $table->dropColumn('n_contract');
            $table->dropColumn('sex');
            $table->dropColumn('family_status');
        });
    }
}
