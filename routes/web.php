<?php

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard','dashboardController@index')->name('dashboard');
Auth::routes();

/*
Search Controller
*/


Route::group(['prefix'=>'search', 'middleware'=>'auth', 'as'=>'search'], function()
{
    Route::get('/search','SearchController@viewSearchForm')->name('.index');
    Route::post('/search','SearchController@search');
    Route::get('/datatable','SearchController@viewdataTable')->name('.getTable');
    Route::get('/datatable/data','SearchController@getResults')->name('.patient');
    Route::get('/appointments','SearchController@searchAppointments')->name('.appointments');
    Route::get('/appointments/data','SearchController@AppointmentsResults')->name('.appointment');

    Route::get('/ajax','AjaxSearchController@viewSearch')->name('.ajax');
    Route::get('/ajax/appointment','AjaxSearchController@searchAppointment')->name('.ajax.appointment');

});


/*
SMS Messages
*/
Route::group(['prefix'=>'msg', 'middleware'=>'auth', 'as'=>'msg'], function()
{
  Route::get('/sms/{patient}','PatientController@getSendMsg')->name('.sms');
});

/*
Admin
*/

  // Route::group(['prefix'=>'admin','middleware'=>['admin'], 'as'=>'admin'],function()
  // {
  //
  //   Route::get('/add_new/doctor','doctorController@create')->name('.addNewDoctor');
  //     Route::get('/add_new/user','userController@create')->name('.addNewUser');
  // } );

/* --------------------------------------------------------------------------------------------
User
*/
Route::group(['prefix'=>'user', 'middleware'=>['auth'], 'as'=>'user'],function()
  {
    Route::get('/all_users','UserController@index')->name('.index');
    Route::get('/show/{user}','UserController@show')->name('.page');
    Route::get('/profile/update/{user}','UserController@edit')->name('.profile.update');
    Route::post('/profile/update/{user}','UserController@update');
    Route::get('/profile/avatar/{user}','UserController@showAvatar')->name('.profile.showAvatar');
    Route::get('/add_new','UserController@create')->name('.addNew');
    Route::post('/add_new','UserController@store');
    Route::get('/{user}/confirm_delete','UserController@ShowDelete')->name('.showDelete');
    Route::get('/delete/{user}','UserController@destroy')->name('.delete');
  } );


/*--------------------------------------------------------------------------------------------------
Patient
*/
  Route::group(['prefix'=>'patient', 'middleware'=>['auth'], 'as'=>'patient'],function()
    {
      Route::get('/AllPatients','PatientController@index')->name('.index');
      Route::get('/show/{patient}','PatientController@show')->name('.show');
      Route::get('/add_new','PatientController@create')->name('.addNew');
      Route::post('/add_new','PatientController@store');
      Route::get('/{patient}/confirm_delete','PatientController@ShowDelete')->name('.showDelete');
      Route::get('/delete/{patient}','PatientController@destroy')->name('.delete');
      Route::get('/update/{patient}','PatientController@edit')->name('.update');
      Route::post('/update/{patient}','PatientController@update');
      Route::get('/add_avatar/{patient}','PatientController@showAvatar')->name('.showAvatar');
      Route::get('/prescriptions/{patient}','PatientController@MyPrescritptions')->name('.prescriptions');
      Route::get('/new_appointment/{patient}','PatientController@ShowBookAppointmentForm')->name('.newAppointment');
      Route::post('/new_appointment/{patient}','PatientController@SubmitBookAppointmentForm');
      Route::get('/{patient}/all_appointments','PatientController@AllAppointments')->name('.allAppointments');
      Route::get('/{patient}/future_appointments','PatientController@FutureAppointments')->name('.futureAppointments');
      Route::get('/{patient}/passed_appointments','PatientController@PassedAppointments')->name('.passedAppointments');
      Route::get('/sms/{patient}','PatientController@getSendMsg')->name('.sms');
      Route::post('/sms/{patient}','PatientController@sendMsg');
      }  );

      Route::group(['prefix'=>'patient', 'middleware'=>['guest'], 'as'=>'patient'],function()
        {
          Route::get('/checkin','PatientController@showCheckIn')->name('.checkin');
          Route::post('/checkin','PatientController@postCheckIn');
});
/*-------------------------------------------------------------------------------------------------
Doctor
*/

  Route::group(['prefix'=>'doctor','middleware'=>['auth'], 'as'=>'doctor'],function()
  {
    Route::get('/allDoctors','DoctorController@index')->name('.index');
    Route::get('/{doctor}/page','DoctorController@show')->name('.page');
    Route::get('/slots/{doctor}','DoctorController@getFreeSlotsForm')->name('.freeSlots');
    Route::post('/slots/find','DoctorController@MyFreeSlots')->name('.searchSlot');
    Route::get('/calendar/{doctor}','DoctorController@viewMySlotsCalendar')->name('.calendar');
    Route::get('/Patients/{doctor}','DoctorController@myPatients')->name('.patients');

  } );


  /*-------------------------------------------------------------------------------------------------
  Appointment
  */

   Route::group(['prefix'=>'appointment','middleware'=>['auth'] ,'as'=>'appointment'],function(){
    Route::get('/allAppointments','AppointmentController@index')->name('.index');
    Route::get('/dataTable','AppointmentController@ShowDatatable')->name('.dataTbale');
    Route::get('/details/{appointment}','AppointmentController@show')->name('.details');
    Route::get('/calendar','AppointmentController@viewCalendar')->name('.calendar');
    Route::get('/update/{appointment}','AppointmentController@edit')->name('.update');
    Route::post('/update/{appointment}','AppointmentController@update');
    Route::get('/delete/{appointment}','AppointmentController@destroy')->name('.delete');
    Route::post('/outcome/{appointment}','AppointmentController@addNotes')->name('.addNotes');
  });

  /*-------------------------------------------------------------------------------------------------
prescription
  */
Route::group(['prefix'=>'prescription', 'middleware'=>['auth'] , 'as'=>'prescription'],function(){

Route::get('/allPrescriptions','PrescriptionController@index')->name('.index');
Route::post('/add_new/{appointment}','PrescriptionController@store')->name('.addNew');

});
