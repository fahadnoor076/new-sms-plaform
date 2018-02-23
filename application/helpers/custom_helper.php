<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function encodeData($id) {
    return urlencode(base64_encode($id));
}
function decodeData($id) {
    return base64_decode(urldecode($id));
}