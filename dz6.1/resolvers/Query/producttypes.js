const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const ProductType = require('../../types/ProductType');

const fieldsProductTypes = {
    type: new GraphQLList(ProductType),
    async resolve(_, { }) {
        let res = await dbQuery(`SELECT * FROM product_type`);
        return res;
    }
};

module.exports = fieldsProductTypes;