@extends('tmpl.public')

@section('__header') 
    
@stop  

@section('content') 

<section class="page">
    <div class="">
        <h1 class="center_title">Recipe +</h1>
    </div>
    <div class="row">       
        @if (Auth::check()) 
            <div class="message_outer">
                <a href="/admin" class="columns small-8 small-push-2 large-6 large-push-3 end message">
                    <span class="message_inner" >Return to Dashboard</span>
                </a>  
            </div>
                         
        @else
        <div class="columns small-12 medium-6 medium-push-3 end">
            {!! Form::open(array('url' => 'login', 'class' => 'login_form')) !!}

                <div class="form__input--side--login form__input--side--login--swipe">
                  {{ Form::label('email', 'Email: ', array('class' => 'input__name--white')) }}
                  {{ Form::email('email', '', array('placeholder'=>'Email', 'class'=>'form-control' ) ) }}
                </div>
                <div class="form__input--side--login form__input--side--login--swipe">
                  {{ Form::label('password', 'Password: ', array('class' => 'input__name--white')) }}
                  {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) }}
                </div>
                <a href="/signup" class="form_button_left">Register</a> 
                <input type="submit" name="login" class="form_button_right">


            {{ Form::close() }} 
            </div>
        @endif
    </div>
    <div class="row">
        <h1>Countdown Clock</h1>
            <div id="clockdiv">
              <div>
                <span class="days"></span>
                <div class="smalltext">Days</div>
              </div>
              <div>
                <span class="hours"></span>
                <div class="smalltext">Hours</div>
              </div>
              <div>
                <span class="minutes"></span>
                <div class="smalltext">Minutes</div>
              </div>
              <div>
                <span class="seconds"></span>
                <div class="smalltext">Seconds</div>
              </div>
            </div>
    </div>
</section>



<!-- <div class="band page">
<nav class=" subnav subnav--centre" data-tab data-options="deep_linking:true; scroll_to_content: false">
<h2 class="content__title--main"><a class="plain__header__link" href="/">Login</a></h2>
</nav>
<!-- <h2 class="content__title content__title--main"><a class="content__title--link" href="/profile">Login</a></h2> -->
<!-- </div>
-->
@stop 


@section('_footer') 
    

<script type="text/javascript">
    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var daysSpan = clock.querySelector('.days');
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    // var deadline = new Date(Date.parse(new Date()) + 95 * 24 * 60 * 60 * 1000);
    var deadline = 'December 01 2016 09:00:00 GMT+1000';
    initializeClock('clockdiv', deadline);




    </script>
@stop