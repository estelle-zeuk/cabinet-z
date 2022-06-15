<?php
/**
 * Created by PhpStorm.
 * User: teukapmaths
 * Date: 09/11/2017
 * Time: 12:40
 */
use App\Models\Company;
use App\Models\Services;
use App\Repositories\CompanyRepository;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Repositories\ServiceRepository;


if(! function_exists('companyInfo')) {
    /**
     * @return mixed
     */
    function companyInfo() {
        $companyInfo = new CompanyRepository(new Company());
        return $companyInfo->getById(7);
    }
}

if(! function_exists('services')) {
    /**
     * @return mixed
     */
    function services() {
        $serviceRepository = new ServiceRepository(new Services());
        return $serviceRepository->getPublishedServices();
    }
}

if(! function_exists('news')) {
    /**
     * @return mixed
     */
    function news() {
        $serviceRepository = new ServiceRepository(new Services());
        return $serviceRepository->getPublishedNews();
    }
}

if(! function_exists('products')) {
    /**
     * @return mixed
     */
    function products() {
        $productRepository = new ProductRepository(new Product());
        return $productRepository->getAll();
    }
}

if(! function_exists('figureToWord')) {
    /**
     * @param $index
     * @return mixed
     */
    function figureToWord($index) {
        $words = ['one','two','three','four','five','six','seven','eight','nine','ten'];
        try {
            return $words[$index];
        }catch(Exception $e){
            return $words[0];
        }
    }
}

if(! function_exists('teamMembers')) {
    /**
     * @return mixed
     */
    function teamMembers() {
        $teamRepository = new TeamRepository(new Team());
        return $teamRepository->getAll();
    }
}

if(! function_exists('mob_url')) {
    function mob_url($path = '/') {
        $env = app()->environment();
        if($env == 'pre-production' ||$env == 'production' || $env == 'development' || $env == 'test') {
            return secure_url($path);
        } else if($env == 'local') {
            return url()->to($path);
        } else {
            return url($path);
        }
    }
}

if(! function_exists('set_active')) {
    function set_active( $request, $path, $multiple = false, $level = null, $active = 'active' )
    {
        $givenPath = explode('/', $request);

        if ($multiple) {
            if (!is_null($level)) {
                return  $givenPath[1] == $path ? $active : '';
            }

            return $givenPath[0] == $path ? $active : '';
        }

        return  $givenPath[0] == $path ? $active : '';
    }
}

if(! function_exists('set_active_home')) {
    function set_active_home($request, $active = 'active' )
    {
        $givenPath = explode('/', $request);
        if(count($givenPath)==1){
            return $active;
        }else{
            return '';
        }
    }
}

if(! function_exists('set_sub_active')) {
    function set_sub_active( $request, $path, $multiple = false, $level = null, $active = 'active-sub' )
    {

        $givenPath = explode('/', $request);
        if(count($givenPath)==1){
            return '';
        }
        if ($multiple) {
            if (!is_null($level)) {
                return $givenPath[1] == $path ? $active : '';
            }

            return $givenPath[1] == $path ? $active : '';
        }
        //dd($request,$givenPath);
        return $givenPath[1] == $path ? $active : '';
    }
}

if (!function_exists('mob_links')) {
    /**
     * Permet de faire passer les liens des paginations de Laravel en https lorsqu'on est en production
     * @param  String $str
     * @return String
     */
    function mob_links($str) {
        $env = app()->environment();
        if($env == 'production' || $env == 'development' || $env == 'test') {
            return str_replace('http://', 'https://', $str);
        } else if($env == 'local') {
            return $str;
        } else {
            return $str;
        }
    }
}

if(! function_exists('mob_route')) {
    function mob_route($name, $parameters = []) {
        $env = app()->environment();
        if($env == 'production' || $env == 'development' || $env == 'test') {
            $route = route($name, $parameters);
            if (strpos($route, 'https://') !== false) {
                return $route;
            } else {
                return str_replace('http://', 'https://', $route);
            }
        } else if($env == 'local') {
            return route($name, $parameters);
        } else {
            return route($name, $parameters);
        }
    }
}

