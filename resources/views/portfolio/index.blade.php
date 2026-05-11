@extends('layouts.app')

@section('content')
    <x-hero-section       :portfolio="$portfolio" />
    <x-about-section      :portfolio="$portfolio" />
    <x-skills-section     :portfolio="$portfolio" />
    <x-projects-section   :portfolio="$portfolio" />
    <x-experience-section :portfolio="$portfolio" />
    <x-contact-section    :portfolio="$portfolio" />
@endsection
