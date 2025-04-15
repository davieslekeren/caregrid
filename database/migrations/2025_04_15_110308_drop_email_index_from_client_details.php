<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('client_details', function (Blueprint $table) {
            $table->string('branch_name')->nullable()->after('company');
            $table->string('branch_email')->nullable()->after('branch_name');
            $table->string('branch_phone')->nullable()->after('branch_email');

            $keys = collect(DB::select("SHOW INDEXES FROM client_details"))->pluck('Key_name');

            if ($keys->contains('client_details_email_unique')) {
                $table->dropUnique('client_details_email_unique');
            }

            if ($keys->contains('users_email_unique')) {
                $table->dropUnique('users_email_unique');
            }
        });

        Schema::table('users', function (Blueprint $table) {            
            $keys = collect(DB::select("SHOW INDEXES FROM users"))->pluck('Key_name');

            if ($keys->contains('users_email_unique')) {
                $table->dropUnique('users_email_unique');
            }
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_details', function (Blueprint $table) {
            //
        });
    }
};
