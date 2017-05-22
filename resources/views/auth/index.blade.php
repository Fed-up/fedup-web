@extends('tmpl.admin')

@section('__header') 
@stop  
 
@section('content') 

<section class="page">
    <div class="">
        <h1 class="center_title">Fed Up Project</h1>
    </div>
    <div class="row content-boxes__wrapper">
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <a href="/admin/blog">
                <article class="content-box">
                    <p>Blog</p>
                </article>
            </a>
        </div>
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <a href="/admin/menu">
                <article class="content-box">
                    <p>Menu</p>
                </article>
            </a>
        </div>
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <a href="/admin/project">
                <article class="content-box">
                    <p>Project</p>
                </article>
            </a>
        </div>
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <!-- <a target="_blank" href="http://cheats.jesse-obrien.ca/"> -->
            <a href="/admin/event">
                <article class="content-box">
                    <p>Events</p>
                </article>
            </a>
        </div>
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <a href="/admin/catering">
                <article class="content-box">
                    <p>Catering</p>
                </article>
            </a>
        </div>
        <div class="columns small-12 medium-6 large-4 xxlarge-2 end">
            <a href="/admin/cake">
                <article class="content-box">
                    <p>Cakes</p>
                </article>
            </a>
        </div>
  
    </div>
</section>
@stop 