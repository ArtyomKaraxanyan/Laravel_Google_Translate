@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ action('HomeController@translate')}}" method="post">

                            <div class="form-group">
                                <label for="exampleInputTitle">
                                    <select name="language" id="language">
                                        @include('languages')
                                    </select>
                                </label>
                                <textarea class="form-control" rows="5" type="text" name="one">
                                     </textarea>
                                    <br>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Translate" name="submit" class="btn btn-dark">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputBody">

                                    <select name="translate" id="translate">
                                        @include('languages')
                                    </select>
                                </label>
                                <textarea class="form-control" rows="5" type="text" name="tr" >
                                      @if(isset($_POST['submit']))
                                    {{$tr->translate($word)}}
                                    @endif
                                     </textarea>
                                    <br>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
