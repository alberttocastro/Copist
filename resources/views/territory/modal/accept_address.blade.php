<div id="accept-address" class="modal">
    <form action="" method="post">
        @csrf
        @method('post')
        <input type="hidden" name="suggeste_address_id" class="hidden-id">
        <!-- Conteúdo -->
        <div class="modal-content">
            <h4>Add a new territory</h4> <br>
            <div class="input-field col s12">
                Street <br>
                <input type="text" name="street" id="street" class="textarea-street">
            </div>
            <div class="input-field col s12">
                Neighborhood <br>
                <input type="text" name="neighborhood" id="neighborhood" class="textarea-neighborhood">
            </div>
            <div class="input-field col s12">
                Name <br>
                <input type="text" name="name" id="name" class="textarea-name">
            </div>
            <div class="input-field col s12">
                Comments <br>
                <input type="text" name="comments" id="comments" class="textarea-comments">
            </div>
            <div class="input-field col s12">
                Type of Address <br>
                <select name="address_type_id" id="address_type_id">
                    @foreach (App\Address_type::all() as $address_type)
                        <option value="{{$address_type->id}}">{{$address_type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12">
                Macro-Region<br>
                <select name="macroregion_id" id="macroregion_id">
                    @foreach (App\Macro_region::all() as $macro_region)
                        <option value="{{$macro_region->id}}">{{$macro_region->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12">
                Group<br>
                <select name="group_id" id="group_id">
                    @foreach (App\Group::all() as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12">
                Card<br>
                <select name="card_id" id="card_id">
                    <option value="0" selected>No card</option>
                    @foreach (App\Card::all() as $card)
                        <option value="{{$card->id}}">{{$card->name}} - {{$card->number}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Agree" class="modal-close waves-effect waves-green btn-flat" >
        </div>
    </form>
</div>