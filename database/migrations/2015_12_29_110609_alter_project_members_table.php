<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_members', function (Blueprint $table) {
            $table->dropForeign('project_members_user_id_foreign');
            $table->dropColumn('user_id');

            $table->integer('member_id')->unsigned()->after('project_id');
            $table->foreign('member_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement("SET foreign_key_checks = 0");

        Schema::table('project_members', function (Blueprint $table) {
//            $table->dropForeign('project_members_user_id_foreign');
//            $table->dropColumn('user_id');
        });

         //DB::statement("SET foreign_key_checks = 1");
    }
}
