Backend test for PHP/Laravel

Available HTTP requests:
api/pokemon - Get a paginated list of all pokemon
To use in Postman send a get request to {hostaddress}/api/pokemon

api/pokemon/{id} - Get a specific pokemon from the database
To use in Postman, send a get request to {hostaddress}/api/pokemon/{id}

api/auth/register - Register a new account
To use in Postman, send a post request to {hostaddress}/api/auth/register with the following:
A raw JSON request in the body consisting of:
{
    "name": {user name},
    "email": {user email},
    "password": {user password},
    "password_confirmation": {user password}
}
Make sure the header is sending a Key of "Content-Type" with a value of "application/json".

api/auth/login - Login and get an authorization token
To use in Postman, send a post request to {hostaddress}/api/auth/login with the following:
A raw JSON request in the body consisting of:
{
    "email": {user email},
    "password": {user password},
    "remember_me": {boolean (true, false)}
}
Make sure the header is sending a Key of "Content-Type" with a value of "application/json". The response will include an access token. To use any of the methods below, you will need this token.

api/auth/user - Get user information
Send a get request to {hostaddress}/api/auth/user with the following:
No body
Header key "Authorization" and Value of "Bearer {user authorization token}". You recieved the user token with a successful login using the previous method.

api/auth/logout - Logout a user
Send a get request to {hostaddress}/api/auth/logout with the following:
No body
Header key "Authorization" and Value of "Bearer {user authorization token}".

api/userpokemon - Get a list of all pokemon captured by a specific user

api/useraddpokemon - Add a pokemon to a users list
