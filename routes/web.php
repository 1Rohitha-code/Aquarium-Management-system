<?php
namespace App;

use App\Notifications\TaskCompleted;
use App\User;
use App\Models\Task_asigning;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/forms', function () {
    return view('normal-user-pages.test');
});
Route::get('/construct', function () {
    return view('normal-user-pages.construction');
});

Route::get('/reports', function () {
    return view('normal-user-pages.reports');
});

//testing purpose-------------------------------------


//original home page
Route::get('/', function () {
    return view('landing_page');
});


Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();

})->name('markRead');



Route::get('/warning', function () {
    return view('warning_msg');
});

Route::get('/supplier_warning', function () {
    return view('supplier_warning_msg');
});



//testing
Route::get('/masterpage', function () {
    return view('root.master_page');
});
//testing

Route::post('/register_supplier','Supplier\SupplierRegController@register_supplier');

Route::get('/my_register', function () {
    return view('myregister');
});


//supplier registration
Route::get('/register_supplier', function () {
    return view('supplier_registration');
});






Route::get('/collapse', function () {
    return view('navbarcollapse');
});


Auth::routes();

 
//Administrator routes
Route::group(['middleware' => ['auth','isAdmin']], function () {


    //for admin control panel
    Route::get('/admin_dashboard','Admin_Dashboard\DashboardController@show_control_panel');
    //for admin control panel

    //User management routes
    Route::get('/user_privileges','Activities\UsermangementController@show_users');
    Route::get('/edit_user_role/{id}','Activities\UsermangementController@edit');
    Route::put('/update_user_role/{id}','Activities\UsermangementController@update');
    Route::delete('/delete_user/{id}','Activities\UsermangementController@delete');
    
    //supplier mangement routes
    Route::get('/supplier_list', 'Activities\UsermangementController@display_supplier_list'); 
    Route::get('/supplier_detail/{id}','Activities\UsermangementController@view_supplier_details');
    Route::put('/update_supplier_status/{id}','Activities\UsermangementController@update_supplier_status');
    //User management routes

    //Order task routes
    // Route::get('/go_to_task_form','Tasks\Order_taskController@show_task_form');   
    //Order task routes


    //add a new category
    Route::get('/cat_form', 'Aquarium_Inventory\CategoryController@display_form');
    Route::post('/save_data', 'Aquarium_Inventory\CategoryController@save');
    //add a new category

    //ORNAMENTAL FISH CATEGORY ROUTES
    Route::get('/transfer_cat_type', 'Aquarium_Inventory\CategoryController@fetch_data_into_fish_form');
    Route::get('/fish_data_form', 'Aquarium_Inventory\Fish_detailsController@index');
    Route::post('/save_data_form', 'Aquarium_Inventory\Fish_detailsController@save');
    Route::get('/display_fish_data', 'Aquarium_Inventory\Fish_detailsController@display_fish_data');
    Route::get('/edit_fish_data/{id}', 'Aquarium_Inventory\Fish_detailsController@edit_fish_data');
    Route::put('/update_fish_data/{id}', 'Aquarium_Inventory\Fish_detailsController@update_fish_data');
    Route::delete('/delete_fish_profile/{id}','Aquarium_Inventory\Fish_detailsController@delete');
    Route::get('/see_more_fish/{id}','Aquarium_Inventory\Fish_detailsController@see_more_fish');
    //ORNAMENTAL FISH CATEGORY ROUTES

    //AQUA PLANTS CATEGORY ROUTES
    Route::get('/plant_data_form', 'Aquarium_Inventory\Plant_detailsController@index');
    Route::post('/save_plant_data', 'Aquarium_Inventory\Plant_detailsController@save');
    Route::get('/display_plant_data', 'Aquarium_Inventory\Plant_detailsController@display_plant_data');
    Route::get('/edit_plant_data/{id}', 'Aquarium_Inventory\Plant_detailsController@edit_plant_data');
    Route::put('/update_plant_data/{id}', 'Aquarium_Inventory\Plant_detailsController@update_plant_data');
    Route::delete('/delete_plant_profile/{id}','Aquarium_Inventory\Plant_detailsController@delete');
    Route::get('/see_more_plant/{id}','Aquarium_Inventory\Plant_detailsController@see_more_plant');
    //AQUA PLANTS CATEGORY ROUTES

    //DECORATIONS CATEGORY ROUTES
    Route::get('/decoration_data_form', 'Aquarium_Inventory\DecorationController@index');
    Route::post('/save_decoration_form', 'Aquarium_Inventory\DecorationController@save_form');
    Route::get('/display_decoration_data', 'Aquarium_Inventory\DecorationController@display_decoration_data');
    Route::get('/edit_decoration_data/{id}', 'Aquarium_Inventory\DecorationController@edit_plant_data');
    Route::put('/update_decoration_data/{id}', 'Aquarium_Inventory\DecorationController@update_decoration_data');
    Route::delete('/delete_decoration_profile/{id}','Aquarium_Inventory\DecorationController@delete');
    Route::get('/see_more_decor/{id}','Aquarium_Inventory\DecorationController@see_more_decor');
    //DECORATIONS CATEGORY ROUTES

    //FISHFOOD CATEGORY ROUTES
    Route::get('/fishfood_data_form', 'Aquarium_Inventory\FishfoodController@index');
    Route::post('/save_fishfood_form', 'Aquarium_Inventory\FishfoodController@save_form');
    Route::get('/display_fishfood_data', 'Aquarium_Inventory\FishfoodController@display_fishfood_data');
    Route::get('/edit_fishfood_data/{id}', 'Aquarium_Inventory\FishfoodController@edit_fishfood_data');
    Route::put('/update_fishfood_data/{id}', 'Aquarium_Inventory\FishfoodController@update_fishfood_data');
    Route::delete('/delete_fishfood_profile/{id}','Aquarium_Inventory\FishfoodController@delete');
    Route::get('/see_more_fishfood/{id}','Aquarium_Inventory\FishfoodController@see_more_fishfood');
    //FISHFOOD CATEGORY ROUTES

    //MEDICINES CATEGORY ROUTES
    Route::get('/medicines_data_form', 'Aquarium_Inventory\MedicinesController@index');
    Route::post('/save_medicines_form', 'Aquarium_Inventory\MedicinesController@save_form');
    Route::get('/display_medicines_data', 'Aquarium_Inventory\MedicinesController@display_medicines_data');
    Route::get('/edit_medicines_data/{id}', 'Aquarium_Inventory\MedicinesController@edit_medicines_data');
    Route::put('/update_medicines_data/{id}', 'Aquarium_Inventory\MedicinesController@update_medicines_data');
    Route::delete('/delete_medicines_profile/{id}','Aquarium_Inventory\MedicinesController@delete');
    Route::get('/see_more_medicine/{id}','Aquarium_Inventory\MedicinesController@see_more_medicine');
    //MEDICINES CATEGORY ROUTES

        
    //Admin checks cus Order details routes
    Route::get('/cus_orders_list', 'Admin_Dashboard\CheckCusOrderController@check_cus_orders'); 

    //fetch data by it's id using popup modal 
    Route::get('order_detail/{id}','Admin_Dashboard\CheckCusOrderController@view_order_details');
   
    //update order status on customer order page itself
    Route::put('/update_order_state/{id}','Admin_Dashboard\CheckCusOrderController@update_order_state');
    //update order status on customer order page itself 

    //filter fish products
    Route::get('/filter_items','FishRangecheckController@index');
    //filter fish products

    //getting all customer orders (07/07/2021)
    Route::get('/cus_order_list','Orders\Cus_OrdersController@display_cus_orders');    
     //getting all customer orders (07/07/2021)

     //getting transport cost form
     Route::get('/city_vs_cost_form','Online_purchase\Distance_vs_CostController@display_insertion_form');
     Route::post('/save_form','Online_purchase\Distance_vs_CostController@save_form');
     //getting transport cost form

   //show specific order details routes
   Route::get('/specific_order_data/{id}','Admin_Dashboard\Single_OrderController@display_single_order');    
   Route::get('/downloadPDF/{id}','Admin_Dashboard\Single_OrderController@downloadPDF');
   //show specific order details routes 

   //order process routes
   Route::get('/goto_task_form/{id}','Tasks\Order_taskController@show_task_asigning_form');
   Route::post('/save_task_form','Tasks\Order_taskController@store_task_data');

   //Delivery details routes
   Route::get('/delivery_details_list','Delivery_process\DeliveryDetailsController@show_delivery_details');
   Route::get('/individual_delivery_profile/{email}','Delivery_process\DeliveryDetailsController@check_deliver_profile');
   
    //edit task asigning form
    Route::get('/task_edit_form/{id}','Delivery_process\DeliveryDetailsController@edit_task_form');
    //update task asigning data
    Route::post('/update_task_data/{id}', 'Delivery_process\DeliveryDetailsController@update_task_data');

    //search option for daily payment collection
    Route::post('/search_completed_orders_by_date/{email}','Delivery_process\DeliveryDetailsController@search_orders_by_date');

    //store completed order records
    Route::post('/save_completed_orders_by_date', 'Delivery_process\PaymentCollectedController@store_completed_orders'); 

    //display all reports page
    Route::get('/report_generation', 'Admin\Reports\ManagementReportsController@display_all_report_modules'); 
    Route::post('/online_purchase', 'Admin\Reports\OnlinePurchaseMngmntController@show_filtered_result'); 
    
    //Supplier management routes
    //RFQ routes 
    Route::get('/items_to_be_ordered', 'Admin\Supplier_management\Supplier_mngmntController@items_to_be_ordered'); 
    Route::post('/store_selected_val', 'Admin\Supplier_management\Supplier_mngmntController@store_selected_value'); 
    Route::post('/store_required_info', 'Admin\Supplier_management\Supplier_mngmntController@store_required_info'); 
    Route::get('/preview_of_rfq_info/{id}', 'Admin\Supplier_management\Supplier_mngmntController@rfq_info_preview'); 
    
    Route::get('/edit_view_of_rfq_info/{rfq_id}', 'Admin\Supplier_management\Supplier_mngmntController@display_edit_page_of_rfq_info'); 
    Route::post('/update_rfq_date_info/{rfq_id}', 'Admin\Supplier_management\Supplier_mngmntController@update_rfq_info'); 
    Route::post('/update_rfq_item_qty/{tbl_id}/{rfq_id}', 'Admin\Supplier_management\Supplier_mngmntController@update_rfq_item_qty'); 

    Route::post('/submit_rfq', 'Admin\Supplier_management\Supplier_mngmntController@submit_rfq_for_new_suppliers'); 
    Route::get('/list_of_suppliers_with_rfq/{rfq_no}', 'Admin\Supplier_management\Supplier_mngmntController@display_rfq_sent_supp'); 
    Route::get('/supplier_details/{id}','Admin\Supplier_management\Supplier_mngmntController@view_supplier_details');
    Route::get('/rfq_PDF/{id}/{rfq_no}','Admin\Supplier_management\Supplier_mngmntController@download_rfq_PDF');
    Route::get('/rfq_information','Admin\Supplier_management\Supplier_mngmntController@show_rfq_list');

    //quotation process
    Route::get('/quotation_page/{user_id}/{rfq_id}','Admin\Supplier_management\QuotationMngmntController@display_quotation_by_user_id');
    Route::get('/list_of_quotations','Admin\Supplier_management\QuotationMngmntController@display_quotation_list');
    Route::post('/update_quot_status/{quot_id}/{user_id}/{rfq_id}','Admin\Supplier_management\QuotationMngmntController@update_quotation_status');

    //items selecting page refreshing
    Route::get('/back_to_previous_page','Admin\Supplier_management\QuotationMngmntController@back_to_previous_page');

    //invoice routes
    Route::get('/invoice_list','Admin\Supplier_management\InvoiceController@list_of_invoice');

    //PO info routes
    Route::post('/store_required_po_info','Admin\Supplier_management\POController@store_po_info');
    Route::get('/display_po_preview/{po_id}','Admin\Supplier_management\POController@display_po_preview');
    Route::post('/update_po_status/{comp_name}/{po_id}','Admin\Supplier_management\POController@update_po_status');
    Route::get('/po_list','Admin\Supplier_management\POController@get_po_list');
});





