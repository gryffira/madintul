@extends('layouts.backend.main')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="position-left"></i> <span class="text-semibold">Dashboard</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('posts')}}" class="btn btn-link btn-float has-text"><i class="icon-info3 text-primary"></i><span>Berita</span></a>
                    <a href="{{ route('galeri')}}" class="btn btn-link btn-float has-text"><i class="icon-images2 text-primary"></i> <span>Foto</span></a>
                    <a href="{{ route('videos')}}" class="btn btn-link btn-float has-text"><i class="icon-youtube text-primary"></i> <span>Video</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>

                        <h3 class="no-margin">{{count($jumlah_santri)}}</h3>
                        Total Santri
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-4">

                <!-- Current server load -->
                <div class="panel bg-pink-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>

                        <h3 class="no-margin">{{count($jumlah_staff)}}</h3>
                        Total Staff
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div id="server-load"></div>
                </div>
                <!-- /current server load -->

            </div>

            <div class="col-lg-4">

                <!-- Today's revenue -->
                <div class="panel bg-blue-400">
                    <div class="panel-body">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>

                        <h3 class="no-margin">{{count($jumlah_guru)}}</h3>
                        Total Pengajar
                        <div class="text-muted text-size-small"></div>
                    </div>

                    <div id="today-revenue"></div>
                </div>
                <!-- /today's revenue -->

            </div>
        </div>
        <!-- /quick stats boxes -->
        <div class="">
            <!-- Basic pie chart -->
            <!-- Latest posts -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Berita Terbaru</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                         @foreach($posts as $post)
                        <div class="col-lg-6">
                            <ul class="media-list content-group">
                                <li class="media stack-media-on-mobile">
                                    <div class="media-left">
                                        <div class="thumb">
                                             @if ($post->image_url)
                                            <a href="{{ route('showpost', $post->id) }}">
                                                <img src="{{ $post->image_url }}" class="img-responsive img-rounded media-preview"  alt="">
                                                <span class="zoom-image"><i class=""></i></span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="{{ route('showpost', $post->id) }}">{{ $post->title }}</a></h6>
                                        <ul class="list-inline list-inline-separate text-muted mb-5">
                                            <li><i class="icon-book-play position-left"></i> {{ $post->author->name  }}</li>
                                            <li>{{ $post->date }}</li>
                                        </ul>
                                     
                                    </div>
                                </li>
                                  
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- /latest posts -->
        </div>
    </div>
</div>

@endsection
