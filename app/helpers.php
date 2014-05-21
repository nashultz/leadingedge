<?php

function protected_link($text, $url, $permission, $attributes = null) {
  if (Auth::user()->can($permission)) {
        $attributes = HTML::attributes($attributes);
    return "<a href='{$url}' {$attributes}>{$text}</a>";
  }
}

function css($location, $file) {
  $path = URL::to("assets/{$location}/css/{$file}");
  return "<link href='{$path}' rel='stylesheet' type='text/css' />";
}

function js($location, $file) {
  $path = URL::to("assets/{$location}/js/{$file}");
  return "<script src='{$path}' type='text/javascript'></script>";
}

function img($location, $file, $attributes = array()) {
  $path = URL::to("assets/{$location}/img/{$file}");
  $attributes = HTML::attributes($attributes);
  return "<img src='{$path}' {$attributes} />";
}

function showimg($file, $attributes = array()) {
  $path = URL::to("{$file}");
  $attributes = HTML::attributes($attributes);
  return "<img src='{$path}' {$attributes} />";
}

function a($text, $url, $urlReference, $attributes = array()) {
  if (Request::is($urlReference))
  {
    $attributes['class'] .= "active";
  }
  $attributes = Html::attributes($attributes);
  return "<a href='{$url}' $attributes>{$text}</a>";
}

function nivocss($file) {
  $path = URL::to("assets/nivo/{$file}");
  return "<link href='{$path}' rel='stylesheet' type='text/css' />";
}

function nivojs($file) {
  $path = URL::to("assets/nivo/{$file}");
  return "<script src='{$path}' type='text/javascript'></script>";
}

function osmplayercss($file) {
  $path = URL::to("assets/osmplayer/{$file}");
  return "<link href='{$path}' rel='stylesheet' type='text/css' />";
}

function osmplayerjs($file) {
  $path = URL::to("assets/osmplayer/{$file}");
  return "<script src='{$path}' type='text/javascript'></script>";
}

function iconbtn($text) {
  $textupper = ucfirst($text);
  return "class='{$text}btn ttip' data-toggle='ttip' title='{$textupper}' ";
}

function createnewbtn() {
  return "class='createnewbtn ttip btn' data-toggle='ttip' title='Create New' ";
}

function deletebtn($attributes = array()) {
  $attributes = HTML::attributes($attributes);
  return "'&#xe030;',array('class'=>'deletebtn ttip','data-toggle'=>'ttip','title'=>'Delete')";
}

function delsubbtn() {
  return Form::submit('&#xe030;',array('class'=>'deletebtn ttip','data-toggle'=>'ttip','title'=>'Delete'));
}

function dissubbtn() {
  return Form::submit('&#xe034;',array('class'=>'disablebtn ttip','data-toggle'=>'ttip','title'=>'Disable'));
}

function moveupbtn() {
  return Form::submit('&#xe129;',array('class'=>'moveupbtn ttip','data-toggle'=>'ttip','title'=>'Move Up'));
}

function movedownbtn() {
  return Form::submit('&#xe124;',array('class'=>'movedownbtn ttip','data-toggle'=>'ttip','title'=>'Move Down'));
}

function restorebtn() {
  return Form::submit('&#xe023;',array('class'=>'restorebtn ttip','data-toggle'=>'ttip','title'=>'Restore'));
}

function removesubbtn() {
  return Form::submit('&#xe00a;',array('class'=>'removebtn ttip','data-toggle'=>'ttip','title'=>'Remove'));
}

function backto($link, $text) {
  return View::make('layouts.backto',array('view'=>"{$link}",'text'=>"{$text}"))->render();
}

function createnew($text) {
  return View::make('layouts.createnew',array('view'=>"{$text}"))->render();
}

function subnav($text) {
  return View::make("layouts.{$text}subnav")->render();
}

function spacer($text) {
  return "<div class='clearfix spacer-{$text}'></div>";
}

function grid($text) {
  return "<div class='g_{$text}'>";
}

function gridlast($text) {
  return "<div class='g_{$text}_last'>";
}

function endgrid() {
  return "</div>";
}

?>