//Normal user routes
Route::group(['middleware' => ['auth','isNormaluser']], function () {

   // Route::get('/normal_user', 'HomeController@index')->name('root.master_page');
    Route::get('/normal_user', 'Customer\GallaryController@display');
    Route::get('/fish_details/{id}', 'Customer\GallaryController@seemore');
    Route::get('/display_aqua_rep_form', 'Services\RepairAquariumController@displayform');

    //online purchase module routes
    Route::get('/go_to_shopping_cart', function () {
        return view('normal-user-pages.online_purchase.shopping_cart');
    });
      //online purchase module routes

    //plant gallary pages
    Route::get('/plants_gallary', 'Customer\GallaryController@display_plants');
    Route::get('/plant_details/{id}', 'Customer\GallaryController@seemore_plants');
    //plant gallary pages

    //decorations gallary pages
    Route::get('/decorations_gallary', 'Customer\GallaryController@display_decor');
    Route::get('/decoration_details/{id}', 'Customer\GallaryController@seemore_decor');
    //decorations gallary pages

    //fishfood gallary pages
    Route::get('/fishfood_gallary', 'Customer\GallaryController@display_fishfood');
    Route::get('/fishfood_profile/{id}', 'Customer\GallaryController@seemore_fishfood');
    //fishfood gallary pages

     //medicines gallary pages
     Route::get('/medicines_gallary', 'Customer\GallaryController@display_medi');
     Route::get('/medi_profile/{id}', 'Customer\GallaryController@seemore_medi');
     //medicines gallary pages

     //request ponds routes
     Route::get('/ponds_entry_page', 'Aqua_Services\Request_for_PondsController@display');
     Route::get('/predefined_gallary', 'Aqua_Services\Request_for_PondsController@show_predefined_gallary');
     Route::get('/pond_info/{id}', 'Cus_Ponds\Customer_pondsController@seemore');
     //request ponds routes


    //shopping cart routes
    Route::get('/load-cart-data','Cart_and_Checkout\CartController@cartloadbyajax');
    Route::post('/add-to-cart','Cart_and_Checkout\CartController@addtocart');
    Route::get('/cart','Cart_and_Checkout\CartController@display_items_in_cart');
    Route::post('/update-to-cart','Cart_and_Checkout\CartController@updatetocart');
    Route::delete('/delete-from-cart','Cart_and_Checkout\CartController@deletefromcart');
    Route::get('clear-cart','Cart_and_Checkout\CartController@clearcart');
    Route::get('/checkout','Cart_and_Checkout\CheckoutController@display_checkout_page');
    Route::post('/place-order','Cart_and_Checkout\CheckoutController@storeorder');

    //shopping cart routes

     //displays customer orders 
     Route::get('/my_orders','Customer\CheckMyOrdersController@show_my_orders');
     //display complete order details
     Route::get('/order_data/{id}','Customer\CheckMyOrdersController@my_order_details');
     //show order count in navbar area

     //deleting orders after completing
     Route::delete('/delete_my_order/{id}','Customer\CheckMyOrdersController@delete_my_order');
    
 
    //search option route
    Route::get('/search','SearchProductController@search_product');
    Route::get('more_details/{id}','SearchProductController@more_details');
    //search option route

   //passing transport data into checkout page
    Route::get('/passing_transport_data','Online_purchase\Distance_vs_CostController@display_transport_data');
    //passing transport data into checkout page

    //display completed orders
    Route::get('/completed_orders','Customer\CheckMyOrdersController@show_completed_orders');

});



