<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\CatePost;
use App\CategoryProductModel;
use App\Slider;
use App\Product;
use App\Icons;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function error_page(){
        return view('errors.404');
    }
    public function load_more_product(Request $request){

        $data = $request->all();

        if($data['id']>0){
            $all_product = Product::where('product_status','0')->where('product_id','<',$data['id'])->orderby('product_id','DESC')->take(6)->get();
        }else{
            $all_product = Product::where('product_status','0')->orderby('product_id','DESC')->take(6)->get();
        }

        $output ='';

        if(!$all_product->isEmpty()){
            foreach($all_product as $key => $pro){
                $last_id = $pro->product_id;
                $output.='


        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                <!-- Các input hidden ở đây -->

                <input type="hidden" value="'.$pro->product_id.'" class="cart_product_id_'.$pro->product_id.'">

                <input type="hidden" id="wishlist_productname'.$pro->product_id.'" value="'.$pro->product_name.'" class="cart_product_name_'.$pro->product_id.'">

                <input type="hidden" value="'.$pro->product_quantity.'" class="cart_product_quantity_'.$pro->product_id.'">

                <input type="hidden" value="'.$pro->product_image.'" class="cart_product_image_'.$pro->product_id.'">

                <input type="hidden" id="wishlist_productprice'.$pro->product_id.'" value="'.number_format($pro->product_price,0,',','.').'VNĐ">


                <input type="hidden" value="'.$pro->product_price.'" class="cart_product_price_'.$pro->product_id.'">

                <input type="hidden" value="1" class="cart_product_qty_'.$pro->product_id.'">

                <a id="wishlist_producturl'.$pro->product_id.'"  href="'.url('chi-tiet/'.$pro->product_slug).'">

                <div class="single-product">
                        <div class="product-img">
                        <a id="wishlist_producturl'.$pro->product_id.'"  href="'.url('chi-tiet/'.$pro->product_slug).'">
                            <img class="default-img" id="wishlist_productimage'.$pro->product_id.'" src="'.url('public/uploads/product/'.$pro->product_image).'" alt="'.$pro->product_name.'" >
                            <img class="hover-img" id="wishlist_productimage'.$pro->product_id.'" src="'.url('public/uploads/product/'.$pro->product_image).'" alt="'.$pro->product_name.'" >
                            </a>
                            <div class="button-head">
                                <!-- Các nút action ở đây -->
                                <div class="product-action">
										<a data-toggle="modal" data-target="#xemnhanh" onclick="XemNhanh(this.id);"  value="Xem nhanh"  id="'.$pro->product_id.'" title="Xem nhanh" href="#"><i class=" ti-eye"></i><span>Xem nhanh</span></a>
										<a title="Yêu thích"  id="'.$pro->product_id.'" onclick="add_wistlist(this.id);" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
										<a title="So sánh" onclick="add_compare('.$pro->product_id.')" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
									</div>
									<div class="product-action-2">
										<a title="Mua hàng" href="#"  id="'.$pro->product_id.'" onclick="Addtocart(this.id);">Thêm giỏ hàng</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                            <h3>'.$pro->product_name.'</h3>
                            <div class="product-price">
                                <span>'.number_format($pro->product_price,0,',','.').'VNĐ</span>
                            </div>
                        </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>

</div>';


            }
             $output .= '
                <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-primary form-control" data-id="'.$last_id.'" id="load_more_button">Xem thêm sản phẩm
                    </button>
                </div>
            ';
        }else{
            $output .= '
                <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-default form-control">Dữ liệu đang cập nhật thêm...
                    </button>
                </div>
            ';
        }
        echo $output;
    }
    public function index(Request $request){
        //get icons social
        $icons = Icons::orderBy('id_icons','DESC')->get();
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán đàn piano chính hãng";
        $meta_keywords = "thiet bi dan, phu kien dan, dan phu kien,dan giai tri";
        $meta_title = "Đàn piano, phụ kiện chính hãng";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();


        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6);

        $cate_pro_tabs = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('cate_pro_tabs',$cate_pro_tabs)->with('icons',$icons); //1
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
    }
    public function yeu_thich(Request $request){
         //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Yêu thích";
        $meta_keywords = "Yêu thích";
        $meta_title = "Yêu thích";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6);

        return view('pages.yeuthich.yeuthich')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post); //1

    }
    public function search(Request $request){
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post);

    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();

        if($data['query']){

            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block; position:absolute">'
            ;

            foreach($product as $key => $val){
             $output .= '
             <li class="li_search_ajax"><a href="#">'.$val->product_name.'</a></li>
             ';
         }

         $output .= '</ul>';
         echo $output;
     }


 }
 public function send_mail(){
    //send mail
           $to_name = "Sounique Store";
           $to_email = "pahn.anhi@gmail.com";//send to this email


           $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về sản phẩm'); //body of mail.blade.php

           Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

               $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
               $message->from($to_email,$to_name);//send from this mail
           });
           // return redirect('/')->with('message','');
           //--send mail
}
}
