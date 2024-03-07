<x-layout>
    @foreach ($jobs as $job)
        <x-card class="mt-4">
            <div class="flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title}}</h2>
                <div class="text-slate-500">${{ number_format($job->salary)}}</div>                
            </div>
            <div class="flex justify-between items-center text-sm text-slate-500">
                <div class="flex space-x-4">
                    <div>Company NAme</div>
                    <div>{{$job->location}}</div>
                </div>
                <div class="flex space-x-1 text-xs">
                    <div class="rounded-md border px-2 py1">{{ Str::ucfirst($job->experience) }}</div>
                    <div class="rounded-md border px-2 py1">{{$job->category }}</div>
                </div>

            </div>
            <p class="text-sm text-slate-500">{!! nl2br(e($job->description)) !!}</p>
            
        </x-card>
    @endforeach
</x-layout>