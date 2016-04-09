<?php namespace App\Console\Commands;
use App\Church;
use App\Family;
use App\User;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AddUsersAndFamiliesCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Users & Families';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getZoneID($church_id, $zone){
      $church = Church::find($church_id);
      switch($zone) {
        case "0":
            return $church->zones()->where("name","=","Zone 0")->first()->id;
            break;
        case "1":
            return $church->zones()->where("name","=","Zone 1")->first()->id;
            break;
        case "2":
            return $church->zones()->where("name","=","Zone 2")->first()->id;
            break;
        case "3":
            return $church->zones()->where("name","=","Zone 3")->first()->id;
            break;
        case "4":
            return $church->zones()->where("name","=","Zone 4")->first()->id;
            break;
        case "5":
            return $church->zones()->where("name","=","Zone 5")->first()->id;
            break;
        default:
            return $church->zones()->where("name","=","No Zone")->first()->id;
      }
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
      //
      $file = fopen("/home/daniel/Downloads/new_file.csv","r");
      while(!feof($file)){
        print_r(fgetcsv($file));        
        $row = fgetcsv($file);
        $family_name = $row[1];
        $user_name = $row[2];
        $church_id = 1;
        $church = Church::find($church_id);
        // $zone_hash = {};
        // $zone_hash["0"] = $church->zones()->where("name","=","Zone 0")->first()->id;
        // $zone_hash["1"] = $church->zones()->where("name","=","Zone 1")->first()->id;
        // $zone_hash["2"] = $church->zones()->where("name","=","Zone 2")->first()->id;
        // $zone_hash["3"] = $church->zones()->where("name","=","Zone 3")->first()->id;
        // $zone_hash["4"] = $church->zones()->where("name","=","Zone 4")->first()->id;
        // $zone_hash["5"] = $church->zones()->where("name","=","Zone 5")->first()->id;
        // $no_zone = $church->zones()->where("name","=","No Zone")->first()->id;
        
        $user = App\User::where("name","=",$family_name)->where("church_id","=", $church_id)->first();
        $family = App\Family::where("name","=",$family_name)->first();
          
        if($user)
        {
          if($family){
            $family_id = $family->id;
            if($family_id == $user->family_id){;}
            else{
              $user->family_id = $family_id;
              $user->save();
            }
          }
          else {
            $new_family = new Family();
            $new_family->name = $row[1];
            $new_family->save();

            User::whereIn("id", $user->id)->update(["family_id" => $new_family->id]);
          }
        }
        else{
          $new_user = new User();
          $new_user->name = $row[2];
          $new_user->dob = $row[4];
          $new_user->weddingDate = $row[5];
          $new_user->baptism_taken = trim($row[6]) == "YES" ? true : false;
          $new_user->annointing_taken = trim($row[7]) == "YES" ? true : false;
          $new_user->phone_number = $row[8];
          $new_user->email = $row[9];
          $new_user->member_type = trim($row[10]) == "YES" ? 0 : 2;
          $new_user->address = $row[11] + $row[12] + $row[13] + $row[14] ;
          switch(trim($row[15])) {
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
            if($family_id == $user->family_id){;}
            else{
              $new_user->family_id = $family_id;
              $new_user->save();
            }
          }
          else {
            $new_family = new Family();
            $new_family->name = $row[1];
            $new_family->save();
            $new_user->family_id = $new_family->id;
            $new_user->save();
          }
        }
      }
      fclose($file);
    }

    
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
      return [
          ['church_id', InputArgument::REQUIRED, 'The Church ID is required.'],
      ];
    }

    /** 
    * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

}
