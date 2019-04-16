<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// 데이터베이스
defined('DB_HOST')      OR define('DB_HOST', "localhost:8889");
defined('DB_NAME')      OR define('DB_NAME', "teampe");
defined('DB_USER')      OR define('DB_USER', "root");
defined('DB_PWD')      OR define('DB_PWD', "root");

defined('SESSION_USR_UID')      OR define('SESSION_USR_UID', 'session_usr_uid');
defined('SESSION_USR_ID')      OR define('SESSION_USR_ID', 'session_usr_id');
defined('SESSION_USR_NAME')      OR define('SESSION_USR_NAME', 'session_usr_name');
defined('SESSION_USR_IMG')      OR define('SESSION_USR_IMG', 'session_usr_img');


defined('UPLOAD_PATH')                  OR define('UPLOAD_PATH', dirname(__DIR__) . "/../../upload/");   // upload dir path


defined('STATUS_USE')           OR  define('STATUS_USE',1);
defined('STATUS_REMOVED')        OR  define('STATUS_REMOVED',0);

defined('RESULT_ERR_USER')         OR define('RESULT_ERR_USER', 'err_user');
defined('RESULT_ERR_PWD')         OR define('RESULT_ERR_PWD', 'err_pwd');
defined('RESULT_FAIL')         OR define('RESULT_FAIL', 'fail');
defined('RESULT_SUCCESS')         OR define('RESULT_SUCCESS', 'success');
defined('RESULT_ERROR')         OR define('RESULT_ERROR', 'error');
defined('RESULT_DUP')         OR define('RESULT_DUP', 'dup');

defined('STATUS_ORDER')         OR define('STATUS_ORDER', 1);
defined('STATUS_PAY')         OR define('STATUS_PAY', 0);

defined('COUPON_STATUS_USE')      OR define('COUPON_STATUS_USE', 1);
defined('COUPON_STATUS_FINISH')      OR define('COUPON_STATUS_FINISH', 2);
defined('COUPON_STATUS_USE_DELETE')      OR define('COUPON_STATUS_USE_DELETE', 0);
defined('COUPON_STATUS_FINISH_DELETE')      OR define('COUPON_STATUS_FINISH_DELETE', -1);

defined('SNS_TYPE_NAVER')           OR define('SNS_TYPE_NAVER', 1);
defined('SNS_TYPE_KAKAO')           OR define('SNS_TYPE_KAKAO', 2);
defined('SNS_TYPE_FACEBOOK')           OR define('SNS_TYPE_FACEBOOK', 3);

