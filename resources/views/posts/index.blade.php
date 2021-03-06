@extends('admin.main')

@section('title', '| all Posts')

@section('content')

   <div class="main-content">
    
    <div class="row">
    	<div class="col-md-10">
    		<h1>All posts</h1>
    	</div>
    	<div class="col-md-2">
    		<a href="{{ route('posts.create') }}" class="btn btn-sm btn-block btn-primary btn-h1-spacing">Create new post</a>
    	</div>
    	<div class="col-md-12">
    	   <hr>	
    	</div>
    </div> 
    {{-- end of row --}}
    <div class="row">
    	<div class="col-md-12">
    		<table class="table">
    			<thead>
    				<th>#</th>
    				<th>Title</th>
    				<th>Body</th>
    				<th>Created at</th>
    				<th></th>
    			</thead>
    			<tbody>
    				@foreach($posts as $post)
						
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0,50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</td>
							<td>{{ date('M j, Y',strtotime($post->created_at))}}</td>
							<td>
                                <div class="btn-group" role="group">
                                   <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
                                </div>
								
							</td>
						</tr>


    				@endforeach
    			</tbody>
    		</table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
    	</div>
    </div>
</div>

@stop