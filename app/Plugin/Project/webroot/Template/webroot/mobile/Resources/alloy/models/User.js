exports.definition = {
    config: {
        columns: {
            id: "INTEGER",
            token: "TEXT",
            email: "TEXT",
            username: "TEXT"
        },
        adapter: {
            type: "sql",
            collection_name: "users",
            idAttribute: "id"
        }
    },
    extendModel: function(Model) {
        _.extend(Model.prototype, {});
        return Model;
    },
    extendCollection: function(Collection) {
        _.extend(Collection.prototype, {});
        return Collection;
    }
};

var Alloy = require("alloy"), _ = require("alloy/underscore")._, model, collection;

model = Alloy.M("user", exports.definition, []);

collection = Alloy.C("user", exports.definition, model);

exports.Model = model;

exports.Collection = collection;