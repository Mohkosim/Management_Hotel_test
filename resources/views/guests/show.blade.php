<x-layout>
    <x-slot:title>{{ Str::limit($title, 11) }}</x-slot:title>
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse px-4 lg:px-12">
            <li class="inline-flex items-center">
            <a href="/guests" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                Guests
            </a>
            </li>
            <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/guests/{{ $guest->name }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $guest->name }}</a>
            </div>
            </li>
            <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">View</a>
            </div>
            </li>
        </ol>
    </nav>

    <p>Name: {{ $guest->name }}</p>
    <p>Email: {{ $guest->email }}</p>
    <p>Phone: {{ $guest->phone }}</p>
    <p>Date of Birth: {{ $guest->date_of_birth }}</p>
    <p>Gender: {{ $guest->gender }}</p>
    <p>Address: {{ $guest->address }}</p>
    <p>Postal Code: {{ $guest->postal_code }}</p>
    <p>Place of Birth: {{ $guest->place_of_birth }}</p>
</x-layout>