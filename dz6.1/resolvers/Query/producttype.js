const { GraphQLInt } = require('graphql');
const { dbQuery } = require('../../database');
const ProductType = require('../../types/ProductType');

const fieldsProductType = {
    type: ProductType,
    args: {
        product_type_cd: { type: GraphQLString }
    },
    async resolve(_, { product_type_cd }) {
        let res = await dbQuery(`SELECT * FROM product_type WHERE product_type_cd = ${product_type_cd }`);
        return res[0];
    }
};

module.exports = fieldsProductType;