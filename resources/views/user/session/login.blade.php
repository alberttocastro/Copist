@extends('application.layout')

@section('main')
    <div class="row">
        <div class="col s5" background="background.jpg">
            {{-- <%#= image_tag "background.jpg", class:"background"%> --}}
        </div>
        <div class="col s6">
            <div class="container">
                <h3>Log in</h3>
        
                <form action="/" method="post">
                    @method('post')
                    <div class="field">
                        <label for="email">Email</label><br/>
                        <input type="email" name="email" id="email" autofocus="true" autocomplete="email">
                    </div>
            
                    <div class="field">
                        <label for="password">Password</label><br />
                        <input type="email" name="email" id="email" autofocus="true" autocomplete="current-password">
                    </div>
            
                    <?php /* TODO: Rememberable?!
                    <% if devise_mapping.rememberable? -%>
                        <div class="field">
                        <%= f.check_box :remember_me %>
                        <%= f.label :remember_me %>
                        </div>
                    <% end -%> */ ?>
            
                    <div class="actions">
                        <input type="submit" value="Submit">
                    </div>
            
                    <%= render "devise/shared/links" %>
                </form>
            </div>
        </div>
        <div class="col s1">
        </div>
    </div>
@endsection