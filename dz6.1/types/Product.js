const { GraphQLObjectType, GraphQLInt } = require('graphql');

const ProductType = new GraphQLObjectType({
    name: 'Product',
    fields: () => (
        {
            product_cd: { type: GraphQLString },
            date_offered: { type: GraphQLDate },
            date_retired: { type: GraphQLDate },
            name: { type: GraphQLString },
            product_type_cd: { type: GraphQLString }
                


            
        }
    )
});

module.exports = ProductType;