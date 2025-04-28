<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineeringCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('engineering_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable(); // صورة واحدة كـ string
            $table->json('services')->nullable();
            $table->json('projects')->nullable();
            $table->json('certifications')->nullable();
            $table->json('team')->nullable();
            $table->integer('years_experience')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('engineering_companies');
    }
}