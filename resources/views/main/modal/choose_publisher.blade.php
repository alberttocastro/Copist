<!-- Modal: Escolher irmãos para designar para endereço -->
<div id="modal-assign-territory" class="modal">
    <form action="{{route('assign_to_territory')}}" method="post">
        @csrf
        <input type="hidden" id="card_id" name="card_id">
        <div class="modal-content">
            <h4>Assign Territory</h4> <br>
            <div class="row">
                <div class="input-field col s12">
                    <select name="publisher_1" id="publisher_1">
                        <option value="">Choose publisher</option>
                        {{-- Usuários aprovados são os que estão ligados a um publicador da congregação --}}
                        @foreach (App\User::approved_users() as $user)
                        <option value="{{$user->id}}">{{$user->publisher->name}}</option>
                        @endforeach
                    </select>
                    <label>Publisher 1</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="publisher_2" id="publisher_2">
                        <option value="0">Choose publisher</option>
                        @foreach (App\User::approved_users() as $user)
                        <option value="{{$user->id}}">{{$user->publisher->name}}</option>
                        @endforeach
                    </select>
                    <label>Publisher 2</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            <input type="submit" value="Send" class="modal-close waves-effect waves-green btn-flat">
        </div>
    </form>
</div>
