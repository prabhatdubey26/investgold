<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Header;
use App\Models\News;
use App\Models\Team;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        //$sliders = Slider::all();
        $navigations = Header::all();
        $team = Team::all();
        $news = News::all();
        return view('index',compact('navigations','team','news')); 
    }

    public function checkout(Request $request)
    {
        // dd($request->all());
        
        $navigations = Header::all();
        $team = Team::all();
        $news = News::all();
        $user_id = Auth::user()->id;
        $total_price = $request->total_price;
        $products = $request->products;
       $order = Order::create([
            'user_id'=>$user_id,
            'product_details'=>$products,
            'total_price'=>$total_price,
            'payment_status'=>'pending'
        ]);
        $lastOrder  = Order::where(['id'=>$order->id])->with('user')->first();

        return view('checkout',compact('navigations','team','news', 'lastOrder')); 
    }
	
	public function contact()
    {
        //$sliders = Slider::all();
        $navigations = Header::all();
        $team = Team::all();
        $news = News::all();
        return view('contact',compact('navigations','team','news')); 
    }
	public function shoppage()
    {
        $navigations = Header::all();
        $news = News::all();
        return view('shoppage',compact('navigations','news')); 
    }
	public function mauritius()
    {
        $navigations = Header::all();
        $news = News::all();
        return view('mauritius',compact('navigations','news')); 
    }
	public function southafrica()
    {
        $navigations = Header::all();
        $news = News::all();
        return view('southafrica',compact('navigations','news')); 
    }
    public function southafrica_graph()
    {
        $navigations = Header::all();
        $news = News::all();
        $endpoint = "https://metals-api.com/api/latest?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAU&symbols=ZAR";
		
		
		$get_data = self::callAPI('GET', $endpoint, false);
		$response = json_decode($get_data, true);		
		$data = $response['rates']['ZAR'];
		$value = round((float)($data?? ''), 2);
		$onekg = round((float)($value*35.274?? ''), 2);
		$halfoz = round((float)($value/2?? ''), 2);
		$twooz = round((float)($value*2?? ''), 2);
		$fiveoz =round((float)($value*5?? ''), 2); 
		$tenoz = round((float)($value*10?? ''), 2);
		$tengram = round((float)(($value/28.35)*10?? ''), 2);
		$twentygram = round((float)(($value/28.35)*20?? ''), 2);
		$hundredgram = round((float)(($value/28.35)*100?? ''), 2);
		

        return view('southafrica_graph',compact('navigations','news','value','onekg','halfoz','twooz','fiveoz','tengram','twentygram','hundredgram')); 
    }
	public function historicalchart()
    {
        $navigations = Header::all();
        $news = News::all();
        return view('historicalchart',compact('navigations','news')); 
    }
	public function livechart()
    {
        $navigations = Header::all();
        $news = News::all();
        return view('livechart',compact('navigations','news')); 
    }
	public function mauritius_goldproducts()
    {  
        $navigations = Header::all();
        $news = News::all();
		$endpoint = "https://metals-api.com/api/latest?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAU&symbols=MUR";
		$products = Product::where(['country'=>'mauritius' ,'type'=>'gold'])->get();
		
		$get_data = self::callAPI('GET', $endpoint, false);
		$response = json_decode($get_data, true);		
		$data = $response['rates']['MUR'];
		$value = round((float)($data?? ''), 2);
		// $onekg = round((float)($value*35.274?? ''), 2);
		// $halfoz = round((float)($value/2?? ''), 2);
		// $twooz = round((float)($value*2?? ''), 2);
		// $fiveoz =round((float)($value*5?? ''), 2); 
		// $tenoz = round((float)($value*10?? ''), 2);
		// $tengram = round((float)(($value/28.35)*10?? ''), 2);
		// $twentygram = round((float)(($value/28.35)*20?? ''), 2);
		// $hundredgram = round((float)(($value/28.35)*100?? ''), 2);
		
        foreach ($products as $product) {
            if ($product->title === '1 KG Gold Bar') {
                $product->price = round($value, 2);
            } elseif ($product->title === '1 KG Gold Medallion') {
                $product->price = round($value, 2); // Use appropriate calculation
            } elseif ($product->title === '1 oz Gold Medallion') {
                $product->price = round(($value / 35.274), 2); // Price for 1 oz
            } elseif ($product->title === '2 oz Gold Medallion') {
                $product->price = round(($value * 2 / 35.274), 2); // Price for 2 oz
            } elseif ($product->title === '5 oz Gold Bar') {
                $product->price = round(($value * 5 / 35.274), 2); // Price for 5 oz
            } elseif ($product->title === '10 Gram Gold Medallion') {
                $product->price = round(($value / 28.35 * 10), 2); // Price for 10 grams
            } elseif ($product->title === '50 Gram Gold Medallion') {
                $product->price = round(($value / 28.35 * 50), 2); // Price for 50 grams
            } elseif ($product->title === '100 Gram Gold Medallion') {
                $product->price = round(($value / 28.35 * 100), 2); // Price for 100 grams
            }
        }
        // return view('mauritius_goldproducts',compact('navigations','news','value','onekg','halfoz','twooz','fiveoz','tengram','twentygram','hundredgram')); 
       
        return view('mauritius_goldproducts',compact('navigations','news','value','products')); 
    }
	public function mauritius_silverproducts()
    {
        $navigations = Header::all();
        $news = News::all();
		$endpoint = "https://metals-api.com/api/latest?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAG&symbols=MUR";
		
		$products = Product::where(['country'=>'mauritius' ,'type'=>'silver'])->get();
		$get_data = self::callAPI('GET', $endpoint, false);
		$response = json_decode($get_data, true);		
		$data = $response['rates']['MUR'];
		$value = round((float)($data*28.35?? ''), 2);
		
		// $onekg = round((float)($value*35.274?? ''), 2);
		// $twokg = round((float)($value*2?? ''), 2);
		// $twooz = round((float)($value*2?? ''), 2);
		// $fiveoz =round((float)($value*5?? ''), 2); 
		// $tenoz = round((float)($value*10?? ''), 2);
		// $tengram = round((float)(($value/28.35)*10?? ''), 2);
		// $fiftygram = round((float)(($value/28.35)*20?? ''), 2);
		// $hundredgram = round((float)(($value/28.35)*100?? ''), 2);
		 // Add prices to each product
         foreach ($products as &$product) {
            if ($product['title'] === '1 KG Silver Cast Bar') {
                $product->price = round($value, 2);
            } elseif ($product['title'] === '1 KG Silver Medallion') {
                $product->price = round($value, 2); // Use appropriate calculation
            } elseif ($product['title'] === '1 oz Silver Medallion') {
                $product->price = round(($value * 1 / 35.274), 2); // Price for 1 oz
            } elseif ($product['title'] === '2 oz Silver Medallion') {
                $product->price = round(($value * 2 / 35.274), 2); // Price for 2 oz
            } elseif ($product['title'] === '5 oz Silver Cast Bar') {
                $product->price = round(($value * 5 / 35.274), 2); // Price for 5 oz
            } elseif ($product['title'] === '10 Gram Silver Medallion') {
                $product->price = round(($value / 28.35 * 10), 2); // Price for 10 grams
            } elseif ($product['title'] === '50 Gram Silver Medallion') {
                $product->price = round(($value / 28.35 * 50), 2); // Price for 50 grams
            } elseif ($product['title'] === '100 Gram Silver Medallion') {
                $product->price = round(($value / 28.35 * 100), 2); // Price for 100 grams
            }
        }
		
		//2nd product
		// $endpoint2 = "https://metals-api.com/api/2024-08-28?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=USD&symbols=MUR";
		
		
		// $get_data2 = self::callAPI('GET', $endpoint2, false);
		// $response2 = json_decode($get_data2, true);		
		// $data2 = $response2['rates']['MUR'];
		// $value2 = round((float)($data?? ''), 2);		

        return view('mauritius_silverproducts',compact('navigations','news','value','products')); 
    }
	public function sa_goldproducts()
    {
        $navigations = Header::all();
        $news = News::all();
		$endpoint = "https://metals-api.com/api/latest?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAU&symbols=ZAR";
		
		//https://metals-api.com/api/latest?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAU&symbols=INR
		$products = Product::where(['country'=>'South Africa' ,'type'=>'gold'])->get();
        $get_data = self::callAPI('GET', $endpoint, false);
		$response = json_decode($get_data, true);		
		$data = $response['rates']['ZAR'];
		$value = round((float)($data?? ''), 2);	
		$halfoz = round((float)($value/2?? ''), 2);
		$halftohalfoz = round((float)($value/4?? ''), 2);
		$tenoz = round((float)($value*10?? ''), 2);
		//2nd product
		// $endpoint2 = "https://metals-api.com/api/2024-08-28?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAU&symbols=ZAR";
		
		
		// $get_data2 = self::callAPI('GET', $endpoint2, false);
		// $response2 = json_decode($get_data2, true);		
		// $data2 = $response2['rates']['ZAR'];
		// $value2 = round((float)($data?? ''), 2);	
        // Loop through each product and set prices based on title
        foreach ($products as $product) {
            if ($product->title === '¼ Oz Gold Krugerrand') {
                $product->price = round(($value / 4), 2); // Price for ¼ oz
            } elseif ($product->title === '½ Oz Gold Krugerrand') {
                $product->price = $halfoz; // Price for ½ oz
            } elseif ($product->title === '1 Oz Gold Krugerrand') {
                $product->price = round($value, 2); // Price for 1 oz
            } elseif ($product->title === '1-10 oz Gold Krugerrand') {
                $product->price = $tenoz; // Price for 1-10 oz
            }
        }
        // return view('sa_goldproducts',compact('navigations','news','value','halfoz','halftohalfoz','tenoz')); 

        return view('sa_goldproducts',compact('navigations','news','value', 'products')); 
    }
	public function sa_silverproducts()
    {
        $navigations = Header::all();
        $news = News::all();
		$endpoint = "https://metals-api.com/api/2024-09-02?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=XAG&symbols=ZAR";
		
        $products = Product::where(['country'=>'South Africa' ,'type'=>'silver'])->get();
		$get_data = self::callAPI('GET', $endpoint, false);
		$response = json_decode($get_data, true);		
		$data = $response['rates']['ZAR'];
		$value = round((float)($data?? ''), 2);		
		$onekg = round((float)($value*35.274?? ''), 2);
		
		//2nd product
		// $endpoint2 = "https://metals-api.com/api/2024-08-28?access_key=qod6s47t5elz5k16s741k46e99oub3nr9pz745moifhu8zt2wlqu3zd405eq&base=USD&symbols=ZAR,INR,XPT";
		
		
		// $get_data2 = self::callAPI('GET', $endpoint2, false);
		// $response2 = json_decode($get_data2, true);		
		// $data2 = $response2['rates']['ZAR'];
		// $value2 = round((float)($data?? ''), 2);	
        // Loop through each product and set prices based on title
        foreach ($products as &$product) {
            if ($product['title'] === '1 KG Silver Bar') {
                $product['price'] = $onekg; // Price for 1 kg
            } elseif ($product['title'] === '1 oz Silver Krugerrand') {
                $product['price'] = round(($value), 2); // Price for 1 oz
            } elseif ($product['title'] === '1oz Silver Medallion') {
                $product['price'] = round(($value), 2); // Price for 1 oz
            }
        }
	
        // return view('sa_silverproducts',compact('navigations','news','value','onekg')); 

        return view('sa_silverproducts',compact('navigations','news','products')); 
    }
	
	function callAPI($method, $url, $data, $headers = false){
		   $curl = curl_init();
		   switch ($method){
			case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
		   }
		   // OPTIONS:
		   curl_setopt($curl, CURLOPT_URL, $url);
		   if(!$headers){
			   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				  'APIKEY: 111111111111111111111',
				  'Content-Type: application/json',
			   ));
		   }else{
			   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				  'APIKEY: 111111111111111111111',
				  'Content-Type: application/json',
				  $headers
			   ));
		   }
		   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		   // EXECUTE:
		   $result = curl_exec($curl);
		   if(!$result){die("Connection Failure");}
		   curl_close($curl);
		   return $result;
}
	 /**
     * Cart features for creating a new or removing items.
     */
	public function addToCart(Request $request)
    {
        $product = Product::find($id);

        // if (!$product) {

        //     abort(404);

        // }

        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);
        if(request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeCartItem(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearCart()
{
    session()->forget('cart');
    return redirect()->back();
}

}