@extends('layouts.modal')

@section('content')

  <div class="container">

    <div id="registration">
    
      <h1>Cadastro</h1>
      <p>Faça seu cadastro para poder compartilhar imagens no Arquigrafia.<br>
      <small>* Todos os campos a seguir são obrigatórios.</small>
      </p>
      
      <?php 
      if (isset($messages)) {
        echo "<ul>";
        foreach ($messages->all('<li>:message</li>') as $message)
        {
            echo $message;
        }
        echo "</ul>";
      }
      ?>
      
      {{ Form::open(array('url' => 'users')) }}
        <p>{{ Form::label('name', 'Nome*:') }}</p>
        <p>{{ Form::text('name') }}</p>
        
        <p>{{ Form::label('login', 'Login*:') }}</p>
        <p>{{ Form::text('login') }}</p>
        
        <p>{{ Form::label('email', 'E-mail*:') }}</p>
        <p>{{ Form::text('email') }}</p>
        
        <p>{{ Form::label('password', 'Senha*:') }}</p>
        <p>{{ Form::text('password') }}</p>
        
        <p>{{ Form::label('passwordConfirm', 'Repita a senha*:') }}</p>
        <p>{{ Form::text('passwordConfirm') }}</p>
        
        <p>Li e aceito os <a href="/18/termsOfService" target="_blank" style="text-decoration: underline;">termos de compromisso</a>: 
        {{ Form::checkbox('terms', 'read') }} <br> <br><a href="http://creativecommons.org/licenses/?lang=pt" id="creative_commons" style="text-decoration:underline;">Creative Commons</a></p>
    
        <p>{{ Form::submit("CADASTRAR") }}</p>
        
      {{ Form::close() }}
      
    </div>
    
  </div>
    
@stop