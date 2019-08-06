<template>
    <div class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h4><b>Address Types</b></h4>
            </div>
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <div class="row">
                        <div v-for="address_type in address_types" v-bind:key="address_type.id" class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <h5 style="margin-top: 0;">{{address_type.name}}</h5>
                                </div>
                                <!-- TODO: Botões de editar e deletar -->
                            </div>
                        </div>
                    </div>
                    <a href="#create-address-type"
                        class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger">
                        <span class="valign-wrapper " style="max-width:fit-content; margin: auto;">
                            <i class="material-icons">add_circle_outline</i> Add Address Type
                        </span>
                    </a>
                </div>
            </div>
        </div>
    <div class="modal" id="create-address-type">
        <!-- TODO: Colocar rota do formulário -->
        <form action="#" method="post">
            @csrf
            <div class="modal-content">
                <label for="name">Type</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-flat green-text">Create Address Type</button>
            </div>
        </form>
    </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            address_types: []
        }
    },
    created(){
        this.axios.get(routes.address_types()).then(response => {
            this.address_types = response.data.data;
        })
    }
}
</script>
