<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __($project->title) }}
                </h2>
                <span class="text-sm font-light text-gray-400">Update {{ $project->created_at }}</span>
            </div>
            <div>
                <button class="text-red-500 focus:outline-none">Delete Project</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-4">
                <h2 class="text-lg font-light">Issues</h2>
                <a href={{ route('issues.create') }} type="button"
                    class="focus:outline-none text-gray-600 text-sm py-2.5 px-5 rounded-full border border-gray-600 hover:border-white hover:bg-indigo-400 hover:text-white transition-all duration-300 ease-linear">New
                    Issue</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        @if (count($projects) < 1)
                            <h3 class="text-lg w-full text-center">You have no Projects</h3>
                        @else
                        <div class="flex-grow overflow-auto">
                            <table class="relative w-full border table-fixed">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Name</th>
                                        <th class="px-6 py-3 w-1/2 text-gray-900 bg-gray-100">Description</th>
                                        <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Assignees</th>
                                        <th class="px-6 py-3 w-1/4 text-gray-900 bg-gray-100">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach ($project->issues as $issue)
                                        <tr>
                                            <td class="px-6 py-4 text-left">
                                                <h2 class="font-bold">{{ $issue->title }}</h2>
                                                <span class="text-sm font-light text-gray-400">Updated
                                                    {{ \Carbon\Carbon::parse($issue->created_at)->diffForHumans() }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-center">{{ $issue->description }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @foreach ($issue->users as $user)
                                                    <a href="#" class="font-bold">{{ $user->name }}</a>
                                                    @if (!$loop->last)
                                                        </br>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="{{ route('issues.show', $issue->id) }}"
                                                    class="inline-flex focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('issues.edit', $issue->id) }}"
                                                    class="inline-flex focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('issues.destroy', $issue->id) }}"
                                                    method="POST" class="inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="focus:outline-none text-white text-sm py-1 px-2 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
