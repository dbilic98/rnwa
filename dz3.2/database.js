// connection configurations
var dbConn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'learningsql'
});
// connect to database
dbConn.connect();
