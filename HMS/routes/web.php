<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberCon;
use App\Http\Controllers\RoomCon;
use App\Http\Controllers\BedCon;
use App\Http\Controllers\BedAssignCon;
use App\Http\Controllers\ExpenseCategoryCon;
use App\Http\Controllers\ExpenseCon;
use App\Http\Controllers\Food_itemCon;
use App\Http\Controllers\Food_orderCon;
use App\Http\Controllers\GrossReportCon;
use App\Http\Controllers\IncomeReportCon;
use App\Http\Controllers\MonthCon;
use App\Http\Controllers\ServiceCon;
use App\Http\Controllers\ServiceSellCon;
use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\Member;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $bed = Bed::count();
    $bedassign= BedAssign::count();
    $member= Member::count();
    $bav=$bed-$bedassign;
    return view('dashboard',compact('bed','bedassign','member','bav'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user', function (){
    return view('admin.user');
});

Route::resource('members', MemberCon::class)->names('m');
Route::resource('rooms', RoomCon::class)->names('room');
Route::post('/getbed', [RoomCon::class, 'getbed'])->name('getbed');
Route::resource('beds', BedCon::class)->names('bed');
Route::resource('bedassign', BedAssignCon::class)->names('assign');
Route::resource('items', Food_itemCon::class)->names('item');
Route::resource('order', Food_orderCon::class)->names('order');
Route::post('/pos',[Food_orderCon::class, 'pos'])->name('pos');
Route::resource('months', MonthCon::class)->names('month');
Route::resource('expense', ExpenseCon::class)->names('expense');
Route::resource('category', ExpenseCategoryCon::class)->names('category');
Route::resource('gross', GrossReportCon::class)->names('gorss');
Route::resource('income', IncomeReportCon::class)->names('income');
Route::resource('service', ServiceCon::class)->names('s');
Route::resource('service_sell', ServiceSellCon::class)->names('ss');
Route::post('/s_sell',[ServiceSellCon::class, 's_sell'])->name('sell');

require __DIR__.'/auth.php';
