<!-- Modal: Escolher irmãos para designar para endereço -->
<div id="modal-assign-territory" class="modal">
        <%= form_tag choose_publisher_to_assign_path do %>
        <%= hidden_field_tag(:card, 0) %>
            <div class="modal-content">
                <h4>Assign Territory</h4> <br>
                <div class="input-field col s12">
                    <%= select_tag(:publisher_1, options_from_collection_for_select(User.all, :id, :email), {include_blank: "Choose publisher"} ) %>
                    <label>Publisher 1</label>
                </div>
                
                <div class="input-field col s12">
                    <%= select_tag(:publisher_2, options_from_collection_for_select(User.all, :id, :email), {include_blank: "Choose publisher"} ) %>
                    <label>Publisher 2</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                <%= submit_tag "Send", class:"modal-close waves-effect waves-green btn-flat" %>
            </div>
        </div>
        <% end %>