@extends ('layouts.app')

@section ('title', 'Admin | Show One Category')

@section('page-header')
    <h2>
        Category Management
        <small>Show category</small>
    </h2>
@endsection

@section('content')
    <h1><?=$category->name?></h1>
    <?=$category->description?>
@endsection