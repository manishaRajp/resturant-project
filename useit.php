<php>
DB::table('Resturant')->insert([
    [
        'name'          => 'The Lime Tree',
        'category_id'   => 1
    ],
    [
        'name'          => 'Spice Villa',
        'category_id'   => 1
    ],
    [
        'name'          => 'Sasumaa Gujarati Thali',
        'category_id'   => 1
    ],
    [
        'name'          => 'Food Item Resturant',
        'category_id'   => 2
    ],
    [
        'name'          => 'Non-Veg House',
        'category_id'   => 2
    ],
    [
        'name'          => 'Black Papper',
        'category_id'   => 2
    ],
    [
        'name'          => 'Bhai Bhai Omellet Center',
        'category_id'   => 2
    ],
]);





<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resturant;
use App\DataTables\RestDataTable;
use App\Models\Category;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RestDataTable, $RestDataTable);
    // public function index($id) 
    {
        dd('35');
        $category = Category::where($id)->findorfail();
        $$res_show= $category->retsturat()->where('approved', 'true');
        return view('category.show', compact('$res_show', 'category'));
        // $category = Category::all();
        // dd($category);
        // $res_show = Resturant::all();
        // dd($res_show);
        // return response()->json($res_show);
        return $RestDataTable->render('Admin.forms.AddResturant.add_restaurant',compact('res_show','category'));
        // return view('Admin.forms.AddResturant.add_restaurant',compact('res_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.forms.AddResturant.add_new_restaurant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'restaurant' => 'required',
        ]);
         $add_ras = new Resturant;
         $add_ras->name = $request->restaurant;
         $add_ras->save();
         $request->session()->flash('status', ' Success! Resturant Added successful');
         $res_show = Resturant::all();
        //  return view('Admin.forms.AddResturant.add_restaurant', compact('res_show'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');            
            $table->string('name')->comment('Reataurant name');
            $table->string('address')->comment('Reataurant address');
            $table->string('email')->comment('Reataurant Email');
            $table->string('decription')->comment('Reataurant Blog');
            $table->string('image')->comment('Reataurant image');
            $table->string('Contact')->comment('Reataurant Customer care number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resturants');
    }
}


<command>
php artisan key:generate
php artisan storage:link

composer dump-autoload





<div class="content-wrapper">
    <div class="container-fluid">
        <h1>Wellcome,Admin</h1>
        <div class="card">
            <div class="card-header">
                <h3>This meal is in Your Resturant</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Meal Name</label>
                </div>
                <div class="form-group">
                    <label for="sub_name">Sub Name</label>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                </div>
                <div class="form-group">
                    <label for="image">Profile</label>
                </div>
                <br>
                <input type="submit" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>



flow of order 


Migration  and mofdel of order_details 

-migration:-
     $table->id();
            $table->unsignedBigInteger('rest_id');
            $table->foreign('rest_id')->references('id')->on('resturants')->onDelete('cascade');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('restaurant_add_meals')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('price')->comment('Price of meal');
            $table->timestamps();


-model:- 
        protected $fillable =  [
        'rest_id',
        'meal_id',
        'user_id',
        'price',
         ];
   
-Controller of OrderDetails And Order will Same simple 
-Route pass in api and call the function 
   -orderdetails Function in controller 
        public function OrderDetails(Request $request)
        {
            // dd(2343);
            // dd(Auth::user()->id);
            $detail = new OrderDetails;
            $prices = RestaurantAddMeal::where('id', $request->meal_id)->select('price')->get()->first();
            // dd($prices);
            $detail->rest_id = $request->rest_id;
            $detail->meal_id = $request->meal_id;
            $detail->user_id = Auth::user()->id;
            $detail->price = $prices->price;
            // dd($detail);
            $detail->save();
            return $detail;
        }

Migration  and mofdel of order 
      order -migration 
        $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('rest_id')->comment('Resturant Name');
            $table->foreign('rest_id')->references('id')->on('resturants')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->comment('User name');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('meal_id')->comment('Meal Name');
            $table->foreign('meal_id')->references('id')->on('restaurant_add_meals')->onDelete('cascade');
            $table->string('total')->comment('Price of meal');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 =paid, 1=pending');
            $table->string('discount')->nullable();
            $table->timestamps(); 


