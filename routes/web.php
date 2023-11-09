<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskMessageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HorseMessageController;
use App\Http\Controllers\MonthlyFinanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return redirect("/login");
});

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get("/horse/index",[HorseController::class,'index'])->name('horse.index');
    Route::get("/horse/index/owner/{owner}",[HorseController::class,'ownerIndex'])->name('horse.index.owner');
    Route::get('/horse/create',[HorseController::class,'create'])->name('horse.create');
    Route::post("/horse/store",[HorseController::class,'store'])->name('horse.store');
    Route::get("/horse/{horse}/show",[HorseController::class,'show'])->name('horse.show');
    Route::get("/horse/{horse}/edit",[HorseController::class,'edit'])->name('horse.edit');
    Route::post("/horse/{horse}/update",[HorseController::class,'update'])->name('horse.update');
    Route::get("/horse/{horse}/delete",[HorseController::class,'destroy'])->name('horse.delete');

    Route::get('/treatment/index',[TreatmentController::class,'index'])->name('treatment.index');
    Route::get('/treatment/create',[TreatmentController::class,'create'])->name('treatment.create');
    Route::post('/treatment/store',[TreatmentController::class,'store'])->name('treatment.store');
    Route::get('/treatment/{treatment}/edit',[TreatmentController::class,'edit'])->name('treatment.edit');
    Route::post('/treatment/{treatment}/update',[TreatmentController::class,'update'])->name('treatment.update');

    Route::get('/owner/index',[OwnerController::class,'index'])->name('owner.index');
    Route::get('/owner/create',[OwnerController::class,'create'])->name('owner.create');
    Route::post('/owner/store',[OwnerController::class,'store'])->name('owner.store');
    Route::get('/owner/{owner}/edit',[OwnerController::class,'edit'])->name('owner.edit');
    Route::post('/owner/{owner}/update',[OwnerController::class,'update'])->name('owner.update');
    Route::get('/owner/{owner}/attachHorse/{horse}/{returnOwner}',[OwnerController::class,'attachHorse'])->name('owner.attachHorse');
    Route::get('/owner/{owner}/detachHorse/{horse}/{returnOwner}',[OwnerController::class,'detachHorse'])->name('owner.detachHorse');
    Route::get('/owner/{owner}/delete',[OwnerController::class,'destroy'])->name('owner.delete');


    Route::get('/venue/index',[VenueController::class,'index'])->name('venue.index');
    Route::get('/venue/create',[VenueController::class,'create'])->name('venue.create');
    Route::post('/venue/store',[VenueController::class,'store'])->name('venue.store');
    Route::get('/venue/{venue}/edit',[VenueController::class,'edit'])->name('venue.edit');
    Route::post('/venue/{venue}/update',[VenueController::class,'update'])->name('venue.update');


    Route::get('/event/index',[EventController::class,'index'])->name('event.index');
    Route::get('/event/create',[EventController::class,'create'])->name('event.create');
    Route::post('/event/store',[EventController::class,'store'])->name('event.store');
    Route::get('/event/{event}/edit',[EventController::class,'edit'])->name('event.edit');
    Route::post('/event/{event}/update',[EventController::class,'update'])->name('event.update');

    Route::get('/expense/index',[ExpenseController::class,'index'])->name('expense.index');
    Route::get('/expense/index/category/{category}',[ExpenseController::class,'indexCategory'])->name('expense.index.category');
    Route::get('/expense/index/horse/{horse}',[ExpenseController::class,'indexHorse'])->name('expense.index.horse');
    Route::get('/expense/create',[ExpenseController::class,'create'])->name('expense.create');
    Route::post('/expense/store',[ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/{expense}/edit',[ExpenseController::class,'edit'])->name('expense.edit');
    Route::post('/expense/{expense}/update',[ExpenseController::class,'update'])->name('expense.update');
    Route::get('/expense/{expense}/delete',[ExpenseController::class,'destroy'])->name('expense.delete');


    Route::get('/income/index',[IncomeController::class,'index'])->name('income.index');
    Route::get('/income/index/category/{category}',[IncomeController::class,'indexCategory'])->name('income.index.category');
    Route::get('/income/index/horse/{horse}',[IncomeController::class,'indexHorse'])->name('income.index.horse');
    Route::get('/income/create',[IncomeController::class,'create'])->name('income.create');
    Route::post('/income/store',[IncomeController::class,'store'])->name('income.store');
    Route::get('/income/{income}/edit',[IncomeController::class,'edit'])->name('income.edit');
    Route::post('/income/{income}/update',[IncomeController::class,'update'])->name('income.update');
    Route::get('/income/{income}/delete',[IncomeController::class,'destroy'])->name('income.delete');

    Route::get('/inventory/index',[InventoryController::class,'index'])->name('inventory.index');

    Route::get('/inventory/create',[InventoryController::class,'create'])->name('inventory.create');
    Route::post('/inventory/store',[InventoryController::class,'store'])->name('inventory.store');
    Route::get('/inventory/{inventory}/edit',[InventoryController::class,'edit'])->name('inventory.edit');
    Route::post('/inventory/{inventory}/update',[InventoryController::class,'update'])->name('inventory.update');
    Route::get('/inventory/{inventory}/delete',[InventoryController::class,'destroy'])->name('inventory.delete');

    Route::get('/lesson/index',[LessonController::class,'index'])->name('lesson.index');
    Route::get('/lesson/index/rider/{rider}',[LessonController::class,'riderIndex'])->name('lesson.index.rider');
    Route::get('/lesson/index/horse/{horse}',[LessonController::class,'horseIndex'])->name('lesson.index.horse');
    Route::get('/lesson/index/date/{date}',[LessonController::class,'dateIndex'])->name('lesson.index.date');
    Route::get('/lesson/create',[LessonController::class,'create'])->name('lesson.create');
    Route::post('/lesson/store',[LessonController::class,'store'])->name('lesson.store');
    Route::get('/lesson/{lesson}/edit',[LessonController::class,'edit'])->name('lesson.edit');
    Route::post('/lesson/{lesson}/update',[LessonController::class,'update'])->name('lesson.update');
    Route::get('/lesson/{lesson}/delete',[LessonController::class,'destroy'])->name('lesson.delete');


    Route::get('/inventoryitem/create/inventory/{inventory}/{added}',[InventoryItemController::class,'create'])->name('inventoryitem.create');
    Route::post('/inventoryitem/store/inventory/{inventory}/{added}',[InventoryItemController::class,'store'])->name('inventoryitem.store');
    Route::get('/inventoryitem/{inventory_item}/delete',[InventoryItemController::class,'destroy'])->name('inventoryitem.delete');

    Route::get('/rider/index',[RiderController::class,'index'])->name('rider.index');
    Route::get('/rider/index/rider/{rider}',[RiderController::class,'riderIndex'])->name('rider.index.rider');
    Route::get('/rider/index/horse/{horse}',[RiderController::class,'horseIndex'])->name('rider.index.horse');
    Route::get('/rider/create',[RiderController::class,'create'])->name('rider.create');
    Route::post('/rider/store',[RiderController::class,'store'])->name('rider.store');
    Route::get('/rider/{rider}/show',[RiderController::class,'show'])->name('rider.show');
    Route::get('/rider/{rider}/edit',[RiderController::class,'edit'])->name('rider.edit');
    Route::post('/rider/{rider}/update',[RiderController::class,'update'])->name('rider.update');
    Route::get('/rider/{rider}/delete',[RiderController::class,'destroy'])->name('rider.delete');
    Route::get('/rider/{rider}/getPrice',[RiderController::class,'getPrice'])->name('rider.getPrice');

    Route::get('/task/index',[TaskController::class,'index'])->name('task.index');
    Route::get('/task/create',[TaskController::class,'create'])->name('task.create');
    Route::post('/task/store',[TaskController::class,'store'])->name('task.store');
    Route::get('/task/{task}/edit',[TaskController::class,'edit'])->name('task.edit');
    Route::post('/task/{task}/attachUser',[TaskController::class,'attachUser'])->name('task.assignUser');
    Route::post('/task/{task}/detachUser/{user}',[TaskController::class,'detachUser'])->name('task.detachUser');

    Route::post('/task/{task}/attachHorse',[TaskController::class,'attachHorse'])->name('task.assignHorse');
    Route::post('/task/{task}/detachHorse/{horse}',[TaskController::class,'detachHorse'])->name('task.detachHorse');


    Route::post('/task/{task}/update',[TaskController::class,'update'])->name('task.update');
    Route::get('/task/{task}/delete',[TaskController::class,'destroy'])->name('task.delete');


     Route::get('/message/show/{message}',[MessageController::class,'show'])->name('message.show');

    Route::get('/taskmessage/index/task/{task}',[TaskMessageController::class,'index'])->name('taskmessage.index');
    Route::post('/taskmessage/store/task/{task}',[TaskMessageController::class,'store'])->name('taskmessage.store');
    Route::post('/horsemessage/store/horse/{horse}',[HorseMessageController::class,'store'])->name('horsemessage.store');


    Route::get('/monthlyfinance/expense',[MonthlyFinanceController::class,'getExpenseJson'])->name('finance.expense');
    Route::get('/monthlyfinance/income',[MonthlyFinanceController::class,'getIncomeJson'])->name('finance.income');
    Route::get('/monthlyfinance/expensepiechart',[MonthlyFinanceController::class,'getExpensePieChartJson'])->name('finance.pieExpense');
    Route::get('/monthlyfinance/incomepiechart',[MonthlyFinanceController::class,'getIncomePieChartJson'])->name('finance.pieIncome');

    });
require __DIR__.'/auth.php';


use Illuminate\Support\Facades\App;

use App\Models\HorseMessage;
Route::get('/test', function () {
    $message = HorseMessage::find(1);
    dd($message->toUser);
    dd(request());
    dd(App::isLocale("hu"));
})->name("test");


