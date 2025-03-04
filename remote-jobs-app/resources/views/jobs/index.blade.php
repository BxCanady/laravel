<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remote Jobs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">
    Remote Jobs List by 
    <span class="text-sm text-gray-500 animate-bounce">Brandon Canady</span>
</h1>


        <!-- Skeleton Loader -->
        <div id="skeleton" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
                <div class="bg-white rounded-lg shadow-md p-6 animate-pulse">
                    <div class="h-16 w-16 bg-gray-200 rounded-full mb-4"></div>
                    <div class="h-5 bg-gray-200 rounded-md mb-2 w-3/4"></div>
                    <div class="h-4 bg-gray-200 rounded-md mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded-md mb-4 w-1/2"></div>
                    <div class="h-10 bg-gray-200 rounded-md w-1/3"></div>
                </div>
            @endfor
        </div>

        <!-- Actual Content -->
        <div id="content" class="hidden">
            @if(isset($message))
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        @if(isset($job['company_logo']))
                            <img src="{{ $job['company_logo'] }}" alt="{{ $job['company'] ?? 'Company' }} logo" class="w-16 h-16 mb-4">
                        @else
                            <div class="h-16 w-16 bg-gray-200 rounded-full mb-4"></div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $job['position'] ?? 'Unknown Position' }}</h2>
                        <p class="text-gray-600 mb-2">{{ $job['company'] ?? 'Unknown Company' }}</p>
                        @if(isset($job['date']))
                            <p class="text-sm text-gray-500 mb-4">
                                Posted: {{ \Carbon\Carbon::parse($job['date'])->format('M d, Y') }}
                            </p>
                        @endif
                        @if(isset($job['tags']) && is_array($job['tags']))
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($job['tags'], 0, 5) as $tag)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                         @if(isset($job['description']))
                            <p class="text-gray-700 mb-4 line-clamp-3">
                                {!! strip_tags($job['description']) !!}
                            </p>
                        @endif
                        @if(isset($job['url']))
                            <a href="{{ $job['url'] }}" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Apply Now
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">No jobs found.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        // Show skeleton loader for 5 or 3 seconds, then reveal content
        setTimeout(() => {
            document.getElementById('skeleton').classList.add('hidden');
            document.getElementById('content').classList.remove('hidden');
        }, 3000);
    </script>
</body>
</html>
