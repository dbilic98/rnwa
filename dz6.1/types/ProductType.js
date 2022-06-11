const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../database');
const ProductType= require('./Product.js');

const ProductType = new GraphQLObjectType({
    name: 'ProductType',
    fields: () => (
        {

            product_type_cd: { type: GraphQLString },
            name: { type: GraphQLString },
         
            user: {
                type: ProductType,
                resolve: async (post) => {
                    let res = await dbQuery(`SELECT * FROM Product WHERE product_type_cd = ${parseInt(post.product_type_cd)}`);
                    return res[0];
                }
            }
        }
    )
});

module.exports = ProductType;