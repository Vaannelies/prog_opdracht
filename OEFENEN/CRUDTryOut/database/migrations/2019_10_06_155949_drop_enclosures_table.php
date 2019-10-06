<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropEnclosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  

      

        Schema::table('species', function (Blueprint $table) {
            $table->string('enclosure_name');
            $table->string('area');
            $table->dropForeign(['enclosure_id']);
            $table->dropColumn('enclosure_id');
        });

        Schema::dropIfExists('enclosures');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
