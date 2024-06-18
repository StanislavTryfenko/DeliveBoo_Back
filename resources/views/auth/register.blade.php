@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Utente') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Utente') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!--nome ristorante-->
                            <div class="mb-4 row">
                                <label for="name_restaurant"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="name_restaurant" type="type"
                                        class="form-control @error('name_restaurant') is-invalid @enderror"
                                        name="name_restaurant" value="{{ old('name_restaurant') }}" required
                                        autocomplete="name_restaurant">

                                    @error('name_restaurant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--indirizzo-->
                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="type"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--vat-->
                            <div class="mb-4 row">
                                <label for="vat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P.IVA Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="vat" type="type"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" required autocomplete="vat">

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--types-->
                            <div class="mb-4 row">
                                <label for="type" class="form-label">{{ __('Categorie Ristorante') }}</label>
                                <div class="d-flex gap-3">
                                    @foreach ($typeList as $type)
                                        <div class="form-check text-center ">
                                            <input name="typeList[]" class="form-check-input " type="checkbox"
                                                value="{{ $type->id }}" id="type-{{ $type->id }}"
                                                {{ in_array($type->id, old('typeList', [])) ? 'checked' : '' }} />
                                            <label class="form-check-label"
                                                for="type-{{ $type->id }}">{{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('typeList')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--Email Ristorante-->
                            <div class="mb-4 row">
                                <label for="contact_email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_email" type="type"
                                        class="form-control @error('contact_email') is-invalid @enderror"
                                        name="contact_email" value="{{ old('contact_email') }}" required
                                        autocomplete="contact_email">

                                    @error('contact_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="thumb"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>
                                <div class="col-md-6">

                                    <input type="file" class="form-control @error('thumb') is-invalid @enderror"
                                        id="thumb" name="thumb">

                                    @error('thumb')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="logo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Logo Ristorante') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo">
                                    @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
