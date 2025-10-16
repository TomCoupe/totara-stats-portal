@extends('layouts.app')

@section('content')
    <div>
        <projects-home
                id="projects-root"
                data-props='@json($projects)'
                data-tversion='{{ $maxTotaraVersion }}'
                data-phpversion='{{ $maxPhpVersion }}'
                data-mysqlversion='{{ $maxMysqlVersion }}'
        ></projects-home>
    </div>
@endsection