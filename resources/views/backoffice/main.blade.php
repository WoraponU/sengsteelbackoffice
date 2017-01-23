@extends('layouts.template')

@section('content')
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <tabs>
        <tab name="User Management" :selected="true">
            <div class="container center-align">
                <div class="row">
                    <a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
                </div>

                <div class="row">
                    <Card></Card>
                    <Card></Card>
                    <Card></Card>
                </div>
            </div>
        </tab>
        <tab name="Tuck Management">
           <div class="container center-align">
                <div class="row">
                    <a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
                </div>

                <div class="row">
                    <Card></Card>
                    <Card></Card>
                    <Card></Card>
                </div>
            </div>
        </tab>
    </tabs>
@endsection