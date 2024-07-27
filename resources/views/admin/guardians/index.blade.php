<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guardians') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('admin.guardians.create') }}">
                    <x-button><x-icons.plus class="mr-2" />{{ __('Add') }}</x-button>
                </a>
                <a href="{{ route('admin.students.index') }}">
                    <x-button><x-icons.user-circle class="mr-2" />{{ __('Students') }}</x-button>
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
                                        {{ __('Guardian') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Created at') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guardians as $guardian)
                                    @php
                                        $gravatarUrl =
                                            'https://www.gravatar.com/avatar/' .
                                            md5(strtolower(trim($guardian->email))) .
                                            '?s=200';
                                    @endphp
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-normal text-gray-500">{{ $guardian->uuid }}</div>
                                            </div>
                                        </td>
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="{{ $gravatarUrl }}"
                                                alt="Jese image">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $guardian->name }}</div>
                                                <div class="font-normal text-gray-500">{{ $guardian->email }}</div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-normal text-gray-500">{{ $guardian->created_at }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div>
                        {{ $guardians->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
