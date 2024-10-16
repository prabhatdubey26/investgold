@include('include/header_main')
@include('include/header')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                   
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $user->token }}">

                            <div class="form-group">
                                <label for="password">{{ __('New Password') }}</label>
                                <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-2">
                                {{ __('Reset Password') }}
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include/footer')