if(! function_exists('asset')) {
    function asset($name) {
        $env = app()->environment();
        if($env == 'production' || $env == 'development' || $env == 'test') {
            $asset = asset($name);
            if (strpos($asset, 'https://') !== false) {
                return $asset;
            } else {
                return str_replace('http://', 'https://', $asset);
            }
        } else if($env == 'local') {
            return asset($name);
        } else {
            return asset($name);
        }
    }
}

if(! function_exists('countByParameter')){
    function countByParameter($tableName,$parameter){
        toggleDatabase(true);
        return \DB::table($tableName)->where($parameter)->count();
    }
}

/**
 * Testing samples
 * echo convert_date_fr('5 février 2018'); // => 2018-02-05
echo convert_date_fr('8 Décembre', 'j F', 'd/m'); // => 08/12
echo convert_date_fr('8-août 2018 14:30:54', 'j-F Y H:i:s', 'Y-m-d H:i:s'); // => 2018-08-08 14:30:54
echo convert_date_fr('8 août \à 14\h30', 'j-F \à H\hi', 'Y-m-d H:i:s'); // => 2018-08-08 14:30:00
echo convert_date_fr('8 Février \à 14\h30', 'j-F \à H\hi', 'd/m \à H\hi'); // => 08/02 à 14h30
echo convert_date_fr('18/12/2018', 'd/m/Y', 'Y-m-d'); // => 2018-12-18
echo convert_date_fr('18/12/2018', 'd/m/Y', 'j F Y'); // => 18 December 2018
echo convert_date_fr('8 Février à 14h30', 'j-F \à H\hi', 'd/m \à H\hi'); // => fail
 */
if(! function_exists('convert_date_fr')){
            function convertDateFr($date, $format) {
                $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
                $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
                return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
            }
}



if(! function_exists('mobDateFormat')) {
    /**
     * This function alows you to format the date to rend to the views depending on the user language config. Exple 09-12-2018 for french
     * @param String $date. The date to format coming to the database
     * @param String $format. Optional. The format at which you want date should be returned
     * @return String
     */
    function mobDateFormat($date, $format = null) {
        if ($date) {
            $local = \App::getLocale();
            $format_ = is_null($format) ? getDateFormat() : $format;
            $carbonDate = \Carbon\Carbon::parse($date);
            return is_null( $date ) ? '' : $carbonDate->format($format_);
        }
        return '';
    }
}

    if(! function_exists('mobDateToString')) {
        /**
         * Allows to translate a date carbon instance into a string understandable by humans. Exple 10, February 2018
         * @param  Carbon\Carbon $date The date to translate
         * @return  String
         * @todo  Gérer plus efficacement la traduction en français (en utlisant les méthodes de Carbon)
         */
        function mobDateToString($date) {
            if (is_null($date))
                return '';

            $local = \App::getLocale();
            \Carbon\Carbon::setLocale($local);
            $carbonDate = \Carbon\Carbon::parse($date);
            if ($local == 'fr') {
                $days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
                $months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novemebre', 'Décembre'];

                $date = $days[ intval($carbonDate->dayOfWeek) ] . ', ' . $carbonDate->format('d') . ' '  . $months[intval($carbonDate->format('m')) - 1] . ' '  . $carbonDate->format('Y');
                return $date;
            }

            return $carbonDate->format('D, d F Y');
        }
    }

    if (! function_exists('getDateFormat')) {
        /**
         * Allows to get the Date format to use depending on the user language
         * @return  String
         */
        function getDateFormat() {
            return config('mobility.date-format.' . \App::getLocale());
        }
    }


    if(!function_exists('dateFormatting')){
        function dateFormatting($data) {

            //@TODO check the object keys and make sure they correspond to y,m,d,h,i and ss.
            if(!is_object($data)){
                $format = 'Error, Date object needed but something else given!';
                return $format;
            }

            $timestamp = strtotime($data);

            $strTime = array("sec", "min", "hr", "jr", "moi", "an");
            $length = array("60","60","24","30","12","10");

            $currentTime = time();
            if($currentTime >= $timestamp) {
                $diff     = time()- $timestamp;
                for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                    $diff = $diff / $length[$i];
                }

                $diff = round($diff);
                return "Depuis ".$diff . " " . $strTime[$i] . "(s)";
            }
        }
    }

    if(!function_exists('get_timeAgo')){
        function get_timeAgo( $date )
        {
            $timestamp = strtotime($date);
            $estimate_time = time() - $timestamp;

            if( $estimate_time < 1 )
            {
                return 'less than 1 second ago';
            }

            $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'an',
                30 * 24 * 60 * 60       =>  'moi',
                24 * 60 * 60            =>  'jr',
                60 * 60                 =>  'hr',
                60                      =>  'min',
                1                       =>  'sec'
            );

            foreach( $condition as $secs => $str )
            {
                $d = $estimate_time / $secs;

                if( $d >= 1 )
                {
                    $r = round( $d );
                    return 'Depuis ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' );
                }
            }
        }
    }

