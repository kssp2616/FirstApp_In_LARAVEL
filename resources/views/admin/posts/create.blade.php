@extends('dashboard')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
   <div class="card card-default">
    <div class="card-header">{{isset($post)?'Update Post':'Add a new Post'}} </div>
    <div class="card-body">
      <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @if(isset($post))
        @method('PUT')
        @endif
        <div class="form-group">
          <label for="post title">Post title :</label>
          <input type="text" placeholder="add a new Post" name="title" class="form-control" value="{{isset($post)?$post->title:''}}">
        </div>
        <div class="form-group">
          <label for="post description">Post description :</label>
          <textarea type="text" placeholder="add a new description" name="description" class="form-control">{{isset($post)?$post->description:''}}</textarea>
        </div>
        <div class="form-group">
          <label for="post content">Post content :</label>
          <textarea type="text" placeholder="add a new content" name="content" class="form-control" rows="3">{{isset($post)?$post->content:''}}</textarea>
          <!--tag code-->
        </div>
        @if(isset($post))
        <div class="form-group">
          <img src="{{asset('storage/'.$post->image)}}" style="width: 100%">
        </div>
       @endif
        <div class="form-group">
          <label for="post image">Post image :</label><br>
          <input type="file" name="image">
        </div>
      <div class="form-group">
        <label for="selectcategory">Select a Category</label>
           <select name="categoryid" class="form-control" id="selectcategory">
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
      </div>
       @if(!$tags->count()<=0 && isset($post))
      <div class="form-group">
        <label for="selecttag">Select a Tag</label>
           <select name="tags[]" class="form-control tags" id="selecttag" multiple>
              @foreach($tags as $tag)
              <option value="{{$tag->id}}"
               @if($post->hastag($tag->id))
                selected
               @endif
                >
                {{$tag->name}}
              </option>
              @endforeach
            </select>
      </div>
      @endif
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <div class="form-group">
          <button type="submit" href="#" class="btn btn-success">{{isset($post)?'Update Post':'Add Post'}}</button>
        </div>
      </form>
    </div>
   </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.tags').select2();
});
</script>
@endsection