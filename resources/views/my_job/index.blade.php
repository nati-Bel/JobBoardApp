<x-layout>
    <x-breadcrumbs :links="['My Jobs'=>route('my-job.index')]" class="mb-4"/>
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-job.create')}}">Add New</x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name}}</div>
                            <div>{{ $application->created_at}}</div>
                            <div>Download CV</div>
                        </div>
                        <div>${{number_format($application->expected_salary)}}</div>
                    </div>
                @empty
                    No applications
                @endforelse

            </div>
        </x-job-card>

    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet!
            </div>
            <div class="text-center">
                Post your job <a href="{{route('my-job.create')}}" class="text-indigo-500 hover:underline">here!</a>
            </div>
        </div>

    @endforelse

</x-layout>