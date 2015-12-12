<?php 
  $news = Auth::user()->news->reverse(); 
?>

@foreach($news as $info)

<?php 
  $size = 1;   
?>

@if($info->news_type == 'new_photo')
<!--Alguém que você segue inseriu uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}' class="name">
    {{User::find($info->sender_id)->name}} postou uma nova foto
  </a>
  <br />
</div>
@elseif($info->news_type == 'new_institutional_photo')<!--Uma instituição inseriu uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}' class="name">
    A instituição {{Institution::find($info->sender_id)->name}} postou uma nova foto
  </a>
  <br />
</div>
@elseif($info->news_type == 'commented_photo')<!--Alguém que você segue comentou uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . Comment::find($info->object_id)->photo_id . "#" . $info->object_id}}'>                 
    <img src={{"/arquigrafia-images/" . Comment::find($info->object_id)->photo_id . "_home.jpg"}} title="{{ Photo::find(Comment::find($info->object_id)->photo_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . Comment::find($info->object_id)->photo_id . "#" . $info->object_id}}' class="name">
    @if($info->data == null)
        {{User::find($info->sender_id)->name}} comentou em uma foto
      @else
        <?php 
          $users = explode(":", $info->data);
          $users_size = count($users);
        ?>
        {{$users_size}} usuários comentaram em uma foto
      @endif
  </a>
  <br />
</div>
@elseif($info->news_type == 'evaluated_photo')<!--Alguém que você segue avaliou uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id . "/viewEvaluation/" . $info->sender_id}}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a  href='{{ URL::to("/photos") . "/" . $info->object_id . "/viewEvaluation/" . $info->sender_id}}' class="name">
    @if($info->data == null)
      {{User::find($info->sender_id)->name}} avaliou uma foto
      @else
        <?php 
          $users = explode(":", $info->data);
          $users_size = count($users);
        ?>
        {{$users_size}} usuários avaliaram uma foto
      @endif
  </a>
  <br />
</div>
@elseif($info->news_type == 'new_profile_picture')<!--Alguém que você segue trocou a foto de perfil-->
<div class="gallery_box">
  <a href='{{ URL::to("/users") . "/" . $info->object_id }}'>                 
    @if(User::find($info->object_id)->photo != null)
      <img src={{"/arquigrafia-avatars/" . $info->object_id . ".jpg"}} title="{{ User::find($info->object_id)->name }}" class="gallery_photo">
    @else
      <img src="{{ URL::to("/") }}/img/avatar-48.png" title="{{User::find($info->object_id)->name}}" class="gallery_photo">
    @endif
  </a>
  <a href='{{ URL::to("/users") . "/" . $info->object_id }}' class="name">
    {{User::find($info->sender_id)->name}} trocou sua foto de perfil
  </a>
  <br />
</div>
@elseif($info->news_type == 'edited_photo')<!--Alguém que você segue editou uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}' class="name">
    {{User::find($info->sender_id)->name}} editou uma foto
  </a>
  <br />
</div>
@elseif($info->news_type == 'edited_profile')<!--Alguém que você segue editou o perfil-->
<div class="gallery_box">
  <a href='{{ URL::to("/users") . "/" . $info->object_id }}'>                 
    @if(User::find($info->object_id)->photo != null)
      <img src={{"/arquigrafia-avatars/" . $info->object_id . ".jpg"}} title="{{ User::find($info->object_id)->name }}" class="gallery_photo">
    @else
      <img src="{{ URL::to("/") }}/img/avatar-48.png" title="{{User::find($info->object_id)->name}}" class="gallery_photo">
    @endif
  </a>
  <a href='{{ URL::to("/users") . "/" . $info->object_id }}' class="name">
    {{User::find($info->sender_id)->name}} editou seu perfil
  </a>
  <br />
</div>
@elseif($info->news_type == 'highlight_of_the_week')<!--Destaque da semana-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}' class="name">
    Confira o destaque desta semana!
  </a>
  <br />
</div>
@elseif($info->news_type == 'liked_photo')<!--Alguém que você segue gostou de uma foto-->
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id }}' class="name">
    @if($info->data == null)
      {{User::find($info->sender_id)->name}} gostou de uma foto
    @else
      <?php 
        $users = explode(":", $info->data);
        $users_size = count($users);
      ?>
      {{$users_size}} usuários gostaram de uma foto
    @endif
  </a>
  <br />
</div>
@elseif($info->news_type == 'check_institution')
<div class="gallery_box">
  <a href='{{ URL::to("/institutions") . "/" . $info->object_id }}'>                 
    <img src={{"/arquigrafia-avatars-inst/" . $info->object_id . ".jpg"}} title="{{ Institution::find($info->object_id)->name }}"  />
  </a>
  <a href='{{ URL::to("/institutions") . "/" . $info->object_id }}' class="name">
    Novas imagens adquiridas pelo {{Institution::find($info->object_id)->name}}
  </a>
  <br />
</div>
@elseif($info->news_type == 'check_evaluation')
<div class="gallery_box">
  <a href='{{ URL::to("/photos") . "/" . $info->object_id . "/evaluate" }}'>                 
   <!-- <img src={{"/arquigrafia-images/" . $info->object_id . "_home.jpg"}} title="{{ Photo::find($info->object_id)->name }}" class="gallery_photo" /> -->
   <img src="/img/GraficoFixo.png" class="gallery_photo"/>
  </a>
  <a href='{{ URL::to("/photos") . "/" . $info->object_id . "/evaluate" }}' class="name">
   Confira as últimas impressões sobre a imagem {{Photo::find($info->object_id)->name}} 
  </a>
  <br />
</div>
@elseif($info->news_type == 'check_leaderboard')
<div class="gallery_box">
  <a href='{{ URL::to("/leaderboard") }}'>                 
    <img src={{"/img/leaderboard.jpg"}} title="Learderboard arquigrafia" class="gallery_photo" />
  </a>
  <a href='{{ URL::to("/leaderboard") }}' class="name">
    Conheça o quadro de colaboradores do Arquigrafia
  </a>
  <br />
</div>
@endif

@endforeach