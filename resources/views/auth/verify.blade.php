@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potvrďte emailovú adresu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Čerstvý link s potvrdením adresy vám práve prišiel na mail.') }}
                        </div>
                    @endif

                    {{ __('Než budete pokračovať, potvrďte svoju emailovú adresu.') }}
                    {{ __('Pokiaľ ste nedostali mailovú adresu') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Vypýtať nový potvrdzovací link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
