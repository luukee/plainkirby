<?php


return function ($site, $pages, $page) {
    $alert = null;

    if (r::is('post') && get('register')) {
        if (!empty(get('website'))) {
            // lets tell the bot that everything is ok
            go($page->url());
            exit;
        }
        $data = array(
      'firstname' => get('firstname'),
      'lastname'  => get('lastname'),
      'email'     => get('email'),
      'message'   => get('message')
    );

        $rules = array(
      'firstname' => array('required'),
      'lastname'  => array('required'),
      'email'     => array('required', 'email'),
    );
        $messages = array(
      'firstname' => 'Please enter a valid first name',
      'lastname'  => 'Please enter a valid last name',
      'email'     => 'Please enter a valid email address',
    );

        // some of the data is invalid
        if ($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;
        } else {

        // everything is ok, let's try to create a new registration
            try {
                addToStructure($page->find('contacts'), 'contacts', $data);

                $success = 'Your submission was successful';
                $data = array();
            } catch (Exception $e) {
                echo 'Your submission failed: ' . $e->getMessage();
            }
        }
    }

    return compact('alert', 'data', 'success');
};


// Save registrations as structure field
function addToStructure($p, $field, $data = array())
{
    $fieldData = $p->$field()->yaml();
    $fieldData[] = $data;
    $fieldData = yaml::encode($fieldData);
    $p->update(array(
    $field => $fieldData
  ));
}
