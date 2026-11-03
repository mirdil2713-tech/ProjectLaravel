<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Barang</title>
</head>
<body>
    <h2>Formulir Tambah Barang Inventaris Kantor</h2>

    @if(session('success'))
        <div role="status">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div role="alert">
            <p>Periksa kembali data yang diisi:</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label for="code">Kode Barang:</label>
        <input id="code" type="text" name="code" value="{{ old('code') }}" required maxlength="255" placeholder="contoh: inv-001"><br>

        <label for="item_name">Nama Barang:</label>
        <input id="item_name" type="text" name="item_name" value="{{ old('item_name') }}" required maxlength="255" placeholder="contoh: Laptop"><br>

        <label for="category">Kategori:</label>
        <input id="category" type="text" name="category" value="{{ old('category') }}" required maxlength="255" placeholder="contoh: Elektronik"><br>

        <label for="stock">Stok:</label>
        <input id="stock" type="number" name="stock" value="{{ old('stock', 1) }}" required min="0"><br>

        <label for="condition">Kondisi:</label>
        <select id="condition" name="condition" required>
            <option value="baik" @selected(old('condition', 'baik') === 'baik')>Baik</option>
            <option value="rusak ringan" @selected(old('condition') === 'rusak ringan')>Rusak ringan</option>
            <option value="rusak parah" @selected(old('condition') === 'rusak parah')>Rusak parah</option>
        </select>
        <br>

        <label for="room_location">Lokasi Ruangan:</label>
        <input id="room_location" type="text" name="room_location" value="{{ old('room_location') }}" maxlength="255" placeholder="contoh: Ruang IT Lt 3"><br>

        <button type="submit">Simpan Barang</button>
        <br>
    </form>


</body>
</html>
