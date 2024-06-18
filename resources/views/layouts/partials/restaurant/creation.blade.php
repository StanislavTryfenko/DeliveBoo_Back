<div class="container-fluid">
    <div class="row p-4">
        <h2>Aggiungi il tuo ristorante</h2>
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-2">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}" placeholder="es.Locanda Team 6" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" value="{{ old('address') }}" placeholder="es.Via Italia n* 6" required>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="phone_number" class="form-label">Numero di telefono</label>
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    name="phone_number" value="{{ old('phone_number') }}" placeholder="es.333 456 7810">
                @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="contact_email" class="form-label">Email</label>
                <input type="text" class="form-control @error('contact_email') is-invalid @enderror"
                    id="contact_email" name="contact_email" value="{{ old('contact_email') }}"
                    placeholder="es.example@gmail.com" required>
                @error('contact_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                    name="logo">
                @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="thumb" class="form-label">Immagine di copertina</label>
                <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb">
                @error('thumb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="type" class="form-label">Categoria ristorante</label>
                <div class="d-flex gap-3">
                    @foreach ($typeList as $type)
                        <div class="form-check text-center ">
                            <input name="typeList[]" class="form-check-input " type="checkbox"
                                value="{{ $type->id }}" id="type-{{ $type->id }}"
                                {{ in_array($type->id, old('typeList', [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('typeList')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="vat" class="form-label">Vat</label>
                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat"
                    name="vat" value="{{ old('vat') }}" placeholder="es.11111111111" required>
                @error('vat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-12 d-flex justify-content-center gap-2 py-4">
                <button type="submit"
                    class="btn border-2 border-primary rounded-pill btn-sm p-2 btn_pills text-primary fw-bold">
                    Conferma creazione</button>
            </div>
        </form>
    </div>

</div>
