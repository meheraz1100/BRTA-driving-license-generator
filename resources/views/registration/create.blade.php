<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Learner License Application</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 ">

    <div class="max-w-5xl mx-auto px-4 py-8">

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Learner License Application
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Please provide your information below.
            </p>

        </div>

    </div>
    <form
    action="{{ route('register.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="mt-6"
>
    @csrf

    <!-- Form fields will come here -->


    <!-- SECTION A: Personal Information -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">
                A. Personal Information
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Provide your basic personal information.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


            <!-- NID -->
            <div>
                <label for="nid" class="block text-sm font-medium text-gray-700 mb-1">
                    National Identity No
                </label>

                <input
                    type="text"
                    id="nid"
                    name="nid"
                    value="{{ old('nid') }}"
                    placeholder="Enter NID number"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('nid')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Date of Birth -->
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">
                    Date of Birth
                </label>

                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    value="{{ old('date_of_birth') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('date_of_birth')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Name English -->
            <div>
                <label for="name_english" class="block text-sm font-medium text-gray-700 mb-1">
                    Name (English)
                </label>

                <input
                    type="text"
                    id="name_english"
                    name="name_english"
                    value="{{ old('name_english') }}"
                    placeholder="Enter your name"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('name_english')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Name Bangla -->
            <div>
                <label for="name_bangla" class="block text-sm font-medium text-gray-700 mb-1">
                    নাম (বাংলা)
                </label>

                <input
                    type="text"
                    id="name_bangla"
                    name="name_bangla"
                    value="{{ old('name_bangla') }}"
                    placeholder="আপনার নাম লিখুন"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('name_bangla')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Father's Name English -->
            <div>
                <label for="father_name_english" class="block text-sm font-medium text-gray-700 mb-1">
                    Father's Name (English)
                </label>

                <input
                    type="text"
                    id="father_name_english"
                    name="father_name_english"
                    value="{{ old('father_name_english') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('father_name_english')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Father's Name Bangla -->
            <div>
                <label for="father_name_bangla" class="block text-sm font-medium text-gray-700 mb-1">
                    Father's Name (Bangla)
                </label>

                <input
                    type="text"
                    id="father_name_bangla"
                    name="father_name_bangla"
                    value="{{ old('father_name_bangla') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('father_name_bangla')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Mother's Name English -->
            <div>
                <label for="mother_name_english" class="block text-sm font-medium text-gray-700 mb-1">
                    Mother's Name (English)
                </label>

                <input
                    type="text"
                    id="mother_name_english"
                    name="mother_name_english"
                    value="{{ old('mother_name_english') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('mother_name_english')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Mother's Name Bangla -->
            <div>
                <label for="mother_name_bangla" class="block text-sm font-medium text-gray-700 mb-1">
                    Mother's Name (Bangla)
                </label>

                <input
                    type="text"
                    id="mother_name_bangla"
                    name="mother_name_bangla"
                    value="{{ old('mother_name_bangla') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('mother_name_bangla')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Gender
                </label>

                <div class="flex items-center gap-5">

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="male"
                            {{ old('gender') === 'male' ? 'checked' : '' }}
                        >
                        <span>Male</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="female"
                            {{ old('gender') === 'female' ? 'checked' : '' }}
                        >
                        <span>Female</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="other"
                            {{ old('gender') === 'other' ? 'checked' : '' }}
                        >
                        <span>Other</span>
                    </label>

                </div>

                @error('gender')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Marital Status -->
            <div>
                <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-1">
                    Marital Status
                </label>

                <select
                    id="marital_status"
                    name="marital_status"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="single"
                        {{ old('marital_status') === 'single' ? 'selected' : '' }}>
                        Single
                    </option>

                    <option value="married"
                        {{ old('marital_status') === 'married' ? 'selected' : '' }}>
                        Married
                    </option>

                    <option value="divorced"
                        {{ old('marital_status') === 'divorced' ? 'selected' : '' }}>
                        Divorced
                    </option>

                    <option value="widowed"
                        {{ old('marital_status') === 'widowed' ? 'selected' : '' }}>
                        Widowed
                    </option>
                </select>

                @error('marital_status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Spouse Name English -->
            <div>
                <label for="spouse_name_english" class="block text-sm font-medium text-gray-700 mb-1">
                    Spouse Name (English)
                </label>

                <input
                    type="text"
                    id="spouse_name_english"
                    name="spouse_name_english"
                    value="{{ old('spouse_name_english') }}"
                    placeholder="Only required if married"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('spouse_name_english')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Spouse Name Bangla -->
            <div>
                <label for="spouse_name_bangla" class="block text-sm font-medium text-gray-700 mb-1">
                    Spouse Name (Bangla)
                </label>

                <input
                    type="text"
                    id="spouse_name_bangla"
                    name="spouse_name_bangla"
                    value="{{ old('spouse_name_bangla') }}"
                    placeholder="বিবাহিত হলে প্রযোজ্য"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('spouse_name_bangla')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Occupation -->
            <div>
                <label for="occupation" class="block text-sm font-medium text-gray-700 mb-1">
                    Occupation
                </label>

                <input
                    type="text"
                    id="occupation"
                    name="occupation"
                    value="{{ old('occupation') }}"
                    placeholder="e.g. Student"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('occupation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Blood Group -->
            <div>
                <label for="blood_group" class="block text-sm font-medium text-gray-700 mb-1">
                    Blood Group
                </label>

                <select
                    id="blood_group"
                    name="blood_group"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                        <option
                            value="{{ $group }}"
                            {{ old('blood_group') === $group ? 'selected' : '' }}
                        >
                            {{ $group }}
                        </option>
                    @endforeach
                </select>

                @error('blood_group')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

    </div>

    <!-- PRESENT ADDRESS -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">
                Present Address
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Enter your current residential address.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Village / House -->
            <div>
                <label
                    for="present_village"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Village / House
                </label>

                <input
                    type="text"
                    id="present_village"
                    name="present_village"
                    value="{{ old('present_village') }}"
                    placeholder="Village / House"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('present_village')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Road -->
            <div>
                <label
                    for="present_road"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Road / Block / Sector
                </label>

                <input
                    type="text"
                    id="present_road"
                    name="present_road"
                    value="{{ old('present_road') }}"
                    placeholder="Road / Block / Sector"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('present_road')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Division -->
            <div>
                <label
                    for="present_division"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Division
                </label>

                <select
                    id="present_division"
                    name="present_division"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="dhaka"
                        {{ old('present_division') === 'dhaka' ? 'selected' : '' }}>
                        Dhaka
                    </option>

                    <option value="chattogram"
                        {{ old('present_division') === 'chattogram' ? 'selected' : '' }}>
                        Chattogram
                    </option>

                    <option value="rajshahi"
                        {{ old('present_division') === 'rajshahi' ? 'selected' : '' }}>
                        Rajshahi
                    </option>

                    <option value="khulna"
                        {{ old('present_division') === 'khulna' ? 'selected' : '' }}>
                        Khulna
                    </option>

                    <option value="barishal"
                        {{ old('present_division') === 'barishal' ? 'selected' : '' }}>
                        Barishal
                    </option>

                    <option value="sylhet"
                        {{ old('present_division') === 'sylhet' ? 'selected' : '' }}>
                        Sylhet
                    </option>

                    <option value="rangpur"
                        {{ old('present_division') === 'rangpur' ? 'selected' : '' }}>
                        Rangpur
                    </option>

                    <option value="mymensingh"
                        {{ old('present_division') === 'mymensingh' ? 'selected' : '' }}>
                        Mymensingh
                    </option>

                </select>

                @error('present_division')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- District -->
            <div>
                <label
                    for="present_district"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    District
                </label>

                <select
                    id="present_district"
                    name="present_district"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="feni"
                        {{ old('present_district') === 'feni' ? 'selected' : '' }}>
                        Feni
                    </option>

                    <option value="cumilla"
                        {{ old('present_district') === 'cumilla' ? 'selected' : '' }}>
                        Cumilla
                    </option>

                    <option value="chattogram"
                        {{ old('present_district') === 'chattogram' ? 'selected' : '' }}>
                        Chattogram
                    </option>

                    <option value="dhaka"
                        {{ old('present_district') === 'dhaka' ? 'selected' : '' }}>
                        Dhaka
                    </option>

                </select>

                @error('present_district')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Thana -->
            <div>
                <label
                    for="present_thana"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Thana
                </label>

                <select
                    id="present_thana"
                    name="present_thana"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="feni_sadar"
                        {{ old('present_thana') === 'feni_sadar' ? 'selected' : '' }}>
                        Feni Sadar
                    </option>

                    <option value="sonagazi"
                        {{ old('present_thana') === 'sonagazi' ? 'selected' : '' }}>
                        Sonagazi
                    </option>

                    <option value="dagonbhuiyan"
                        {{ old('present_thana') === 'dagonbhuiyan' ? 'selected' : '' }}>
                        Dagonbhuiyan
                    </option>

                </select>

                @error('present_thana')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Post Code -->
            <div>
                <label
                    for="present_post_code"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Post Code
                </label>

                <input
                    type="text"
                    id="present_post_code"
                    name="present_post_code"
                    value="{{ old('present_post_code') }}"
                    placeholder="e.g. 3900"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('present_post_code')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

    </div>

    <!-- PERMANENT ADDRESS -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="flex items-center justify-between mb-5">

            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    Permanent Address
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Enter your permanent residential address.
                </p>
            </div>

            <!-- Same Address -->
            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">

                <input
                    type="checkbox"
                    id="same_address"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                >

                <span>Same as Present Address</span>

            </label>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Village / House -->
            <div>
                <label
                    for="permanent_village"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Village / House
                </label>

                <input
                    type="text"
                    id="permanent_village"
                    name="permanent_village"
                    value="{{ old('permanent_village') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('permanent_village')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Road -->
            <div>
                <label
                    for="permanent_road"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Road / Block / Sector
                </label>

                <input
                    type="text"
                    id="permanent_road"
                    name="permanent_road"
                    value="{{ old('permanent_road') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('permanent_road')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Division -->
            <div>
                <label
                    for="permanent_division"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Division
                </label>

                <select
                    id="permanent_division"
                    name="permanent_division"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="dhaka"
                        {{ old('permanent_division') === 'dhaka' ? 'selected' : '' }}>
                        Dhaka
                    </option>

                    <option value="chattogram"
                        {{ old('permanent_division') === 'chattogram' ? 'selected' : '' }}>
                        Chattogram
                    </option>

                    <option value="rajshahi"
                        {{ old('permanent_division') === 'rajshahi' ? 'selected' : '' }}>
                        Rajshahi
                    </option>

                    <option value="khulna"
                        {{ old('permanent_division') === 'khulna' ? 'selected' : '' }}>
                        Khulna
                    </option>

                    <option value="barishal"
                        {{ old('permanent_division') === 'barishal' ? 'selected' : '' }}>
                        Barishal
                    </option>

                    <option value="sylhet"
                        {{ old('permanent_division') === 'sylhet' ? 'selected' : '' }}>
                        Sylhet
                    </option>

                    <option value="rangpur"
                        {{ old('permanent_division') === 'rangpur' ? 'selected' : '' }}>
                        Rangpur
                    </option>

                    <option value="mymensingh"
                        {{ old('permanent_division') === 'mymensingh' ? 'selected' : '' }}>
                        Mymensingh
                    </option>

                </select>

                @error('permanent_division')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- District -->
            <div>
                <label
                    for="permanent_district"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    District
                </label>

                <select
                    id="permanent_district"
                    name="permanent_district"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="feni"
                        {{ old('permanent_district') === 'feni' ? 'selected' : '' }}>
                        Feni
                    </option>

                    <option value="cumilla"
                        {{ old('permanent_district') === 'cumilla' ? 'selected' : '' }}>
                        Cumilla
                    </option>

                    <option value="chattogram"
                        {{ old('permanent_district') === 'chattogram' ? 'selected' : '' }}>
                        Chattogram
                    </option>

                    <option value="dhaka"
                        {{ old('permanent_district') === 'dhaka' ? 'selected' : '' }}>
                        Dhaka
                    </option>

                </select>

                @error('permanent_district')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Thana -->
            <div>
                <label
                    for="permanent_thana"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Thana
                </label>

                <select
                    id="permanent_thana"
                    name="permanent_thana"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="feni_sadar"
                        {{ old('permanent_thana') === 'feni_sadar' ? 'selected' : '' }}>
                        Feni Sadar
                    </option>

                    <option value="sonagazi"
                        {{ old('permanent_thana') === 'sonagazi' ? 'selected' : '' }}>
                        Sonagazi
                    </option>

                    <option value="dagonbhuiyan"
                        {{ old('permanent_thana') === 'dagonbhuiyan' ? 'selected' : '' }}>
                        Dagonbhuiyan
                    </option>

                </select>

                @error('permanent_thana')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Post Code -->
            <div>
                <label
                    for="permanent_post_code"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Post Code
                </label>

                <input
                    type="text"
                    id="permanent_post_code"
                    name="permanent_post_code"
                    value="{{ old('permanent_post_code') }}"
                    placeholder="e.g. 3900"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('permanent_post_code')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

    </div>

    <!-- CITIZENSHIP -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">
                Citizenship
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Provide your citizenship information.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Nationality -->
            <div>
                <label
                    for="nationality"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Nationality
                </label>

                <select
                    id="nationality"
                    name="nationality"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option
                        value="bangladeshi"
                        {{ old('nationality', 'bangladeshi') === 'bangladeshi' ? 'selected' : '' }}
                    >
                        BANGLADESHI
                    </option>

                    <option value="indian"
                        {{ old('nationality') === 'indian' ? 'selected' : '' }}>
                        INDIAN
                    </option>

                    <option value="pakistani"
                        {{ old('nationality') === 'pakistani' ? 'selected' : '' }}>
                        PAKISTANI
                    </option>

                    <option value="nepali"
                        {{ old('nationality') === 'nepali' ? 'selected' : '' }}>
                        NEPALI
                    </option>

                    <option value="other"
                        {{ old('nationality') === 'other' ? 'selected' : '' }}>
                        OTHER
                    </option>
                </select>

                @error('nationality')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Other Citizenship -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Do you have other citizenship?
                </label>

                <div class="flex items-center gap-6">

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="has_other_citizenship"
                            value="no"
                            {{ old('has_other_citizenship', 'no') === 'no' ? 'checked' : '' }}
                        >

                        <span>No</span>
                    </label>


                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="has_other_citizenship"
                            value="yes"
                            {{ old('has_other_citizenship') === 'yes' ? 'checked' : '' }}
                        >

                        <span>Yes</span>
                    </label>

                </div>

                @error('has_other_citizenship')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Other Citizenship Name -->
            <div
                id="other_citizenship_wrapper"
                class="md:col-span-2 hidden"
            >
                <label
                    for="other_citizenship"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Other Citizenship
                </label>

                <input
                    type="text"
                    id="other_citizenship"
                    name="other_citizenship"
                    value="{{ old('other_citizenship') }}"
                    placeholder="Enter citizenship"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('other_citizenship')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

    </div>

    <!-- APPLICANT CONTACT -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">
                Applicant Contact Details
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Provide your contact information.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Residence Phone -->
            <div>
                <label
                    for="phone_residence"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Phone Number (Residence)
                </label>

                <input
                    type="text"
                    id="phone_residence"
                    name="phone_residence"
                    value="{{ old('phone_residence') }}"
                    placeholder="Optional"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('phone_residence')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Mobile -->
            <div>
                <label
                    for="mobile"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Mobile No <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="mobile"
                    name="mobile"
                    value="{{ old('mobile') }}"
                    placeholder="EX: 01XXXXXXXXX"
                    maxlength="11"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('mobile')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Office Phone -->
            <div>
                <label
                    for="phone_office"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Phone Number (Office)
                </label>

                <input
                    type="text"
                    id="phone_office"
                    name="phone_office"
                    value="{{ old('phone_office') }}"
                    placeholder="Optional"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('phone_office')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Email -->
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Email <span class="text-red-500">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="example@email.com"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

    </div>

    <!-- EMERGENCY CONTACT -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800">
                Emergency Contact Person
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Provide someone we can contact in an emergency.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Name -->
            <div>
                <label
                    for="emergency_name"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Name <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="emergency_name"
                    name="emergency_name"
                    value="{{ old('emergency_name') }}"
                    placeholder="Emergency contact name"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('emergency_name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Relationship -->
            <div>
                <label
                    for="emergency_relationship"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Relationship <span class="text-red-500">*</span>
                </label>

                <select
                    id="emergency_relationship"
                    name="emergency_relationship"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="">Please Select</option>

                    <option value="father"
                        {{ old('emergency_relationship') === 'father' ? 'selected' : '' }}>
                        Father
                    </option>

                    <option value="mother"
                        {{ old('emergency_relationship') === 'mother' ? 'selected' : '' }}>
                        Mother
                    </option>

                    <option value="brother"
                        {{ old('emergency_relationship') === 'brother' ? 'selected' : '' }}>
                        Brother
                    </option>

                    <option value="sister"
                        {{ old('emergency_relationship') === 'sister' ? 'selected' : '' }}>
                        Sister
                    </option>

                    <option value="spouse"
                        {{ old('emergency_relationship') === 'spouse' ? 'selected' : '' }}>
                        Spouse
                    </option>

                    <option value="guardian"
                        {{ old('emergency_relationship') === 'guardian' ? 'selected' : '' }}>
                        Guardian
                    </option>

                    <option value="other"
                        {{ old('emergency_relationship') === 'other' ? 'selected' : '' }}>
                        Other
                    </option>
                </select>

                @error('emergency_relationship')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Mobile -->
            <div>
                <label
                    for="emergency_mobile"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Mobile No <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="emergency_mobile"
                    name="emergency_mobile"
                    value="{{ old('emergency_mobile') }}"
                    placeholder="EX: 01XXXXXXXXX"
                    maxlength="11"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('emergency_mobile')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <!-- Email -->
            <div>
                <label
                    for="emergency_email"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="emergency_email"
                    name="emergency_email"
                    value="{{ old('emergency_email') }}"
                    placeholder="Optional"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('emergency_email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

    </div>

    <!-- Licensing & Examination Details -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <h2 class="text-lg font-semibold text-gray-800 mb-5">
            Licensing & Examination Details
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Driving License Type -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Driving License Type
                    <span class="text-red-500">*</span>
                </label>

                <div class="flex flex-wrap gap-6">

                    <label class="flex items-center gap-2 cursor-pointer">

                        <input
                            type="radio"
                            name="license_type"
                            value="non_professional"
                            class="text-blue-600 focus:ring-blue-500"
                            {{ old('license_type') === 'non_professional' ? 'checked' : '' }}
                        >

                        <span class="text-sm text-gray-700">
                            Non-Professional
                        </span>

                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">

                        <input
                            type="radio"
                            name="license_type"
                            value="professional"
                            class="text-blue-600 focus:ring-blue-500"
                            {{ old('license_type') === 'professional' ? 'checked' : '' }}
                        >

                        <span class="text-sm text-gray-700">
                            Professional
                        </span>

                    </label>

                </div>

                @error('license_type')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Instructor's Driving License No -->
            <div>

                <label
                    for="instructor_license_no"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Instructor's Driving License No
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="instructor_license_no"
                    id="instructor_license_no"
                    value="{{ old('instructor_license_no') }}"
                    placeholder="Enter instructor license number"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('instructor_license_no')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Exam Venue -->
            <div>

                <label
                    for="exam_venue"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Exam Venue
                    <span class="text-red-500">*</span>
                </label>

                <select
                    name="exam_venue"
                    id="exam_venue"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        Select Present Thana To Get Exam
                    </option>

                    <option
                        value="Feni Sadar"
                        {{ old('exam_venue') === 'Feni Sadar' ? 'selected' : '' }}
                    >
                        Feni Sadar
                    </option>

                    <option
                        value="Sonagazi"
                        {{ old('exam_venue') === 'Sonagazi' ? 'selected' : '' }}
                    >
                        Sonagazi
                    </option>

                    <option
                        value="Dagonbhuiyan"
                        {{ old('exam_venue') === 'Dagonbhuiyan' ? 'selected' : '' }}
                    >
                        Dagonbhuiyan
                    </option>

                </select>

                <p class="mt-1 text-xs text-gray-500">
                    Exam venue will depend on the applicant's present thana.
                </p>

                @error('exam_venue')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Vehicle Class -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Vehicle Class
                    <span class="text-red-500">*</span>
                </label>

                <div class="flex flex-wrap gap-6">

                    <!-- Motorcycle -->
                    <label class="flex items-center gap-2 cursor-pointer">

                        <input
                            type="checkbox"
                            name="vehicle_class[]"
                            value="motorcycle"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            {{ in_array('motorcycle', old('vehicle_class', [])) ? 'checked' : '' }}
                        >

                        <span class="text-sm text-gray-700">
                            MOTORCYCLE
                        </span>

                    </label>


                    <!-- Light -->
                    <label class="flex items-center gap-2 cursor-pointer">

                        <input
                            type="checkbox"
                            name="vehicle_class[]"
                            value="light"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            {{ in_array('light', old('vehicle_class', [])) ? 'checked' : '' }}
                        >

                        <span class="text-sm text-gray-700">
                            LIGHT
                        </span>

                    </label>

                </div>

                @error('vehicle_class')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                @error('vehicle_class.*')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>

    <!-- Attachments -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <h2 class="text-lg font-semibold text-gray-800 mb-5">
            Attachments
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Applicant Photo -->
            <div>

                <label
                    for="applicant_photo"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Applicant Photo
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="file"
                    name="applicant_photo"
                    id="applicant_photo"
                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                        file:mr-4 file:rounded-md file:border-0
                        file:bg-blue-50 file:px-3 file:py-1.5
                        file:text-sm file:font-medium file:text-blue-700"
                >

                <p class="mt-1 text-xs text-gray-500">
                    JPG, JPEG or PNG — Maximum 2 MB
                </p>

                @error('applicant_photo')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                <!-- Photo Preview -->
                <div id="photo_preview_wrapper" class="hidden mt-3">

                    <img
                        id="photo_preview"
                        src=""
                        alt="Photo Preview"
                        class="w-28 h-28 object-cover rounded-lg border border-gray-200"
                    >

                </div>

            </div>


            <!-- NID Document -->
            <div>

                <label
                    for="nid_document"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    NID / Identity Document
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="file"
                    name="nid_document"
                    id="nid_document"
                    accept=".jpg,.jpeg,.png,.pdf"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                        file:mr-4 file:rounded-md file:border-0
                        file:bg-blue-50 file:px-3 file:py-1.5
                        file:text-sm file:font-medium file:text-blue-700"
                >

                <p class="mt-1 text-xs text-gray-500">
                    JPG, JPEG, PNG or PDF — Maximum 5 MB
                </p>

                @error('nid_document')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <!-- Medical Certificate -->
            <div>

                <label
                    for="medical_certificate"
                    class="block text-sm font-medium text-gray-700 mb-1"
                >
                    Medical Certificate
                    <span class="text-gray-400">
                        (Optional)
                    </span>
                </label>

                <input
                    type="file"
                    name="medical_certificate"
                    id="medical_certificate"
                    accept=".jpg,.jpeg,.png,.pdf"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                        file:mr-4 file:rounded-md file:border-0
                        file:bg-blue-50 file:px-3 file:py-1.5
                        file:text-sm file:font-medium file:text-blue-700"
                >

                <p class="mt-1 text-xs text-gray-500">
                    JPG, JPEG, PNG or PDF — Maximum 5 MB
                </p>

                @error('medical_certificate')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>

    <div class="flex justify-center">
    <button
        type="submit"
        class="px-6 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition"
    >
        Submit Application
    </button>
</div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        /*
        |--------------------------------------------------------------------------
        | Other Citizenship
        |--------------------------------------------------------------------------
        */

        const citizenshipRadios = document.querySelectorAll(
            'input[name="has_other_citizenship"]'
        );

        const otherCitizenshipWrapper =
            document.getElementById('other_citizenship_wrapper');

        const otherCitizenshipInput =
            document.getElementById('other_citizenship');


        function toggleOtherCitizenship() {

            const selected = document.querySelector(
                'input[name="has_other_citizenship"]:checked'
            );

            if (!selected) {
                return;
            }

            if (selected.value === 'yes') {

                otherCitizenshipWrapper.classList.remove('hidden');

            } else {

                otherCitizenshipWrapper.classList.add('hidden');

                otherCitizenshipInput.value = '';
            }
        }


        citizenshipRadios.forEach(function (radio) {

            radio.addEventListener(
                'change',
                toggleOtherCitizenship
            );

        });


        // Run once when page loads
        toggleOtherCitizenship();


        /*
        |--------------------------------------------------------------------------
        | Same Address
        |--------------------------------------------------------------------------
        */

        const sameAddress =
            document.getElementById('same_address');

        const presentFields = [
            'village',
            'road',
            'division',
            'district',
            'thana',
            'post_code'
        ];


        sameAddress.addEventListener('change', function () {

            presentFields.forEach(function (field) {

                const present =
                    document.getElementById(
                        'present_' + field
                    );

                const permanent =
                    document.getElementById(
                        'permanent_' + field
                    );


                if (sameAddress.checked) {

                    permanent.value = present.value;

                    permanent.dispatchEvent(
                        new Event('change')
                    );

                    permanent.setAttribute(
                        'readonly',
                        true
                    );

                } else {

                    permanent.value = '';

                    permanent.removeAttribute(
                        'readonly'
                    );
                }

            });

        });

        const photoInput =
            document.getElementById('applicant_photo');

        const photoPreview =
            document.getElementById('photo_preview');

        const photoPreviewWrapper =
            document.getElementById('photo_preview_wrapper');


        photoInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                photoPreviewWrapper.classList.add('hidden');
                photoPreview.src = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {

                photoPreview.src = event.target.result;

                photoPreviewWrapper.classList.remove('hidden');

            };

            reader.readAsDataURL(file);

        });

    });
</script>
</body>
</html>