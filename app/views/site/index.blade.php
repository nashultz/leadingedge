@extends('layouts.sitedefault')

@section('content')
    <div class="col-md-5 col-md-push-7 col-lg-5 col-lg-push-7">

        @if (Auth::guest())
            <div id="guestAlertWindow">
            <div class="alert alert-info">
                Total Results: <span class="totalResults"></span>. Limited to 3 for guests.
            </div>
            </div>
        @endif

        <div id="map-content">
            <div id="map-container col-md-12 col-lg-12">
                <div id="map"></div>
            </div>
            <div id="inline-actions">
                <span>Max zoom level:
                    <select id="zoom">
                        <option value="-1">Default</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
                </span>
                <span class="item">Cluster size:
                    <select id="size">
                        <option value="-1">Default</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                    </select>
                </span>
                <span class="item">Cluster style:
                    <select id="style">
                        <option value="-1">Default</option>
                        <option value="0">People</option>
                        <option value="1">Conversation</option>
                        <option value="2">Heart</option>
                    </select>
                </span>
                <input id="refresh" type="button" value="Refresh Map" class="item"/>
                <a href="#" id="clear">Clear</a>
            </div><div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-4 col-md-pull-2 col-lg-4 col-lg-pull-2">
        @include('search.form')
    </div>
    <div class="col-md-3 col-md-pull-9 col-lg-3 col-lg-pull-9">
        @include('buttons.buttons')
    </div>
    <div class="clearfix"></div>   
@stop