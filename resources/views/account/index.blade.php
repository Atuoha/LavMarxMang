@extends('layouts.app')

@section('content')

<div class="container">
        <div class="jumbotron text-center">
            <h1><strong>Welcome to LavMarxMang {{ Auth::user()->username }} <i class="fa fa-bookmark"></i></strong></h1>
            <p class="small-text"><b>Welcome on board Captain!</b> LavMarxMang is a little snippet written with Laravel and Postgresql and axios to  remind its developer about the knowledge he has with Laravel after chances with Node.JS</p>

            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#addModal" type="button" name="button">Add Bookmark</button>
        </div>  
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
    <div class="mt-2">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Bookmark</th>
                            <th>Url</th>
                            <th>Desc</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($bookmarks) > 0)
                            @foreach($bookmarks  as $bookmark)
                                <tr>
                                    <td>{{$bookmark->name}}</td>
                                    <td><a target="_blank" href="{{$bookmark->url}}">Link</a></td>
                                    <td>{{$bookmark->description}}</td>
                                    <td><a id="{{$bookmark->id}}" class="btn btn-danger">Delete</a></td>
                                    <td><a  class="upd_btn btn btn-success" href="{{$bookmark->description}}" rel="{{$bookmark->name}}"  id="{{$bookmark->id}}" data-url="{{$bookmark->url}}">Update</a></td>


                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-danger"><b>OOPS!</b> No bookmark to show</div>
                        @endif
                    </tbody>

                </table>

                <div class="text-center">
                    {{ $bookmarks->render() }}
                </div>
            </div>


            <div class="col-md-6 edit_form">
                <p class="lead" id="edit_info"></p>
                {!! Form::open(['method'=>'Post', 'action'=>'BookmarkController@store', 'id'=>'edit_form']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('edit_name', 'Bookmark Name') !!}
                                {!! Form::text('name', null, ['class'=>"form-control", 'required autofocus', 'id'=>'edit_name']) !!}

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('edit_url', 'Bookmark Url') !!}
                                    {!! Form::text('url', null, ['class'=>"form-control", 'required', 'id'=>'edit_url']) !!}

                                    @error('url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                  
                    
                        <div class="form-group">
                            {!! Form::label('edit_description', 'Bookmark description') !!}
                            {!! Form::textarea('description', null, ['class'=>"form-control", 'cols'=>4, 'rows'=>4, 'required', 'id'=>'edit_description']) !!}

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit Bookmart to list', ['class'=>'btn btn-success'] ) !!}
                        </div>
            
            {!! Form::close() !!}
            </div>



        </div>
    </div>

</div>


	  
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <h4 class="modal-title">Add Bookmark</h4>
            {!! Form::open(['method'=>'Post', 'action'=>'BookmarkController@store']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Bookmark Name') !!}
                        {!! Form::text('name', null, ['class'=>"form-control", 'required autofocus']) !!}

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                            {!! Form::label('url', 'Bookmark Url') !!}
                            {!! Form::text('url', null, ['class'=>"form-control", 'required']) !!}

                            @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
            </div>

            {!! Form::hidden('user_id', Auth::user()->id ) !!}
            
                <div class="form-group">
                    {!! Form::label('description', 'Bookmark description') !!}
                    {!! Form::textarea('description', null, ['class'=>"form-control", 'cols'=>4, 'rows'=>4, 'required']) !!}

                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::submit('Add Bookmart to list', ['class'=>'btn btn-primary'] ) !!}
                </div>
            
            {!! Form::close() !!}


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<style>
    .edit_form{
        display:none;
    }
</style>







@stop