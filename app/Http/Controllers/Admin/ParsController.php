<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\{
    Ads, Region, City
};
use Illuminate\Support\Facades\Hash;
use App\Helpers\Seo;
use Illuminate\Http\Request;

class ParsController extends Controller
{
    public $marksAuto = [
        "Abadal", "Abarth", "Abbott-Detroit", "ABT", "AC Cars", "Acura", "Agrale", "Aiways", "Aixam", "Alfa Romeo", "Alpina", "Alpine", "Alta", "Alvis", "AMC", "AMG", "Apollo", "Arash", "Ariel", "ARO", "Arrinera", "Artega", "Ascari", "Askam", "Aston Martin", "Atalanta Motors", "Auburn", "Audi", "Aurus", "Austin", "Autobacs", "Autobianchi", "Axon",
        "BAC",  "BAIC Motor",  "Baltijas Džips",  "Baojun",  "Bentley",  "Berkeley",  "Berliet",  "Bertone",  "Bharat", "Benz",  "Bitter",  "Bizzarrini",  "BMW",  "Borgward",  "Bowler",  "Brabus",  "Brammo",  "Brilliance",  "Bristol",  "Bronto",  "Brooke",  "Bufori",  "Bugatti",  "Buick", "BYD",
        "Cadillac", "Caparo", "Carlsson", "Caterham", "Changan", "Changfeng", "Chery", "Chevrolet", "Chrysler", "Cisitalia", "Citroën", "Cizeta", "Cole", "Corre La Licorne", "Corvette",
        "Dacia", "Daewoo", "DAF", "Daihatsu", "Daimler", "Dartz", "Datsun", "David Brown", "De Tomaso", "Delage", "DeLorean (DMC)", "Detroit Electric", "Devel Motors", "Diatto", "DINA", "DKW", "Dodge", "Dongfeng", "Donkervoort", "Drive eO", "DS",
        "Eagle", "EDAG", "Edsel", "Eicher", "Elemental", "Elfin", "Elva", "Englon", "ERF", "Eterniti", "Ё-Auto",
        "9ff", "Facel Vega", "Faraday Future", "FAW", "Ferrari", "Fiat", "Fioravanti", "Fisker", "Foden Trucks", "Force Motors", "Ford", "Foton", "FPV", "Franklin", "Freightliner",
        "GAC Group", "Gardner Douglas", "GAZ", "Geely", "General Motors", "Genesis", "Geo", "Gilbern", "Gillet", "Ginetta", "GMC", "Gonow", "Great Wall", "Grinnall", "GT-R", "GTA Motor (Spania GTA)", "Gumpert",
        "Hafei", "Haima", "Haval", "Hawtai", "Hennessey", "Hillman", "Hindustan Motors", "Hino", "Hispano-Suiza", "Holden", "Hommell", "Honda", "Horch", "HSV", "Hudson", "Hummer", "Hupmobile", "Hyundai",
        "IC Bus", "Infiniti", "Innocenti", "Intermeccanica", "International Harvester", "International Trucks", "Iran Khodro", "Irizar", "Isdera", "Iso Rivolta", "Isuzu", "Iveco",
        "JAC", "Jaguar", "Jawa", "JBA", "Jeep", "Jensen", "JMC",
        "Kaiser", "KAMAZ", "Karma", "Keating", "Kenworth", "Kia", "Koenigsegg", "KTM",
        "Lada", "Lagonda", "Lamborghini", "Lancia", "Land Rover", "Landwind", "Laraki", "LEVC", "Lexus", "Leyland", "Lifan", "Ligier", "Lincoln", "Lister", "Lloyd", "Lobini", "Lotus", "Lucid", "Luxgen",
        "M BMW", "Mack", "Mahindra", "MAN", "Mansory", "Marcos", "Marlin", "Maserati", "Mastretta", "Maxus", "Maybach", "MAZ", "Mazda", "Mazzanti", "McLaren", "Melkus", "Mercedes-Benz", "Mercury", "Merkur", "MG", "Microcar", "Mills Extreme Vehicles", "Mini", "Mitsubishi", "Mitsuoka", "MK Sportscars", "Monteverdi", "Morgan", "Morris", "Mosler", "Mustang",
        "Navistar", "Nismo", "Nissan", "Noble",
        "Oldsmobile", "Oltcit", "Opel", "OSCA",
        "Paccar", "Pagani", "Panhard", "Panoz", "Pegaso", "Perodua", "Peterbilt", "Peugeot", "PGO", "Pierce-Arrow", "Pininfarina", "Plymouth", "Polestar", "Pontiac", "Porsche", "Praga", "Premier", "Prodrive", "Proton",
        "Qoros",
        "Radical Sportscars", "RAM", "Rambler", "Ranz", "Renault", "Renault Samsung", "Rezvani", "Riley", "Rimac", "Rinspeed", "Roewe", "Rolls-Royce", "Ronart Cars", "Rossion", "Rover", "Ruf",
        "Saab", "SAIC Motor", "SAIPA", "Saleen", "Saturn", "Scania", "Scion", "SEAT", "Setra", "Shelby", "Simca", "Singer", "Sisu Auto", "Škoda", "Smart", "Soueast", "Spirra", "Spyker", "SRT", "SsangYong", "SSC", "Sterling", "Studebaker", "Subaru", "Suffolk", "Suzuki",
        "Talbot", "Tata", "Tatra", "Tauro Sport Auto", "TechArt", "Tesla", "Thai Rung", "Toroidion", "Toyota", "Toyota Crown", "Tramontana", "Trion", "Triumph", "Troller", "TVR",
        "UAZ", "UD Trucks", "Ultima Sports",
        "Vandenbrink", "Vauxhall", "Vector Motors", "Vencer", "Venturi", "Venucia", "Viper", "Volkswagen", "Volvo",
        "W Motors", "Wanderer", "Wartburg", "Western Star", "Westfield", "Wiesmann", "Willys-Overland", "Wuling",
        "XPeng",
        "Yulon",
        "Zarooq Motors", "Zastava", "ZAZ", "Zenos", "Zenvo", "ZIL", "Zotye",
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->regionList = Region::where('id_country', 1)->get();
    }

