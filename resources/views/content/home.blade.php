@extends('layouts.app')

@section('content')
    <div>
        <projects-home id="projects-root" data-props='@json($projects)'></projects-home>
    </div>
@endsection