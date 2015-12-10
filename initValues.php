<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 12/10/2015
 * Time: 9:59 PM
 */
//session_unset();
if(!isset($_SESSION['candidates'])){
    $user = new User(time(), 'ferencz', '123456');
    $cv = new CV(time(), 'junior', array(new Education(time(), 'BV', 'science', null, null)), array(new ProfessionalExperience(time(), 'BV', 'Test', null, null, null)));
    $candidate = new Candidate(time(), 'ferencz', 'veres', '2010-03-21', 'area', '0123456789', 'ferenczv@gmail.com', '0', $user, $cv);
    $_SESSION['candidates'] = array($candidate);
}
?>