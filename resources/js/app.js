require('./initialization');
require('./vue.js');

// Document Ready Início
$(function () {

    // Formulário para pesquisar as perguntas do HELPDESK
    var questions = {};
    var questions_objects = $('span#question')
    for (var i = 0; i < questions_objects.length; i++) {
        questions[questions_objects[i].innerText] = null;
    }
    $('input.autocomplete').autocomplete({
        data: questions,
    });

    $("input#autocomplete-input.autocomplete").on('input', function () {
        searchHelp()
    }).change(function () {
        searchHelp();
    });

    $('.carousel').carousel({
        fullWidth: true,
        indicators: true,
        noWrap: true
    });

    // Trocando a cor de fundo da aplicação caso não seja a tela de login
    if (window.location.pathname != "/login") {
        $("body").addClass("grey lighten-3")
    }

    notHidden();
    $(window).resize(function () {
        notHidden();
    });

    console.log("Passei aqui");

    $('.modal').modal();

    $('.collapsible').collapsible();

    $('.tabs').tabs();

    $(".dropdown-trigger").dropdown({
        coverTrigger: false
    });

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: false,
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });

    $('.button-collapse').sidenav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        onOpen: function (el) {
            /* Do Stuff */
        }, // A function to be called when sideNav is opened
        onClose: function (el) {
            /* Do Stuff */
        }, // A function to be called when sideNav is closed
    });

    $('.fixed-action-btn').floatingActionButton({
        direction: 'top', // Direction menu comes out
        hoverEnabled: true, // Hover enabled
        toolbarEnabled: false // Toolbar transition enabled
    });


    $("#dropdown-trigger").dropdown({
        hover: true,
        coverTrigger: false,
        beloworigin: true
    });

    $('.sidenav').sidenav();

    // Na lista de endereços sugeridos,
    // Coloca os dados que aparecem na lista dentro do formulário do
    // modal de adicionar novo endereço
    $(".modal-trigger.suggested-address").click(function (event) {
        var id = event.target.id;

        $(".hidden-id").val(id);
        $(".textarea-street").val($("#" + id + ".street")[0].innerText);
        $(".textarea-neighborhood").val($("#" + id + ".neighborhood")[0].innerText);
        $(".textarea-name").val($("#" + id + ".name")[0].innerText);
        $(".textarea-comments").val($("#" + id + ".comments")[0].innerText);
    });

    // Colocando o id do endereço no modal quando o botão de adicionar um relatório de visita for clicado
    $("a.report-visit").click(function (event) {
        var id = event.target.id;

        console.log("Adicionar relatório clicado");

        $("input#address_id").val(id);
    });

    /*
    Quando o usuário clicar em adicionar um publicador para um território (designar)
    Transporta o número do território para o modal
    */
    $(".add-publisher-button").click(function (event) {
        var id = event.target.id;

        $("input#card_id").val(id);
    });

    // Setar id do endereço ao clicar no botão para adicionar cartão ao território
    $(".add-card-to-address-button").click(function (event) {
        var id = event.target.id;

        $("input#address_id").val(id);
    })

    suggestTerritoryValidation();

    let checkbox_object = $("input:checkbox");

    checkbox_object.change(function () {
        window.setCheckboxInputValue(checkbox_object);
    });

}); // Document Ready Fim

window.setCheckboxInputValue = function (checkbox_object) {
    checkbox_object.val(checkbox_object.prop('checked'));
}

function notHidden() {
    if ($("nav").parent().prop("tagName") == "DIV") {
        $("main").css({
            "padding-top": $('nav').height() - 40
        })
    }
}

function searchHelp() {
    $("ul.collapsible.popout").children("li").show();
    $("ul.collapsible.popout").children("li:not(:contains(" + $("#autocomplete-input").val() + "))").hide();
}

//Validação de dados de enviar novo território
function suggestTerritoryValidation() {
    form_query = "form#add-territory-form";
    $(form_query).submit(function () {

        var send_form = true;

        if ($('form#add-territory-form input[name="street"]').val() == "") {
            $(form_query + ' [name="street"]').addClass('form-input-error');
            $(form_query + ' label[for="street"]').addClass('form-label-error');
            send_form = false;
        } else {
            $(form_query + ' [name="street"]').removeClass('form-input-error');
            $(form_query + ' label[for="street"]').removeClass('form-label-error');
        }
        if ($('form#add-territory-form input[name="neighborhood"]').val() == "") {
            $(form_query + ' [name="neighborhood"]').addClass('form-input-error');
            $(form_query + ' label[for="neighborhood"]').addClass('form-label-error');
            send_form = false;
        } else {
            $(form_query + ' [name="neighborhood"]').removeClass('form-input-error');
            $(form_query + ' label[for="neighborhood"]').removeClass('form-label-error');
        }
        if ($('form#add-territory-form textarea[name="comments"]').val() == "") {
            $(form_query + ' [name="comments"]').addClass('form-input-error');
            $(form_query + ' label[for="comments"]').addClass('form-label-error');
            send_form = false;
        } else {
            $(form_query + ' [name="comments"]').removeClass('form-input-error');
            $(form_query + ' label[for="comments"]').removeClass('form-label-error');
        }

        if (send_form) {
            $('span.error-message').addClass('display-none');
        } else {
            $('span.error-message').removeClass('display-none');
        }

        return send_form;
    });
}
