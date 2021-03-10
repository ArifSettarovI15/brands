<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_vendors', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id('vendor_id');
            $table->boolean('vendor_pop')->default(0)->index();
            $table->boolean('vendor_new')->default(0)->index();
            $table->boolean('vendor_minus')->default(0)->index();
            $table->boolean('vendor_status')->default(0)->index();
            $table->char('vendor_name', 150)->index();
            $table->char('vendor_url', 150)->index();
            $table->tinyInteger('vendor_icon', false, true)->default(0)->index();
            $table->tinyInteger('vendor_bg', false, true)->default(0)->index();
            $table->char('vendor_meta_title', 255)->default('');
            $table->char('vendor_meta_keywords', 255)->default('');
            $table->char('vendor_meta_desc', 255)->default('');
            $table->tinyInteger('vendor_text_id', false, true)->default(0)->index();
            $table->char('vendor_letter', 1)->index();
            $table->char('vendor_alias', 255)->default('');
        });
    }
}

