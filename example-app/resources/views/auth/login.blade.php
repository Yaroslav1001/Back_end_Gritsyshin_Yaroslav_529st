<!DOCTYPE html>
<html>

@include('ViewSections.sectionHead')

<body>

<div class="container">

    @include('ViewSections.sectionNavbar')

    <br>

    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Login form
        </div>
        <div class="card-body">

            @if(session('status')==='password-updated')
                <p>{{__('Saved.')}}</p>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email') }}" required/>
                    @error('email')
                    <span class="text-red-50">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required/>
                    @error('password')
                    <span class="text-red-50">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="form"/>
                </div>
            </form>


        </div>
    </div>
</div>

</body>
</html>