use Illuminate\Support\Facades\Crypt;

    if(!function_exists('encryptData')){
        function encryptData($data)
        {
            return Crypt::encrypt($data);
        }
    }

    if(!function_exists('decryptData')){
        function decryptData($data)
        {
            return Crypt::decrypt($data);
        }
    }

    if (!function_exists('getTableById')) {
        function getTableById($table,$id)
        {
                // gets last inserted row
                $result = \DB::table($table)
                                ->where('id', $id)
                                ->first();
            return $result;
        }
    }

if (!function_exists('getTableInfo')) {
    function getTableInfo($table)
    {
        // gets last inserted row
        $result = \DB::table($table)->get();
        return $result;
    }
}

if (!function_exists('display')) {
    function display($attribute, $english,$french)
    {
        if(app()->getLocale() == 'en'){
            return ${$attribute}->$english;
        }else{
            return ${$attribute}->$french;
        }
    }
}

    if (!function_exists('getTableByAllOrFirst')) {
        function getTableByAllOrFirst($table,$value='first')
        {
            try {
    // gets last inserted row
                if($value == 'all'){
                    $result = \DB::table($table)->get();
                }else{
                    $result = \DB::table($table)->first();
                }

            } catch (\Exception $exception) {
                return null;
            }

            return $result;
        }
    }


    if (!function_exists('getTableByAttribute')) {
        function getTableByAttribute($table,$tableAttribute,$value,$first=null)
        {

            if($first){
                try {
                    // gets last inserted row
                    $result = \DB::table($table)
                        ->where($tableAttribute, $value)
                        ->first();
                } catch (\Exception $exception) {
                    return (object)[];
                }
            }else{
                try {
                    // gets last inserted row
                    $result = \DB::table($table)
                        ->where($tableAttribute, $value)
                        ->get();
                } catch (\Exception $exception) {
                    return [];
                }
            }
            return $result;
        }
    }


    if (!function_exists('getTableByAnyAttribute')) {
        function getTableByAnyAttribute($table,$tableAttribute,$value,$first=null)
        {

            if($first){
                try {
                    // gets last inserted row
                    $result = \DB::table($table)
                        ->where($tableAttribute, 'LIKE', '%' . $value . '%')
                        ->first();
                } catch (\Exception $exception) {
                    return (object)[];
                }
            }else{
                try {
                    // gets last inserted row
                    $result = \DB::table($table)
                        ->where($tableAttribute, 'LIKE', '%' . $value . '%')
                        ->get();
                } catch (\Exception $exception) {
                    return [];
                }
            }
            return $result;
        }
    }

    if (!function_exists('getCitiesByAnyAttribute')) {
        function getCitiesByAnyAttribute($tableAttribute,$value,$first=null)
        {

            if($first){
                try {
                    // gets last inserted row
                    $result = \DB::table('cities')
                        ->where($tableAttribute, 'LIKE', '%' . $value . '%')
                        ->where('country_id',38)
                        ->first();
                } catch (\Exception $exception) {
                    return (object)[];
                }
            }else{
                try {
                    // gets last inserted row
                    $result = \DB::table('cities')
                        ->where($tableAttribute, 'LIKE', '%' . $value . '%')
                        ->where('country_id',38)
                        ->get();
                } catch (\Exception $exception) {
                    return [];
                }
            }
            return $result;
        }
    }

    if (!function_exists('deleteImage')) {
        function deleteImage($id,$imageName,$table,$attribute,$filePath)
        {
            // gets last inserted row
            $result = \DB::table($table)
                ->where('id', $id)
                ->first();

            if(!$result){
                return ['status'=>false,'message'=>__('message.attribute-not-found'),'error'=>'element not found exception'];
            }

            try{
                $images = json_decode($result->{$attribute});

                $output =  \DB::transaction(function () use ($images,$id,$imageName,$filePath) {
                    //deleting
                    $index = array_search($imageName, $images);
                    if ($index !== false) {
                        unset($images[$index]);
                    }
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    return (object)['status' => true, 'image' => json_encode(array_values($images))];
                });
            }catch (\Exception $e){
                $output = (object)['status'=>false,'message'=>__('message.attribute-not-found'),'error'=>$e->getMessage()];
            }

            return $output;
        }
    }

    if (!function_exists('getTableWithMultipleAttributes')) {
        function getTableWithMultipleAttributes($table,$tableAttributes)
        {
            //keep space in at right of table attribute string
                try {
                    // gets last inserted row
                    $sql_query = "select * from " . $table . "where";
                    $total = count($tableAttributes);
                    $conditions = '';
                    foreach ($tableAttributes as $key=>$value){
                        if($total >1){
                            $conditions .= " ". $key." = ".$value." and ";
                            $total--;
                        }else{
                            $conditions .= " ". $key." = ".$value;
                        }
                    }
                    $query = $sql_query.$conditions;

                    $result = \DB::select($query);

                } catch (\Exception $exception) {
                    return null;
                }

            return $result;
        }
    }

    if (!function_exists('generateCode')) {
        function generateCode($prefix, $table, $tableAttribute) {

            try {
                // gets last inserted row
                $result = \DB::table($table)
                    ->select($tableAttribute)
                    ->where($tableAttribute, 'LIKE', '%' . $prefix . '%')
                    ->orderBy('id', 'desc')
                    ->first();
            } catch (\Exception $exception) {
                return/* dd(__('messages.table-or-column-not-exist'));*/
                    back()->with('error', __('messages.table-or-column-not-exist'));
            }

            $prefixMonthYear = $prefix;
            $range = 5; //config("suhucam.gen-length");


            if (is_null($result)) {
                $ref = $prefixMonthYear .  str_pad('', $range - 1, '0', STR_PAD_RIGHT) . '1';

            } else {
                $oldCode = $result->{$tableAttribute};
                if(!$oldCode){
                    $ref = $prefixMonthYear .  str_pad('', $range - 1, '0', STR_PAD_RIGHT) . '1';

                }else{
                    // collecting last inserted value with respect to given table attribute
                    $oldCode = $result->{$tableAttribute};

                    $newLength = strlen($prefixMonthYear);

                    if ($prefixMonthYear == substr($oldCode, 0, $newLength)) {
                        // collect incremented value
                        $increment = substr($oldCode, '-' . $range) + 1;
                        $newIncrement = str_pad((int)$increment, $range, '0', STR_PAD_LEFT);

                        $ref = $prefixMonthYear .  $newIncrement;

                    } else {
                        $ref = $prefixMonthYear .  str_pad('', $range - 1, '0', STR_PAD_RIGHT) . '1';

                    }
                }

            }

            return $ref;
        }
    }
