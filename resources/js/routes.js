window.routes = {
    PREFIX_V1: "/api/v1",
    addresses: function (id = null) {
        return id == null ? `${this.PREFIX_V1}/addresses` : `${this.PREFIX_V1}/addresses/${id}`
    },
    address_suggestions: function () {
        return `${this.PREFIX_V1}/addresses/suggested`
    },
    card_users_available: function (card_id) {
        return `${this.PREFIX_V1}/cards/${card_id}/users`;
    },
    assignments: function () {
        return `${this.PREFIX_V1}/assignments`
    },
    assignment_finish: function (assignment_id) {
        return `${this.PREFIX_V1}/assignments/${assignment_id}`
    },
    assignments_card_finish: function (card_id) {
        return `${this.PREFIX_V1}/cards/${card_id}/assignments`
    },
    user_assignments: function (user_id) {
        return `${this.PREFIX_V1}/assignments/user/${user_id}`
    },
    users: function () {
        return `${this.PREFIX_V1}/users`;
    },
    publishers: function () {
        return `${this.PREFIX_V1}/publishers`
    },
    macro_regions: function () {
        return `${this.PREFIX_V1}/macroregions`
    },
    cards: function () {
        return `${this.PREFIX_V1}/cards`
    },
    address_types: function () {
        return `${this.PREFIX_V1}/addresstypes`
    },
    idioms: function () {
        return `${this.PREFIX_V1}/idioms`
    },
    nationalities: function () {
        return `${this.PREFIX_V1}/nationalities`
    }
};
