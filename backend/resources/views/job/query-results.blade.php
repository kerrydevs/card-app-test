<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Query Results</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="grid">
                        <div class="flex flex-col items-start overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10">
                            <div class="relative flex items-center gap-6 lg:items-end max-w-full">
                                <div class="flex items-start gap-6 lg:flex-col max-w-full">
                                    <div class="pt-3 sm:pt-5 lg:pt-0 max-w-full">
                                        <h2 class="text-xl font-semibold text-black">New Query Results</h2>
                                        @if (!empty($data['new_query_results']))
                                            <div class="mt-4 overflow-auto max-h-96 max-w-full">
                                                <table class="min-w-full table-auto border-collapse border border-gray-300">
                                                    <thead class="bg-gray-200">
                                                        <tr>
                                                        @foreach (array_keys((array)$data['new_query_results'][0]) as $key)
                                                            <th class="border border-gray-300 px-4 py-2">{{ $key }}</th>
                                                        @endforeach 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['new_query_results'] as $key => $result)
                                                        <tr class="odd:bg-gray-100 even:bg-white">
                                                            @foreach (array_keys((array)$data['new_query_results'][0]) as $key)
                                                            <td class="border border-gray-300 px-4 py-2">{{ $result->{$key} }}</td>
                                                            @endforeach
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p class="mt-4 text-sm/relaxed">No Data</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-start overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 mt-6">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black">Logical Improvement</h2>
                                        <ul class="mt-4 text-sm/relaxed list-disc pl-6">
                                            <li>Combine `personalities` table into `jobs_personalities` to remove unnecessary table and reduce multiple join.</li>
                                            <li>Combine `practical_skills` table into `jobs_practical_skills` to remove unnecessary table and reduce multiple join.</li>
                                            <li>Combine `basic_abilities` table into `jobs_basic_abilities` to remove unnecessary table and reduce multiple join.</li>
                                            <li>Combine `jobs_tools`, `jobs_career_paths`, `jobs_rec_qualifications`, and `jobs_req_qualifications` tables into new table `jobs_affiliates` with `type` column as identifier to remove unnecessary tables and reduce multiple join.</li>
                                            <li>Remove `job_category_id` column from `job_types` table as it was unnecessary since there's reference column `job_type_id` in `jobs` table.</li>
                                            <li>Remove `media_id` column from `jobs` table and add new table `jobs_media` which has foreign reference column `job_id` to connect job and media linked.</li>
                                            <li>Use inner join before left join to reduce data quantity to be processed.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-start overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 mt-6">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black">New Query</h2>
                                        <p class="mt-4 text-sm/relaxed">{{ $data['new_query'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-start overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 mt-6">
                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black">Old Query</h2>
                                        <p class="mt-4 text-sm/relaxed">{{ $data['old_query'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
