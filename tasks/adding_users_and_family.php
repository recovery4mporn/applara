  use App\Church;
  use App\Family;
  use App\User;
  $cnt = 0;
  $file = fopen("/home/daniel/Downloads/AllContacts.csv","r");
  print_r(fgetcsv($file));
  while(!feof($file)){
                                                                                                                      $cnt+=1;
    $row = fgetcsv($file);
    echo "Processing " . $cnt . " " . $row[2] . "\n";
    $family_name = $row[1];
    $user_name = $row[2];
    $church_id = 1;
    $church = Church::find($church_id);
    $user = App\User::where("name","=",$user_name)->where("church_id","=", $church_id)->first();
    (($user && ($user->dob != $row[4])) && !empty($row[4])) ? $user = null : "";
    ($user || empty($row[9])) ? "" : ($user = App\User::where("email","=",$row[9])->first());
    $family = App\Family::where("name","=",$family_name)->first();
    
      echo "Adding New User" . $cnt . "\n";
      $new_user = new User();
      $new_user->name = $row[2];
      $new_user->dob = $row[4];
      $new_user->weddingDate = $row[5];
      $new_user->baptism_taken = trim($row[6]) == "YES" ? true : false;
      $new_user->annointing_taken = trim($row[7]) == "YES" ? true : false;
      $new_user->phone_number = $row[8];
      $new_user->email = $row[9];
      $new_user->member_type = trim($row[10]) == "YES" ? 0 : 2;
      $new_user->address = $row[11] . $row[12] . $row[13] . $row[14];
      switch(trim($row[15])){
        case "0":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 0")->first()->id;
            break;
        case "1":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 1")->first()->id;
            break;
        case "2":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 2")->first()->id;
            break;
        case "3":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 3")->first()->id;
            break;
        case "4":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 4")->first()->id;
            break;
        case "5":
            $new_user->zone_id = $church->zones()->where("name","=","Zone 5")->first()->id;
            break;
        default:
            $new_user->zone_id = $church->zones()->where("name","=","No Zone")->first()->id;
      }
      $new_user->church_id = $church_id;
      if($family){
        $family_id = $family->id;
        $new_user->family_id = $family_id;
        $new_user->save();
      }
      else {
        $new_family = new Family();
        echo "Adding New Family" . $cnt . "\n";
        $new_family->name = $row[1];
        $new_family->save();
        $new_user->family_id = $new_family->id;
        $new_user->save();
      }
    
  }
  fclose($file);
