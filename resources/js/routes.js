window.routes = {
    PREFIX_V1: "/api/v1",
    card_users_available: function(card_id){return `${this.PREFIX_V1}/cards/${card_id}/users`;},
    assignments: function(){return `${this.PREFIX_V1}/assignments`},
    assignments_card_finish: function(card_id){return `${this.PREFIX_V1}/cards/${card_id}/assignments`},
    users: function(){return `${this.PREFIX_V1}/users`;}
};