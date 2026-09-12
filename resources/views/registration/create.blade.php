<!DOCTYPE html>
<html lang="en" @class(['dark' => ($theme ?? 'light') === 'dark'])>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learner License Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 dark:bg-slate-950">

<x-app-navbar />

<div class="max-w-5xl mx-auto px-4 py-6">

    <h1 class="text-xl font-bold text-gray-800 mb-4 dark:text-white">
        Learner License Application
    </h1>

    <form
        action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- TOP BAR: License Type + Photo -->
        <div class="bg-white border border-gray-300 p-6 mb-4 dark:border-slate-700 dark:bg-slate-900">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-8">

                <!-- License Type -->
                <div>
                    <label class="block text-sm font-bold text-gray-800 dark:text-slate-100 mb-2">
                        Driving License Type <span class="text-red-600">*</span>
                    </label>

                    <div class="inline-flex border border-gray-400 rounded-sm overflow-hidden">
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="license_type"
                                value="non_professional"
                                class="sr-only peer"
                                {{ old('license_type') === 'non_professional' ? 'checked' : '' }}>
                            <span class="block px-5 py-2 text-sm font-medium bg-gray-100 text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900 border-r border-gray-400">
                                Non-Professional
                            </span>
                        </label>

                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="license_type"
                                value="professional"
                                class="sr-only peer"
                                {{ old('license_type') === 'professional' ? 'checked' : '' }}>
                            <span class="block px-5 py-2 text-sm font-medium bg-white text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900">
                                Professional
                            </span>
                        </label>
                    </div>

                    @error('license_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Upload (submits as applicant_photo) -->
                <div class="flex flex-col items-center">
                    <div class="relative w-28 h-28 border border-gray-400 bg-gray-50 flex items-center justify-center cursor-pointer"
                         onclick="document.getElementById('applicant_photo').click()">

                        <div id="photo_preview" class="w-full h-full flex items-center justify-center overflow-hidden">
                            <svg class="w-16 h-16 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>

                        <input type="file"
                               id="applicant_photo"
                               name="applicant_photo"
                               accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                               class="hidden"
                               onchange="previewPhoto(this)">
                    </div>

                    <p class="mt-2 text-xs text-red-600 font-medium">
                        *Click on photo to change
                    </p>
                    <p class="mt-1 text-xs text-gray-600 text-center">
                        Note : Photo Size Maximum 150 KB (300 x 300 pixels)
                    </p>

                    @error('applicant_photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <!-- SECTION A -->
        <div class="bg-white border border-gray-300 p-6 mb-4 dark:border-slate-700 dark:bg-slate-900">

            <h2 class="text-base font-bold uppercase tracking-wide text-emerald-800 pb-2 border-b-2 border-emerald-700 mb-5">
                Section A
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">

                <!-- NID -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="nid" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        National Identity No <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="nid" name="nid" value="{{ old('nid') }}"
                               placeholder="Numbers Only"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('nid')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="date_of_birth" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Date Of Birth <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('date_of_birth')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Name English -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="name_english" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Name(English) <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="name_english" name="name_english" value="{{ old('name_english') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('name_english')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Name Bangla -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="name_bangla" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Name(Bangla)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="name_bangla" name="name_bangla" value="{{ old('name_bangla') }}"
                               placeholder="আপনার নাম লিখুন"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('name_bangla')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Father's Name English -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="father_name_english" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Father's Name(English) <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="father_name_english" name="father_name_english" value="{{ old('father_name_english') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('father_name_english')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Father's Name Bangla -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="father_name_bangla" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Father's Name(Bangla)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="father_name_bangla" name="father_name_bangla" value="{{ old('father_name_bangla') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('father_name_bangla')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Mother's Name English -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="mother_name_english" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Mother's Name(English) <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="mother_name_english" name="mother_name_english" value="{{ old('mother_name_english') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('mother_name_english')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Mother's Name Bangla -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="mother_name_bangla" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Mother's Name(Bangla)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="mother_name_bangla" name="mother_name_bangla" value="{{ old('mother_name_bangla') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('mother_name_bangla')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Gender -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Gender <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <div class="inline-flex border border-gray-400 rounded-sm overflow-hidden">
                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="male" class="sr-only peer"
                                    {{ old('gender') === 'male' ? 'checked' : '' }}>
                                <span class="block px-4 py-1.5 text-sm bg-gray-100 text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900 border-r border-gray-400">Male</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="female" class="sr-only peer"
                                    {{ old('gender') === 'female' ? 'checked' : '' }}>
                                <span class="block px-4 py-1.5 text-sm bg-white text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900 border-r border-gray-400">Female</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="other" class="sr-only peer"
                                    {{ old('gender') === 'other' ? 'checked' : '' }}>
                                <span class="block px-4 py-1.5 text-sm bg-white text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900">Other</span>
                            </label>
                        </div>
                        @error('gender')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Marital Status -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="marital_status" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Marital Status
                    </label>
                    <div class="flex-1">
                        <select id="marital_status" name="marital_status"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="single" {{ old('marital_status') === 'single' ? 'selected' : '' }}>Single</option>
                            <option value="married" {{ old('marital_status') === 'married' ? 'selected' : '' }}>Married</option>
                            <option value="divorced" {{ old('marital_status') === 'divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="widowed" {{ old('marital_status') === 'widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                        @error('marital_status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Spouse Name English -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="spouse_name_english" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Spouse Name(English)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="spouse_name_english" name="spouse_name_english" value="{{ old('spouse_name_english') }}"
                               placeholder="Only required if married"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('spouse_name_english')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Spouse Name Bangla -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="spouse_name_bangla" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Spouse Name(Bangla)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="spouse_name_bangla" name="spouse_name_bangla" value="{{ old('spouse_name_bangla') }}"
                               placeholder="বিবাহিত হলে প্রযোজ্য"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('spouse_name_bangla')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Occupation -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="occupation" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Occupation
                    </label>
                    <div class="flex-1">
                        <input type="text" id="occupation" name="occupation" value="{{ old('occupation') }}"
                               placeholder="e.g. Student"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('occupation')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Blood Group -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="blood_group" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Blood Group <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="blood_group" name="blood_group"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                            <option value="{{ $group }}" {{ old('blood_group') === $group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                        @error('blood_group')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>

            <!-- ADDRESS HEADERS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 mt-8 mb-4">
                <h3 class="text-sm font-bold text-emerald-800 border-b border-emerald-300 pb-1">
                    Present Address <span class="text-red-600">*</span>
                </h3>
                <div class="flex items-center justify-between border-b border-emerald-300 pb-1">
                    <h3 class="text-sm font-bold text-emerald-800">
                        Permanent Address <span class="text-red-600">*</span>
                    </h3>
                    <label class="flex items-center gap-1.5 text-xs text-gray-700 cursor-pointer">
                        <input type="checkbox" id="same_address"
                               class="rounded border-gray-400 text-blue-600 focus:ring-blue-500">
                        <span>Same as Present Address</span>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">

                <!-- Present Village -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_village" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Village/House <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="present_village" name="present_village" value="{{ old('present_village') }}"
                               placeholder="Village / House"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('present_village')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent Village -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_village" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Village/House
                    </label>
                    <div class="flex-1">
                        <input type="text" id="permanent_village" name="permanent_village" value="{{ old('permanent_village') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('permanent_village')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Present Road -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_road" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Road/Block/Sector <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="present_road" name="present_road" value="{{ old('present_road') }}"
                               placeholder="Road / Block / Sector"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('present_road')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent Road -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_road" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Road/Block/Sector
                    </label>
                    <div class="flex-1">
                        <input type="text" id="permanent_road" name="permanent_road" value="{{ old('permanent_road') }}"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('permanent_road')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Present Division -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_division" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Division <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="present_division" name="present_division"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="dhaka" {{ old('present_division') === 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                            <option value="chattogram" {{ old('present_division') === 'chattogram' ? 'selected' : '' }}>Chattogram</option>
                            <option value="rajshahi" {{ old('present_division') === 'rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                            <option value="khulna" {{ old('present_division') === 'khulna' ? 'selected' : '' }}>Khulna</option>
                            <option value="barishal" {{ old('present_division') === 'barishal' ? 'selected' : '' }}>Barishal</option>
                            <option value="sylhet" {{ old('present_division') === 'sylhet' ? 'selected' : '' }}>Sylhet</option>
                            <option value="rangpur" {{ old('present_division') === 'rangpur' ? 'selected' : '' }}>Rangpur</option>
                            <option value="mymensingh" {{ old('present_division') === 'mymensingh' ? 'selected' : '' }}>Mymensingh</option>
                        </select>
                        @error('present_division')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent Division -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_division" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Division
                    </label>
                    <div class="flex-1">
                        <select id="permanent_division" name="permanent_division"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="dhaka" {{ old('permanent_division') === 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                            <option value="chattogram" {{ old('permanent_division') === 'chattogram' ? 'selected' : '' }}>Chattogram</option>
                            <option value="rajshahi" {{ old('permanent_division') === 'rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                            <option value="khulna" {{ old('permanent_division') === 'khulna' ? 'selected' : '' }}>Khulna</option>
                            <option value="barishal" {{ old('permanent_division') === 'barishal' ? 'selected' : '' }}>Barishal</option>
                            <option value="sylhet" {{ old('permanent_division') === 'sylhet' ? 'selected' : '' }}>Sylhet</option>
                            <option value="rangpur" {{ old('permanent_division') === 'rangpur' ? 'selected' : '' }}>Rangpur</option>
                            <option value="mymensingh" {{ old('permanent_division') === 'mymensingh' ? 'selected' : '' }}>Mymensingh</option>
                        </select>
                        @error('permanent_division')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Present District -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_district" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        District <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="present_district" name="present_district"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="feni" {{ old('present_district') === 'feni' ? 'selected' : '' }}>Feni</option>
                            <option value="cumilla" {{ old('present_district') === 'cumilla' ? 'selected' : '' }}>Cumilla</option>
                            <option value="chattogram" {{ old('present_district') === 'chattogram' ? 'selected' : '' }}>Chattogram</option>
                            <option value="dhaka" {{ old('present_district') === 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                        </select>
                        @error('present_district')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent District -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_district" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        District
                    </label>
                    <div class="flex-1">
                        <select id="permanent_district" name="permanent_district"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="feni" {{ old('permanent_district') === 'feni' ? 'selected' : '' }}>Feni</option>
                            <option value="cumilla" {{ old('permanent_district') === 'cumilla' ? 'selected' : '' }}>Cumilla</option>
                            <option value="chattogram" {{ old('permanent_district') === 'chattogram' ? 'selected' : '' }}>Chattogram</option>
                            <option value="dhaka" {{ old('permanent_district') === 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                        </select>
                        @error('permanent_district')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Present Thana -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_thana" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Thana <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="present_thana" name="present_thana"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="feni_sadar" {{ old('present_thana') === 'feni_sadar' ? 'selected' : '' }}>Feni Sadar</option>
                            <option value="sonagazi" {{ old('present_thana') === 'sonagazi' ? 'selected' : '' }}>Sonagazi</option>
                            <option value="dagonbhuiyan" {{ old('present_thana') === 'dagonbhuiyan' ? 'selected' : '' }}>Dagonbhuiyan</option>
                        </select>
                        @error('present_thana')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent Thana -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_thana" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Thana
                    </label>
                    <div class="flex-1">
                        <select id="permanent_thana" name="permanent_thana"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="feni_sadar" {{ old('permanent_thana') === 'feni_sadar' ? 'selected' : '' }}>Feni Sadar</option>
                            <option value="sonagazi" {{ old('permanent_thana') === 'sonagazi' ? 'selected' : '' }}>Sonagazi</option>
                            <option value="dagonbhuiyan" {{ old('permanent_thana') === 'dagonbhuiyan' ? 'selected' : '' }}>Dagonbhuiyan</option>
                        </select>
                        @error('permanent_thana')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Present Post Code -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="present_post_code" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Post Code
                    </label>
                    <div class="flex-1">
                        <input type="text" id="present_post_code" name="present_post_code" value="{{ old('present_post_code') }}"
                               placeholder="e.g. 3900"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('present_post_code')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Permanent Post Code -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="permanent_post_code" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Post Code
                    </label>
                    <div class="flex-1">
                        <input type="text" id="permanent_post_code" name="permanent_post_code" value="{{ old('permanent_post_code') }}"
                               placeholder="e.g. 3900"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('permanent_post_code')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>

            <!-- Nationality / Other Citizenship -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mt-8">

                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="nationality" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Nationality <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="nationality" name="nationality"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="bangladeshi" {{ old('nationality', 'bangladeshi') === 'bangladeshi' ? 'selected' : '' }}>BANGLADESHI</option>
                            <option value="indian" {{ old('nationality') === 'indian' ? 'selected' : '' }}>INDIAN</option>
                            <option value="pakistani" {{ old('nationality') === 'pakistani' ? 'selected' : '' }}>PAKISTANI</option>
                            <option value="nepali" {{ old('nationality') === 'nepali' ? 'selected' : '' }}>NEPALI</option>
                            <option value="other" {{ old('nationality') === 'other' ? 'selected' : '' }}>OTHER</option>
                        </select>
                        @error('nationality')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Other Citizenship
                    </label>
                    <div class="flex-1">
                        <div class="inline-flex border border-gray-400 rounded-sm overflow-hidden">
                            <label class="cursor-pointer">
                                <input type="radio" name="has_other_citizenship" value="no" class="sr-only peer"
                                    {{ old('has_other_citizenship', 'no') === 'no' ? 'checked' : '' }}>
                                <span class="block px-4 py-1.5 text-sm bg-gray-100 text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900 border-r border-gray-400">No</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="has_other_citizenship" value="yes" class="sr-only peer"
                                    {{ old('has_other_citizenship') === 'yes' ? 'checked' : '' }}>
                                <span class="block px-4 py-1.5 text-sm bg-white text-gray-700 peer-checked:bg-gray-300 peer-checked:text-gray-900">Yes</span>
                            </label>
                        </div>
                        @error('has_other_citizenship')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Other Citizenship Name -->
                <div id="other_citizenship_wrapper" class="md:col-span-2 hidden flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="other_citizenship" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Other Citizenship
                    </label>
                    <div class="flex-1">
                        <input type="text" id="other_citizenship" name="other_citizenship" value="{{ old('other_citizenship') }}"
                               placeholder="Enter citizenship"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('other_citizenship')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>

            <!-- CONTACT HEADERS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 mt-8 mb-4">
                <h3 class="text-sm font-bold text-emerald-800 border-b border-emerald-300 pb-1">
                    Applicant Contact Details
                </h3>
                <h3 class="text-sm font-bold text-emerald-800 border-b border-emerald-300 pb-1">
                    Emergency Contact Person's Details
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">

                <!-- Phone Residence -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="phone_residence" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Phone Number(Residence)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="phone_residence" name="phone_residence" value="{{ old('phone_residence') }}"
                               placeholder="Optional"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('phone_residence')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Emergency Name -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="emergency_name" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Name <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="emergency_name" name="emergency_name" value="{{ old('emergency_name') }}"
                               placeholder="Emergency contact name"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('emergency_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Mobile -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="mobile" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Mobile No <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
                               placeholder="EX: 01XXXXXXXXX" maxlength="11"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('mobile')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Emergency Relationship -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="emergency_relationship" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Relationship <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select id="emergency_relationship" name="emergency_relationship"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Please Select</option>
                            <option value="father" {{ old('emergency_relationship') === 'father' ? 'selected' : '' }}>Father</option>
                            <option value="mother" {{ old('emergency_relationship') === 'mother' ? 'selected' : '' }}>Mother</option>
                            <option value="brother" {{ old('emergency_relationship') === 'brother' ? 'selected' : '' }}>Brother</option>
                            <option value="sister" {{ old('emergency_relationship') === 'sister' ? 'selected' : '' }}>Sister</option>
                            <option value="spouse" {{ old('emergency_relationship') === 'spouse' ? 'selected' : '' }}>Spouse</option>
                            <option value="guardian" {{ old('emergency_relationship') === 'guardian' ? 'selected' : '' }}>Guardian</option>
                            <option value="other" {{ old('emergency_relationship') === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('emergency_relationship')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Phone Office -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="phone_office" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Phone Number(Office)
                    </label>
                    <div class="flex-1">
                        <input type="text" id="phone_office" name="phone_office" value="{{ old('phone_office') }}"
                               placeholder="Optional"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('phone_office')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Emergency Mobile -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="emergency_mobile" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Mobile No <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="text" id="emergency_mobile" name="emergency_mobile" value="{{ old('emergency_mobile') }}"
                               placeholder="EX: 01XXXXXXXXX" maxlength="11"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('emergency_mobile')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="email" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Email <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="example@email.com"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Emergency Email -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="emergency_email" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Email
                    </label>
                    <div class="flex-1">
                        <input type="email" id="emergency_email" name="emergency_email" value="{{ old('emergency_email') }}"
                               placeholder="Optional"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('emergency_email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>

        </div>

        <!-- SECTION B -->
        <div class="bg-white border border-gray-300 p-6 mb-4 dark:border-slate-700 dark:bg-slate-900">

            <h2 class="text-base font-bold uppercase tracking-wide text-emerald-800 pb-2 border-b-2 border-emerald-700 mb-1">
                Section B
            </h2>
            <p class="text-sm font-semibold text-gray-700 mb-5">
                For Learner License Issue
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">

                <!-- Instructor's Driving License No -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="instructor_license_no" class="sm:w-52 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Instructor's Driving license No
                    </label>
                    <div class="flex-1">
                        <input type="text" name="instructor_license_no" id="instructor_license_no" value="{{ old('instructor_license_no') }}"
                               placeholder="Enter instructor license number"
                               class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        @error('instructor_license_no')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Exam Venue -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label for="exam_venue" class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Exam Venue <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <select name="exam_venue" id="exam_venue"
                                class="w-full border border-gray-400 rounded-sm px-2 py-1.5 text-sm bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Select Present Thana To Get Exam</option>
                            <option value="Feni Sadar" {{ old('exam_venue') === 'Feni Sadar' ? 'selected' : '' }}>Feni Sadar</option>
                            <option value="Sonagazi" {{ old('exam_venue') === 'Sonagazi' ? 'selected' : '' }}>Sonagazi</option>
                            <option value="Dagonbhuiyan" {{ old('exam_venue') === 'Dagonbhuiyan' ? 'selected' : '' }}>Dagonbhuiyan</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Exam venue will depend on the applicant's present thana.</p>
                        @error('exam_venue')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Vehicle Class -->
                <div class="md:col-span-2 flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                    <label class="sm:w-44 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100 sm:text-right">
                        Vehicle Class <span class="text-red-600">*</span>
                    </label>
                    <div class="flex-1">
                        <div class="flex flex-wrap gap-6">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="vehicle_class[]" value="motorcycle"
                                       class="rounded border-gray-400 text-blue-600 focus:ring-blue-500"
                                       {{ in_array('motorcycle', old('vehicle_class', [])) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-800 dark:text-slate-100 font-medium">MOTORCYCLE</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="vehicle_class[]" value="light"
                                       class="rounded border-gray-400 text-blue-600 focus:ring-blue-500"
                                       {{ in_array('light', old('vehicle_class', [])) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-800 dark:text-slate-100 font-medium">LIGHT</span>
                            </label>
                        </div>
                        @error('vehicle_class')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        @error('vehicle_class.*')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>

            <!-- ATTACHMENT -->
            <h3 class="text-sm font-bold text-emerald-800 border-b border-emerald-300 pb-1 mt-8 mb-4">
                Attachment
            </h3>

            <div class="space-y-4">

                <!-- Medical Certificate -->
                <div class="flex flex-col md:flex-row md:items-center gap-1 md:gap-4">
                    <label for="medical_certificate" class="md:w-96 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100">
                        Attach Medical Certificate. <span class="text-red-600">*</span>
                    </label>
                    <div class="flex flex-wrap items-center gap-3">
                        <input type="file" name="medical_certificate" id="medical_certificate"
                               accept=".jpg,.jpeg,.png,.pdf" class="text-sm">
                        <span class="text-xs text-gray-500 whitespace-nowrap">Note :File Size Maximum 600 KB</span>
                    </div>
                    @error('medical_certificate')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <!-- NID / Birth Certificate / Passport / Citizen Certificate -->
                <div class="flex flex-col md:flex-row md:items-center gap-1 md:gap-4">
                    <label for="nid_document" class="md:w-96 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100">
                        Attach National Id/Birth Certificate/Passport/Citizen Certificate <span class="text-red-600">*</span>
                    </label>
                    <div class="flex flex-wrap items-center gap-3">
                        <input type="file" name="nid_document" id="nid_document"
                               accept=".jpg,.jpeg,.png,.pdf" class="text-sm">
                        <span class="text-xs text-gray-500 whitespace-nowrap">Note :File Size Maximum 600 KB</span>
                    </div>
                    @error('nid_document')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <!-- Utility Bill -->
                <div class="flex flex-col md:flex-row md:items-center gap-1 md:gap-4">
                    <label for="utility_bill" class="md:w-96 shrink-0 text-sm font-semibold text-gray-800 dark:text-slate-100">
                        Attach Utility bill
                    </label>
                    <div class="flex flex-wrap items-center gap-3">
                        <input type="file" name="utility_bill" id="utility_bill"
                               accept=".jpg,.jpeg,.png,.pdf" class="text-sm">
                        <span class="text-xs text-gray-500 whitespace-nowrap">Note :File Size Maximum 600 KB</span>
                    </div>
                    @error('utility_bill')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

            </div>

        </div>

        <div class="flex justify-center pb-8">
            <button type="submit"
                    class="px-6 py-2.5 rounded-sm bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                Submit Application
            </button>
        </div>

    </form>
</div>

<script>
    function previewPhoto(input) {
        const preview = document.getElementById('photo_preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {

        /*
        |--------------------------------------------------------------------------
        | Other Citizenship
        |--------------------------------------------------------------------------
        */
        const citizenshipRadios = document.querySelectorAll('input[name="has_other_citizenship"]');
        const otherCitizenshipWrapper = document.getElementById('other_citizenship_wrapper');
        const otherCitizenshipInput = document.getElementById('other_citizenship');

        function toggleOtherCitizenship() {
            const selected = document.querySelector('input[name="has_other_citizenship"]:checked');
            if (!selected) return;

            if (selected.value === 'yes') {
                otherCitizenshipWrapper.classList.remove('hidden');
            } else {
                otherCitizenshipWrapper.classList.add('hidden');
                otherCitizenshipInput.value = '';
            }
        }

        citizenshipRadios.forEach(function(radio) {
            radio.addEventListener('change', toggleOtherCitizenship);
        });

        toggleOtherCitizenship();

        /*
        |--------------------------------------------------------------------------
        | Same Address
        |--------------------------------------------------------------------------
        */
        const sameAddress = document.getElementById('same_address');

        const presentFields = ['village', 'road', 'division', 'district', 'thana', 'post_code'];

        sameAddress.addEventListener('change', function() {
            presentFields.forEach(function(field) {
                const present = document.getElementById('present_' + field);
                const permanent = document.getElementById('permanent_' + field);

                if (sameAddress.checked) {
                    permanent.value = present.value;
                    permanent.dispatchEvent(new Event('change'));
                    permanent.setAttribute('readonly', true);
                } else {
                    permanent.value = '';
                    permanent.removeAttribute('readonly');
                }
            });
        });

    });
</script>
</body>

</html>