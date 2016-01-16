<?php
// My common functions
function displayUserProfilePicture($user)
{
	if ($user && File::exists($user->image_url))
	{
	    return URL::asset($user->image_url);
	}
	else
	{
		return URL::asset('adminlte/dist/img/user2-160x160.jpg');
	}

}
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

function displayLogoutLink(){
	return Auth::user() ? "/auth/logout" : "#";
}

function displayViewProfileLink(){
	return Auth::user() ? "/users/".Auth::user()->id : "#";
}

?>