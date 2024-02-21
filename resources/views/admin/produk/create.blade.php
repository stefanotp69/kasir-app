<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <h4><b>{{ $title }}</b></h4>

                <hr>

                @isset($produk)
                    <form action="/admin/produk/{{ $produk->id }}" method="POST">
                        @method('PUT')
                @else
                    <form action="/admin/produk" method="POST">
                @endisset
                <form action="/admin/produk" method="POST">

                @csrf
                    <label for="">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Produk" value="{{ isset($produk) ? $produk->name : old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga Produk" value="{{ isset($produk) ? $produk->harga : old('harga')}}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="stok Produk" value="{{ isset($produk) ? $produk->stok : old('stok')}}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <a href="/admin/produk" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>