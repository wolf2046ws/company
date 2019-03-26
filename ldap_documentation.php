<?php

$ldap = new ldapUsers();
$ldapHelper = new ldapHelperMethods();

###################################################################
    // This Method Clean Output
    $ldapHelper->clean_up_entry();
// To Access Admin Page
    // 1. To Auth User using UserName  ==> return true or false
    $user_auth = $ldap->authenticate("moab","Abdullah89");



###################################################################
// User Information
####################

    // 1. Find any Data about user
    //    You can add whet you search for
    $ldap->user_info("mavo");
    $ldap->user_info("mavo", array("givenname"));

    // To Konw if the account diabled or enabled =>
        # 514 -> disabled
        # 512 -> enabled
    $ldap->user_info("mavo", array("userAccountControl"))

    // 2. Delete User using username
    $ldap->user_delete("tmus");

    // 3. Create User
        // Specify Where To Add User
        $ldap->folder_list_new(
            NULL,ADLDAP_FOLDER,TRUE,"organizationalUnit");


    // 4. Update User Date
        # user_modify_without_schema($username,$attributes,$isGUID=false)
    $ldap->user_modify_without_schema("mavo",array("givenname"=>"sdsdsd"));

    // enable or disable user using these 2 methods
    $ldap->user_enable("mavo");
    $ldap->user_disable("mavo");


###################################################################
    // Find All Groups thta user is member Of =  username
    $ldap->user_groups("mavo");
