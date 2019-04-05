<?php
namespace App;
use App\ldapUsers;
use App\User;


class ldapHelperMethods
{

    public function get_user_by_sid($id){

        $users = $this->l_get_all_user();
        for ($i=0; $i < count($users); $i++) {
            if ($users[$i]['user_id'] == $id) {
                return $users[$i];
            }
        }

    }


    public function get_user_data($ldap_user_info,$userName){
        $user = new User();
        if($ldap_user_info != false){
            $ldap_user_info[0]['objectsid'][0]  = (new ldapUsers())->username2guid($userName);
            $user['user_id'] = $ldap_user_info[0]['objectsid'][0];
            $user['user_name'] = isset(($ldap_user_info[0]["userprincipalname"][0])) ? (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]) : FALSE;
            $user['first_name'] = isset(($ldap_user_info[0]["givenname"][0])) ? ($ldap_user_info[0]["givenname"][0]) : FALSE;
            $user['last_name'] = isset(($ldap_user_info[0]["sn"][0])) ? ($ldap_user_info[0]["sn"][0]) : FALSE;

            $testuser = User::where('user_name',$user['user_name'])->first();

            /*if($testuser != null){
                $user['group_id'] = $testuser->group_id;
                $user['department_id'] = $testuser->department_id;
                $user['resort_id'] = $testuser->resort_id;
            }*/
        }
        return $testuser;
    }

    public function l_get_all_user(){

        $all_username = (new ldapUsers())->all_users();
        $ldap_user_info = array();
        $ldap_final_users = array();

        foreach ($all_username as $user_name) {

            $ldap_user_info = (new ldapUsers())
                    ->user_info($user_name);

            if($ldap_user_info != false){

		        $ldap_user_info[0]['objectsid'][0]  =
                            (new ldapUsers())->username2guid($user_name);

                $user = User::where('user_id',$ldap_user_info[0]['objectsid'][0])
                            ->first();

                            if (isset($ldap_user_info[0]["userprincipalname"][0])) {
                                $user_test = User::where('user_name', (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]))->first();

                            }


                if (($user == null) && ($user_test == NULL)) {

                    $user = new User();
                    $user->user_id = $ldap_user_info[0]['objectsid'][0];
                    $user->user_name  = isset(($ldap_user_info[0]["userprincipalname"][0])) ? (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]) : FALSE;
                    $user->first_name = isset(($ldap_user_info[0]["givenname"][0])) ? ($ldap_user_info[0]["givenname"][0]) : FALSE;
                    $user->last_name = isset(($ldap_user_info[0]["sn"][0])) ? ($ldap_user_info[0]["sn"][0]) : FALSE;
                    $user->status = 'Enabled';
                    $user->save();
                    //if ($user->user_id == null)
                }else{

                        if (isset($ldap_user_info[0]["userprincipalname"][0]) && ($ldap_user_info[0]["userprincipalname"][0] != "0")) {

                            $user = User::where('user_name', (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]))->first();
                            $user->user_id = $ldap_user_info[0]['objectsid'][0];
                            $user->user_name = isset(($ldap_user_info[0]["userprincipalname"][0])) ? (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]) : FALSE;
                            $user->first_name = isset(($ldap_user_info[0]["givenname"][0])) ? ($ldap_user_info[0]["givenname"][0]) : FALSE;
                            $user->last_name = isset(($ldap_user_info[0]["sn"][0])) ? ($ldap_user_info[0]["sn"][0]) : FALSE;
                            $user->status = 'Enabled';

                            $user->save();
                        }

                }
                array_push($ldap_final_users,$user);
                }
        }// end foreach

    return $ldap_final_users;
}// end Method l_get_all_user


public function get_all_disabled_user(){

    $all_username = (new ldapUsers())->all_users();

    $ldap_user_info = array();
    $ldap_final_users = array();

    foreach ($all_username as $user_name) {

        $ldap_user_info = (new ldapUsers())
        ->user_info_disabled($user_name);

        if($ldap_user_info != false){

            $ldap_user_info[0]['objectsid'][0]  =
                    (new ldapUsers())->username2guid($user_name);

            $user = User::where('user_id',$ldap_user_info[0]['objectsid'][0])->first();

            if (isset($ldap_user_info[0]["userprincipalname"][0])) {
                $user_test = User::where('user_name', (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]))->first();
            }else{
                $user_test = NULL;
            }

            if (($user == null) && ($user_test == NULL)) {
                $user = new User();
                $user->user_id = $ldap_user_info[0]['objectsid'][0];
                $user->user_name  = isset(($ldap_user_info[0]["userprincipalname"][0])) ? (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]) : FALSE;
                $user->first_name = isset(($ldap_user_info[0]["givenname"][0])) ? ($ldap_user_info[0]["givenname"][0]) : FALSE;
                $user->last_name = isset(($ldap_user_info[0]["sn"][0])) ? ($ldap_user_info[0]["sn"][0]) : FALSE;
                $user->status = 'Disabled';
                $user->save();
                //if ($user->user_id == null)
            }else{
                    if (isset($ldap_user_info[0]["userprincipalname"][0]) && ($ldap_user_info[0]["userprincipalname"][0] != "0")) {
                        $user = User::where('user_name', (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]))->first();
                        $user->user_id = $ldap_user_info[0]['objectsid'][0];
                        $user->user_name = isset(($ldap_user_info[0]["userprincipalname"][0])) ? (\explode('@',$ldap_user_info[0]["userprincipalname"][0])[0]) : FALSE;
                        $user->first_name = isset(($ldap_user_info[0]["givenname"][0])) ? ($ldap_user_info[0]["givenname"][0]) : FALSE;
                        $user->last_name = isset(($ldap_user_info[0]["sn"][0])) ? ($ldap_user_info[0]["sn"][0]) : FALSE;
                        $user->status = 'Disabled';
                        $user->save();
                    }

            }
                array_push($ldap_final_users,$user);
            }
    }// end foreach
return $ldap_final_users;
}// end Method l_get_all_user

    /*public function clean_up_entry( $entry ) {
         $retEntry = array();
         for ( $i = 0; $i < $entry['count']; $i++ ) {
           if (is_array($entry[$i])) {
             $subtree = $entry[$i];
             //This condition should be superfluous so just take the recursive call
             //adapted to your situation in order to increase perf.
             if ( ! empty($subtree['dn']) and ! isset($retEntry[$subtree['dn']])) {
               $retEntry[$subtree['dn']] = $this->clean_up_entry($subtree);
             }
             else {
               $retEntry[] = $this->clean_up_entry($subtree);
             }
           }
           else {
             $attribute = $entry[$i];
             if ( $entry[$attribute]['count'] == 1 ) {
               $retEntry[$attribute] = $entry[$attribute][0];
             } else {
               for ( $j = 0; $j < $entry[$attribute]['count']; $j++ ) {
                 $retEntry[$attribute][] = $entry[$attribute][$j];
               }
             }
           }
         }
         return $retEntry;
     }*/
}
