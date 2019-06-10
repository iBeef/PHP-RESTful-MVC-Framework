<?php

/*
    Get/Set alerts
*/

/**
 * Sets an alert message stored in a session variable
 *
 * @access public
 * @param string $value
 * @param string $type (optional)
 * @return NULL
 */
function setAlert($value, $type='success') {
    $_SESSION[$type][] = $value;
}

/**
 * Returns string, containing multiple list items of alerts.
 * By default the classes are setup for bootstrap 4.
 *
 * @access public
 * @return string
 */
function getAlerts() {
    $alertClasses = array(
        // ToDo: Set alert classes
        'success' => "my css success class",
        'alert' => "my css alert class",
        'warning' => "my css warning class",
    );
    $data = '';
    
    foreach($this->alertTypes as $alert) {
        if(isset($_SESSION[$alert])) {
            foreach($_SESSION[$alert] as $value) {
                $data .= "<li class='" . $alertClasses[$alert] . "'>" . $value . "</li>";
            }
            unset($_SESSION[$alert]);
        }
    }
    echo $data;
}