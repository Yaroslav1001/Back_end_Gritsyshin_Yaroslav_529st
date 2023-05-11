<!DOCTYPE html>
<html>

@include('ViewSections.sectionHead')

<body>

<div class="container">

    <!-- navbar menu -->
    @include('ViewSections.sectionNavbar')
    <br>

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Guestbook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                    <!-- form -->
                    <form method="POST" name="form" class="fw-bold">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Text</label>
                            <textarea name="text" class="form-control" id="exampleInputText" placeholder="Enter text"
                                      required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send">
                        </div>
                    </form>
                    <br>
                </div>

                <!-- TODO: render php data   -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Сomments
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    @foreach($comments as $comment)
                        <!-- Вывод комментариев -->
                        <h3> {{ $comment->name }} </h3> <br>
                        {{ $comment->email }}<br>
                        <b> {{ $comment->text }} </b> <br>
                        {{ $comment->date }} <br>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</body>
</html>
