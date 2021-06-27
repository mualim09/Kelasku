<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;

/*  Authentication Route */

require __DIR__ . '/auth.php';

/* Home Route */
Route::prefix('/')->group(function () {
    Route::get('/', [UserController::class, 'getAllClassroom'])->middleware(['auth'])->name('index');
    Route::get('/setting', [UserController::class, 'setting'])->middleware(['auth'])->name('index');
    Route::post('/create-classroom', [UserController::class, 'createClassroom'])->middleware(['auth'])->name('index');
    Route::post('/join-classroom', [UserController::class, 'joinClassroom'])->middleware(['auth'])->name('index');
    Route::delete('/unenroll/{id}', [UserController::class, 'unenrollClassroom'])->middleware(['auth'])->name('index');
    Route::post('/edit-profile', [UserController::class, 'editProfile'])->middleware(['auth'])->name('index');
});

/* Teacher Route */
Route::prefix('teacher')->group(function () {
    Route::get('/{id}', [ClassroomController::class, 'showClassroom'])->middleware(['auth'])->name('index');

    Route::post('/create_announce/{id}', [ClassroomController::class, 'insert_to_announce'])->middleware(['auth'])->name('index');

    Route::get('/classwork/{id}', [ClassroomController::class, 'showClasswork'])->middleware(['auth'])->name('index');

    Route::get('/member/{id}', [ClassroomController::class, 'showMember'])->middleware(['auth'])->name('index');

    Route::delete('member/delete-member/{id}', [ClassroomController::class, 'deleteMember']);

    Route::get('/mark/{id}', [ClassroomController::class, 'showMark'])->middleware(['auth'])->name('index');

    Route::get('/create-material/{id}', [ClassroomController::class, 'showCreateMaterial'])->middleware(['auth'])->name('index');

    Route::get('/create-assignment/{id}', [ClassroomController::class, 'showCreateAssignment'])->middleware(['auth'])->name('index');

    Route::post('/create_new_material/{id}', [TeacherController::class, 'storeMaterial'])->middleware(['auth'])->name('index');

    Route::post('/create_new_assignment/{id}', [TeacherController::class, 'storeAssignment'])->middleware(['auth'])->name('index');

    Route::get('/view-assignment', function () {
        return view('teacher.view_assignment');
    })->middleware(['auth'])->name('index');

    Route::get('/material/{id}', [ClassroomController::class, 'showMaterial'])->middleware(['auth'])->name('index');
    Route::put('/material/{id}', [ClassroomController::class, 'showMaterial'])->middleware(['auth'])->name('index');

    Route::get('/assignment/{id}', [ClassroomController::class, 'showAssignment'])->middleware(['auth'])->name('index');

    Route::post('/material/create_comment/{id}', [ClassroomController::class, 'postCommentMaterial'])->middleware(['auth'])->name('index');

    Route::post('/assignment/create_comment/{id}', [ClassroomController::class, 'postCommentAssignment'])->middleware(['auth'])->name('index');
});

/* Student Route */
Route::prefix('student')->group(function () {
    Route::get('/{id}', [ClassroomController::class, 'showClassroom'])->middleware(['auth'])->name('index');

    Route::post('/create_announce/{id}', [ClassroomController::class, 'insert_to_announce'])->middleware(['auth'])->name('index');

    Route::get('/classwork/{id}', [ClassroomController::class, 'showClasswork'])->middleware(['auth'])->name('index');

    Route::get('/member/{id}', [ClassroomController::class, 'showMember'])->middleware(['auth'])->name('index');

    Route::delete('member/delete-member/{id}', [ClassroomController::class, 'deleteMember']);

    Route::get('/mark/{id}', [ClassroomController::class, 'showMark'])->middleware(['auth'])->name('index');
    
    Route::get('/material/{id}', [ClassroomController::class, 'showMaterial'])->middleware(['auth'])->name('index');

    Route::get('/assignment/{id}', [ClassroomController::class, 'showAssignment'])->middleware(['auth'])->name('index');

    Route::post('/material/create_comment/{id}', [ClassroomController::class, 'postCommentMaterial'])->middleware(['auth'])->name('index');

    Route::post('/assignment/create_comment/{id}', [ClassroomController::class, 'postCommentAssignment'])->middleware(['auth'])->name('index');

    Route::post('assignment/turn_in_assignment/{id}', [ClassroomController::class, 'turn_in'])->middleware(['auth'])->name('index');
});
