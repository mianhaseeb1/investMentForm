@extends('Frontend.layouts.app')
@section('tagName')
login-body
@endsection
@section('content')
    <div class="login-logo">
          <img src="img/login_logo.png" alt=""/>
      </div>

      <h2 class="form-heading">login</h2>
      <div class="container log-row">
            <div class="form-signin">
                <form action="{{route('frontend.auth.login')}}" class="form-horizontal" method="post">
                 @csrf
              <div class="login-wrap">
                <input type="text" name="email"  class="form-control" placeholder ={{trans('validation.attributes.frontend.register-user.email') }}/>
                     
                <input type="password" name="password"  class="form-control"/ placeholder ={{trans('validation.attributes.frontend.register-user.password') }} />
                <button class = 'btn btn-danger btn btn-block' style = 'margin-right:15px' type="submit">{{trans('labels.frontend.auth.login_button')}}</button>
                   
                  <div class="login-social-link">
                      <a href="index.html" class="facebook">
                          Facebook
                      </a>
                      <a href="index.html" class="twitter">
                          Twitter
                      </a>
                  </div>
                  <label class="checkbox-custom check-success">
                      <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                  </label>

                  <div class="registration">
                      Don't have an account yet?
                      <a class="" href="registration.html">
                          Create an account
                      </a>
                  </div>

              </div>
</form>
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>

                               {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->
  <!-- Form -->
         </div>
      </div>
@endsection