<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('admin.students.create') }}">
                    <x-button><x-icons.plus class="mr-2" />{{ __('Add') }}</x-button>
                </a>
                <a href="{{ route('admin.guardians.index') }}">
                    <x-button><x-icons.users class="mr-2" />{{ __('Guardians') }}</x-button>
                </a>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Id') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Student') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Status') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Birthday') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    @php
                                        $gravatarUrl =
                                            'https://www.gravatar.com/avatar/' .
                                            md5(strtolower(trim($student->email))) .
                                            '?s=200';
                                    @endphp
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-normal text-gray-500">{{ $student->uuid }}</div>
                                            </div>
                                        </td>
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="{{ $gravatarUrl }}"
                                                alt="Jese image">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $student->name }}</div>
                                                <div class="font-normal text-gray-500">{{ $student->email }}</div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if ($student->is_active)
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                    {{ __('Active') }}
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                    </div>
                                                    {{ __('Inactive') }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-normal text-gray-500">{{ $student->birthday }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
