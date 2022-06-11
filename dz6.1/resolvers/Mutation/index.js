const { GraphQLObjectType } = require('graphql');
const insertProductType = require('./insertProductType');
const insertUser = require('./insertUser');

const Mutation = new GraphQLObjectType({
  name: 'mutation',
  fields: {
    // Insert a new user record
      insertUser: insertUser,
      // insert new producttype
      insertProductType: insertProductType
  }
  }
});

module.exports = Mutation;
