@extends('layouts.admin.app')

@section('title', 'Categories')
@section('heading', 'Categories')

@section('content')
    <div class="flex items-center">
        <a href="{{ route('admin.categories.create') }}"
            class="flex items-center justify-between p-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Create new category
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
    <div class="mt-4 w-full overflow-hidden border rounded-lg shadow-xs dark:border-none">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Created by</th>
                        <th class="px-4 py-3">Updated by</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($categories as $category)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $loop->index + $categories->firstItem() }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">{{ $category->name }}</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <div class="flex items-center">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 dark:text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Jolina Angelie</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $category->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <div class="flex items-center">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 dark:text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarah Curry</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $category->updated_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                            </td>
                            <td class="px-4 py-3 text-xs flex items-center gap-4">
                                <a href="{{ route('admin.categories.edit', $category->slug) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-purple-500 dark:text-gray-400 transition duration-500 ease-in-out dark:hover:text-purple-600 transform hover:-translate-y-1 hover:scale-110"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.categories.show', $category->slug) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-pink-500 dark:text-gray-400 transition duration-500 ease-in-out dark:hover:text-pink-600 transform hover:-translate-y-1 hover:scale-110"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete {{ $category->name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-red-500 dark:text-gray-400 transition duration-500 ease-in-out dark:hover:text-red-600 transform hover:-translate-y-1 hover:scale-110"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td colspan="4" class="px-4 py-3 text-sm">
                                No categories found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @include('admin.partials.pagination', ['paginator' => $categories])
    </div>
@endsection