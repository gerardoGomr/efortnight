@extends('layouts.app')

@section('content')
    <p class="pull-right">Welcome <b>{{ $user->getName() }}</b></p>
    <div class="clearfix"></div>

    <a href="/fortnight/add" class="btn btn-primary">Add a new fortnight</a>
    <br>
    @if($user->hasFortnights())
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>29/07/2017 - 15/08/2017</td>
                    <td>$2450.00</td>
                </tr>
            </tbody>
        </table>
    @else 
        <h4>There isn't any fortnights. Push add new fortnight button and register a new one.</h4>  
    @endif
@stop