//Supplier routes
Route::group(['middleware' => ['auth','isSupplier']], function () {
    Route::get('/supplier_dashboard','Supplier\SupplierController@show_dashbaord');
    Route::get('/recieved_rfq_list','Supplier\RFQHandlingController@show_rfq_list');
    Route::get('/rfq_contents/{id}','Supplier\RFQHandlingController@rfq_content_info');
    Route::get('/supp_rfq_letter/{user_id}/{id}','Supplier\RFQHandlingController@download_supp_rfq');

    //creating supplier item store
    Route::post('/store_form_data','Supplier\ItemstoreController@store_form_data');

    Route::get('/display_creating_item_store_form','Supplier\ItemstoreController@display_form');
    Route::get('/product_data_insertion_form/{tableName}','Supplier\ItemstoreController@product_data_insertion_form');
    Route::post('/store_product_data/{tableName}','Supplier\ItemstoreController@store_product_data');
    Route::get('/edit_product_data/{id}/{tableName}','Supplier\ItemstoreController@edit_data');
    Route::post('/update_product_data/{id}/{tableName}','Supplier\ItemstoreController@update_data');
    Route::get('/edit_image/{id}/{tableName}','Supplier\ItemstoreController@edit_image');
    Route::post('/update_img/{id}/{tableName}','Supplier\ItemstoreController@update_image');
    Route::get('/delete_record/{id}/{tableName}','Supplier\ItemstoreController@delete_record');
   Route::get('/list_of_supplier_product_list','Supplier\ItemstoreController@product_list');
   //Quotation preparation
   Route::get('/prepare_quotation/{rfq_no}','Supplier\Quotation_processController@show_quotation_form');
   Route::post('/rfq_status_updation/{rfq_no}/{user_id}','Supplier\Quotation_processController@store_rfq_status');
   Route::post('/save_prod_items/{rfq_no}','Supplier\Quotation_processController@store_quotation_details');
   Route::get('/display_taken_items/{rfq_no}','Supplier\Quotation_processController@display_taken_items_to_quote');
   Route::post('/store_quotation_item_data/{quotation_id}/{rfq_ref_id}','Supplier\Quotation_processController@store_quotation_item_data');

   Route::get('/edit_quotation_item_data/{rfq_id}/{quot_id}','Supplier\Quotation_processController@edit_quotation_item_data');
   Route::post('/update_quotation_item_data/{quotation_id}/{get_rfq_ref_id}/{user_id}','Supplier\Quotation_processController@update_quotation_item_data');

   Route::get('/quotation/{quotation_id}/{get_rfq_ref_id}/{user_id}','Supplier\Quotation_processController@display_quotation');
   Route::post('/store_quotation_delivery_details/{quotation_id}/{get_rfq_ref_id}/{user_id}','Supplier\Quotation_processController@store_quotation_delivery_details');
   Route::get('/quotations_list_page','Supplier\Quotation_list_processController@display_quotation_list');
   Route::get('/see_rfq_details/{rfq_ref_id}/{supplier_user_id}','Supplier\Quotation_list_processController@display_rfq_details');
   Route::get('/quotation_pdf/{rfq_ref_id}/{quotation_id}','Supplier\Quotation_list_processController@download_quotation_PDF');
   Route::get('/back_to_pick_items_page/{rfq_id}','Supplier\Quotation_processController@back_to_select_items_page');


   //invoicing
   Route::get('/display_invoice_page/{quot_id}','Supplier\InvoicingController@display_invoice_page');
   Route::post('/save_invoice_details','Supplier\InvoicingController@save_invoice_details');
   Route::get('/display_invoice_list','Supplier\InvoicingController@list_of_invoice');

   //updating payment status
   Route::post('/update_payment_status/{sup_id}/{quot_id}','Supplier\InvoicingController@update_payment_status');

   Route::get('/list_of_po','Supplier\POController@list_of_po');

});



    //Deliver person routes
Route::group(['middleware' => ['auth','isDeliverboy']], function () {

    Route::get('/deliverer-dashboard','Deliver\Deliver_personController@show_dashbaord');
    Route::get('/order_details','Deliver\Deliver_personController@show_order_data');
    Route::get('/see_more/{id}','Deliver\Deliver_personController@see_more_data');

    Route::put('/delivery_status/{id}','Deliver\Deliver_personController@update_delivery_status');

   
    //when Deliver press collect payment btn, that record will soft delete.
    Route::get('/soft_delete_task/{id}','Deliver\Deliver_personController@soft_delete_task');
    //go to Deliver history page
    Route::get('/deliver_history','Deliver\Deliver_personController@show_my_history');

    //search by date option
    Route::post('/search_completed_task_by_date','Deliver\SearchbyDateController@search_task_by_date');

    
});




//Constructor routes
Route::group(['middleware' => ['auth','isConstructor']], function () {
    Route::get('/constructor-dashboard', function () {
        return view('construction.dashboard');
    });

});


//staff routes
Route::group(['middleware' => ['auth','isStaff']], function () {
    Route::get('/staff-dashboard', function () {
        return view('staff.dashboard');
    });

});






