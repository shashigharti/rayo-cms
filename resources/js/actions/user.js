import {userConstants} from './../constants';
import {userService} from './../services';
import {alertActions} from './';


export const userActions = {
    login,
    logout,
    register,
    getAll,
    delete: _delete
};

function login(username, password) {
    return dispatch => {
        dispatch(request({username}));

        userService.login(username, password)
            .then(
                user => {
                    // Add user to localStorage
                    localStorage.setItem('user', JSON.stringify(user));
                    // Set user to Redux
                    dispatch(success(user));
                },
                error => {
                    let status = error.response.status;
                    dispatch(failure(error.toString()));
                    dispatch(alertActions.error(status === 401 ? 'Unauthorized. Please register.' : error.toString()));
                }
            );
    };

    function request(user) {
        return {type: userConstants.LOGIN_REQUEST, user}
    }

    function success(user) {
        return {type: userConstants.LOGIN_SUCCESS, user}
    }

    function failure(error) {
        return {type: userConstants.LOGIN_FAILURE, error}
    }
}

function logout() {
    // Remove user-data from localStorage
    userService.logout();
    return {type: userConstants.LOGOUT};
}

function register(user) {
    return dispatch => {
        dispatch(request(user));

        userService.register(user)
            .then(
                user => {
                    dispatch(success());
                    //history.push('/login');
                    dispatch(alertActions.success('Registration successful'));
                },
                error => {
                    let errorRespCode = error.response.data.code;
                    console.log(errorRespCode);
                    dispatch(failure(error.toString()));
                    dispatch(alertActions.error(errorRespCode === "23000" ? 'User already exists. Please try a different email.' :error.toString()));
                }
            );
    };

    function request(user) {
        return {type: userConstants.REGISTER_REQUEST, user}
    }

    function success(user) {
        return {type: userConstants.REGISTER_SUCCESS, user}
    }

    function failure(error) {
        return {type: userConstants.REGISTER_FAILURE, error}
    }
}

function getAll() {
    return dispatch => {
        dispatch(request());

        userService.getAll()
            .then(
                users => dispatch(success(users)),
                error => dispatch(failure(error.toString()))
            );
    };

    function request() {
        return {type: userConstants.GETALL_REQUEST}
    }

    function success(users) {
        return {type: userConstants.GETALL_SUCCESS, users}
    }

    function failure(error) {
        return {type: userConstants.GETALL_FAILURE, error}
    }
}

// prefixed function name with underscore because delete is a reserved word in javascript
function _delete(id) {
    return dispatch => {
        dispatch(request(id));

        userService.delete(id)
            .then(
                user => dispatch(success(id)),
                error => dispatch(failure(id, error.toString()))
            );
    };

    function request(id) {
        return {type: userConstants.DELETE_REQUEST, id}
    }

    function success(id) {
        return {type: userConstants.DELETE_SUCCESS, id}
    }

    function failure(id, error) {
        return {type: userConstants.DELETE_FAILURE, id, error}
    }
}
