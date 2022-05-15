@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Page Contact</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis praesentium atque, qui architecto error,
            minima inventore vero dolorem quam reiciendis, molestias ipsam commodi quos. Similique, est. Ipsam, amet
            aliquid! Voluptate.</p>

        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="emailAdress" class="form-label">Adresse Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" aria-describedby="emailHelp"
                    placeholder="ex: test@gmail.com" name="email" type="text" value="{{ old('email') }}">
                <div id="emailAdress" class="form-text">Votre adresse ne sera jamais utilisée dans le cadre de
                    prospection ou marketing</div>
                @if ($errors->has('email'))
                    <div class="{{ $errors->has('email') ? 'invalid-feedback' : '' }}">
                        {{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Sujet</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" id="subject"
                    placeholder="test exemple" name="subject" value="{{ old('subject') }}" type="text">

                @if ($errors->has('subject'))
                    <div class="{{ $errors->has('subject') ? 'invalid-feedback' : '' }}">
                        {{ $errors->first('subject') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" id="message"
                    placeholder="test exemple" name="message" type="text" cols="30"
                    rows="5">{{ old('message') }}</textarea>

                @if ($errors->has('message'))
                    <div class="{{ $errors->has('message') ? 'invalid-feedback' : '' }}">
                        {{ $errors->first('message') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mb-3">Nous contacter</button>
        </form>
    </div>
@endsection
