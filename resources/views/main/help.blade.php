<div class="container">
    {{-- <%#Título da página%> --}}
    <div class="center">
        <h2 class="mt-0" style="font-weight: 500">Help Desk</h2>
    </div>
    
    <div class="divider"></div>
    <br>

    {{-- <%#Campo de pesquisa%> --}}
    <div class="row container mb-0">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Search</label>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <%# Collapsibles  %> --}}
    <ul class="collapsible popout">
        @forelse (App\Help::all() as $help)
            <li>
                <div class="collapsible-header"><i class="material-icons">help_outline</i><span id="question">{{$help->question}}</span></div>
                <div class="collapsible-body"><span>{{$help->answer}}</span></div>
            </li>
        @empty
            <h2>Você não tem perguntas ainda :/</h2>
        @endforelse
    </ul>
    
</div>