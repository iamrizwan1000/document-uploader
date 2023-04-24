<?php




/**
 * Function to generate random string
 */
if (! function_exists('generate_random_string')) {
    function generateRandomString(string $email)
    {
        $random = substr(md5(rand(0, 9) . $email . time()), 0, 32);
        return base64_encode($random);
    }

}
