<x-layout>
    @foreach ($jobs as $job)
        <x-job-card class="mt-4" :job="$job">
            
            <div>
                <x-link-button :href="route('jobs.show', $job)" >
                    Details
                </x-link-button>                
            </div>
        </x-job-card>
    @endforeach
</x-layout>