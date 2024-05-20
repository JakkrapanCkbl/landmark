@extends('layout')
@section('content')

    <main>
        <div>
            <div class="mt-5">
                @if ($errors->any())
                    <div class="col-12">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>

           <div style="text-align: center">
                <p>We will send a link to your email, use that link to reset password.</p>
            </div>
            
            <form action="{{ route('forget.password.post') }}" method="POST">
                @csrf
                
                <div class="form-group row">
                    
                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </main>

    

@endsection
