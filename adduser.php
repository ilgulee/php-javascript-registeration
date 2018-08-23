<?php
    $firstname=$lastname=$username=$password=$email=$age=$message=$fleshMsgClass="";
    $fleshMsg=[];
    if(filter_has_var(INPUT_POST, 'submit')){
        if(isset($_POST['firstname'])){
            $firstname=sanitizeInputString($_POST['firstname']);
        }
        if(isset($_POST['lastname'])){
            $lastname=sanitizeInputString($_POST['lastname']);
        }
        if(isset($_POST['username'])){
            $username=sanitizeInputString($_POST['username']);
        }
        if(isset($_POST['password'])){
            $password=sanitizeInputString($_POST['password']);
        }
        if(isset($_POST['email'])){
            $email=sanitizeInputString($_POST['email']);
        }
        if(isset($_POST['age'])){
            $age=sanitizeInputString($_POST['age']);
        }
        if(isset($_POST['message'])){
            $message=sanitizeInputString($_POST['message']);
        }
        $fail=validate_firstname($firstname);
        $fail.=validate_lastname($lastname);
        $fail.=validate_username($username);
        $fail.=validate_password($password);
        $fail.=validate_email($email);
        $fail.=validate_age($age);
        if($fail==""){
            $fleshMsg[]="all data passed through validation.";
            $fleshMsgClass="alert-success";
            echo $firstname." ".$lastname." ".$username;
            echo $password;
            echo $email;
        }else{
            $fleshMsgClass="alert-danger";
           
        }
    }
    function validate_age($field){
        $field=filter_var($field,FILTER_SANITIZE_NUMBER_INT	);
        if($field==""){
            $msg="No Age was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }else if($field<18||$field>110){
            $msg="Age must be between 18 and 110.";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";
    }
    function validate_email($field){
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if($field==""){
            $msg="No email was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }else if(!filter_var($field, FILTER_VALIDATE_EMAIL)){
            $msg="Email address is not valid.";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";
    }
    function validate_password($field){
        if($field==""){
            $msg="No password was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }else if(strlen($field)<6){
            $msg="Password must be at least 6 characters";
            $fleshMsg[]=$msg;
            return $msg;
        }else if(!preg_match("/[a-z]/",$field)||
                !preg_match("/[A-Z]/",$field)||
                !preg_match("/[0-9]/",$field))
        {
            $msg="Password require 1 each of a-z, A-Z, and 0-9";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";
    }
    function validate_username($field){
        if($field==""){
            $msg="No username was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }else if(strlen($field)<5){
            $msg="Username must be at least 5 characters";
            $fleshMsg[]=$msg;
            return $msg;
        }else if(preg_match("/[^a-zA-Z0-9_-]/",$field)){
            $msg="Only letters, numbers, -, and _ in username";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";   
    }

    function validate_firstname($field){
        if($field==""){
            $msg="No firstname was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";
    }

    function validate_lastname($field){
        if($field==""){
            $msg="No lastname was entered.";
            $fleshMsg[]=$msg;
            return $msg;
        }
        return "";
    }

    function sanitizeInputString($var){
        $var=stripcslashes($var);
        $var=htmlentities($var);
        $var=strip_tags($var);
        return $var;
    }
?>