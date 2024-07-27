<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add student') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('admin.students.index') }}">
                    <x-button><x-icons.user-circle class="mr-2" />{{ __('Students') }}</x-button>
                </a>
            </div>
        </div>
    </div>

    {{-- TODO VALIDATION ERRORS --}}
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form class="max-w-xl mx-auto" action="{{route('admin.students.store')}}" method="POST">
                        @csrf
                        <div class="relative z-0 w-full mb-5 group">
                            <x-input-animated type="text" name="name" id="name" required
                                label="{{ __('Name') }}" autocomplete="off"></x-input-animated>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <x-input-animated type="email" name="email" id="email" required
                                    label="{{ __('Email') }}" autocomplete="off"></x-input-animated>
                            </div>
                            <x-datepicker name="birthday" placeholder="{{ __('Select date') }}" autocomplete="off" />
                        </div>
                        <x-button type="submit" class="bg-green-700">
                            <x-icons.plus class="mr-2" />{{ __('Add') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
