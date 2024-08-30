

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
                    {{ __("Edit info") }}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900=">
                    <main class="container mt-4">
                        <form action="{{ route('admin.info_sekilas.update', $info_sekilas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                
                            <div class="form-group">
                                <label for="total_posyandu">Total Posyandu</label>
                                <input type="number" name="total_posyandu" class="form-control" id="total_posyandu" value="{{ old('total_posyandu', $info_sekilas->total_posyandu) }}" required>
                            </div>
                
                            <div class="form-group">
                                <label for="total_kader">Total Kader</label>
                                <input type="number" name="total_kader" class="form-control" id="total_kader" value="{{ old('total_kader', $info_sekilas->total_kader) }}" required>
                            </div>
                
                            <div class="form-group">
                                <label for="pasien">Pasien ibu/bapak</label>
                                <input type="number" name="pasien" class="form-control" id="pasien" value="{{ old('pasien', $info_sekilas->pasien) }}" required>
                            </div>
                
                            <div class="form-group">
                                <label for="pasien_balita">Pasien Balita</label>
                                <input type="number" name="pasien_balita" class="form-control" id="pasien_balita" value="{{ old('pasien_balita', $info_sekilas->pasien_balita) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout> 