    public function restApp()
    {
        /*foreach($this->marksAuto as $name){
           $res = \App\Model\Category::create([
                'title' => $name,
                'description' => $name,
                'keywords' => $name,
                'head' => $name,
                'level' => 1,
            ]);
        }
        if($res) {
            echo 'Ok';
        }*/
        $data = [
            'title' => 'Парсер RestApp',
            'content' => view('admin.content.parser.restapp', [
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function restAppAutoAvitoApi(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->except(['_token', 'url']);
            $res = $this->getPars($request->url, $data);
            if($res['status']=='ok') {
                $status = $this->adsCreate($res['data']);
            } else {
                $status = $res['status'];
            }
        }
        $data = [
            'title' => 'Парсер автомобилей RestApp',
            'content' => view('admin.content.parser.restappAutoAvitoApi', [
                'regionList' => $this->regionList,
                'status' => $status??false,
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function restAppRegion()
    {
        $res = $this->getPars('https://rest-app.net/api/region', []);
        if($res['status']=='ok') {
            foreach($res['data'] as $data){
                Region::create([
                    'id_country' => 1,
                    'old' => $data['id'],
                    'region_name_ru' => $data['name'],
                    'region_name_en' => $data['name'],
                ]);
            }
        }
        return redirect()->route('adminParsRestApp')->with('status', 'Регионы успешно добавлены.');
    }

    public function restAppCity()
    {
        $res = $this->getPars('https://rest-app.net/api/city', []);
        if($res['status']=='ok') {
            foreach($res['data'] as $data){
                $reg = Region::select('id')->where('old', $data['parent_Id'])->first();
                City::create([
                    'id_country' => 1,
                    'id_region' => $reg['id'],
                    'old' => $data['id'],
                    'old_region' => $data['parent_Id'],
                    'city_name_ru' => $data['name'],
                    'city_name_en' => $data['name'],
                ]);
            }
        }
        return redirect()->route('adminParsRestApp')->with('status', 'Города успешно добавлены.');
    }

    public function getPars($url, $data)
    {
        $curl = curl_init(); // Инициализируем запрос
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // Полный адрес метода
            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
            CURLOPT_POST => false, // Метод POST
            CURLOPT_HTTPHEADER, 'Content-Type: application/json',
            CURLOPT_POSTFIELDS => http_build_query($data) // Данные в запросе
        ));
        $response = curl_exec($curl); // Выполняем запрос
        $response = json_decode($response, true); // Декодируем из JSON в массив
        curl_close($curl); // Закрываем соединение
        return $response;
    }

    public function adsCreate($datas)
    {
        $i = 0;
        foreach($datas as $data){
            if(isset($data['images'])){
                $avatar = explode(',', $data['images']);
            }
            try {
            $brand = Seo::extBrand2($data['title']);
            $ads = Ads::create([
                'title' => Seo::genTitle($data['title'], $data['description'], $data['city'], 'sell'),
                'description' => Seo::genDescription($data['title'], $data['description'], $data['city'], 'sell'),
                'keywords' => Seo::genKeywords($data['title'], $data['description'], $data['city'], 'sell'),
                'url' => Seo::genUrl($data['title'], $data['city']),
                'head' => $data['title'],
                'body' => base64_encode(nl2br($data['description'])),
                'price' => $data['price'],
                'phone' => base64_encode($data['phone']),
                'username' => $data['name'],
                'avatar' => $avatar[0]??'no_photo.jpg',
                'photo' => base64_encode(json_encode($avatar, JSON_BIGINT_AS_STRING)),
                'city' => $data['city']??$data['region'],
                'params' => base64_encode(json_encode($data['params'], JSON_BIGINT_AS_STRING)),
                'level' => 1,
                'status' => 'sell',
            ]);
            foreach($brand as $n){
                if(!empty($n)) {
                    $ads->category()->attach($n);
                }
            }
            $ads->user()->attach(13);
            $ads->country()->attach(1);
            $ads->region()->attach(Seo::regionId($data['region']));
            if(!empty($data['city'])){
                $ads->city()->attach(Seo::cityId($data['city']));
            }
                } catch (\Illuminate\Database\QueryException $e) {
                dd($e);
            }
            /*$ads->city()->attach('city_Id');*/
            $i++;
        }
        if($ads){
            return redirect()->route('adminParsRestApp')->with('status', 'Объявления в количестве '.$i.'ед. успешно добавлены.');
        }
    }
}
