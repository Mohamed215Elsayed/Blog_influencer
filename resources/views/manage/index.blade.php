@extends('layouts.appAdmin')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- main body dashboard --}}
    <div class="content-wrapper" style="background: none; padding:10px;">
        <div class="row mt-3">
            <div class="col col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $numberOfUsers }}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{route('manage.users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
            <div class="col col-md-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$Posts_count  }}</h3>
                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fa-regular fa-address-card"></i>
                    </div>
                    <a href="{{route('manage.post.index')}}" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a> 
                </div>

            </div>
            <div class="col col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$comment_count}}</h3>
                        <p>Comments</p>
                    </div>
                    <div class="icon">
                        <i class="fa-regular fa-comment"></i>
                        </div>
                    <a href="{{route('manage.comments.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
           
        </div>
    </div>

    {{-- ----------------------------------------------------------------------------------------------------- --}}
    {{-- latest udates tables --}}

    <div class="content-wrapper" style="background: none; padding:10px">
        <div class="row">
            <div class="col col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Users</h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th style="width: 153px" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestUsers as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                   
                                    <td>
                                        <a href="{{route('manage.users.show' ,['user_id' => $user->id ])}}">
                                            <span class="badge bg-info">View</span>
                                        </a>
                                        <a href="{{route('manage.users.edit' ,['user_id' => $user->id ])}}">
                                            <span class="badge bg-success">Edit</span>
                                        </a>
                                        <a href="{{route('manage.users.delete' ,['user_id' => $user->id ])}}" onclick="return confirm('Are You Sure?')">
                                            <span class="badge bg-danger">Delete</span>
                                        </a>
                                    </td>
                                </tr> 
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

 {{-- ----------------------------------------------------------------------------------------------------- --}}
    {{-- the sconed table start --}}
             <div class="col col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Posts </h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>topic</th>
                                    <th style="width: 160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach( $latestPosts  as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                        
                                    <td> {{$post->metadata}}</td>
                                    <td>
                                        <a href="{{route('user.main.post' ,['post_id' => $post->id ])}}">
                                            <span class="badge bg-info">View</span>
                                        </a>
                                        <a href="{{route('manage.post.edit' ,['post_id' => $post->id ])}}">
                                            <span class="badge bg-success">Edit</span>
                                        </a>
                                        <a href="{{route('manage.post.delete' ,['post_id' => $post->id ])}}" onclick="return confirm('Are You Sure?')">
                                            <span class="badge bg-danger">Delete</span>
                                        </a>
                                    </td>
                                                            
                               </tr>
                              @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> 
    </div>
@endsection
