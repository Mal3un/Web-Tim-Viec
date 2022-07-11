@extends('layout_frontpage.master')
@section('content')
    @foreach ($posts as $post)
        <x-post :Post="$post"/>
    @endforeach
    <div class="col-md-12 col-lg-12">
        <ul class="pagination pagination-info" style="float: right">
            {{ $posts->links() }}
        </ul>
    </div>
@endsection
