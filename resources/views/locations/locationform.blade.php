@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Alamat Toko:</h2>

        <!-- Formulir untuk alamat -->
        <form action="{{ route('save.selected.location') }}" method="post" id="locationForm">
            @csrf

            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <select id="provinsi" name="provinsi" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten/Kota:</label>
                <select id="kabupaten" name="kabupaten" class="form-control">
                    <option value="">Pilih Kabupaten/Kota</option>
                    <!-- Opsi kabupaten/kota akan diisi melalui JavaScript -->
                </select>
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan:</label>
                <select id="kecamatan" name="kecamatan" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                    <!-- Opsi kecamatan akan diisi melalui JavaScript -->
                </select>
            </div>

            <button type="submit" class="btn btn-success" id="simpanAlamatBtn">Simpan Alamat</button>
        </form>
    </div>

    <!-- Sertakan library Axios -->
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const provinsiDropdown = document.getElementById('provinsi');
    const kabupatenDropdown = document.getElementById('kabupaten');
    const kecamatanDropdown = document.getElementById('kecamatan');

    provinsiDropdown.addEventListener('change', function (e) {
        e.preventDefault();

        const selectedProvinsiId = provinsiDropdown.value;

        // Reset dropdown kabupaten dan kecamatan
        kabupatenDropdown.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
        kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';

        if (selectedProvinsiId) {
            // Ambil data kabupaten/kota berdasarkan provinsi
            axios.post('/get-kabupaten', { provinsi: selectedProvinsiId })
                .then(response => {
                    const kabupatenData = response.data.kabupaten;

                    if (kabupatenData && kabupatenData.length > 0) {
                        kabupatenData.forEach(kabupaten => {
                            const option = document.createElement('option');
                            option.value = kabupaten.code;
                            option.textContent = kabupaten.name;
                            kabupatenDropdown.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error in Axios:', error);
                    // Handle error gracefully, for example, display an error message to the user
                });
        }
    });

    kabupatenDropdown.addEventListener('change', function (e) {
        e.preventDefault();

        const selectedKabupatenId = kabupatenDropdown.value;

        // Reset dropdown kecamatan
        kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';

        if (selectedKabupatenId) {
            // Ambil data kecamatan berdasarkan kabupaten
            axios.get(`/get-kecamatan/${selectedKabupatenId}`)
                .then(response => {
                    const kecamatanData = response.data;

                    if (kecamatanData && kecamatanData.length > 0) {
                        kecamatanData.forEach(kecamatan => {
                            const option = document.createElement('option');
                            option.value = kecamatan.code;
                            option.textContent = kecamatan.name;
                            kecamatanDropdown.appendChild(option);
                        });
                    } else {
                        // Handle case where no kecamatan data is returned
                        console.error('No kecamatan data found.');
                    }
                })
                .catch(error => {
                    console.error('Error in Axios:', error);
                    // Handle error gracefully, for example, display an error message to the user
                });
        }
    });
});


</script>
@endsection
