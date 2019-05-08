<!-- Modal: Escolher irmãos para designar para endereço -->
<div id="modal-assign-territory" class="modal">
    <form action="/" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="card">
        <div class="modal-content">
            <h4>Assign Territory</h4> <br>
            <div class="input-field col s12">
                <select name="publisher_2" id="publisher_1">
                    <option value="">Choose publisher</option>
                    @foreach (App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
                <label>Publisher 1</label>
            </div>
            
            <div class="input-field col s12">
                <select name="publisher_2" id="publisher_2">
                    <option value="">Choose publisher</option>
                    @foreach (App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
                <label>Publisher 2</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            <input type="submit" value="Send" class="modal-close waves-effect waves-green btn-flat">
        </div>
    </form>
</div>
