<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("Posyandu") }}
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __("Opsi info sekilas") }}</div>
        
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.info_sekilas.edit', $info_sekilas->id)">
                                    {{ __('Edit info') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('admin.info_sekilas.edit_link_video', $info_sekilas->id)">
                                    {{ __('Edit Video Link') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <main class="container mt-4">
                        <table class="table table-striped">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Total Posyandu ({{ $info_sekilas->total_posyandu }})
                                    </td>
                                    <td>
                                        Total Kader ({{ $info_sekilas->total_kader }})
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pasien Ibu/Bapak ({{ $info_sekilas->pasien }})
                                    </td>
                                    <td>
                                        Pasien Bayi/Balita ({{ $info_sekilas->pasien_balita }})
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
