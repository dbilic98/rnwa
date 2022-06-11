const { GraphQLObjectType } = require('graphql');

const fieldsUser = require('./user');
const fieldsUsers = require('./users');
const fieldsPosts = require('./posts');

const fieldsProductTypes = require('./producttypes');
const fieldsProductType = require('./producttype');

const Query = new GraphQLObjectType({
    name: 'Query',
    fields: {
        // Query one user
        user: fieldsUser,
        // Query all users
        users: fieldsUsers,
        // Query all posts
        posts: fieldsPosts,
        // all airplanetypes
        producttypes: fieldsProductTypes,
        // one airplanetype
        producttype: fieldsProductType
    }
});

module.exports = Query;