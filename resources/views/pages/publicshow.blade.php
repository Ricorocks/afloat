@extends('layouts.public-statamic')
@section('main')
  <main>
    @foreach($page->content_builder as $content)

    @if($content->type != "text")
    
    @include('pages.pagebuilder.'.$content->type, ['content' => $content])
    
    @endif
    
    @endforeach

  </main>
  @endsection


