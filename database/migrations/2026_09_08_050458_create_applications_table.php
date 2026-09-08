<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->id();

            // Application Identification
            $table->string('application_no')->unique();

            // Personal Information
            $table->string('nid', 17);
            $table->date('date_of_birth');

            $table->string('name_english');
            $table->string('name_bangla');

            $table->string('father_name_english');
            $table->string('father_name_bangla');

            $table->string('mother_name_english');
            $table->string('mother_name_bangla');

            $table->string('gender');
            $table->string('marital_status');

            $table->string('spouse_name_english')->nullable();
            $table->string('spouse_name_bangla')->nullable();

            $table->string('occupation');
            $table->string('blood_group', 5);

            // Present Address
            $table->string('present_village');
            $table->string('present_road')->nullable();
            $table->string('present_division');
            $table->string('present_district');
            $table->string('present_thana');
            $table->string('present_post_code', 4);

            // Permanent Address
            $table->string('permanent_village');
            $table->string('permanent_road')->nullable();
            $table->string('permanent_division');
            $table->string('permanent_district');
            $table->string('permanent_thana');
            $table->string('permanent_post_code', 4);

            // Citizenship
            $table->string('nationality');
            $table->string('has_other_citizenship');
            $table->string('other_citizenship')->nullable();

            // Applicant Contact
            $table->string('phone_residence')->nullable();
            $table->string('mobile', 20);
            $table->string('phone_office')->nullable();
            $table->string('email');

            // Emergency Contact
            $table->string('emergency_name');
            $table->string('emergency_relationship');
            $table->string('emergency_mobile', 20);
            $table->string('emergency_email')->nullable();

            // Licensing & Examination
            $table->string('license_type');
            $table->string('instructor_license_no');
            $table->string('exam_venue');

            // Multiple Vehicle Classes
            $table->json('vehicle_class');

            // Attachments
            $table->string('applicant_photo');
            $table->string('nid_document');
            $table->string('medical_certificate')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};