model filable 
Contrller and route Api
      public function OrderDone(Request $request)
    {
        // dd(2354);
        $rand = rand(1000, 9999);
        $value = OrderDetails::where('id',$request->meal_id)->get()->first();
        $payment = OrderDetails::select('price')->where('meal_id', $request->meal_id)->pluck('price')->toArray();
        $sum = collect($payment)->sum();
        // dd($sum);
        $order = new Order;
        $order->rest_id = $value['rest_id'];
        $order->user_id = $value['user_id'];
        $order->meal_id = $request->meal_id;
        $order->order_id = $rand;
        $order->status = $request->status;
        $order->discount = $request->discount;
        $order->total = $sum;
        $order->save();
        return $order;
    }




      public function OrderDone(Request $request)
    {
        // dd(46456);
        if (isset($request['apply_promo_code'])) {
            // dd(435453);
            $promo_code = DiscountCoupon::where('promo_code', $request['apply_promo_code'])->first();
            if ($promo_code != null) {
                $user_ues = Order::where('apply_promo_code', $request['apply_promo_code'])
                ->where('user_id', Auth::user()->id)->get();
                if ($user_ues == null) {
            $rand = rand(1000, 9999);
            $value = OrderDetails::where('id',$request->meal_id)->get()->first();
            $payment = OrderDetails::select('price')->where('meal_id', $request->meal_id)->pluck('price')->toArray();
            $sum = collect($payment)->sum();
            $order = new Order;
            $order->rest_id = $value['rest_id'];
            $order->user_id = $value['user_id'];
            // dd($order);
            $order->meal_id = $request->meal_id;
            $order->order_id = $rand;
            $order->status = $request->status;
            $order->discount = $request->discount;
            $order->total = $sum;
            $order->save();
            return $order;
        } else {
            dd('have nhi thai bhai');
        }
        } else {
            dd('invalid promocode');
        }
        } else {
            // dd(3546);
            $rand = rand(1000, 9999);
            $value = OrderDetails::where('id', $request['meal_id'])->get();
            dd($value);
            $payment = OrderDetails::select('price')->where('meal_id', $request->meal_id)->pluck('price')->toArray();
            $sum = collect($payment)->sum();
            $order = new Order;
            $order->rest_id = $value['rest_id'];
            $order->user_id = $value['user_id'];
            $order->meal_id = $request->meal_id;
            $order->order_id = $rand;
            $order->status = $request->status;
            $order->discount = $request->discount;
            $order->total = $sum;
            $order->save();
            return $order;
        }
    }





      Swal({
            title: 'Do you want to save the changes?'
            , showDenyButton: true
            , showCancelButton: true
            , confirmButtonText: 'Save'
            , denyButtonText: `Don't save`
        , }).then((result) => {
            if (result.isConfirmed) {
                // if (result) {
                $.ajax({
                    url: "{{route('admin.rest_status')}}"
                    , type: "get"
                    , data: {
                        id: id
                    , }
                    , dataType: "json"
                    , success: function(data) {
                        if (data) {
                            Swal.fire('Saved!', '', 'success')
                            window.location.href =
                                "{{ route('admin.restaurant.index')}}";
                        }
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }

        });
    });










    <script>
    $(document).on('click', '#status', function() {
        var id = $(this).data('id');
        // alert(id);
        swal({
            title: "Are you sure?",
            text: "you want to Change Status",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save!',
            cancelButtonText: "No, cancel plx!",
            reverseButtons: true
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "{{route('admin.rest_status')}}",


                    type: "get",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            swal("Updated!",
                                "Status Change Successfully.",
                                "success");
                            window.location.href =
                                "{{ route('admin.restaurant.index')}}";
                        }
                    }
                });
            } else {
                swal("Cancelled", "Your Status is safe :)", "error");
            }
        });
    });
</script>











            'change-password'
            'role-list'
            'resturant-list',
            'resturant-create',
            'resturant-edit',
            'resturant-delete',
            'meal-list',
            'meal-create',
            'meal-edit',
            'meal-delete'
            'user-list',
            'user-create',
            'user-edit',
            'user-delete'
            'order-list',
            'order-create',
            'order-edit',
            'order-delete'
            'promocode-list',
            'promocode-create',
            'promocode-edit',
            'promocode-delete'
            'payment-list',
            'payment-create',
            'payment-edit',
            'payment-delete'
            'qr code-list',
            'qr code-create',
            'qr code-edit',
            'qr code-delete'
            'adminprofile-list',
            'adminprofile-create',
            'adminprofile-edit',
            'adminprofile-delete'
            