<?php
// My common functions
function displayUserName()
{
    return (Auth::user() ? Auth::user()->name : 'Guest');
}
function displayChurchName()
{
	return (Auth::user() ? Auth::user()->church()->get()->first()->name : "HOP Church");
}
function displayMemberSince()
{
	return (Auth::user() ? Auth::user()->created_at : "Nov. 2012");
}
function displayNameofUser($user){
	return $user->name;
}
function displayChurchNameofUser($user){
	return $user->church()->get()->first()->name;
}

?>