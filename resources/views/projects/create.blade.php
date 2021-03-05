<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('projects.create') ? __('Create a New') : __('Edit') }} {{ __('Project') }}
        </h2>
    </x-slot>

    <div class="py-12 xs:px-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <form action="{{ request()->routeIs('projects.create') ? route('projects.store') : route('projects.update', $project->id) }}" method="POST">
                @csrf
                @if (!request()->routeIs('projects.create'))
                    <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="border-t border-b border-gray-300 py-8">
                    <div class="md:w-2/3 w-full mb-6">
                        <label for="title" class="block text-sm font-bold text-gray-700">
                            Project Title
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="title" id="title" value="{{ $project->title }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="Project Title">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700">
                            Description <span class="text-xs text-gray-500">(Optional)</span>
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="7"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $project->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-6 sm:mt-4">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ request()->routeIs('projects.create') ? __('Create') : __('Save') }} {{ __('Project') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
