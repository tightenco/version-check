<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLastSyncedAtColumnFromProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('last_synced_at');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->timestamp('last_synced_at')
                ->nullable()
                ->after('ignored');
        });
    }
}
