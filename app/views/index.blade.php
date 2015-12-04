@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!-- ISOTOPE -->
<script src="{{ URL::to("/") }}/js/isotope.masonry.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />
@stop

@section('content')
  @if (Session::get('msgWelcome'))
    <div class="container">
      <div class="twelve columns">
        <div class="message">{{ Session::get('msgWelcome') }}</div>
      </div>
    </div>
  @endif
  <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
  <div id="content">
  @if(Auth::user())
    @if(Auth::user()->news->count() > 0)
      <div class="albums" style="margin-bottom: 40px; margin-left: auto; margin-right: auto; display: table; width: 900px;">
        <hgroup class="profile_block_title">
          <h3><img src="{{ asset("img/logo-mini.png") }}" width="16" height="16"/>
            Atualizações:
          </h3>
        </hgroup>
        @include('includes.news')
      </div>
    @endif
  @endif
    <!--   PAINEL DE IMAGENS - GALERIA - CARROSSEL   -->  
    <div class="wrap">
      <div id="panel">
        @include('includes.panel')
      </div>
      <div class="panel-back"></div>
      <div class="panel-next"></div>
    </div>
    <!--   FIM - PAINEL DE IMAGENS  -->

  </div>
  <!--   FIM - MEIO DO SITE   -->

  <!--   MODAL   -->
    <div id="mask"></div>
    <div id="form_window" class="form window">
      <a class="close" href="#" title="FECHAR">Fechar</a>
      <div id="registration"></div>
    </div>
    <div id="confirmation_window" class="window">
      <div id="registration_delete">
        <p></p>
        {{ Form::open(array('url' => '', 'method' => 'delete')) }}
          <div id="registration_buttons">
            <input type="submit" class="btn" value="Confirmar" />
            <a class="btn close" href="#" >Cancelar</a>
          </div>
        {{ Form::close() }}
      </div>
    </div>

@stop