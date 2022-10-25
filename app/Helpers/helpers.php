<?php

/**
 * session user
 *
 * @return only true
 */
function current_user(){
  return auth('usuario')->user();
}

function close_sessions(){
  if(Auth::guard('usuario')->check()){
    Auth::guard('usuario')->logout();
  }

  // session()->flush();
  //session()->forget('permissions');
  //session()->forget('modeMain');
  return true;
}



function activeValidate($urls, $blockers) {
  $status = false;
  foreach ($urls as $key => $url) {
    if (request()->is($url)) { $status = true; }
    if (sizeof($blockers) > 0) {
      foreach ($blockers as $keyIn => $valueIn) {
        if (request()->is($valueIn)) {
          $status = false;
        }
      }
    }
  }
  return $status;
}

function activeTab($urls, $blockers = array()){
  return activeValidate($urls, $blockers) ? 'active' : '';
}

function activeOpen($urls, $blockers = array()){
  return activeValidate($urls, $blockers) ? 'menu-open' : '';
}
