

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
                    {{ __("Edit Link Video Youtube") }}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900=">
                    <main class="container mt-4">
                        <form action="{{ route('admin.info_sekilas.youtube_link', $info_sekilas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                
                            <div class="form-group">
                                <label for="youtube_link">YouTube Embed Link</label>
                                <input type="text" name="youtube_link" class="form-control" id="youtube_link" value="{{ old('youtube_link', $info_sekilas->videolink) }}" required>
                                @error('youtube_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout> 