@extends('layouts.template')
@section('content')
<div class="container">
        <div class="jumbotron text-center">
            <h1><strong style="color: #3490dc">Welcome to LavMarxMang <i class="fa fa-bookmark"></i></strong></h1>
            <p class="small-text">LavMarxMang is a little snippet written with Laravel and Postgresql and axios to  remind its developer about the knowledge he has with Laravel after chances with Node.JS</p>


            @if( Auth::check() )
            <a class="btn btn-success"  href="{{ route('bookmark.index') }}" ><i class="fa fa-dashboard"></i> Dashboard</a>
            <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <p class="small"><b>Welcome on board Captain! - We are please to have you {{ Auth::user()->username }} :) </b></p>
            @else
            <a class="btn btn-success"  href="{{ route('login') }}" ><i class="fa fa-dashboard"></i> Sign in</a>
            @endif
        </div>


        <div class="mt-2">
            <p class="lead">Bookmarks</p>

            <ul class="list-group" id="items">

            @if(count($bookmarks) > 0)
                @foreach($bookmarks as $bookmark)
                        <li class="list-group-item">
                            <strong>{{$bookmark->name}}</strong>
                            <p class="lead">
                            - {{$bookmark->description}}
                            </p>

                            <p class="small-text">Link: <a href="{{$bookmark->url}}">{{$bookmark->url}}</a></p>
                        </li>
                @endforeach

            @else
                <div class="text-center alert alert-success">Opps! No Bookmark to display</div>

            @endif    

           </ul>

           <div class="row">
                {{$bookmarks->render()}}
           </div>
        </div>

</div>       



@stop