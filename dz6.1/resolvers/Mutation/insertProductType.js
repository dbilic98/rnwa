const { GraphQLString } = require('graphql');
const { dbQuery } = require('../../database');
const ProductType = require('../../types/ProductType');

const insertProductType = {
    type: ProductType,
    args: {
        name: { type: GraphQLString }
    },
    async resolve(_, { name }) {
        let res = await dbQuery(`insert into product_type (name) values ('${name}'`);
        return { id: res.insertId, name }
    }
};

module.exports = insertProductType;