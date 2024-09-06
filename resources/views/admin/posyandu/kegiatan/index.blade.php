

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
                    {{ __("List Kegiatan ") }}{{ $posyandu->nama }}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{-- <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __("Opsi kegiatan") }}</div>
        
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.artikel.create')">
                                    {{ __('Tambah kegiatan') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div> --}}
                    <main class="container mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $currentPage = $kegiatanPaginated->currentPage();  // Mendapatkan halaman saat ini
                                    $perPage = $kegiatanPaginated->perPage();          // Jumlah item per halaman
                                    $start = ($currentPage - 1) * $perPage + 1;        // Menghitung nomor urut awal
                                @endphp
                                @foreach($kegiatanPaginated as $kegiatan)
                                    <tr>
                                        <td>{{ $loop->iteration + ($kegiatanPaginated->currentPage() - 1) * $kegiatanPaginated->perPage() }}</td>
                                        <td>{{ $kegiatan->judul }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($kegiatan->deskripsi, 50, '...') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit.kegiatan', $kegiatan->id) }}" class="btn btn-warning btn-sm text-white" style="padding: 3px 3px;">Edit Kegiatan</a>
                                            <form action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 3px 3px;">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $kegiatanPaginated->links() }}
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>