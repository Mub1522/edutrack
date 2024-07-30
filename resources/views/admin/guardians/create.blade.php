<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add guardian') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('admin.guardians.index') }}">
                    <x-button><x-icons.user-circle class="mr-2" />{{ __('Guardians') }}</x-button>
                </a>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <x-validation-errors class="max-w-xl mx-auto"></x-validation-errors>
                    <br>
                    <form class="max-w-xl mx-auto" action="{{ route('admin.guardians.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="relative z-0 w-full mb-5 group">
                            <x-input-animated type="text" name="name" id="name" required
                                label="{{ __('Name') }}" value="{{ old('name') }}"></x-input-animated>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <x-input-animated type="email" name="email" id="email" required
                                label="{{ __('Email') }}" value="{{ old('email') }}"></x-input-animated>
                        </div>
                        <hr><br>
                        <div class="relative z-0 w-full mb-5 group">
                            <x-input-image name="image"></x-input-image>
                        </div>
                        <x-button type="submit">
                            <x-icons.plus class="mr-2" />{{ __('Add') }}
                        </x-button>
                        <a href="{{ route('admin.guardians.index') }}">
                            <x-button type="button"
                                class="bg-gray-900 hover:bg-gray-800 focus:bg-gray-800 active:bg-gray-800 focus:ring-gray-800"><x-icons.x-circle
                                    class="mr-2" />{{ __('Cancel') }}</x-button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
