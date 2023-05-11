@extends('layouts.app')

@section('title', 'Pengajar | Onlined')

@section('styles')
    <link rel="stylesheet" href="{{ asset('template/edison/css/team.min.css') }}" />
@endsection

@section('header')
    <header class="page">
        <div class="page_breadcrumbs">
            <div class="container">
                <ul class="page_breadcrumbs-list d-flex flex-wrap align-items-center">
                    <li class="list-item">
                        <a href="index.html" class="link">Home</a>
                    </li>

                    <li class="list-item">Pengajar</li>
                </ul>
            </div>
        </div>

        <div class="page_main">
            <div class="underlay"></div>
            <div class="container">
                <div class="content-wrapper">
                    <h1 class="page_main-header">Pengajar</h1>
                    <p class="page_main-text">
                        Donec accumsan, dolor ac malesuada rhoncus, leo arcu pellentesque dolor, nec tristique diam neque
                        vitae sem.
                        Nulla a lectus sollicitudin, volutpat lacus id, eleifend ipsum.
                    </p>

                    <form class="page_main-form" action="#" method="post" data-type="search">
                        <i class="icon-search-solid icon"></i>
                        <input class="field required" type="search" placeholder="Search for…" />
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <section class="team">
        <div class="container">
            <ul class="team_list d-flex flex-wrap">
                @foreach ($teachers as $item)
                    <li class="team_list-item col-sm-6 col-lg-4 col-xl-3" data-aos="fade-up" data-order="1"
                        data-media="img/team/01">

                        @if ($item->photo != null)
                            <div class="media">
                              <picture>
                                  <source data-srcset="{{ asset('storage/' . $item->photo) }}" srcset="{{ asset('storage/' . $item->photo) }}" />
                                  <img class="lazy" data-src="{{ asset('storage/' . $item->photo) }}" src="{{ asset('storage/' . $item->photo) }}" alt="media" />
                              </picture>
                          </div>
                        @else
                            <span class="top_icon top_icon--blue">
                                <i class="icon-code-solid icon"></i>
                            </span>
                        @endif
                        <div class="main">
                            <h5 class="name">{{ $item->name }}</h5>
                            <span class="profession">{{ $item->description }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('template/edison/js/team.min.js') }}"></script>
@endsection
