<?php

$search_array = array(
    ['value' => 1],
    ['value' => 2],
    ['value' => 3]
);


$request_array = array(

              'user'      => [
                  'id'          => null,
                  'username'    => 'Hamburg',
                  'email'       => 'hamburg@gmail.com',
                  'url'         => '',
                  'registered'  => null,
                  'status'      => 1,
                  'name'        => 'The Hamburgler',
                  'login'       => null,
                  'roles'       => [2],
                  'permission'  => null,
                  'data'        => null
              ],
              'profilevalues'   => [
                  'account'     => ['Lastname, Firstname'],
                  'address'     => '123 Fake St.',
                  'city'        => 'Cincinnati',
                  'state'       => 'OH',
                  'zip'         => '45069',
                  'contact-one' => 'Johnny Appleseed',
                  'contact-one-title' => 'President Apple Co.',
                  'contact-two' => 'Misses Appleseed',
                  'rep'         => 'Donahue Sports',
                  'notified'    => 'true',
                  'date-assigned' => '',
                  'email'       => 'hamburg@gmail.com',
                  'email-type'  => 'Operations',
                  'contract'    => 'Texknowlogy',
                  'phone'       => '(513) 123-4567',
                  'handheld'    => 'None',
                  'ctx-id'      => 9999,
                  'region'      => 'Norhteast',
                  'controltex'  => '',
                  'comments'    => '',
              ]

);

return !empty($_GET['request']) ? print json_encode($request_array) : print json_encode($search_array);

?>